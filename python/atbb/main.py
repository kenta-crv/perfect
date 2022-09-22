from atbb.Atbb import *

def connect_only(browser):
  atbb = Atbb()

  try:
    atbb.connect_atbb_page(browser)
  except:
    return False

  # # Logout Exists
  # if(len(browser.find_by_css('.shuryoBtn', wait_time=10)) == 0):
  #   return False

  return browser

def login_only():
  atbb = Atbb()
  # Browser
  browser = atbb.open_browser(debug=False)

  # Login
  return atbb.login_atbb(browser)

def search_only(browser, request, first_ten = False):
  atbb = Atbb()
  # Search Tab
  # browser.find_by_css('.menubar-bg').find_by_xpath('..').find_by_tag('td')[1].click()

  # Search
  # atbb.atbb_sample_search(browser, request)
  atbb.new_search(browser, request)

  # Get Results
  response = atbb.retrieve_results(browser, first_ten)

  return {
    'status' : 200,
    'message' : 'OK',
    'payload' : response
  }
  # return 'OK'

def sample_search(request):
  atbb = Atbb()
  # Browser
  browser = atbb.open_browser(debug=True)

  # Login
  atbb.login_atbb(browser)

  # Connect
  atbb.connect_atbb_page(browser)

  # Search
  atbb.atbb_sample_search(browser, request)

  # Get Results
  response = atbb.retrieve_results(browser)

  # Logout
  atbb.logout_atbb(browser)
  
  return response