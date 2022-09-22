import time, re, os, sys, platform

from splinter import Browser
from selenium import webdriver

# import pyocr
# import pyocr.builders
# from PIL import Image

from atbb.switch.Table01 import *
from atbb.switch.Table021 import *
from atbb.switch.Table02c import *

# from switch.Table01 import *
# from switch.Table021 import *
# from switch.Table02c import *

sys.path.append(os.path.abspath('./drivers'))

class Atbb:

  def __init__(self):
    self.f_root = './atbb'

    self.login_url = 'https://members.athome.jp/login'

    self.search_object_type = {
      "売土地" : "01",
      "売戸建" : "02",
      "売マンション" : "03",
      "売事業用" : "04",
      "売リゾート向け" : "05",
      "賃貸居住用" : "06",
      "賃貸事業用" : "07",
      "貸土地" : "08",
      "貸駐車場" : "09",
    }

    self.search_object_request = {
      "戸建" : "売戸建",
      "マンション" : "売マンション",
      "賃貸事業用" : "賃貸事業用"
    }

    self.search_location_line = {
      "北海道全域" : "0101",
      "札幌市" : "0102",
      "札幌市周辺" : "0103",
      "道央" : "0104",
      "道東" : "0105",
      "道北" : "0106",
      "道南" : "0107",
      "青森県" : "02",
      "岩手県" : "03",
      "宮城県" : "04",
      "秋田県" : "05",
      "山形県" : "06",
      "福島県" : "07",
      "茨城県" : "08",
      "栃木県" : "09",
      "群馬県" : "10",
      "埼玉県" : "11",
      "千葉県" : "12",
      "東京都" : "13",
      "神奈川県" : "14",
      "新潟県" : "15",
      "富山県" : "16",
      "石川県" : "17",
      "福井県" : "18",
      "山梨県" : "19",
      "長野県" : "20",
      "岐阜県" : "21",
      "静岡県" : "22",
      "愛知県" : "23",
      "三重県" : "24",
      "滋賀県" : "25",
      "京都府" : "26",
      "大阪府" : "27",
      "兵庫県" : "28",
      "奈良県" : "29",
      "和歌山県" : "30",
      "鳥取県" : "31",
      "島根県" : "32",
      "岡山県" : "33",
      "広島県" : "34",
      "山口県" : "35",
      "徳島県" : "36",
      "香川県" : "37",
      "愛媛県" : "38",
      "高知県" : "39",
      "福岡県" : "40",
      "佐賀県" : "41",
      "長崎県" : "42",
      "熊本県" : "43",
      "大分県" : "44",
      "宮崎県" : "45",
      "鹿児島県" : "46",
      "沖縄県" : "47",
    }

    self.madori_guide = ['1R','1K','1DK','1LDK','2K','2DK','2LDK','3K','3DK','3LDK','4K','4DK','4LDK']
    self.trade_style_guide = ['0','1']
    self.building_struct_guide =  [ '木造','ブロック造','鉄骨造','ＲＣ','ＳＲＣ','ＰＣ','ＨＰＣ','軽量鉄骨造','ＡＬＣ','その他']
    self.obj_type_guide = ["マンション",  "アパート",  "戸建",  "テラスハウス",  "タウンハウス"]

    # self.search_result_headers = [
    #   "物件種目",
    #   "所在地",
    #   "建物名",
    #   "publish_date",
    #   "賃料",
    #   "沿線駅",
    #   "礼金",
    #   "共益費",
    #   "築年月",
    #   "ad",
    #   "敷金",
    #   "使用部分面積",
    #   "所在階",
    #   "取引態様",
    #   "敷引",
    #   "坪単価",
    #   "struct_type",
    #   "間取",
    #   "商号",
    #   "電話番号",
    #   "license",
    #   "image_number",
    # ]

    self.search_result_headers = [
      "物件種目",
      "賃料",
      "間取",
      "所在地",
      "建物名",
      "沿線駅",
      "商号",
      "license",
      "publish_date",
      "image_src",
      "image_number",
      "礼金",
      "共益費",
      "築年月",
      "ad",
      "敷金",
      "使用部分面積",
      "所在階",
      "取引態様",
      "敷引",
      "坪単価",
      "struct_type",
      "物件番号",
      "電話番号",
    ]

  def cleanFilteredData(self, data):
    # Clean &nbsp;
    data = data.replace('&nbsp;', '')

    # Clean <br>
    data = data.replace('<br>', '')

    # Clean Whitespaces
    data = " ".join(data.split())

    return data

  def formatRent(self, image_rent):
    # Check if .dot is ,comma
    if(re.search(r'\,', image_rent)):
      image_rent = image_rent.replace(',', '')

    # Format
    if(not re.search(r'\.', image_rent)):
      # Assuming 2 decimal points or '0.00'
      str_count = len(image_rent)
      int_place = int(str_count/2)
      return f'{image_rent[0:int_place]}.{image_rent[int_place:str_count]}'
    else:
      return re.findall(r'(\d+.\d+)', image_rent)[0]

  def open_browser(self, debug=False):
    f_path = os.path.abspath('./drivers/win')

    os.chmod(f_path, 755)
    os.environ['PATH'] += f'{os.pathsep}{f_path}'
    options = webdriver.ChromeOptions()
    if (debug is True):
      options.add_experimental_option("debuggerAddress", "localhost:8989")
      b = Browser('chrome', options = options)
    elif (debug is False):
      options.add_argument("--window-size=1920,1080")
      options.add_argument("--start-maximized")
      options.add_argument("--headless")
      b = Browser('chrome', options = options, headless=True)

    return b

  def login_atbb(self, browser, request):
    try:
      key = open(self.f_root+"/login.key", "r")
      #user_id = key.readline()
      #password = key.readline()
      user_id = request['user_name']
      password = request['user_pass']
      
    except OSError:
      print('Login Key not found...')
    
    browser.visit(self.login_url)
    browser.find_by_name('loginId').fill(user_id)
    browser.find_by_name('password').fill(password)
    if(browser.is_element_not_present_by_css('.login:disabled')):
      browser.find_by_css('.login').click()
      if(len(browser.find_by_name('loginId')) == 0):
        return browser
    
    return False
  
  def connect_atbb_page(self, browser):
    # Close Modal on Log-in
    # close_modal = browser.find_by_value('表示の一時停止', wait_time=10)
    # close_modal.click() if len(close_modal) > 0 else ''

    # browser.find_by_css('#techtouch-player-snippet', wait_time=10)
    # browser.execute_script("$('#techtouch-player-snippet').hide()")

    headers = browser.find_by_css('a.header_link', wait_time=60)
    for header in headers:
      if(header.value == '物件検索'):
        header.click()
        break

    atbb_search = browser.find_by_css('.c-g-nav__c.is-show form div.p-service div.p-service__u', wait_time=30).first
    atbb_search.click() if atbb_search != None else None
    # services = browser.find_by_css('div.is-atbb--release', wait_time=10)
    # for service in services:
    #   if(service['data-action'] == '/atbb/nyushuSearch?from=global_menu_bukkenKensaku'):
    #     service.click()
    #     break

    # Set ATBB as current
    for window in browser.windows:
      if window.title != "不動産業務総合支援サイト　ATBB":
        window.close()
      else:
        window.is_current = True
    
    # Existing User Exists
    force_button = browser.find_by_value('強制終了させてATBBを利用する')
    force_button.click() if len(force_button) > 0 else None
    has_alert = browser.get_alert()
    has_alert.accept() if has_alert != None else None

  def formatRoutes(self, routes):
    new_routes1 = []
    new_routes2 = []
    new_routes3 = []
    new_routes = [new_routes1, new_routes2, new_routes3]
    for route in routes:
      new_routes1.append(route.replace('線', '').replace('JR', ''))
      new_routes2.append(route.replace('線', ''))
      new_routes3.append(route.replace('JR', ''))

    return new_routes  
    
  def fillMinMax(self, label_element, min=0, max=0):
    form_input = label_element.find_by_css('div input')
    #min
    form_input[0].fill(min)
    #max
    form_input[1].fill(max)

  def other_search(self, browser, request):
    head_labels = browser.find_by_css('.common-head')
    head_elements = {}
    for head in head_labels:
      clean_head = head.html.strip()
      head_elements[clean_head] = head.find_by_xpath('following-sibling::td[1]')

    if(request['from_station'] != 0):
      # From Station
      self.fillMinMax(head_elements['駅歩分'], 0, request['from_station'])

    if(request['fee_min'] != 0 or request['fee_max'] != 0):
      # Fee
      self.fillMinMax(head_elements['賃料'], request['fee_min'], request['fee_max'])

    # if(request['area_min'] != 0 or request['area_max'] != 0):
    #   # Area
    #   self.fillMinMax(head_elements['建物面積'], request['area_min'], request['area_max'])

    if(request['year_build_min'] != 0 or request['year_build_max'] != 0):
      # Year Build
      self.fillMinMax(head_elements['築年数'], request['year_build_min'], request['year_build_max'])

    if(request['madori'] != None):
      # Madori
      madori_checkbox = head_elements['間取り'].find_by_tag('input')
      for madori in request['madori']:
        if madori in self.madori_guide:
          madori_checkbox[self.madori_guide.index(madori)].click()

    if(request['trade_style'] != None):
      # Trade Style
      trade_checkbox = browser.find_by_name('torihikiTaiyoCode')
      for trade_style in request['trade_style']:
        if trade_style in self.trade_style_guide:
          trade_checkbox[self.trade_style_guide.index(trade_style)].click()

    if(request['publishing_date'] != None):
      # Publication Date
      format_date = request['publishing_date'].split('/')
      browser.find_by_name('kokaibiYyyy').fill(format_date[0])
      browser.find_by_name('kokaibiMm').fill(format_date[1])
      browser.find_by_name('kokaibiDd').fill(format_date[2])

    if(request['bldg_structure'] != None):
      # Building Structure
      building_struct_checkbox = head_elements['建物構造'].find_by_tag('input')
      for building_struct in request['bldg_structure']:
        if building_struct in self.building_struct_guide:
          building_struct_checkbox[self.building_struct_guide.index(building_struct)].click()

    if(request['floor_option'] != None):
      # Floor
      if('階指定' in head_elements.keys()):
        building_struct_checkbox = head_elements['階指定'].find_by_tag('input')
        
        if(request['floor_option'] == 'specify_floor'):
          floor = request['step_min'] if request['step_max'] == 0 else request['step_max']
          # Check if floor is greater than 1 
          if floor > 1:
            building_struct_checkbox[2].click()
          elif floor == 1:
            building_struct_checkbox[1].click()
          
        elif(request['floor_option'] == 'top_floor'):
          building_struct_checkbox[3].click()
        else:
          building_struct_checkbox[0].click()

    if(request['object_type'] != None):
      # Object Type2
      obj_type_checkbox = head_elements['物件種目'].find_by_tag('input')
      for obj_type in request['object_type']:
        if obj_type in self.obj_type_guide:
          obj_type_checkbox[self.obj_type_guide.index(obj_type)].click()

  def new_search(self, browser, request, first_ten = False):
    # Object Type1
    # 1st Level Default click "賃貸居住用"
    type_button = browser.find_by_name('atbbShumokuDaibunrui', wait_time=20)
    type_button[5].click() if len(type_button) > 0 else None

    if(request['cities'] != None):
      locations = browser.find_by_id("checkZenTodofuken", wait_time=10).first
      for location in request['prefectures']:
        locations.find_by_value(self.search_location_line[location]).click()

      browser.find_by_value('所在地検索').click()

      prefecture_length = len(request['cities'])
      for prefecture in request['cities']:
        prefecture_index = request['prefectures'].index(prefecture)
        prefecture_key = str(prefecture_index+1)
        selection_count = prefecture_index * 2 
        # Select Prefecture Radio (#sentaku#AreaRadio input)
        browser.find_by_css('#sentaku'+prefecture_key+'AreaRadio input')[prefecture_index].click()
        # Select Cities on Select (#sentaku#ShikugunList span select option)
        select_options = browser.find_by_css('#sentaku'+prefecture_key+'ShikugunList span select', wait_time=3)[selection_count].find_by_tag('option')
        # Unclick the First
        browser.execute_script("$('#sentaku"+prefecture_key+"ShikugunList span select').eq("+str(selection_count)+").attr('size', "+str(len(select_options))+")")
        select_options[0].click()

        cities = {}
        for select_option in select_options:
          option_html = select_option.html
          city_name =  option_html.split('(')[0]
          cities[city_name] = select_option

        for city in cities:
          if (city in request['cities'][prefecture]):
            cities[city].click()
        
        # Click Additonal Button if prefectures > 1
        if(int(prefecture_key) < prefecture_length):
          browser.find_by_css('#sentaku'+str(int(prefecture_key)+1)+'TuikaButton').click()

    elif(request['routes'] != None):
      locations = browser.find_by_id("checkZenTodofuken", wait_time=15).first
      for location in request['prefectures']:
        locations.find_by_value(self.search_location_line[location]).click()

      browser.find_by_value('沿線検索').click()

      route_prefectures_length = len(request['prefectures'])
      for index, prefecture in enumerate(request['prefectures']):
        prefecture_index = index
        prefecture_key = str(prefecture_index+1)
        selection_count = prefecture_index * 2 
        # Select Prefecture Radio (#sentaku#AreaRadio input)
        browser.find_by_css('#sentaku'+prefecture_key+'AreaRadio input')[prefecture_index].click()
        # Select Cities on Select (#sentaku#ShikugunList span select option)
        select_options = browser.find_by_css('#sentaku'+prefecture_key+'EnsenList span select', wait_time=3)[selection_count].find_by_tag('option')
        # Unclick the First
        browser.execute_script("$('#sentaku"+prefecture_key+"EnsenList span select').eq("+str(selection_count)+").attr('size', "+str(len(select_options))+")")
        select_options[0].click()

        routes = {}
        for select_option in select_options:
          option_html = select_option.html
          get_option = option_html.split('(')[0].split('（')[0].replace('ＪＲ', 'JR').split('・')[0]

          routes[get_option] = select_option
        
        # print(routes.keys())
        
        format_routes = self.formatRoutes(request['routes'])
        for route in routes:
          if (route in request['routes'] or route in format_routes[0] or route in format_routes[1] or route in format_routes[2]):
            routes[route].click()
            break
          
        # Click Additonal Button if prefectures > 1
        if(int(prefecture_key) < route_prefectures_length):
          browser.find_by_css('#sentaku'+str(int(prefecture_key)+1)+'TuikaButton').click()

    browser.find_by_value('条件入力画面へ', wait_time = 5).click()

    # Other Search
    self.other_search(browser, request)

    browser.find_by_value('検索', wait_time = 10).click()
    try:
      browser.find_by_value('検索', wait_time = 10).click()
      browser.find_by_name('pngDisplayCount', wait_time = 15).first.find_by_tag('option', wait_time = 3)[2].click()
    except:
      time.sleep(1)

    return self.retrieve_results(browser, first_ten)

  def atbb_sample_search(self, browser, search_parameters):
    # Submit Search Parameters
    type_options = browser.find_by_name("atbbShumokuDaibunrui", wait_time=20)
    # print(type_options)

    for type_option in type_options:
      if (type_option['value'] == self.search_object_type[search_parameters['type']]):
        type_option.click()

    locations = browser.find_by_id("checkZenTodofuken", wait_time=15).first
    for location in search_parameters['locations']:
      locations.find_by_value(self.search_location_line[location]).click()

    browser.find_by_value('所在地検索').click()

    # For Select
    select_options = browser.find_by_css('#sentaku1ShikugunList span select option', wait_time=3)
    # Unclick the First
    select_options[0].click()

    # Click less than 100
    for select_option in select_options:
      option_html = select_option.html
      get_option = re.search(r'(.+)\((\d+).\)', option_html)
      option_count = int(get_option.group(2))
      if( option_count > 0 and option_count < 100):
        select_option.click()
        break

    browser.find_by_value('選択 >>', wait_time = 5).click()
    browser.find_by_value('条件入力画面へ', wait_time = 5).click()
    browser.find_by_value('検索', wait_time = 10).click()
  
  def retrieve_results(self, browser, first_ten = False):
    # For Results
    browser.find_by_name('pngDisplayCount', wait_time = 15).first.find_by_tag('option', wait_time = 3)[2].click()
    results = browser.find_by_css('div.bukkenKensakuKekkaWrapper', wait_time=10)
    tables = results.find_by_css('table[border="1"] tbody')
    result_response = {}

    # Get Table Informaton
    if(len(tables) > 0 ):
      tbl_01 = Table01()
      tbl_021 = Table021()
      tbl_02c = Table02c()
      
      # Get First 10
      if first_ten:
        tables = tables[:10]
      
      for i, table in enumerate(tables):
        result_dictionary = {}
        header_index = 0

        tbl_ld01 = table.find_by_css('.list-data01')
        for j, el in enumerate(tbl_ld01):
          # print(tbl_01.switch(j, el))
          result_dictionary[self.search_result_headers[header_index]] = tbl_01.switch(j, el)
          header_index += 1

        tbl_ld02_1 = table.find_by_css('.list-data02-l')
        for j, el in enumerate(tbl_ld02_1):
          if(j < 5):
            # print(tbl_021.switch(j, el))
            result_dictionary[self.search_result_headers[header_index]] = tbl_021.switch(j, el)
            header_index += 1

        tbl_ld02_c = table.find_by_css('.list-data02-c')
        for j, el in enumerate(tbl_ld02_c):
          if(j > 0 and j < 17):
            # print(tbl_02c.switch(j, el))
            result_dictionary[self.search_result_headers[header_index]] = tbl_02c.switch(j, el)
            header_index += 1

        result_response[i] = result_dictionary
        result_dictionary = {}

    return result_response

  # def retrieve_results(self, browser):
  #   # For Results
  #   browser.find_by_name('pngDisplayCount', wait_time = 15).first.find_by_tag('option', wait_time = 3)[2].click()
  #   results = browser.find_by_css('div.bukkenKensakuKekkaWrapper', wait_time=10)
  #   tables = results.find_by_css('table[border="1"] tbody')
  #   test_results = {}

  #   # Init Pyocr
  #   pyocr_tool = pyocr.get_available_tools()[0]

  #   # Focus
  #   browser.execute_script("window.scrollTo(0, document.body.scrollHeight)")
  #   browser.execute_script("$('.stickyHeader').hide()")

  #   image_rents = []
  #   i = 0
  #   while i < len(tables):
  #     img_path = browser.find_by_css(f'#price_img_{i}').screenshot(f"{os.path.abspath('.')}/")
  #     image_rent = pyocr_tool.image_to_string(
  #       Image.open(img_path).resize((276, 50)),
  #       lang='eng',
  #       builder=pyocr.builders.TextBuilder()
  #     )
  #     os.remove(img_path)
  #     image_rents.append(f'{self.formatRent(image_rent)}万円')
  #     i += 1
  #   # print(image_rents)
  #   if(len(tables) > 0 ):
  #     for i, table in enumerate(tables):
  #       rows = table.find_by_css('tr td')
  #       result = {}
  #       j = 0
  #       for row in rows:
  #         if(row.html != '' and not re.search(r'bkn_no_img_div|ichiranGazoIcon|bukkenKensakuKekkaIchiranElement', row.html)):
  #           if '<span class="flt-lft">' in row.html:
  #             # print('End!')
  #             break
  #           property_data = " ".join(row.html.split())
  #           if 'price_img' in property_data:
  #             result[self.search_result_headers[j]] = image_rents[i]
  #             j += 1
  #           elif '</span>' in property_data:
  #             nbsp_group = re.search(r'\<span.+\>\&nbsp\;\<\/span\>(.+)', property_data)
  #             # Check if Inside <span> is $nbsp for Badges
  #             if(nbsp_group):
  #               badge_title = row.find_by_tag('span').first['title']
  #               result[self.search_result_headers[j]] = f'[{ badge_title }] { self.cleanFilteredData(nbsp_group.group(1)) }'
  #               j += 1
  #             else:
  #               # print(property_data)
  #               matched_data = re.findall(r'(.+)\<.+\>\<.+\>(.+)\<\/.+\>\<\/.+\>(.+)',property_data)
  #               filtered_data = self.cleanFilteredData(" ".join([x for xs in matched_data for x in xs]))
  #               result[self.search_result_headers[j]] = filtered_data
  #               j += 1
  #           elif (re.search(r'\<\/a\>|\<\/p\>', property_data)):
  #             # print(property_data)
  #             matched_data = re.findall(r'\<p.+\>(.+)\<\/p\>|\<a.+\>(.+)\<\/a\>|(.+)\<a.+\>(.*)\<\/a\>',property_data)
  #             # print(matched_data)
  #             filtered_data = self.cleanFilteredData(" ".join([x for xs in matched_data for x in xs]))
  #             # print(filtered_data)
  #             result[self.search_result_headers[j]] = filtered_data
  #             j += 1
  #           else:
  #             filtered_data = self.cleanFilteredData(property_data)
  #             result[self.search_result_headers[j]] = filtered_data
  #             j += 1

  #       # print(result)
  #       # result.pop('-')
  #       test_results[str(i)] = result
  #       result = []
  #       j = 0
    
  #   return test_results

  def atbb_home(self, browser):
    browser.find_by_css('.menubar-bg').find_by_xpath('..').find_by_tag('td')[1].click()

  def logout_atbb(self, browser):
    # Log out
    browser.find_by_css('.shuryoBtn').click()
    browser.quit()