from mitsui.Mitsui import *

from controllers.parseArgs import *

class MitsuiScraping:

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
      
      helper = Mitsui()
      browser = helper.new_browser(debug=False)
      try:
        helper.login(browser, request)
      except:
        browser.quit()
        return{
          'data' : {
            'status' : 500,
            'message' : 'Login Failed'
          },
          'states' : states
        }
      browser_id = request['browser_id']
      states[browser_id] = browser
      response = helper.ptable_search(browser, request, browser_id)

      if(response['browser_table']['has_next'] == None or response['browser_table']['has_next'] == -1):
        # Clear Browser
        browser.quit()
        states[browser_id] = None
        del states[browser_id]
        browser_id = 0

      return {
        'data' : response,
        'states' : states
      }

    def get_batch(self, request, states):
      helper = Mitsui()
      browser_id = request['browser_id']
      browser = states[browser_id]

      # Traverse PTABLE
      result = helper.getSmallBatchResult(browser)

      if (result['has_next'] == -1):
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
            'has_next' : result['has_next']
          },
          'payload' : result['payload'],
        },
        'states' : states
      }
    
    def get_detail(self, request, states):
      helper = Mitsui()
      # Check if Browser is initialized
      if 'mitsui_detail' in states:
        browser = states['mitsui_detail']
        if(helper.isBrowserActive(browser) is False):
          # Clear Browser
          browser.quit()
          states['mitsui_detail'] = None
          del states['mitsui_detail']
          return self.get_detail(request, states)
      # Login if not
      else:
        # New Browser
        browser = helper.new_browser(debug=False)
        # Login
        helper.login(browser, request)
        # Store on States
        states['mitsui_detail'] = browser

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