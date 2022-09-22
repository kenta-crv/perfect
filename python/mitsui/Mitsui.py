import os, time, re, json

from splinter import Browser
from selenium import webdriver

class Mitsui:
  def __init__(self):
    self.f_root = './mitsui'

    self.login_url = "https://membersweb.homes.co.jp/mfrl/login"

    self.madori_guide = {
      'ワンルーム' : ['1R'],
      '1K' : ['1K'],
      '1DK' : ['1DK'],
      '1LDK' : ['1LDK'],
      '2K' : ['2K'],
      '2DK' : ['2DK'],
      '2LDK' : ['2LDK'],
      '3K' : ['3K'],
      '3DK' : ['3DK'],
      '3LDK' : ['3LDK'],
      '4K以上' : ['4K', '4DK','4LDK'],
    }

    self.type_guide = {
      'アパート' : ['アパート'],
      'マンション' : ['マンション'],
      '一戸建て' : ['戸建'],
      'その他' : ['テラスハウス', 'タウンハウス', 'その他']
    }

    self.year_build_guide = [0,1,3,5,10,15,20]
    self.from_station_guide = [0,1,5,7,10,15,20]
    self.region_guide = {
        "関東" : [
        "茨城県",
        "栃木県",
        "群馬県",
        "埼玉県",
        "千葉県",
        "東京都",
        "神奈川県",
        "新潟県",
        "山梨県",
        "長野県",
        "静岡県"
      ],

      "近畿" : [
        "奈良県",
        "和歌山県",
        "京都府",
        "大阪府",
        "兵庫県",
        "滋賀県",
        "福井県",
        "徳島県",
        "鳥取県"
      ],

      "東海" : [
        "愛知県",
        "岐阜県",
        "三重県"
      ]
    }


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
    browser.visit(self.login_url) 
    try:
      key = open(self.f_root+"/login.key", "r")
      key_string = key.readline().split("|")
      user_id = request['user_name']
      password   = request['user_pass']
    except OSError:
      return {
      'status' : 500,
      'message' : 'Error'
    }

    form_input = browser.find_by_css('input.form-control')
    form_input[0].fill(user_id)
    form_input[1].fill(password)
    browser.find_by_css('button.prg-login-btn').click()

    return {
      'status' : 200,
      'message' : 'OK'
    }

  def search(self, browser, request, logged_in = False, first_ten = False):
    # Static Request
    # request = {
    #   'prefectures' : ['千葉県'],
    #   'locations' : [],
    #   # 'locations' : ['船橋市', '館山市', '木更津市', '松戸市', '千葉市美浜区', '千葉市緑区', '千葉市若葉区', '千葉市稲毛区', '千葉市花見川区', '千葉市中央区'],
    #   'madori_list' : ['ワンルーム', '1K', '1DK']
    # }
    
    browser.find_by_css('.area_popup_address', wait_time=3).click()
    # Select Prefecture from Modal
    time.sleep(1)
    prefs = browser.find_by_css('.modal-resource')
    for pref in prefs:
      for prefecture in request['prefectures']:
        if pref['data-value'] == prefecture:
          pref.click()
          break
    location_count = len(request['locations'])

    # Check if With or Without City
    if( location_count > 0 and location_count <= 10):
      # Select Locations
      browser.find_by_css('.btn-group').first.find_by_tag('button')[1].click()
      
      time.sleep(1)
      cities = browser.find_by_css('.resource-checkbox-label')
      for location in request['locations']:
        for city in cities:
          clean_city = re.sub(r'.*>', '', city.html)
          if location == clean_city:
            city.find_by_tag('input').click()
            break
      
      browser.find_by_css('.btn-group').first.find_by_tag('button')[0].click()  

    # else:
    #   browser.find_by_css('.btn-group').first.find_by_tag('button')[0].click()  

    # Expand More
    browser.find_by_css('.conditions').click()
    # Select Madori 
    search_head = browser.find_by_css('.bu-search table tbody tr th')
    for sh in search_head:
      if sh.html == '間取り':
        madori_checkboxes = sh.find_by_xpath('following-sibling::td[1]').find_by_tag('label')
        for ml in request['madori_list']:
          for cb in madori_checkboxes:
            checkbox_text = re.sub(r'.*>', '', cb.html)
            if checkbox_text == ml:
              cb.click()
              break
            
    # Submit search
    # browser.find_by_css('div.bu-search')[1].find_by_xpath('following-sibling::div[2]').find_by_name('button').click()
    form_submit_button = browser.find_by_text('物件名で検索').find_by_xpath('following-sibling::div[1]').find_by_tag('button')
    form_submit_button.click() if len(form_submit_button) > 0 else None

    response = self.retrieveResults(browser, first_ten)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response
    }
  
  def new_search(self, browser, request, logged_in = False, first_ten = False):

    # Location Start
    has_location = False
    if(request['prefectures'] != None):
      browser.find_by_css('.area_popup_address', wait_time=10).click()
      # Select Prefecture from Modal
      time.sleep(1)
      prefs = browser.find_by_css('.modal-resource')
      for pref in prefs:
        for prefecture in request['prefectures']:
          if pref['data-value'] == prefecture:
            pref.click()

      # Select Locations
      if(request['cities'] != None):
        browser.find_by_css('.btn-group').first.find_by_tag('button')[1].click()

        time.sleep(1)
        check_cities = browser.find_by_css('.resource-checkbox-label')
        clean_cities = {}
        for i, clean_city in enumerate(check_cities):
          clean_cities[re.sub(r'.*>', '', clean_city.html)] = clean_city

        for prefecture, cities in request['cities'].items():
          for city in cities:
            if city in clean_cities.keys():
              clean_cities[city].click()
              has_location = True

      browser.find_by_css('.btn-group').first.find_by_tag('button')[0].click()  

    # Routes Start
    elif(request['routes'] != None):
      browser.find_by_css('.area_popup_railway', wait_time=3).click()

      click_region = None

      for region, guide_prefectures in self.region_guide.items():
        if click_region is None:
          # for prefecture in request['route_prefectures']:
          for prefecture in request['prefectures']:
            if prefecture in guide_prefectures:
              click_region = region
              break
        else:
          break

      # Select Region
      browser.find_by_css('.modal-content', wait_time = 5).find_by_text(click_region).first.click() if click_region is not None else None

      # Select Routes
      time.sleep(1)
      check_routes = browser.find_by_css('.resource-checkbox-label')
      clean_routes = {}
      # Clean Labels
      for i, clean_route in enumerate(check_routes):
        clean_routes[re.sub(r'.*>', '', clean_route.html)] = clean_route

      # Clean JR
      routes_request = []
      for route in request['routes']:
        routes_request.append(route.replace('JR', ''))

      for route in routes_request:
          if route in clean_routes.keys():
            clean_routes[route].click()
            has_location = True

      browser.find_by_css('.btn-group').first.find_by_tag('button')[0].click()  
      # Routes End

    # Expand More
    browser.find_by_css('.conditions').click()
    # More Search
    self.moreSearch(browser, request)
    # Submit search
    # browser.find_by_css('div.bu-search')[1].find_by_xpath('following-sibling::div[2]').find_by_name('button').click()
    # browser.find_by_css('div.bu-search', wait_time=5)[1].find_by_xpath('following-sibling::div[2]', wait_time=5).find_by_name('button', wait_time=5).click()
    browser.find_by_css('div.bu-search', wait_time=5)[1].find_by_xpath('following-sibling::div[2]', wait_time=5).find_by_name('button', wait_time=5).click()



    response = self.newRetrieveResults(browser, first_ten)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response
    }
  
  def only_search(self, browser, request):

    # Location Start
    has_location = False
    if(request['prefectures'] != None):
      browser.find_by_css('.area_popup_address', wait_time=3).click()
      # Select Prefecture from Modal
      time.sleep(1)
      prefs = browser.find_by_css('.modal-resource')
      for pref in prefs:
        for prefecture in request['prefectures']:
          if pref['data-value'] == prefecture:
            pref.click()

      # Select Locations
      if(request['cities'] != None):
        browser.find_by_css('.btn-group').first.find_by_tag('button')[1].click()

        time.sleep(1)
        check_cities = browser.find_by_css('.resource-checkbox-label')
        clean_cities = {}
        for i, clean_city in enumerate(check_cities):
          clean_cities[re.sub(r'.*>', '', clean_city.html)] = clean_city

        for prefecture, cities in request['cities'].items():
          for city in cities:
            if city in clean_cities.keys():
              clean_cities[city].click()
              has_location = True

      browser.find_by_css('.btn-group').first.find_by_tag('button')[0].click()  

    # Routes Start
    elif(request['routes'] != None):
      browser.find_by_css('.area_popup_railway', wait_time=3).click()

      click_region = None

      for region, guide_prefectures in self.region_guide.items():
        if click_region is None:
          # for prefecture in request['route_prefectures']:
          for prefecture in request['prefectures']:
            if prefecture in guide_prefectures:
              click_region = region
              break
        else:
          break

      # Select Region
      browser.find_by_css('.modal-content', wait_time = 5).find_by_text(click_region).first.click() if click_region is not None else None

      # Select Routes
      time.sleep(1)
      check_routes = browser.find_by_css('.resource-checkbox-label')
      clean_routes = {}
      # Clean Labels
      for i, clean_route in enumerate(check_routes):
        clean_routes[re.sub(r'.*>', '', clean_route.html)] = clean_route

      # Clean JR
      routes_request = []
      for route in request['routes']:
        routes_request.append(route.replace('JR', ''))

      for route in routes_request:
          if route in clean_routes.keys():
            clean_routes[route].click()
            has_location = True

      browser.find_by_css('.btn-group').first.find_by_tag('button')[0].click()  
      # Routes End

    # Expand More
    browser.find_by_css('.conditions').click()
    # More Search
    self.moreSearch(browser, request)
    # Submit search
    # browser.find_by_css('div.bu-search')[1].find_by_xpath('following-sibling::div[2]').find_by_name('button').click()
    # browser.find_by_css('div.bu-search', wait_time=5)[1].find_by_xpath('following-sibling::div[2]', wait_time=5).find_by_name('button', wait_time=5).click()
    browser.find_by_text('検索', wait_time =5).find_by_xpath('..', wait_time =5).first.click()


    return {
      'status' : 200,
      'message' : 'OK',
    }

  def moreSearch(self, browser, request):

    # Others Start
    other_details = browser.find_by_css('.bu-search').last

    # Madori Start
    if(request['madori'] != None):
      for checkbox, list in self.madori_guide.items():
        for madori in request['madori']:
          if madori in list:
            click_box = other_details.find_by_text(checkbox)
            click_box.click() if len(click_box) > 0 else None
            break

    # Type Start
    if(request['object_type'] != None):
      for checkbox, list in self.type_guide.items():
        for type in request['object_type']:
          if type in list:
            click_box = other_details.find_by_text(checkbox)
            click_box.click() if len(click_box) > 0 else None
            break

    # Fee Start
    if(request['fee_min'] != 0 or request['fee_max'] != 0):
      rent_input = browser.find_by_text('賃料').find_by_xpath('following-sibling::td[1]').find_by_tag('input')

      # Fee Min
      rent_input[0].fill(request['fee_min']) if request['fee_min'] != 0 else None
      rent_input[1].fill(request['fee_max']) if request['fee_max'] != 0 else None

      # Temporary Always Check ROBORE-105
      rent_input[2].click()

    # Area Start
    if(request['area_min'] != 0 or request['area_max'] != 0):
      area_input = other_details.find_by_text('専有面積').find_by_xpath('following-sibling::td[1]').find_by_tag('input')

      area_input[0].fill(request['area_min']) if request['area_min'] != 0 else None
      area_input[1].fill(request['area_max']) if request['area_max'] != 0 else None
  

    # Year Build Start
    if(request['year_build_max'] != 0):
      year_build_input = other_details.find_by_text('築年数').find_by_xpath('following-sibling::td[1]').find_by_tag('input')

      if(request['year_build_max'] <= 20):
        for position, year in enumerate(self.year_build_guide):
          if(year < request['year_build_max']):
            year_build_input[position].click()

    # From Station Start
    if(request['from_station'] != 0):
      from_station_options = other_details.find_by_text('駅徒歩').find_by_xpath('following-sibling::td[1]').find_by_tag('option')

      if(request['from_station'] <= 20):
        for position, minutes in enumerate(self.from_station_guide):
          if(minutes < request['year_build_max']):
            from_station_options[position].click()

    # Name Start
    if (request['property_name'] != None):
      browser.find_by_text('物件名で検索').find_by_xpath('following-sibling::div[1]').find_by_tag('input').fill(request['property_name'])

  def ptable_search(self, browser, request, browser_id = 'No-ID'):
    search_request = self.only_search(browser, request)
    if(search_request['status'] == 200):
      has_total = browser.find_by_css('.total')
      if(len(has_total) > 0):
        site_total_result = has_total.html
        batch_payload = self.getSmallBatchResult(browser)
      else:
        site_total_result = 0
        batch_payload = {'has_next' : None, 'payload' : []}

      return {
        'status' : 200,
        'message' : 'OK',
        'browser_table' : {
          'browser_id' : browser_id,
          'has_next' : batch_payload['has_next'],
          'payload' : batch_payload['payload'],
          'site_total_result' : site_total_result
        }
      }
    return {
      'status' : 500,
      'message' : 'Search error.'
    }

  def getSmallBatchResult(self, b):
    b.select('current_per_page', '10')
    # Check Pagination at End of Results
    next_button = b.find_by_css('.page-item a[rel=next]')
    has_next = -1
    next_page = False

    if(len(next_button) > 0):
      # NEXT
      next_page = next_button.first['href']
      has_next = 1
    
    response = self.getAllResult(b)

    b.visit(next_page) if next_page else None

    return {
      'has_next' : has_next,
      'payload' : response
    }

  def retrieveResults(self, browser, first_ten = False):
    first_parser = FirstTableParser()
    second_parser = SecondTableParser()
    properties = browser.find_by_css('.list-box')
    response = {}

    # Get First 10
    if first_ten:
      properties = properties[:10]

    for p_id, property in enumerate(properties):
      
      result = {}
      # Get Checkbox
      property_name = property.find_by_css('ul.check li.icon-box a strong')
      result['建物名'] = property_name.html if len(property_name) > 0 else '-'
      
      # Get First Table
      first_table = property.find_by_css('.thumbnail-box div.table-thumbnail table')[0].find_by_css('tbody tr')[1].find_by_tag('td')
      for i, td in enumerate(first_table):
        result = first_parser.switch(i, td, result)

      # Get Second Table
      second_table = property.find_by_css('.thumbnail-box div.table-thumbnail table')[1].find_by_css('tbody tr')[1].find_by_tag('td')
      for i, td in enumerate(second_table):
        result = second_parser.switch(i, td, result)

      company_info = property.find_by_xpath('following-sibling::ul[1]').find_by_css('.list01 .vertical-center').html.split()
      result['商号'] = company_info[0]
      result['電話番号'] = company_info[len(company_info)-1]

      # Static
      result['共益費'] = '-'
      result['所在階'] = ' / '

      response[str(p_id)] = result
    return response
  
  def getAllResult(self, browser):
    first_parser = FirstTableParser()
    second_parser = SecondTableParser()
    properties = browser.find_by_css('.list-box')
    response = {}


    # Detail Init
    cols = {}
    head_cols = {}
    table_cols = {}

    detail_header = [
      '構造',
      '階数/階建',
      '総戸数',
      '間取り詳細',
      '更新料',
      '損保',
      '他交通機関',
      'その他費用',
      '保証人',
      '特優賃',
      '設備',
      '駐車場',
      '条件',
      '契約区分',
      '備考',
      '周辺施設',
      # '連絡先',
      # '預託先'
    ]

    link_array = {}
    for p_id, get_property in enumerate(properties):

      result = {}
      # Get Checkbox
      get_property_name = get_property.find_by_css('ul.check li.icon-box a strong')
      result['建物名'] = get_property_name.html if len(get_property_name) > 0 else '-'

      # Get First Table
      first_table = get_property.find_by_css('.thumbnail-box div.table-thumbnail table')[0].find_by_css('tbody tr')[
        1].find_by_tag('td')
      for i, td in enumerate(first_table):
        result = first_parser.switch(i, td, result)

      # Get Second Table
      second_table = get_property.find_by_css('.thumbnail-box div.table-thumbnail table')[1].find_by_css('tbody tr')[
        1].find_by_tag('td')
      for i, td in enumerate(second_table):
        result = second_parser.switch(i, td, result)

      company_info = get_property.find_by_xpath('following-sibling::ul[1]').find_by_css(
        '.list01 .vertical-center').html.split()
      result['商号'] = company_info[0]
      result['電話番号'] = company_info[len(company_info) - 1]

      # Static
      result['共益費'] = '-'
      result['所在階'] = ' / '

      result['detail_link'] = get_property.find_by_css('.prg-window-open')[1]['href']
      # link_array[str(p_id)] = get_property.find_by_css('.prg-window-open')[1]['href']
      response[str(p_id)] = result

    # for id, link in link_array.items():
    #   # Go to Detail Page of Property
    #   browser.visit(link)

    #   detail = browser.find_by_css('.detail')
    #   gg = detail.find_by_tag('td')[1]

    #   # Run Detail page Sraping
    #   head_cols = {
    #     "申込あり": detail.find_by_tag('td')[0].html,
    #     "賃料（管理費）": gg.find_by_tag('span').html,
    #     "更新日": detail.find_by_tag('td')[2].html,
    #     "物件コード": detail.find_by_tag('td')[3].html
    #   }

    #   response[id]['申込あり'] = detail.find_by_tag('td')[0].html
    #   response[id]['賃料（管理費）'] = detail.find_by_tag('td')[1].html.replace('<span>', '').replace('</span>',
    #                                                                                                 '').replace('<br>',
    #                                                                                                             '').strip()
    #   response[id]['更新日'] = detail.find_by_tag('td')[2].html
    #   response[id]['物件コード'] = detail.find_by_tag('td')[3].html

    #   # Store Details in a Dictionary
    #   for head in detail_header:
    #     sample = browser.find_by_text(head)
    #     html = sample.find_by_xpath('following-sibling::td').html.replace('<p>', '').replace('<br>', '') \
    #       .replace('</p>', '') \
    #       .strip()
    #     cols[head] = html
    #     response[id][head] = html
    #   finder = browser.find_by_text('連絡先')
    #   elem1 = finder.find_by_xpath('following-sibling::td')
    #   elem2 = elem1.find_by_xpath('p')
    #   elem3 = elem1.find_by_tag('dl')
    #   TEL = elem3.find_by_text('TEL')
    #   bus_hrs = elem3.find_by_text('営業時間')

    #   cols['連絡先'] = {
    #     'description': elem2.html.replace('<br>', ''),
    #     'TEL': TEL.find_by_xpath('following-sibling::dd').html,
    #     '営業時間': bus_hrs.find_by_xpath('following-sibling::dd').html,

    #   }
    #   response[id]['TEL'] = TEL.find_by_xpath('following-sibling::dd')[0].html
    #   response[id]['営業時間'] = TEL.find_by_xpath('following-sibling::dd')[1].html

    #   image_list = []
    #   image = browser.find_by_css('.item-wrapper')
    #   for img in image:
    #     sampleimage = img.find_by_tag('img')
    #     image_list.append(sampleimage._element.get_attribute('src'))
    #   response[id]['image_list'] = image_list

    return response

  def newRetrieveResults(self, browser, first_ten=False):
    first_parser = FirstTableParser()
    second_parser = SecondTableParser()
    properties = browser.find_by_css('.list-box')
    response = {}

    # Get First 10
    if first_ten:
      properties = properties[:10]

    # Detail Init
    cols = {}
    head_cols = {}
    table_cols = {}

    detail_header = [
      '構造',
      '階数/階建',
      '総戸数',
      '間取り詳細',
      '更新料',
      '損保',
      '他交通機関',
      'その他費用',
      '保証人',
      '特優賃',
      '設備',
      '駐車場',
      '条件',
      '契約区分',
      '備考',
      '周辺施設',
      # '連絡先',
      # '預託先'
    ]

    link_array = {}
    for p_id, get_property in enumerate(properties):

      result = {}
      # Get Checkbox
      get_property_name = get_property.find_by_css('ul.check li.icon-box a strong')
      result['建物名'] = get_property_name.html if len(get_property_name) > 0 else '-'

      # Get First Table
      first_table = get_property.find_by_css('.thumbnail-box div.table-thumbnail table')[0].find_by_css('tbody tr')[
        1].find_by_tag('td')
      for i, td in enumerate(first_table):
        result = first_parser.switch(i, td, result)

      # Get Second Table
      second_table = get_property.find_by_css('.thumbnail-box div.table-thumbnail table')[1].find_by_css('tbody tr')[
        1].find_by_tag('td')
      for i, td in enumerate(second_table):
        result = second_parser.switch(i, td, result)

      company_info = get_property.find_by_xpath('following-sibling::ul[1]').find_by_css(
        '.list01 .vertical-center').html.split()
      result['商号'] = company_info[0]
      result['電話番号'] = company_info[len(company_info) - 1]

      # Static
      result['共益費'] = '-'
      result['所在階'] = ' / '

      link_array[str(p_id)] = get_property.find_by_css('.prg-window-open')[1]['href']
      response[str(p_id)] = result

    # for id, link in link_array.items():
    #   # Go to Detail Page of Property
    #   browser.visit(link)

    #   detail = browser.find_by_css('.detail')
    #   gg = detail.find_by_tag('td')[1]

    #   # Run Detail page Sraping
    #   head_cols = {
    #     "申込あり": detail.find_by_tag('td')[0].html,
    #     "賃料（管理費）": gg.find_by_tag('span').html,
    #     "更新日": detail.find_by_tag('td')[2].html,
    #     "物件コード": detail.find_by_tag('td')[3].html
    #   }

    #   response[id]['申込あり'] = detail.find_by_tag('td')[0].html
    #   response[id]['賃料（管理費）'] = detail.find_by_tag('td')[1].html.replace('<span>', '').replace('</span>',
    #                                                                                                 '').replace('<br>',
    #                                                                                                             '').strip()
    #   response[id]['更新日'] = detail.find_by_tag('td')[2].html
    #   response[id]['物件コード'] = detail.find_by_tag('td')[3].html

    #   # Store Details in a Dictionary
    #   for head in detail_header:
    #     sample = browser.find_by_text(head)
    #     html = sample.find_by_xpath('following-sibling::td').html.replace('<p>', '').replace('<br>', '') \
    #       .replace('</p>', '') \
    #       .strip()
    #     cols[head] = html
    #     response[id][head] = html
    #   finder = browser.find_by_text('連絡先')
    #   elem1 = finder.find_by_xpath('following-sibling::td')
    #   elem2 = elem1.find_by_xpath('p')
    #   elem3 = elem1.find_by_tag('dl')
    #   TEL = elem3.find_by_text('TEL')
    #   bus_hrs = elem3.find_by_text('営業時間')

    #   cols['連絡先'] = {
    #     'description': elem2.html.replace('<br>', ''),
    #     'TEL': TEL.find_by_xpath('following-sibling::dd').html,
    #     '営業時間': bus_hrs.find_by_xpath('following-sibling::dd').html,

    #   }
    #   response[id]['TEL'] = TEL.find_by_xpath('following-sibling::dd')[0].html
    #   response[id]['営業時間'] = TEL.find_by_xpath('following-sibling::dd')[1].html

    #   image_list = []
    #   image = browser.find_by_css('.item-wrapper')
    #   for img in image:
    #     sampleimage = img.find_by_tag('img')
    #     image_list.append(sampleimage._element.get_attribute('src'))
    #   response[id]['image_list'] = image_list

    return response
  
  def isBrowserActive(self, browser):
    browser_status = False

    browser.reload()
    if(len(browser.find_by_css('button.prg-login-btn', wait_time = 3)) == 0):
      browser_status = True
    
    return browser_status

  def getDetailPage(self, browser):
    response = {}
    # Detail Init
    cols = {}

    detail_header = [
      '構造',
      '階数/階建',
      '総戸数',
      '間取り詳細',
      '更新料',
      '損保',
      '他交通機関',
      'その他費用',
      '保証人',
      '特優賃',
      '設備',
      '駐車場',
      '条件',
      '契約区分',
      '備考',
      '周辺施設',
      # '連絡先',
      # '預託先'
    ]

    detail = browser.find_by_css('.detail')
    gg = detail.find_by_tag('td')[1]

    # Run Detail page Sraping
    head_cols = {
      "申込あり": detail.find_by_tag('td')[0].html,
      "賃料（管理費）": gg.find_by_tag('span').html,
      "更新日": detail.find_by_tag('td')[2].html,
      "物件コード": detail.find_by_tag('td')[3].html
    }

    response['申込あり'] = detail.find_by_tag('td')[0].html
    response['賃料（管理費）'] = detail.find_by_tag('td')[1].html.replace('<span>', '').replace('</span>',
                                                                                                  '').replace('<br>',
                                                                                                              '').strip()
    response['更新日'] = detail.find_by_tag('td')[2].html
    response['物件コード'] = detail.find_by_tag('td')[3].html

    # Store Details in a Dictionary
    for head in detail_header:
      sample = browser.find_by_text(head)
      html = sample.find_by_xpath('following-sibling::td').html.replace('<p>', '').replace('<br>', '') \
        .replace('</p>', '') \
        .strip()
      cols[head] = html
      response[head] = html
    finder = browser.find_by_text('連絡先')
    elem1 = finder.find_by_xpath('following-sibling::td')
    elem2 = elem1.find_by_xpath('p')
    elem3 = elem1.find_by_tag('dl')
    TEL = elem3.find_by_text('TEL')
    bus_hrs = elem3.find_by_text('営業時間')

    cols['連絡先'] = {
      'description': elem2.html.replace('<br>', ''),
      'TEL': TEL.find_by_xpath('following-sibling::dd').html,
      '営業時間': bus_hrs.find_by_xpath('following-sibling::dd').html,

    }
    response['TEL'] = TEL.find_by_xpath('following-sibling::dd')[0].html
    response['営業時間'] = TEL.find_by_xpath('following-sibling::dd')[1].html

    image_list = []
    image = browser.find_by_css('.item-wrapper')
    for img in image:
      sampleimage = img.find_by_tag('img')
      image_list.append(sampleimage._element.get_attribute('src'))
    response['image_list'] = image_list
    
    return response

