import os, time, re

from splinter import Browser
from selenium import webdriver

class Tokyu:
  def __init__(self):
    self.f_root = './tokyu'
    self.login_url = "https://map.cyber-estate.jp/mediation/login.asp?ggid=813054"

    self.tokyu_object_types = {
      'アパート' : 'アパート',
      'マンション' : 'マンション',
      '戸建' : '一戸建て', #Dict for This
      'テラスハウス' : 'テラスハウス',
      'その他' : 'その他',
    }

    # self.tokyu_from_station_guide = [
    #   0,
    #   1,
    #   3,
    #   5,
    #   10,
    #   15,
    #   20,
    # ]

    # self.tokyu_year_build_guide = [
    #   0,
    #   1,
    #   3,
    #   5,
    #   10,
    #   15,
    #   20,
    # ]

    self.tokyu_point_guide = [
      -1,
      0,
      3,
      5,
      10,
      15,
      20,
    ]

    self.tokyu_area_guide = [
      0,
      20,
      25,
      30,
      40,
      50,
      60,
      70,
      100,
    ]

    self.tokyu_fee_guide = [
      0,
      5,
      7,
      9,
      11,
      13,
      15,
      17,
      19,
      20,
    ]

    self.tokyu_madori_guide = [
      ['1R', '1K', '1DK'],
      ['1LDK', '2K', '2DK'],
      ['2LDK', '3K', '3DK'],
      ['3LDK', '4K', '4DK'],
      ['4LDK'],
    ]

    self.detail_page_guide = [
      '契約期間',
      '駐車場',
      '備考',
      '入居可能日'
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
  
  def login(self, browser):
    # browser.visit(self.login_url) 
    try:
      key = open(self.f_root+"/login.key", "r")
      user_id = key.readline()
      password = key.readline()
    except OSError:
      return {
      'status' : 500,
      'message' : 'Error'
    }

    browser.find_by_id('txtLoginId').fill(user_id)
    browser.find_by_id('txtLoginPass').fill(password)
    # Remember
    browser.find_by_css('a.jqTransformCheckbox').click()
    # Login
    browser.find_by_id('login-btn').click()

    return {
      'status' : 200,
      'message' : 'OK'
    }
  
  # Helpers
  def clickPositionRadioGroup(self, browser, position, group):
    table_group = browser.find_by_text(group).find_by_xpath('following-sibling::table[1]')
    table_group.find_by_tag('input')[position].click()

  def clickPositionCheckboxGroup(self, browser, position, group):
    table_group = browser.find_by_text(group).find_by_xpath('following-sibling::table[1]')
    table_group.find_by_css('input[type=checkbox]')[position].click()

  def search(self, browser, request, logged_in = False, first_ten = False):
    # Filter City Texts
    clean_cities = {}
    cities = browser.find_by_css('.aCity')
    for city in cities: 
      clean_cities[re.sub(r'\(.*\)', '', city.html)] = city
    # Select Locations
    for location in request['locations']:
      if location in clean_cities:
        clean_cities[location].find_by_xpath('..').find_by_tag('input').click()
    # Select Types
    for type in request['types']:
      browser.find_by_value(type).find_by_xpath('..').find_by_css('.checkstyle').click()
    # Submit Search
    browser.find_by_css('#detel span').first.click()

    response = self.retrieveResults(browser, first_ten)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response
    }
  
  def new_search(self, browser, request, logged_in = False, first_ten = False):
    # Filter City Texts
    clean_cities = {}
    cities = browser.find_by_css('.aCity')

    if(request['cities'] != None):
      for city in cities: 
        clean_cities[re.sub(r'\(.*\)', '', city.html)] = city
      # Select Locations

      for prefecture in request['cities']:
        for city in request['cities'][prefecture]:
          if city in clean_cities:
            clean_cities[city].find_by_xpath('..').find_by_tag('input').click()

      submit_button = browser.find_by_css('#detel span').first
    elif(request['routes'] != None):
      # Switch to Railway Tab
      browser.find_by_id('tab_route').click()

      #Filter Railway
      clean_railway = {}
      rail_ways = browser.find_by_css('.aRwy')
      for line in rail_ways:
        clean_railway[re.sub(r'\(.*\)', '', line.html).replace('\n', '').replace('ＪＲ', 'JR')] = line
      # Select Locations
      for location in request['routes']:
        if location in clean_railway:
          clean_railway[location].find_by_xpath('..').find_by_tag('input').click()

      submit_button = browser.find_by_css('#detel span')[1]
    else:
      return {
        'status' : 400, 
        'message' : 'City or Route is required'
      }
    
    # Check if Types are Available
    if(request['object_type'] != None):
      for type in request['object_type']:
        if type in self.tokyu_object_types:
          browser.find_by_value(self.tokyu_object_types[type]).find_by_xpath('..').find_by_css('.checkstyle').click()

    # Check if year_build is Available
    if(request['year_build_min'] != None or request['year_build_max'] != None ):
      # Check if one is null
      request['year_build_max'] = request['year_build_min'] if request['year_build_max'] is None else request['year_build_max']
      request['year_build_min'] = request['year_build_max'] if request['year_build_min'] is None else request['year_build_min']
      
      for position, years in enumerate(self.tokyu_point_guide):
        if(years >= request['year_build_min'] and request['year_build_max'] != years):
          self.clickPositionRadioGroup(browser, position, '築年数')
          
        if(request['year_build_max'] > years):
          continue
        else:
          # Click year_build
          self.clickPositionRadioGroup(browser, position, '築年数')
          break

    # Check if from_station is Available
    if(request['from_station'] != None):
      for position, minutes in enumerate(self.tokyu_point_guide):
        if(request['from_station'] > minutes):
          continue
        else:
          # Click from_station
          self.clickPositionRadioGroup(browser, position, '最寄駅/バス停徒歩')
          break

    # Check if area is Available
    if(request['area_min'] != 0):
      for position, area in enumerate(self.tokyu_area_guide):
        if(area >= request['area_min']):
          self.clickPositionRadioGroup(browser, position, '専有面積')
          break

    # Check if fee is Available
    if(request['fee_min'] != 0 and request['fee_max'] != 0 ):
      # Check if one is null
      for position, fee in enumerate(self.tokyu_fee_guide):
        if(fee > request['fee_min'] and request['fee_max'] != fee):
          self.clickPositionCheckboxGroup(browser, position, '賃料')
        
        if(request['fee_max'] > fee):
          continue
        else:
          # Click fee
          self.clickPositionCheckboxGroup(browser, position, '賃料')
          break
    elif(request['fee_min'] != 0):
      for position, fee in enumerate(self.tokyu_fee_guide):
        if(fee > request['fee_min']):
          self.clickPositionCheckboxGroup(browser, position, '賃料')
    elif(request['fee_max'] != 0):
      for position, fee in enumerate(self.tokyu_fee_guide):
        if(fee < request['fee_max']):
          self.clickPositionCheckboxGroup(browser, position, '賃料')
    
    # Always Include Fee
    include_fee = True
    if include_fee: 
      checkbox = browser.find_by_id('chkKanrihi', wait_time=3)
      checkbox.click() if len(checkbox) > 0 else None

    # Check if madori is Available
    if(request['madori'] != None):
      for index, plan_array in enumerate(self.tokyu_madori_guide):
        for plan in plan_array:
          if plan in request['madori']:
            # Click madori
            self.clickPositionCheckboxGroup(browser, index, '間取')
            break

    # Check if property name is Available
    if(request['property_name'] != None):
      browser.find_by_id('txtSearchBkn').fill(request['property_name'])

      
    # Submit Search
    try:
      submit_button.click()
    except:
      return {
        'status' : 404, 
        'message' : 'City or Route is Not Found'
      }

    response = self.retrieveResults(browser, first_ten)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response
    }

  def appendResult(self, result, list):
    for label, item in list.items():
      result[label] = item

    return result

  def retrieveFromDetail(self, browser, index):
    
    parser = RetrieveInfo()
    tbl = browser.find_by_id('detail_info')
    within_elements = tbl.find_by_tag('table').first
    cols = {}
    data_eq = {}
    eq_index = 0

    # getting 設備
    for equipment in within_elements.find_by_css('.equipment'):
        for equipment_td in equipment.find_by_css('td'):
            eq_index += 1
            html = equipment_td.html.replace('・', '').replace("\n", "").strip()
            data_eq[eq_index] = html
            cols['設備'] = data_eq
        break

    for head in self.detail_page_guide:
      sample = browser.find_by_text(head)
      if len(sample) > 0:
        html = sample.find_by_xpath('following-sibling::td').html.replace('&nbsp;', '').replace('<br>', '')\
            .replace('                ', '')\
            .replace("\n", "").strip()
        data_all = html
        cols[head] = data_all

    # trade_style = browser.find_by_css("#detail_sub li")[1].html
    # cols['取引態様'] = re.sub(r'.*\：', '', trade_style)
    footer_data = browser.find_by_css("#detail_sub li", wait_time = 3)
    cols['取引態様'] = re.sub(r'.*\：', '', footer_data[1].html if len(footer_data) > 0 else '-')
    cols['情報掲載日'] = re.sub(r'.*\：', '', footer_data[2].html if len(footer_data) > 0 else '-')

    cols['間取り内訳'] = re.sub(r'\<br\>\n.*', '',  browser.find_by_css('#detail_pickup tr td').last.html).strip()
    cols['所在地'] = parser.clearText(browser.find_by_css('#detail_pickup tr')[2].find_by_tag('td').html.split('<br>')[1])
    # cols['image_src'] = parser.clearText(browser.find_by_css('#detail_pic ul li')[0].find_by_tag('img').first['src'])
    image_list = browser.find_by_css('#pic_control ul li img')
    src_list = []
    image_count = 0
    for property_images in image_list:
      src_list.append(property_images['src'])
      image_count = image_count + 1
    cols['image_list'] = src_list

    cols['image_number_gaikan'] = image_count

    return cols

  def retrieveResults(self, browser, first_ten = False):
    # Get Locations
    search_url = browser.url
    parser = RetrieveInfo()
    locations = []
    with browser.get_iframe('ifrMain') as iframe:
      properties = iframe.find_by_css('.bkn_list_block')

      for property in properties:
        rooms = property.find_by_css('.bkn_list_room .clsTrData')
        for room in rooms:
          locations.append('https://map.cyber-estate.jp/mediation/main/'+re.sub(r'\', \'_DetailHeya\',.*', '', room.find_by_tag('td')[10].find_by_tag('a').first['onclick'].replace("window.open('", '').replace("' + encodeURI('", '').replace("') + '", '')))

          # Get First 10
          if first_ten and len(locations) == 10:
            break
        if first_ten and len(locations) == 10:
          break


    # Parse Detail Page
    total_locations = len(locations)
    for l, location in enumerate(locations):
      # print(location)
      browser.visit(location)
      locations[l] = self.retrieveFromDetail(browser, total_locations-(l+1))

    # print(locations)
    # Get Other Information
    browser.visit(search_url)
    r = 0
    response = {}
    result = {}
    with browser.get_iframe('ifrMain') as iframe:
      # iframe.reload()
      # print(len(iframe.find_by_css('.bkn_list_block')))
      properties = iframe.find_by_css('.bkn_list_block')

      # Get First 10
      if first_ten:
        properties = properties[:10]

      for property in properties:
        top_header = parser.parseTitle(property)

        # printLengthList(property.find_by_css('.bkn_list_room .clsTrData td'))
        rooms = property.find_by_css('.bkn_list_room .clsTrData')
        for room in rooms:
          information = room.find_by_tag('td')
          # printLengthList(information)
          h = 0
          for i, info in enumerate(information):
            if i not in [0, 9, 10, 11]:
              # print(parser.switch(i, info, result, h))
              result = parser.switch(i, info, result, h)
              h += 1
            elif i == 10:
              result = self.appendResult(result, locations.pop(0))

          response[str(r)] = top_header | result
          r += 1
          result = {}

          if first_ten and len(response) == 10:
            return response
        
      
    return response

