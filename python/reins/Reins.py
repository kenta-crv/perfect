import os, time, re

from splinter import Browser
from selenium import webdriver

class Reins:
  def __init__(self):
    self.f_root = './reins'

    self.login_url = "https://system.reins.jp/"

    self.result_headers = [
      "物件番号",
      "物件種目",
      "使用部分面積",
      "所在地",
      "取引態様",
      "賃料",
      "用途地域",
      "㎡単価",
      "建物名",
      "所在階",
      "間取",
      "取引状況",
      "管理費",
      "敷金／保証金",
      "坪単価",
      "沿線駅",
      "交通",
      "共益費",
      "礼金／権利金",
      "接道状況",
      "商号",
      "築年月",
      "接道１",
      "電話番号"
    ]

    self.type_search2 = {
      'テラスハウス' : ["賃貸一戸建", "テラス"],
    }
    
    self.type_search1 = {
      'マンション' : ["賃貸マンション", "マンション"],
      'アパート' : ["賃貸マンション", "アパート"],
      'タウンハウス' : ["賃貸マンション", "タウン"],
    }

    self.reins_number = ['１', '２', '３']

    self.madori_guide = [['ワンルーム'], ['1K', '2K', '3K', '4K'], ['1DK', '2DK', '3DK', '4DK'], ['1LDK', '2LDK', '3LDK', '4LDK']]

  def new_browser(self, debug=False):
    f_path = os.path.abspath('./drivers/win')

    os.chmod(f_path, 755)
    os.environ['PATH'] += f'{os.pathsep}{f_path}'

    options = webdriver.ChromeOptions()
    browser = None
    if debug is False:
      options.add_argument("--window-size=1920,1080")
      options.add_argument("--start-maximized")
      options.add_argument("--headless")
      browser = Browser('chrome', options = options, headless=True)
    elif debug is True:
      options.add_experimental_option("debuggerAddress", "localhost:8989")
      browser = Browser('chrome', options = options)
    
    browser.visit(self.login_url)
    
    # TODO: Status Response
    return browser

  # Helper
  def clearText(self, html):
    return " ".join(html.replace('&nbsp;', '').split())

  
  def login(self, browser, request):
    # browser.visit(self.login_url) 
    # try:
    #   key = open(self.f_root+"/login.key", "r")
    #   key_string = key.readline().split("|")
    #   # user_id = key_string[0]
    #   # password   = key_string[1]
    user_id = request['user_name']
    password   = request['user_pass']
    # except OSError:
    #   return {
    #   'status' : 500,
    #   'message' : 'Error'
    # }

    
    browser.find_by_id("login-button").click()
    browser.find_by_css('.p-textbox-type-ascii input[type="text"]').fill(user_id)
    browser.find_by_css('.p-textbox-type-password input[type="password"]').fill(password)

    browser.find_by_css('.noRobot div.p-checkbox-input').click()
    browser.find_by_css('button.btn.p-button').click()

    if(len(browser.find_by_text(' ユーザIDもしくはパスワードが誤っています。')) == 0):
      return {
        'status' : 200,
        'message' : 'OK'
      }
    else:
      return {
        'status' : 500,
        'message' : 'Login Failed'
      }

  def search(self, browser, request, logged_in = False):
    # Property Search
    try:
      search_button = browser.find_by_value('賃貸 物件検索', wait_time=10)
      search_button.click() if len(search_button) > 0 else ''
    except:
      pass

    # request = {
    #   "kind1": "賃貸マンション",
    #   "type1": "マンション",
    #   "zumen_flag": True,
    #   "image_flag": True,
    #   "pref": "埼玉県",
    #   "address1": "さいたま市西区",
    # }

    # TODO: Refactor to Function for Select Options
    property_kind_options =  browser.find_by_css('div.p-label.p-required', wait_time=10).find_by_xpath('..').find_by_css('.p-selectbox select option')
    for option in property_kind_options:
      if option.html == request['kind1']:
        option.click()

    select_labels = browser.find_by_css('div.p-label.p-required', wait_time=10).find_by_xpath('../..').find_by_css('span.p-label-title')
    specific_label = [label for label in select_labels if label.html == "物件種目１"][0]
    property_type_options =  specific_label.find_by_xpath('../..').find_by_css('.p-selectbox select option')
    for option in property_type_options:
      if option.html == request['type1']:
        option.click()

    labels = browser.find_by_css('label.custom-control-label')
    if(request['zumen_flag'] == True):
      [label for label in labels if label.html == "図面ありのみ"][0].click()

    if(request['image_flag'] == True):
      [label for label in labels if label.html == "物件画像ありのみ"][0].click()

    location_groups = browser.find_by_css('div.card-body.p-card-body .row div h3')
    location_group = [group for group in location_groups if group.html == "所在地１"][0].find_by_xpath('../../following-sibling::div[1]')
    location_group.find_by_css('div.row')[0].find_by_css('input[type="text"]').fill(request['pref'])
    location_group.find_by_css('div.row')[1].find_by_css('input[type="text"]').fill(request['address1'])

    submit_group_buttons = browser.find_by_css('div.p-frame-bottom').find_by_css('button.btn.p-button')
    submit_button = [button for button in submit_group_buttons if button.html == "件数事前確認"][0]
    submit_button.click()

    # Accept button click
    modal = browser.find_by_css('div.modal-body')
    case_count = int(modal.find_by_css('div.row.justify-content-center div').last.html.replace("対象件数：", "").replace("件",""))
    if(case_count < 100 and case_count > 0):
      modal.find_by_css('button.btn.p-button.btn-primary').click()

    response = self.retrieveResults(browser)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response
    }

  def new_search(self, browser, request, logged_in = False, first_ten = False):
    # Property Search
    try:
      search_button = browser.find_by_value('賃貸 物件検索', wait_time=10)
      search_button.click() if len(search_button) > 0 else ''
    except:
      pass

    # request = {
    #   "object_type" : [
    #   # "マンション",
    #   # "アパート",
    #   # "戸建",
    #   "テラスハウス",
    #   # "タウンハウス",
    #   # "その他"
    #   ],
    #   # "prefectures" : ["埼玉県", "東京都"],
    #   "prefectures" : ["埼玉県"],
    #   "cities" : {
    #     # "東京都" : ["千代田区"],
    #     "埼玉県" : ["さいたま市西区"]
    #   },
    #   "zumen_flag": True,
    #   "image_flag": True,
    # }

    # sample_request = {
    #   # "site_enabled" : {
    #   #   0 : "reins"
    #   # },
    #   "object_type" : [
    #     "マンション",
    #     "アパート",
    #     "戸建",
    #   ],
    #   "prefectures" : [
    #     "埼玉県"
    #   ],
    #   "cities" : {
    #     "埼玉県" : [
    #       "さいたま市西区",
    #       "さいたま市北区",
    #       "さいたま市大宮区",
    #     ]
    #   },
    #   # "madori" : {
    #   #   0 : "1K/SK",
    #   #   1 : "1DK/LK/SDK/SLK",
    #   #   2 : "1LDK/SLDK"
    #   # },
    #   "madori" : [
    #     "1K",
    #     "1DK",
    #     "1LDK",
    #   ],
    #   "floor_option" : "no_floor"
    # }

    # TODO: Refactor to Function for Select Options
    mansion_count = 0
    for types in request['object_type']:
      if(len(request['object_type']) > 2):
        if (types in self.type_search1):
          property_kind_options =  browser.find_by_css('div.p-label.p-required', wait_time=10).find_by_xpath('..').find_by_css('.p-selectbox select option')
          for option in property_kind_options:
            if option.html == self.type_search1[types][0]:
              option.click()

          select_labels = browser.find_by_css('div.p-label.p-required', wait_time=10).find_by_xpath('../..').find_by_css('span.p-label-title')
          specific_label = [label for label in select_labels if label.html == "物件種目１"][0]
          property_type_options =  specific_label.find_by_xpath('../..').find_by_css('.p-selectbox select option')
          for option in property_type_options:
            if option.html == self.type_search1[types][1]:
              option.click()
        elif (types in self.type_search2) and mansion_count < 2:
          property_kind_options =  browser.find_by_text('物件種別２', wait_time=10).find_by_xpath('../..').find_by_css('.p-selectbox select option')
          for option in property_kind_options:
            if option.html == self.type_search2[types][0]:
              option.click()

          select_labels = browser.find_by_text('物件種別２', wait_time=10).find_by_xpath('../../..').find_by_css('span.p-label-title')
          specific_label = [label for label in select_labels if label.html == "物件種目"+self.reins_number[mansion_count]][0]
          property_type_options =  specific_label.find_by_xpath('../..').find_by_css('.p-selectbox select option')
          for option in property_type_options:
            if option.html == self.type_search2[types][1]:
              option.click()
          mansion_count += 1
      else:
          property_kind_options =  browser.find_by_css('div.p-label.p-required', wait_time=10).find_by_xpath('..').find_by_css('.p-selectbox select option')
          main_selection = self.type_search1[types][0] if types in self.type_search1 else self.type_search2[types][0]
          for option in property_kind_options:
            if option.html == main_selection:
              option.click()

          select_labels = browser.find_by_css('div.p-label.p-required', wait_time=10).find_by_xpath('../..').find_by_css('span.p-label-title')
          specific_label = [label for label in select_labels if label.html == "物件種目１"][0]
          property_type_options =  specific_label.find_by_xpath('../..').find_by_css('.p-selectbox select option')
          sub_selection = self.type_search2[types][1] if types in self.type_search2 else self.type_search1[types][1]
          for option in property_type_options:
            if option.html == sub_selection:
              option.click()

    labels = browser.find_by_css('label.custom-control-label')
    if(request['zumen_flag'] == True):
      [label for label in labels if label.html == "図面ありのみ"][0].click()

    if(request['image_flag'] == True):
      [label for label in labels if label.html == "物件画像ありのみ"][0].click()

    #Prefecture Search
    for i, prefecture in enumerate(request['prefectures']):
      for city in request['cities'][prefecture]:
        browser.find_by_text('所在地'+self.reins_number[i]).find_by_xpath('../../following-sibling::div[1]').find_by_css('input.p-textbox-input')[0].fill(prefecture)
        browser.find_by_text('所在地'+self.reins_number[i]).find_by_xpath('../../following-sibling::div[1]').find_by_css('input.p-textbox-input')[1].fill(city)


    # location_groups = browser.find_by_css('div.card-body.p-card-body .row div h3')
    # location_group = [group for group in location_groups if group.html == "所在地１"][0].find_by_xpath('../../following-sibling::div[1]')
    # location_group.find_by_css('div.row')[0].find_by_css('input[type="text"]').fill(request['pref'])
    # location_group.find_by_css('div.row')[1].find_by_css('input[type="text"]').fill(request['address1'])

    self.searchOthers(browser, request)

    submit_group_buttons = browser.find_by_css('div.p-frame-bottom').find_by_css('button.btn.p-button')
    submit_button = [button for button in submit_group_buttons if button.html == "件数事前確認"][0]
    submit_button.click()

    # Accept button click
    modal = browser.find_by_css('div.modal-body')
    case_count = int(modal.find_by_css('div.row.justify-content-center div').last.html.replace("対象件数：", "").replace("件",""))
    if(case_count < 100 and case_count > 0):
      modal.find_by_css('button.btn.p-button.btn-primary').click()

    response = self.retrieveResults(browser, first_ten)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response,
      'site_total_result' : case_count
    }
  
  def searchOthers(self, browser, request):
    # Temporary if Switch
    if(request['madori'] != None):
      madori_selected = []
      for selected in request['madori']:
        for key, guide in enumerate(self.madori_guide):
          if selected in guide:
            madori_selected.append(key)
            break
            

      madori_group = self.get_group(browser, '間取タイプ')
      browser.execute_script('document.getElementsByClassName("p-frame-footer-body")[0].style.display = "none"')
      for index, label in enumerate(madori_group.find_by_css('.p-checkgroup-item label')):
        if 0 in madori_selected and index in [0]:
          label.click()
        elif 1 in madori_selected and index in [1,5]:
          label.click()
        elif 2 in madori_selected and index in [2,3,6,7]:
          label.click()
        elif 3 in madori_selected and index in [4,8]:
          label.click()
      browser.execute_script('document.getElementsByClassName("p-frame-footer-body")[0].style.display = "block"')

  def retrieveResults(self, browser, first_ten = False):
    response = {}
    properties = browser.find_by_css('.p-table-body-row', wait_time=10)
    
    # Get First 10
    if first_ten:
      properties = properties[:10]
    
    for property in properties:
      items = property.find_by_css('.p-table-body-item')
      result = {}
      h = 0
      for i, item in enumerate(items):
        item_info = '-'
        if (i in [0,1,2,20,25, 29,30,31]):
          continue
        elif (i == 24):
          item_info = item.find_by_tag('a').html
        elif (i == 26):
          item_info = self.clearText(item.html)
        elif (i == 28):
          item_info = item.find_by_tag('span').html
        else:
          item_info = item.html
        result[self.result_headers[h]] = item_info
        h += 1
      response[len(response)] = result
    
    return response
  
  def get_group(self, browser, label):
    return browser.find_by_text(label).find_by_xpath('../..')