class FirstTableParser:
  def __init__(self):
    self.table_headers = [
      ['賃料', '管理費'],
      ['礼金', '敷引/償却'],
      '敷金／保証金',
      '間取',
      '使用部分面積',
      ['入居可能日', '案内可能日'],
      '更新日',
    ]

  # Helper
  def clearText(self, html):
    return " ".join(html.replace('&nbsp;', '').split())

  def brSplit(self, index, html, result_dict):
    br_split = html.split('<br>')
    result_dict[self.table_headers[index][0]] = br_split[0]
    result_dict[self.table_headers[index][1]] = br_split[1]

    return result_dict

  # Switch
  def switch(self, index, element, result_dict):
        default = getattr(self, '_default')
        return getattr(self, 'case_' + str(index), lambda: default)(index, element, result_dict)

  def case_0(self, index, element, result_dict):
    rent = element.find_by_tag('span')
    result_dict[self.table_headers[index][0]] = rent.html if len(rent) > 0 else '-'
    result_dict[self.table_headers[index][1]] = re.sub(r'.*>', '', element.html).replace('（', '').replace('）', '')

    return result_dict

  def case_1(self, index, element, result_dict):
    return self.brSplit(index, element.html, result_dict)

  def case_2(self, index, element, result_dict):
    br_split = element.html.split('<br>')
    result_dict[self.table_headers[index]] = br_split[0] + '/' + br_split[1]

    return result_dict

  def case_3(self, index, element, result_dict):
    result_dict[self.table_headers[index]] = element.html

    return result_dict

  def case_4(self, index, element, result_dict):
    result_dict[self.table_headers[index]] = element.html

    return result_dict

  def case_5(self, index, element, result_dict):
    return self.brSplit(index, element.html, result_dict)

  def case_6(self, index, element, result_dict):
    result_dict[self.table_headers[index]] = element.html

    return result_dict

  def _default(self, index, element, result_dict):
    return '-'