class RetrieveInfo:

  def __init__(self):
    self.title_headers = [
      "沿線駅",
      "物件種目",
      "建物名",
      "築年月",
      "struct_type",
      "電話番号",
      "商号",
    ]

    self.room_headers = [
      ["賃料", "共益費"],
      ["敷金", "礼金", "敷引"],
      "間取",
      "使用部分面積",
      "所在階",
      ["手数料","広告料"],
      "広告制限",
      "価格交渉",
    ]

  def parseTitle(self, property):
    result = {}
    property_name =  re.sub(r'<.*', '', property.find_by_css('.bkn_list_tit').html)
    # print(self.clearText(property_name))
    result[self.title_headers[0]] = self.clearText(property_name)

    # print(property.find_by_css('.bkn_list_tit span img')['alt'])
    result[self.title_headers[1]] = self.clearText(property.find_by_css('.bkn_list_tit span img')['alt'])
    
    # print(self.clearText(property.find_by_css('.list_sub .clsChangeDisp1 li span').html))
    result[self.title_headers[2]] = self.clearText(self.clearText(property.find_by_css('.list_sub .clsChangeDisp1 li span').html))

    items = property.find_by_css('.list_sub ul li')
    for i, item in enumerate(items):
      if(i in [2,3]):
        new_item =  re.sub(r'.*\：', '', item.html)
        # print(new_item)
        result[self.title_headers[i+1]] = self.clearText(new_item)
    
    # print(re.sub(r'.*\：', '', property.find_by_css('.list_gyosya a').first.html))
    result[self.title_headers[5]] = self.clearText(re.sub(r'.*\：', '', property.find_by_css('.list_gyosya a').first.html))

    # print(property.find_by_css('.list_gyosya span').first.html)
    result[self.title_headers[6]] = self.clearText(property.find_by_css('.list_gyosya span').first.html)

    return result

  # Helpers
  def printLengthList(self, list):
    print(len(list))
  
  def clearText(self, html):
    return " ".join(html.replace('&nbsp;', '').split())

  def splitParse(self, index, elements, result_dict):
    # print(elements)
    for e, el in enumerate(elements):
      # print(result_dict)
      result_dict[self.room_headers[index][e]] = self.clearText(el)
      
    return result_dict

  # Switch
  def switch(self, index, element, result_dict, head_index):
        default = getattr(self, '_default')
        return getattr(self, 'case_' + str(index), lambda: default)(element, result_dict, head_index)

  def case_1(self, element, result_dict, head_index):
      rent = str(int(element.find_by_tag('span').html.replace(',',''))/10000)
      format_rent = rent.replace('.0', '') if '.0' in rent else rent
      result_dict[self.room_headers[head_index][0]] = f'{format_rent}万円'
      # result_dict[self.room_headers[head_index][0]] = element.find_by_tag('span').html+'円'
      result_dict[self.room_headers[head_index][1]] = re.sub(r'.*>', '', element.html)+"円"
      
      return result_dict

  def case_2(self, element, result_dict, head_index):
      return self.splitParse(head_index, element.html.split('<br>'), result_dict)

  def case_3(self, element, result_dict, head_index):
      result_dict[self.room_headers[head_index]] = element.html

      return result_dict

  def case_4(self, element, result_dict, head_index):
      result_dict[self.room_headers[head_index]] = element.html.replace('m<sup>2</sup>', '㎡')
      return result_dict

  def case_5(self, element, result_dict, head_index):
      floors = self.clearText(element.html).split('<br>')
      result_dict[self.room_headers[head_index]] = floors[1]+'/'+floors[0]
      return result_dict

  def case_6(self, element, result_dict, head_index):
      return self.splitParse(head_index, self.clearText(element.html).split('<br>'), result_dict)

  def case_7(self, element, result_dict, head_index):
      result_dict[self.room_headers[head_index]] = element.find_by_tag('img').first['alt']

      return result_dict

  def case_8(self, element, result_dict, head_index):
      result_dict[self.room_headers[head_index]] = element.find_by_tag('img').first['alt']

      return result_dict

  def _default(self, element, result_dict, head_index):
    return '-'


