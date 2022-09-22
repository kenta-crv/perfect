import os, re, time

from splinter import Browser
from selenium import webdriver

from datetime import date

class Itandibb():

  def __init__(self):
    self.login_url = 'https://itandibb.com/rent/search'

    self.search_madori = [
      "1R",
      "1K",
      "1DK",
      "1LDK",
      "2K",
      "2DK",
      "2LDK",
      "3K",
      "3DK",
      "3LDK",
      "4K",
      "4DK",
      "4LDK"
    ]

    self.search_result_headers = [
      "所在地",
      "商号",
      "賃料",
      "管理費",
      "共益費",
      "敷金",
      "礼金",
      "敷金",
      "間取",
      "使用部分面積",
      "内見開始日", #
      "入居可能日", #
    ]

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


  def login(self, browser, request):
    try:
      key = open("./itandibb/login.key", "r")
      key_string = key.readline().split("|")
      user_id = request['user_name']
      password   = request['user_pass']
    except OSError:
      return {
        'status' : 500,
        'message' : 'LOGIN_KEY'
      }

    # Submit Login Form
    browser.find_by_css('input#email', wait_time=5).type(user_id)
    browser.find_by_css('input#password', wait_time=5).type(password)
    login_button = browser.find_by_value('ログイン', wait_time=10)
    login_button.click() if len(login_button) > 0 else None
    # browser.find_by_value('ログイン', wait_time=5).click()

    # Close Onboarding
    #close_button = browser.find_by_css('.MuiDialogActions-root.MuiDialogActions-spacing .MuiButton-textPrimary')
    close_button = browser.find_by_text('キャンセル', wait_time=3)
    close_button.click() if len(close_button) > 0 else None
    # TODO: Check if Real Login

    return {
      'status' : 200,
      'message' : 'OK'
    }
  
  def fillProperty(self, label, value, search_root):
    input_text = search_root.find_by_text(label).find_by_xpath('..').find_by_xpath('following-sibling::div[1]').find_by_tag('input')
    input_text.fill(value)

  def checkBoxOnArray(self, label, check_array, search_root):
    if label == '構造':
      clean_array = []
      # R, C, P, S, H, A, L
      for uni_label in check_array:
        clean_array.append(
          uni_label
          .replace('Ｒ', 'R')
          .replace('Ｃ', 'C')
          .replace('Ｐ', 'P')
          .replace('Ｓ', 'S')
          .replace('Ｈ', 'H')
          .replace('Ａ', 'A')
          .replace('Ｌ', 'L')
        )
      check_array = clean_array
      
    box_list = search_root.find_by_text(label).find_by_xpath('..').find_by_xpath('following-sibling::div[1]')
    for box_label in check_array:
      check_box = box_list.find_by_text(box_label)
      check_box.click() if len(check_box) > 0 else None
    

  def removeRouteUnit(self, route_name):
    last_index = len(route_name) - 1
    if route_name[last_index] == '線':
      route_name = route_name[0:last_index]

    return route_name

  def search_only(self, browser, request, logged_in = False, first_ten = False):
    search_root = browser.find_by_css('.SearchRoot')

    try:
      browser.execute_script('document.getElementsByClassName("WrapperBottomFixSearch")[0].style.display = "none"')
    except OSError:
      return {
        'status' : 500,
        'error' : 'Invalid login informations.'
      }

    # Object Type
    if(request['object_type'] != None):
      object_type_toggle = search_root.find_by_text('物件種別').find_by_xpath('..').find_by_xpath('following-sibling::div[1]').find_by_css('label.ToggleButton')
      for index, obj_type in enumerate(request['object_type']):
        if obj_type == 'その他':
          object_type_toggle[7].click()
          object_type_toggle[6].click()
          object_type_toggle[5].click()
        else:
          object_type_toggle[index].click()

    # Property Name
    if(request['property_name'] != None):
      # search_root.find_by_name('building_name:match').fill(request['property_name'])
      self.fillProperty('物件名（カナ検索可）', request['property_name'], search_root)

    # Year Built
    if(request['year_build_min'] != 0 or request['year_build_min'] != 0):
      self.fillProperty('築年数', request['year_build_min'] if request['year_build_max'] == 0 else request['year_build_max'], search_root)

    # Fee
    fee_input = search_root.find_by_text('賃料').find_by_xpath('..').find_by_xpath('following-sibling::div[1]').find_by_tag('input')
    if (request['fee_min'] != 0):
      fee_input[0].fill(request['fee_min'])

    if (request['fee_max'] != 0):
      fee_input[1].fill(request['fee_max'])

    if (request['other_fees'] != None):
      for other_fee in request['other_fees']:
        if other_fee == '1':
          fee_input[4].click()

        if other_fee == '2':
          fee_input[3].click()

        if other_fee == '0':
          fee_input[2].click()

    # Area
    area = search_root.find_by_text('専有面積').find_by_xpath('..').find_by_xpath('following-sibling::div[1]').find_by_tag('input')
    if (request['area_min'] != 0):
      area[0].fill(request['area_min'])

    if (request['area_max'] != 0):
      area[1].fill(request['area_max'])

    # Madori
    if (request['madori'] != None):
      self.checkBoxOnArray('間取り', request['madori'], search_root)

    # Building structure
    if (request['bldg_structure'] != None):
      self.checkBoxOnArray('構造', request['bldg_structure'], search_root)

    # Floor Option
    if(request['floor_option'] != None):
    # Floor
      building_struct_checkbox = search_root.find_by_text('所在階・向き').find_by_xpath('..').find_by_xpath('following-sibling::div[1]').find_by_tag('input')
      
      if(request['floor_option'] == 'specify_floor'):
        floor = request['step_min'] if request['step_max'] == 0 else request['step_max']
        # Check if floor is greater than 1 
        if floor > 1:
          building_struct_checkbox[1].click()
        elif floor == 1:
          building_struct_checkbox[0].click()
        
      elif(request['floor_option'] == 'top_floor'):
        building_struct_checkbox[2].click()
      else:
        building_struct_checkbox[0].click()

    # Routes
    if(request['routes'] != None and len(list(filter(None, request['routes']))) > 0):
      route_div = search_root.find_by_text('路線・駅').find_by_xpath('..').find_by_xpath('following-sibling::div[1]')
      route_input = route_div.find_by_tag('input')
      for route in request['routes']:
        route = self.removeRouteUnit(route)
        route_input.fill(route)
        empty_route = route_div.find_by_text('検索結果がありません', wait_time=2)
        if not empty_route:
          # Submit
          route_input.fill(route+'\n')
          # browser.find_by_css('.toggle-button-rails').click()

          # Select All Stations
          station_count = len(browser.find_by_css('.form-wrapper .title-border'))
          old_form = None
          for i in range(0,station_count):
            # Get New Form
            new_form = browser.find_by_css('.form-wrapper')
            # Check if New Form is same as Old Form
            if new_form != old_form:
              try:
                new_form.find_by_css('.toggle-button-rails')[i].click()
              except:
                new_form = browser.find_by_css('.form-wrapper')
                new_form.find_by_css('.toggle-button-rails')[i].click()
              old_form = new_form
            else:
              new_form = browser.find_by_css('.form-wrapper')
              new_form.find_by_css('.toggle-button-rails')[i+1].click()
              old_form = new_form
          browser.find_by_text('確定').click()
      
      # From Station (Routes Only)
      if(request['from_station'] != 0 ):
        self.fillProperty('駅徒歩', request['from_station'], search_root)

    # Prefecture Cities
    if(request['prefectures'] != None):
      location_input = search_root.find_by_text('都道府県 / 市区町村').find_by_xpath('..').find_by_xpath('following-sibling::div[1]').find_by_tag('input')
      for prefecture in request['prefectures']:
        location_input.fill(prefecture+'\n')
        # browser.find_by_css('.toggle-button-rails').click()

        if(request['cities'] != None):
          for city in request['cities'][prefecture]:
            # print(city)
            time.sleep(1)
            browser.execute_script("document.getElementById('area-search').value = ''")
            # time.sleep(1)
            browser.find_by_css('#area-search', wait_time=3).fill(city)
            city_button = browser.find_by_css('.toggle-button-areas')
            city_button.click() if len(city_button) > 0 else None
            time.sleep(1)
            browser.execute_script("document.getElementById('area-search').value = ''")
            # time.sleep(1)
            browser.find_by_css('#area-search', wait_time=3).fill('')
        else:
          browser.find_by_css('.toggle-button-prefectures').first.click()
        browser.find_by_text('確定').click()

    browser.execute_script('document.getElementsByClassName("WrapperBottomFixSearch")[0].style.display = "flex"')
    # Search
    #browser.find_by_css('.MuiButton-endIcon.MuiButton-iconSizeSmall', wait_time=5).find_by_xpath('../..', wait_time=5).click()
    browser.find_by_css('.ButtonArea', wait_time=5).find_by_text('検索', wait_time=5).click()

    result_count = len(browser.find_by_css('.CountText', wait_time=5))
    return True if result_count > 0 else False

  def new_search(self, browser, request, logged_in = False, first_ten = False):
    self.search_only(browser,request,logged_in, first_ten)

    try:
      response = self.retrieveResults(browser, first_ten)
    except:
      return {
        'status' : 200,
        'message' : 'No Results.',
      }
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response
    }

  # Login and Search
  def loginAndSearch(self, browser, request):
    try:
      self.login(browser, request)
    except:
      return {
        'status' : 500,
        'message' : 'Login Failed'
      }
    has_results = self.search_only(browser,request)
    site_total_result = 0
    if(has_results):
      site_total_result  = browser.find_by_css('.CountText', wait_time=5).html.replace(' 戸', '')

    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : {
        'browser_id' : request['browser_id'],
        'site_total_result' : site_total_result
      }
    }

  def getByBatch(self, browser, last_index, detail_browser = None):
    browser.find_by_value('room', wait_time=5).click() if browser.find_by_value('room', wait_time=5)['disabled'] == None else None #Result By Rooms
    current_year = date.today().year
    response = {}
    detail_page = {}
    result_count = 0

    total_result =  int(browser.find_by_css(".CountText", wait_time=5).html.replace(' 戸', '')) % 30
    
    has_pagination = browser.find_by_css('.SearchListPagination', wait_time=5)
    if (len(has_pagination) > 0 ):
      next_button = has_pagination.first.find_by_tag('button', wait_time=5).last
      has_next = True if next_button['disabled'] != 'true' else False
    else:
      has_next = False    
    total = total_result if not has_next else 30

    property_count = len(browser.find_by_css('.ListResultContentArea.Room', wait_time=5))
    while(property_count < total): # Load All Result
      browser.execute_script("window.scrollBy(0, 500)")
      property_count = len(browser.find_by_css('.ListResultContentArea.Room', wait_time=5))
    search_results = browser.find_by_css('.ListResultContentArea.Room', wait_time=5)[last_index : last_index+10]

    for search_result in search_results:
      # Increment from Pagination
      # Top
      top_info = search_result.find_by_css('.ItemMd6 .ListInfoText', wait_time=5)
      station_flag = False
      station_info = ""
      result = {}
      header_count = 0
      
      result['detail_link'] = detail_page[str(result_count)] = search_result.find_by_text('詳細').find_by_xpath('../../../../..')['href']
      result['建物名'] = search_result.find_by_css('.RoomNameText', wait_time=5).html
      # AD Text
      ad_text = search_result.find_by_css('.ADText', wait_time=5)
      result['ad'] = ad_text.html.replace('AD ', '') if len(ad_text) > 0 else '-'
      # Static
      result['物件番号'] = result_count
      result['物件種目'] = 'アパート'
      result['築年月'] = '-'
      result['電話番号'] = '-'
      # Initiate
      result['沿線駅'] = '-'
      for i, info in enumerate(top_info):
        # print(info.html)
        if('</span><span' in info.html):
          matched_data = re.findall(r'<span.*>(.*)</span.*><span.*>(.*)</span.*>', info.html)
          if len(matched_data) > 0:
            result['所在階'] = matched_data[0][0]
            result['築年月']  = self.getYearBuilt(matched_data[0][1], current_year)

          station_flag = False
        else:
          if(i == len(top_info)-2):
            continue
          
          matched_data = re.findall(r'<span.*>(.*)</span.*>', info.html)
          if len(matched_data) > 0:
            if station_flag is True:
              station_info = f'{station_info}\r\n{matched_data[0]}' if station_info != '' else matched_data[0]
              result['沿線駅'] = station_info
            else:
              result[self.search_result_headers[header_count]] = matched_data[0]
              header_count += 1
          
          if(i == 0):
            station_flag = True
          
      bot_info = search_result.find_by_css('.ListGridContainer .RentRoomInfo span', wait_time=5)
      for i, info in enumerate(bot_info):
        # print(f'{i}: {info.html}')
        if (i in [1,3,6,8,13,15]):
          continue
        # Front
        if('FrontSpace' in info.html):
          matched_data = re.findall(r'(.*)<span.*>.*</span.*>', info.html)
          if len(matched_data) > 0:
            result[self.search_result_headers[header_count]] = matched_data[0]
          header_count += 1
        # Back
        elif('ViewLaptop' in info.html):
          matched_data = re.findall(r'<span.*>.*</span.*>(.*)', info.html)
          if len(matched_data) > 0:
            result[self.search_result_headers[header_count]] = matched_data[0]
          header_count += 1
        else:
          result[self.search_result_headers[header_count]] = info.html
          header_count += 1
      # print(result)
      response[str(result_count)] = result
      # detail_page[str(result_count)] = search_result.find_by_css('a .CommonButton').find_by_xpath('..').first['href']
      # detail_page[str(result_count)] = search_result.find_by_text('詳細').find_by_xpath('../../../../..')['href']
      result_count += 1
      result = {}

    # if detail_browser != None:
    #   # Iterate Detail Page & Update Response 
    #   for key,page in detail_page.items():
    #     detail_browser.visit(page)
    #     if(key == '0'):
    #       has_alert = detail_browser.get_alert()
    #       has_alert.accept() if has_alert != None else None
    #     self.getDetailPage(detail_browser, response[key])

    # Check if need to go next
    # if has_next: 
    #   next_button.click()
    # el
    if(last_index == 20):
      if(has_next):
        next_button.click()

      return{
        "status" : 200,
        "message" : "OK",
        "last_index" : -1 if not has_next else 0,
        "payload" : response
      }

    return{
        "status" : 200,
        "message" : "OK",
        "last_index" : last_index + 10,
        "payload" : response
      }


  def search(self, browser, request, logged_in = False, first_ten = False):
    # Static Request
    # request = {
    #   'object_type' : ["アパート"],
    #   'prefecture' : '埼玉県',
    #   "address": "さいたま市西区"
    # }
    # Search Prefecture and Address
    if(logged_in):
      # Return to home
      home_menu = browser.find_by_css('.SecondNavMenuItem.isActive', wait_time=5)
      home_menu.click() if len(home_menu) > 0 else None
      # Clear Search
      clear_button = browser.find_by_css('.ButtonArea .MuiButton-sizeSmall', wait_time=5).first
      clear_button.click() if clear_button['disabled'] == None else None

    browser.find_by_css('#selectPrefecturesOrCities', wait_time=5).fill(request['prefecture'] + '\n')
    browser.find_by_value(request['address'], wait_time=5).find_by_xpath('..').find_by_tag('label').click()
    browser.find_by_text('確定', wait_time=5).click()
    # browser.find_by_css('.jss122.MuiButton-containedPrimary', wait_time=5).click()

    # Select Type
    button_types = browser.find_by_css('.ToggleButton', wait_time=5)
    [button for button in button_types if button.html == request['object_type'][0]][0].click()

    # Search
    #browser.find_by_css('.MuiButton-endIcon.MuiButton-iconSizeSmall', wait_time=5).find_by_xpath('../..', wait_time=5).click()
    browser.find_by_css('.ButtonArea', wait_time=5).find_by_text('検索', wait_time=5).click()

    # Get Only Less Than 50 Results
    self.getLessThanFifty(browser, int(browser.find_by_css(".CountText", wait_time=5).html.replace(' 戸', '')))
    
    response = self.retrieveResults(browser, first_ten)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response
    }

  def getFirstTen(self, b):
    response = {}
    detail_page = {}
    result_count = 0
    itandibb = Itandibb()
    current_year = date.today().year

    # Get Start
    total_result =  int(b.find_by_css(".CountText", wait_time=5).html.replace(' 戸', '')) - result_count
    total = total_result if total_result < 30 else 30
    property_count = len(b.find_by_css('.ListResultContentArea.Room', wait_time=5))
    while(property_count < total): # Load All Result
      b.execute_script("window.scrollBy(0, 500)")
      property_count = len(b.find_by_css('.ListResultContentArea.Room', wait_time=5))
    search_results = b.find_by_css('.ListResultContentArea.Room', wait_time=5)
    
    # Get First 10
    for search_result in search_results[:10]:
      # Top
      top_info = search_result.find_by_css('.ItemMd6 .ListInfoText', wait_time=5)
      station_flag = False
      station_info = ""
      result = {}
      header_count = 0
      
      result['建物名'] = search_result.find_by_css('.RoomNameText', wait_time=5).html
      # AD Text
      ad_text = search_result.find_by_css('.ADText', wait_time=5)
      result['ad'] = ad_text.html.replace('AD ', '') if len(ad_text) > 0 else '-'
      # Static
      result['物件番号'] = result_count
      result['物件種目'] = 'アパート'
      result['築年月'] = '-'
      result['電話番号'] = '-'
      # Initiate
      result['沿線駅'] = '-'
      for i, info in enumerate(top_info):
        # print(info.html)
        if('</span><span' in info.html):
          matched_data = re.findall(r'<span.*>(.*)</span.*><span.*>(.*)</span.*>', info.html)
          if len(matched_data) > 0:
            result['所在階'] = matched_data[0][0]
            result['築年月']  = self.getYearBuilt(matched_data[0][1], current_year)

          station_flag = False
        else:
          if(i == len(top_info)-2):
            continue
          
          matched_data = re.findall(r'<span.*>(.*)</span.*>', info.html)
          if len(matched_data) > 0:
            if station_flag is True:
              station_info = f'{station_info}\r\n{matched_data[0]}' if station_info != '' else matched_data[0]
              result['沿線駅'] = station_info
            else:
              result[itandibb.search_result_headers[header_count]] = matched_data[0]
              header_count += 1
          
          if(i == 0):
            station_flag = True
          
      bot_info = search_result.find_by_css('.ListGridContainer .RentRoomInfo span', wait_time=5)
      for i, info in enumerate(bot_info):
        # print(f'{i}: {info.html}')
        if (i in [1,3,6,8,13,15]):
          continue
        # Front
        if('FrontSpace' in info.html):
          matched_data = re.findall(r'(.*)<span.*>.*</span.*>', info.html)
          if len(matched_data) > 0:
            result[itandibb.search_result_headers[header_count]] = matched_data[0]
          header_count += 1
        # Back
        elif('ViewLaptop' in info.html):
          matched_data = re.findall(r'<span.*>.*</span.*>(.*)', info.html)
          if len(matched_data) > 0:
            result[itandibb.search_result_headers[header_count]] = matched_data[0]
          header_count += 1
        else:
          result[itandibb.search_result_headers[header_count]] = info.html
          header_count += 1
      # print(result)
      response[str(result_count)] = result
      detail_page[str(result_count)] = search_result.find_by_css('a .CommonButton').find_by_xpath('..').first['href']
      result_count += 1
      result = {}
    
    # # Iterate Detail Page & Update Response 
    # for key,page in detail_page.items():
    #   b.visit(page)
    #   if(key == '0'):
    #     has_alert = b.get_alert()
    #     has_alert.accept() if has_alert != None else None
    #   self.getDetailPage(b, response[key])

    return response

  def retrieveResults(self, b, first_ten = False):
    # Get Result
    b.find_by_value('room', wait_time=5).click() if b.find_by_value('room', wait_time=5)['disabled'] == None else None #Result By Rooms
    itandibb = Itandibb()
    current_year = date.today().year
    response = {}
    detail_page = {}
    result_count = 0
    next_pagination = True

    if first_ten:
      return self.getFirstTen(b)

    while( next_pagination is True ):
      total_result =  int(b.find_by_css(".CountText", wait_time=5).html.replace(' 戸', '')) - result_count
      total = total_result if total_result < 30 else 30
      property_count = len(b.find_by_css('.ListResultContentArea.Room', wait_time=5))
      while(property_count < total): # Load All Result
        b.execute_script("window.scrollBy(0, 500)")
        property_count = len(b.find_by_css('.ListResultContentArea.Room', wait_time=5))
      search_results = b.find_by_css('.ListResultContentArea.Room', wait_time=5)
      
      for search_result in search_results:
        # Increment from Pagination
        # Top
        top_info = search_result.find_by_css('.ItemMd6 .ListInfoText', wait_time=5)
        station_flag = False
        station_info = ""
        result = {}
        header_count = 0
        
        result['建物名'] = search_result.find_by_css('.RoomNameText', wait_time=5).html
        # AD Text
        ad_text = search_result.find_by_css('.ADText', wait_time=5)
        result['ad'] = ad_text.html.replace('AD ', '') if len(ad_text) > 0 else '-'
        # Static
        result['物件番号'] = result_count
        result['物件種目'] = 'アパート'
        result['築年月'] = '-'
        result['電話番号'] = '-'
        # Initiate
        result['沿線駅'] = '-'
        for i, info in enumerate(top_info):
          # print(info.html)
          if('</span><span' in info.html):
            matched_data = re.findall(r'<span.*>(.*)</span.*><span.*>(.*)</span.*>', info.html)
            if len(matched_data) > 0:
              result['所在階'] = matched_data[0][0]
              result['築年月']  = self.getYearBuilt(matched_data[0][1], current_year)

            station_flag = False
          else:
            if(i == len(top_info)-2):
              continue
            
            matched_data = re.findall(r'<span.*>(.*)</span.*>', info.html)
            if len(matched_data) > 0:
              if station_flag is True:
                station_info = f'{station_info}\r\n{matched_data[0]}' if station_info != '' else matched_data[0]
                result['沿線駅'] = station_info
              else:
                result[itandibb.search_result_headers[header_count]] = matched_data[0]
                header_count += 1
            
            if(i == 0):
              station_flag = True
            
        bot_info = search_result.find_by_css('.ListGridContainer .RentRoomInfo span', wait_time=5)
        for i, info in enumerate(bot_info):
          # print(f'{i}: {info.html}')
          if (i in [1,3,6,8,13,15]):
            continue
          # Front
          if('FrontSpace' in info.html):
            matched_data = re.findall(r'(.*)<span.*>.*</span.*>', info.html)
            if len(matched_data) > 0:
              result[itandibb.search_result_headers[header_count]] = matched_data[0]
            header_count += 1
          # Back
          elif('ViewLaptop' in info.html):
            matched_data = re.findall(r'<span.*>.*</span.*>(.*)', info.html)
            if len(matched_data) > 0:
              result[itandibb.search_result_headers[header_count]] = matched_data[0]
            header_count += 1
          else:
            result[itandibb.search_result_headers[header_count]] = info.html
            header_count += 1
        # print(result)
        response[str(result_count)] = result
        detail_page[str(result_count)] = search_result.find_by_css('a .CommonButton').find_by_xpath('..').first['href']
        result_count += 1
        result = {}
      if(result_count == total):
        # Go to next page
        has_pagination = b.find_by_css('.SearchListPagination', wait_time=5)
        if (len(has_pagination) > 0 ):
          next_button = has_pagination.first.find_by_tag('button', wait_time=5).last
          next_button.click() if next_button['disabled'] != 'true' else None
        else:
          next_pagination = False
      # # Debug
      # next_pagination = False

    # Iterate Detail Page & Update Response 
    for key,page in detail_page.items():
      b.visit(page)
      if(key == '0'):
        has_alert = b.get_alert()
        has_alert.accept() if has_alert != None else None
      self.getDetailPage(b, response[key])

    return response
  
  def getDetailPage(self, b, response = {}):
    details = {
        '更新料' : '更新料',
        '現況' : '現況',
        '駐輪場代' : '駐輪場',
        '鍵交換費' : '鍵交換', 
        '保険' : '保険',
        '備考' : '備考',
        '入居可能日' : '入居',
        '駐車場代' : '駐車場',
        'バイク置き場代' : 'バイク置き場',
        '契約期間' : '契約期間',
        '内見方法' : '内見情報',
    }

    for head, label in details.items():
      has_label = b.find_by_text(head)
      # Check for Alert
      has_alert = b.get_alert()
      has_alert.accept() if has_alert != None else None
      if( len(has_label) > 0):
        has_info = has_label.find_by_xpath('..').find_by_xpath('following-sibling::div').find_by_css('span')
        if(len(has_info) > 0):
          response[label] = has_info.html.replace('<span class=\"FrontSpace\">', '').replace('</span>', '').replace('<span class=\"GrayText FrontSpace\">', '').replace('<span class=\"GrayText\">', '').strip()

    equipment_text = ""
    equipment_list = b.find_by_css('.DetailTable .OptionTile span')
    for i, equipment in enumerate(equipment_list):
      if(i < len(equipment_list) - 1):
        equipment_text += " " + equipment.html + "," 
      else:
        equipment_text += " " + equipment.html

    response['設備'] = equipment_text

    image_list = []
    for image in b.find_by_css('.DetailImageArea .ListGrid img'):
      image_list.append(image['src'])

    response['image_list'] = image_list

    return response

  def getYearBuilt(self, since_date, current_year = date.today().year):
    if('(築' in since_date and '年)' in since_date):
      since_date = since_date.replace('(築', '').replace('年)', '')
      return current_year - int(since_date)
    else:
      return since_date
    
  def getLessThanFifty(self, browser, total_search):
    # Check if Result is greater than 50
    if total_search > 50:
      browser.find_by_css('.SecondNavMenuItem.isActive', wait_time=5).click()
      # Select all "間取り"
      for madori in self.search_madori:
        madori_box = browser.find_by_id(madori, wait_time=5)
        browser.execute_script('document.getElementsByClassName("WrapperBottomFixSearch")[0].style.display = "none"')
        madori_box.click() if len(madori_box) > 0 else None
      
      # Loop "間取り" de-selection
      i = 0
      while total_search > 50:
        browser.find_by_css('.SecondNavMenuItem.isActive', wait_time=5).click()
        madori_box = browser.find_by_id(self.search_madori[i], wait_time=5)
        browser.execute_script('document.getElementsByClassName("WrapperBottomFixSearch")[0].style.display = "none"')
        madori_box.click() if len(madori_box) > 0 else None
        browser.execute_script('document.getElementsByClassName("WrapperBottomFixSearch")[0].style.display = "flex"')
        # browser.find_by_css('.MuiButton-endIcon.MuiButton-iconSizeSmall', wait_time=5).find_by_xpath('../..', wait_time=5).click()
        browser.find_by_css('.ButtonArea', wait_time=5).find_by_text('検索', wait_time=5).click()
        total_search = int(browser.find_by_css(".CountText", wait_time=5).html.replace(' 戸', ''))
        i += 1
      
    # return total_search
  
  def isBrowserActive(self, browser):
    browser_status = False

    browser.reload()
    if(len(browser.find_by_value('ログイン', wait_time=3)) == 0):
      browser_status = True
    
    return browser_status