import os, time, re

from splinter import Browser
from selenium import webdriver

class Sumitomo:
  def __init__(self):
    self.f_root = './sumitomo'

    self.login_url = "https://www.sumitomo-latour.jp/estate/login.php"
    
    self.sumi_cities = {
      '港区' :'minatoku',
      '品川区' :'shinagawaku',
      '文京区' :'bunkyoku',
      '札幌市' :'sapporo',
      '渋谷区' :'shibuyaku',
      '新宿区' :'shinjyukuku',
      '世田谷区' :'setagayaku',
      '京都市' :'kyoto',
      '目黒区' :'meguroku',
      '中野区' :'nakanoku',
      '武蔵野市' :'musashino',
      '千代田区' :'chiyodaku',
      '台東区' :'taitouku',
      '中央区' :'chuouku',
      '豊島区' :'toshimaku',
    }

    self.header1 = [
      "建物名",
      "所在地",
      "沿線駅",
      "構造 規模",
      "築年月",
    ]

    self.header2 = [
      "建物名",
      "賃料",
      "間取",
      "使用部分面積",
      "敷金",
      "礼金",
    ]

    self.madori_guide = [
    ['1R', '1K'], 
    [ '1LDK'], 
    [ '2LDK'], 
    ['3LDK'], 
    ['4LDK'],
    ['5LDK']
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

  # Helper
  def clearText(self, html):
    return " ".join(html.replace('&nbsp;', '').split())

  def selectAmount(self, browser, amount, select_name, type):
    type_amount = 5 if type == 'fee' else 10

    rounded_off = round(amount/type_amount)*type_amount
    value = 0 if rounded_off <= type_amount else rounded_off
    browser.find_by_css(select_name).click()
    for option in browser.find_by_css(select_name + ' option'):
      if int(option.value) == value:
        option.click()
        browser.find_by_css(select_name).click()
  
  def login(self, browser, request):
    # browser.visit(self.login_url) 
    try:
      key = open(self.f_root+"/login.key", "r")
      key_string = key.readline().split("|")
      #user_id = key_string[0]
      #password   = key_string[1]
      user_id = request['user_name']
      password   = request['user_pass']
    except OSError:
      return {
      'status' : 500,
      'message' : 'Error'
    }

    
    browser.find_by_name('input_login_id').fill(user_id)
    browser.find_by_name('input_password').fill(password)
    # Login
    try:
      browser.find_by_css('.btnSubmit', wait_time=3).click()
    except:
      # Site does not reload, selenium browser load exception skipped
      pass

    if(len(browser.find_by_text('Agent login')) == 0):
      return {
        'status' : 200,
        'message' : 'OK'
      }
    else:
      return {
        'status' : 500,
        'message' : 'Login Failed'
      }

  def search(self, browser, request, logged_in = False, first_ten = False):
    # request = {
    #   'locations' : ['港区', '渋谷区']
    # }
    # Check if Modal is visible
    try:
      modal_close = browser.find_by_id('cv-tech-modal-close')
      # print(modal_close)
      modal_close.click() if 'display' in browser.find_by_css('#cv-tech-modal-main')['style'] > 0 else ''
    except:
      # Site does not reload, selenium b load exception skipped
      pass

    for prefecture, cities in request['cities'].items():
      if prefecture in self.sumi_cities:
        browser.find_by_value(self.sumi_cities[prefecture]).find_by_xpath('..').click()
        continue
      else:
        for city in cities:
          if city in self.sumi_cities:
            browser.find_by_value(self.sumi_cities[city]).find_by_xpath('..').click()
            continue

    if (request['madori'] is not None):
      madori_list = browser.find_by_css('.chklist1 input')
      for selected_madori in request['madori']:
        for position, guide in enumerate(self.madori_guide):
          if selected_madori in guide:
            if not madori_list[position].checked:
              madori_list[position].find_by_xpath('following-sibling::span[1]').click()

    # For Fee Min
    if (request['fee_min'] != 0):
      self.selectAmount(browser,request['fee_min'],'#lower', 'fee')

    # For Fee Max
    if (request['fee_max'] != 0):
      self.selectAmount(browser,request['fee_max'],'#upper', 'fee')

    # For Area Min
    if (request['area_min'] != 0):
      self.selectAmount(browser,request['area_min'],'#sqMeterLow', 'area')

    # For Area Max
    if (request['area_max'] != 0):
      self.selectAmount(browser,request['area_max'],'#sqMeterUp', 'area')

    try:
      # Check Result Count
      int(browser.find_by_css('.cntBuil', wait_time = 3).first.html)
    except:
      return {
      'status' : 200,
      'message' : 'Zero Results',
    }

    try:
      browser.find_by_css('.buttonBox #searchButton', wait_time=3)[0].click()
    except:
      # Site does not reload, selenium b load exception skipped
      pass
    
    try:
      modal_close = browser.find_by_id('cv-tech-modal-close')
      # print(modal_close)
      modal_close.click() if 'display' in browser.find_by_css('#cv-tech-modal-main')['style'] > 0 else ''
    except:
      # Site does not reload, selenium browser load exception skipped
      pass
    site_total_result = int(browser.find_by_css('.roomNotice strong').first.html.split('棟')[1].replace('室', ''))
    response = self.retrieveResults(browser, first_ten)
    return {
      'status' : 200,
      'message' : 'OK',
      'payload' : response,
      'site_total_result' : site_total_result
    }
  
  def retrieveResults(self, browser, first_ten = False):
    # Check if Modal is visible
    try:
      modal_close = browser.find_by_id('cv-tech-modal-close')
      # print(modal_close)
      modal_close.click() if 'display' in browser.find_by_css('#cv-tech-modal-main')['style'] > 0 else ''
    except:
      # Site does not reload, selenium browser load exception skipped
      pass
    # print(modal_close)
    property_count = int(browser.find_by_css('.roomNotice strong').first.html.split('棟')[0])
    i=0
    result = {}
    while i < property_count:
      try:
        properties = browser.find_by_css('.estateBox', wait_time=3)
      except:
        # Site does not reload, selenium browser load exception skipped
        continue

        # print(len(properties))
      for property in properties:
        # Get Building
        h=0
        property_result = {}
        property_result[self.header1[h]] = self.clearText(re.sub(r'<.*', '', property.find_by_tag('h2').html))
        h+=1
        details = property.find_by_css('.detail .spec tr td')
        for d, detail in enumerate(details):
          if d == 1:
            property_result[self.header1[h]] = self.clearText(detail.html.replace('<br>', f'\n'))
          elif d in [3]:
            continue
          else:
            property_result[self.header1[h]] = detail.html
          h+=1
        rooms = property.find_by_css('.roomList dl')
        for room in rooms:
          h = 0
          # Get Rooms
          room_result = {}
          room_property_result = {} | property_result
          room_property_result[self.header2[h]] = property_result[self.header2[h]] + ' ' + room.find_by_css('dt span').html.split()[0]
          h += 1
          rent = str(int(room.find_by_css('.roomDetail .price').html.replace(',','').replace('円',''))/10000)
          format_rent = rent.replace('.0', '') if '.0' in rent else rent
          room_result[self.header2[h]] = f'{format_rent}万円'
          h += 1
          p_detail = room.find_by_css('.roomDetail p').html.replace('間取り/', '').replace('面積/', '').replace('敷金/', '').replace('礼金/', '').replace('<br>', '、').split('、')
          j = 0
          while j < len(p_detail):
            if(j == 4):
              break
            room_result[self.header2[h]] = p_detail[j]
            h += 1
            j += 1

          # images
          src_list = []
          image_count = 0
          first_image = room.find_by_css('.roomDetail').find_by_tag('a').first['href']
          src_list.append(first_image)
          if first_image != '':
            image_count = 1
          room_result['image_list'] = src_list
          room_result['image_number_gaikan'] = image_count
          room_result['detail_link'] = re.sub(r'\/\d+\/', '/', room.find_by_text('部屋詳細へ')['href'])


          # Static Values
          room_result['物件種目'] = '-'
          room_result['商号'] = '-'
          room_result['共益費'] = '-'
          room_result['ad'] = '-'
          room_result['所在階'] = '-'
          room_result['取引態様'] = '-'
          room_result['敷引'] = '-'
          room_result['坪単価'] = '-'
          room_result['struct_type'] = '-'
          room_result['電話番号'] = '-'
          result[len(result)] = room_result | room_property_result
          
          if first_ten and len(result) == 10:
            return result
        
        # Proceed to next property
        print(i)
        i += 1
        
        
      # Check if Next Exists 
      next_page = browser.find_by_css('.paging', wait_time=3).first.find_by_text('>')
      try:
        next_page.click() if len(next_page) > 0 else ''
      except:
        # Site does not reload, selenium browser load exception skipped
        pass
    
    return result
  
  
  def get_text_json(self, text, element_key, pattern, b, response = {}):
    data = response
    elem_cols = {}

    if not pattern:
      for keys in text:
        finder = b.find_by_text(keys)
        if(len(finder) > 0):
          html = finder.find_by_xpath('following-sibling::td')
          if(len(html) > 0):
            parser = html.html
            data[keys] = parser
        continue
    else:
      counter = 0
      finder = b.find_by_text(text)
      if (len(finder) > 0):
        html = finder.find_by_xpath('following-sibling::td')
        if(len(html) > 0):
          ul = html.find_by_css('ul')

          for lbl in ul.find_by_css('li'):
            counter += 1
            elem_cols[counter] = lbl.text
          data[element_key] = elem_cols
    return data

  def get_text_json_as_list(self, text, element_key, pattern, b, response = {}):
    data = response
    cols = {}
    elem_cols = {}

    if not pattern:
      for keys in text:
        finder = b.find_by_text(keys)
        if(len(finder) > 0):
          html = finder.find_by_xpath('following-sibling::td')
          if(len(html) > 0):
            parser = html.html
            cols[keys] = parser
            data[element_key] = cols
        continue

    else:
      counter = 0
      finder = b.find_by_text(text)
      if (len(finder) > 0):
        html = finder.find_by_xpath('following-sibling::td')
        if(len(html) > 0):
          ul = html.find_by_css('ul')

          for lbl in ul.find_by_css('li'):
            counter += 1
            elem_cols[counter] = lbl.text
          data[element_key] = elem_cols
    return data

  def isBrowserActive(self, browser):
    browser_status = False
    
    try:
      modal_close = browser.find_by_id('cv-tech-modal-close')
      # print(modal_close)
      modal_close.click() if 'display' in browser.find_by_css('#cv-tech-modal-main')['style'] > 0 else ''
    except:
      # Site does not reload, selenium browser load exception skipped
      pass

    browser.reload()
    if(len(browser.find_by_css('.buttonBox #searchButton', wait_time=3)) == 0):
      browser_status = True
    
    return browser_status

  def getDetailPage(self, browser):
    label_outline = [
        '最寄駅',
        '建物名',
        '住所',
        '構造 規模',
        '戸数',
        '竣工年月',
    ]
    label_facilities = [
        '冷暖房',
        '防犯・防災設備',
        '台所',
        '洗濯設備',
        'その他',
        'エレベーター',
        'ゴミ 置き場',
        '駐車場',
        '駐輪場',
        'テレビ共聴設備',
        'インターネット',
        '防犯設備',
        '防災設備',
    ]

    try:
      modal_close = browser.find_by_id('cv-tech-modal-close')
      # print(modal_close)
      modal_close.click() if 'display' in browser.find_by_css('#cv-tech-modal-main')['style'] > 0 else ''
    except:
      # Site does not reload, selenium browser load exception skipped
      pass

    cols_counter = {}
    cols_counter = self.get_text_json(label_outline, '建物概要', False, browser, cols_counter)
    cols_counter = self.get_text_json(label_facilities, '設備概要・専有部分', False, browser, cols_counter)
    cols_counter = self.get_text_json_as_list('共用設備・サービス', '共用設備・サービス', True, browser, cols_counter)
    # structures = self.get_text_json('建物構造', '建物構造', True, browser, cols_counter)
    cols_counter = self.get_text_json_as_list('セキュリティ', 'セキュリティ', True, browser, cols_counter)
    cols_counter = self.get_text_json_as_list('快適設備', '快適設備', True, browser, cols_counter)
    cols_counter = self.get_text_json_as_list('マルチメディア', 'マルチメディア', True, browser, cols_counter)

    # a = outline
    # b = services
    # c = facilities
    # e = security
    # f = comfortable
    # g = multimedia

    # cols_counter['設備・サービス'] = g

    # e.update(c)
    # f.update(e)
    # g.update(f)

    # a.update(b)
    # cols_counter.update(a)

    return cols_counter