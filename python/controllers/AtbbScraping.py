from atbb.Atbb import *

from controllers.parseArgs import *

class AtbbScraping:

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
      helper = Atbb()
      browser = helper.open_browser(debug=False)
      
      try:
        login_response = helper.login_atbb(browser, request)
        if(login_response == False):
          # Clear Browser
          browser.quit()

          return {
            'data' : {
              'status' : 500,
              'message' : 'Server Error.'
            },
            'states' : states
          }
        helper.connect_atbb_page(browser)
        helper.new_search(browser, request)
        site_total_result  = browser.find_by_id('totalCount')['value']
        response = helper.retrieve_results(browser, request['first_ten'])
        
        # Clear Browser
        browser.quit()

        return {
          'data' : {
            'status' : 200,
            'message' : 'OK',
            'payload' : response,
            'site_total_result' : site_total_result
          },
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
          'states' : states
        }