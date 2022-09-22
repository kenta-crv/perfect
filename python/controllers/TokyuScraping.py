import json
from tokyu.Tokyu import *

from controllers.parseArgs import *

class TokyuScraping:

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
      
      helper = Tokyu()
      browser = helper.new_browser(debug=False)
      try:
        helper.login(browser, request)
      except:
        # Clear Browser
        browser.quit()
        return {
          'data' : {
            'status' : 500,
            'message' : 'Login Failed'
          },
          'states' : states
        }
      states[request['browser_id']] = browser
      response = helper.ptable_search(browser, request, browser_id = request['browser_id'])

      return {
        'data' : response,
        'states' : states
      }

    def get_batch(self, request, states):
      helper = Tokyu()
      browser_id = request['browser_id']
      browser = states[browser_id]

      # Traverse PTABLE
      result = helper.getResult(browser, request['ptable'])

      if(len(result['ptable']) == 0):
        # Clear Browser
        browser.quit()
        states[browser_id] = None
        del states[browser_id]
        browser_id = 0


      return {
        'data' : {
          'status' : 200,
          'browser_table' : {
            'browser_id' : browser_id,
            'ptable' : json.dumps(result['ptable'])
          },
          'payload' : result['payload'],
        },
        'states' : states
      }
    
    def get_detail(self, request, states):
      helper = Tokyu()
      # Check if Browser is initialized
      if 'tokyu_detail' in states:
        browser = states['tokyu_detail']
        if(helper.isBrowserActive(browser) is False):
          # Clear Browser
          browser.quit()
          states['tokyu_detail'] = None
          del states['tokyu_detail']
          return self.get_detail(request, states)
      # Login if not
      else:
        # New Browser
        browser = helper.new_browser(debug=False)
        # Login
        helper.login(browser, request)
        # Store on States
        states['tokyu_detail'] = browser

      # Visit Url
      browser.visit(request['detail_link'])
      # Get Detail
      response = helper.retrieveFromDetail(browser)
      # Prep for Next
      browser.back()
      browser.reload()

      return {
        'data' : response,
        'states' : states,
        'detail_browser' : True
      }