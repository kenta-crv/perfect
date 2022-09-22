from itandibb.Itandibb import *

from controllers.parseArgs import *

class ItandiScraping:

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

    def get_ptable(self, request, states):
      helper = Itandibb()
      browser = helper.new_browser(debug=False)
      # detail_browser = helper.new_browser(debug=False)

      states[request['browser_id']] = browser
      # states['detail_'+request['browser_id']] = detail_browser

      response = helper.loginAndSearch(browser, request)

      if(response['status'] == 500):
        browser.quit()

      return {
        'data' : response,
        'states' : states,
      }

    def get_batch(self, request, states):
      helper = Itandibb()
      browser_id = request['browser_id']
      browser = states[browser_id]
      
      response = helper.getByBatch(browser, request['last_index'])
      
      if(response['last_index'] == -1):
        # Clear Browser
        browser.quit()
        states[browser_id] = None
        del states[browser_id]

      return {
        'data' : response,
        'states' : states
      }
    
    def get_detail(self, request, states):
      helper = Itandibb()
      # Check if Browser is initialized
      if 'itandi_detail' in states:
        browser = states['itandi_detail']
        if(helper.isBrowserActive(browser) is False):
          # Clear Browser
          browser.quit()
          states['itandi_detail'] = None
          del states['itandi_detail']
          return self.get_detail(request, states)
      # Login if not
      else:
        # New Browser
        browser = helper.new_browser(debug=False)
        # Login
        helper.login(browser, request)
        # Store on States
        states['itandi_detail'] = browser

      # Visit Url
      browser.visit(request['detail_link'])
      # Get Detail
      response = helper.getDetailPage(browser)
      # Prep for Next
      browser.back()
      # Check for Alert
      has_alert = browser.get_alert()
      has_alert.accept() if has_alert != None else None
      browser.reload()

      return {
        'data' : response,
        'states' : states,
        'detail_browser' : True
      }