class SecondTableParser:
  def __init__(self):
    self.table_headers = [
      ['所在地', '沿線駅'],
      ['物件種目', '築年月'],
      '貸主',
      '借主',
      '元付',
      '客付',
    ]

  # Helper
  def clearText(self, html):
    return " ".join(html.replace('&nbsp;', '').split())

  def brSplit(self, index, html, result_dict):
    br_split = html.split('<br>')
    result_dict[self.table_headers[index][0]] = br_split[0]
    result_dict[self.table_headers[index][1]] = br_split[1]

    return result_dict

  # Switch
  def switch(self, index, element, result_dict):
        default = getattr(self, '_default')
        return getattr(self, 'case_' + str(index), lambda: default)(index, element, result_dict)

  def case_0(self, index, element, result_dict):
    return self.brSplit(index, element.html, result_dict)

  def case_1(self, index, element, result_dict):
    return self.brSplit(index, element.html, result_dict)

  def case_2(self, index, element, result_dict):
    result_dict[self.table_headers[index]] = element.html

    return result_dict

  def case_3(self, index, element, result_dict):
    result_dict[self.table_headers[index]] = element.html

    return result_dict

  def case_4(self, index, element, result_dict):
    result_dict[self.table_headers[index]] = element.html

    return result_dict

  def case_5(self, index, element, result_dict):
    result_dict[self.table_headers[index]] = element.html

    return result_dict

  def _default(self, index, element, result_dict):
    return '-'

