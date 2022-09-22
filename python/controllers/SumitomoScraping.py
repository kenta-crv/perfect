from sumitomo.Sumitomo import *

from controllers.parseArgs import *

class SumitomoScraping:

    def switch(self, scraping_type, args, states):
        default = getattr(self, '_default')
        request = parseArgs(args)
        return getattr(self, scraping_type, lambda: default)(request, states)

    def _default(self, request, states):
      return {
        'status' : 500,
        'error' : 'Server Error.'
      }

    def login_search(self, request, states):


      return {
        'data' : {},
        'states' : states
      }

    def search_property(self, request, states):
      helper = Sumitomo()
      browser = helper.new_browser(debug=False)
      try:
        login_response = helper.login(browser, request)
        if(login_response['status'] == 500):
          # Clear Browser
          browser.quit()

          return {
            'data' : login_response,
            'states' : states
          }
        response = helper.search(browser, request, first_ten = request['first_ten'])
        
        # Clear Browser
        browser.quit()

        return {
          'data' : response,
          'states' : states
        }
      except:
        # Clear Browser
        browser.quit()

        return {
          'data' : {
            'status' : 500,
            'message' : 'Server Error.'
          },
          'states': states
        }
    
    def get_detail(self, request, states):
      helper = Sumitomo()
      # Check if Browser is initialized
      if 'sumitomo_detail' in states:
        browser = states['sumitomo_detail']
        if(helper.isBrowserActive(browser) is False):
          # Clear Browser
          browser.quit()
          states['sumitomo_detail'] = None
          del states['sumitomo_detail']
          return self.get_detail(request, states)
      # Login if not
      else:
        # New Browser
        browser = helper.new_browser(debug=False)
        # Store on States
        states['sumitomo_detail'] = browser

      # Visit Url
      browser.visit(request['detail_link'])
      # Get Detail
      response = helper.getDetailPage(browser)
      # Prep for Next
      browser.back()
      browser.reload()

      return {
        'data' : response,
        'states' : states,
        'detail_browser' : True
      }