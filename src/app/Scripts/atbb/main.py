# Dev Dependencies can be installed using `python -m pip install splinter[selenium4]`
# Read the Docs: https://splinter.readthedocs.io/en/latest/drivers/chrome.html

import os, json, re, sys

from splinter import Browser
from selenium import webdriver

sys.path.append(os.path.abspath('../app/Scripts/atbb'))

from atbb import Atbb

import pyocr
import pyocr.builders
from PIL import Image


def cleanFilteredData(data):
  # Clean &nbsp;
  data = data.replace('&nbsp;', '')

  # Clean <br>
  data = data.replace('<br>', '')

  # Clean Whitespaces
  data = " ".join(data.split())

  return data

def formatRent(image_rent):
  # Check if .dot is ,comma
  if(re.search(r'\,', image_rent)):
    # print('comma!')
    image_rent = image_rent.replace(',', '')

  # Format
  if(not re.search(r'\.', image_rent)):
    # print('filtered!')
    # Assuming 2 decimal points or '0.00'
    str_count = len(image_rent)
    int_place = int(str_count/2)
    return f'{image_rent[0:int_place]}.{image_rent[int_place:str_count]}'
  else:
    return re.findall(r'(\d+.\d+)', image_rent)[0]

f_root = '../app/Scripts/atbb'
f_path = os.path.abspath(f_root+'/drivers')

# os.environ['PATH'] += r";C:/Users/HiPE/Desktop/python/python_selenium/drivers"
os.chmod(f_path, 755)
os.environ['PATH'] += f'{os.pathsep}{f_path}'
atbb = Atbb()
sample_request = {
  "type" : "賃貸居住用",
  "locations" : ["岐阜県"]
}

# auth
try:
  key = open(f_root+"/login.key", "r")
  user_id = key.readline()
  password = key.readline()
except OSError as exception:
#   pass
  print('Login Key not found...')

options = webdriver.ChromeOptions()
options.add_experimental_option('excludeSwitches', ['enable-logging'])
# options.add_experimental_option("debuggerAddress", "localhost:8989")
# b = Browser('chrome', options = options)
b = Browser('chrome', options = options, headless=True)
b.visit('https://members.athome.jp/login')
b.find_by_name('loginId').fill(user_id)
b.find_by_name('password').fill(password)
if(b.is_element_not_present_by_css('.login:disabled')):
  b.find_by_css('.login').click()
  # Wait for page load
  # time.sleep(10)

  # Proceed to ATBB
  headers = b.find_by_css('a.header_link', wait_time=10)
  for header in headers:
    # print(header.value)
    if(header.value == '物件検索'):
      header.click()
      break

  services = b.find_by_css('div.is-atbb--release')
  for service in services:
    # print(service['data-action'])
    if(service['data-action'] == '/atbb/nyushuSearch?from=global_menu_bukkenKensaku'):
      service.click()
      break

  # Wait for page load
  # time.sleep(10)

  # Set ATBB as current
  for window in b.windows:
    if window.title != "不動産業務総合支援サイト　ATBB":
      window.close()
    else:
      window.is_current = True

  # Submit Search Parameters
  type_options = b.find_by_name("atbbShumokuDaibunrui", wait_time=10)
  # print(type_options)

  for type_option in type_options:
    if (type_option['value'] == atbb.search_object_type[sample_request['type']]):
      type_option.click()

  locations = b.find_by_id("checkZenTodofuken", wait_time=15).first
  for location in sample_request['locations']:
    locations.find_by_value(atbb.search_location_line[location]).click()


  b.find_by_value('所在地検索').click()


  # For Select
  select_options = b.find_by_css('#sentaku1ShikugunList span select option', wait_time=3)
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

  b.find_by_value('選択 >>', wait_time = 5).click()
  # time.sleep(3)
  b.find_by_value('条件入力画面へ', wait_time = 5).click()
  # time.sleep(3)
  b.find_by_value('検索', wait_time = 10).click()
  # time.sleep(3)

# Get results
  # For Results
  b.find_by_name('pngDisplayCount', wait_time = 15).first.find_by_tag('option', wait_time = 3)[2].click()
  results = b.find_by_css('div.bukkenKensakuKekkaWrapper', wait_time=10)
  tables = results.find_by_css('table[border="1"] tbody')
#   print(len(tables))
  test_results = {}

  # Init Pyocr
  pyocr_tool = pyocr.get_available_tools()[0]

  # Focus
  b.execute_script("window.scrollTo(0, document.body.scrollHeight)")
  b.execute_script("$('.stickyHeader').hide()")

  if(len(tables) > 0 ):
    for i, table in enumerate(tables):
      rows = table.find_by_css('tr td')
      result = {}
      j = 0
      for row in rows:
        if(row.html != '' and not re.search(r'bkn_no_img_div|ichiranGazoIcon|bukkenKensakuKekkaIchiranElement', row.html)):
          if(re.search(r'<span class="flt-lft">', row.html)):
            # print('End!')
            break
          property_data = " ".join(row.html.split())
          if (re.search(r'price_img', property_data)):
            img_path = row.find_by_tag('img').screenshot(f"{os.path.abspath('.')}/")
            # print(img_path)
            # print('Image!')
            image_rent = pyocr_tool.image_to_string(
              Image.open(img_path).resize((276, 50)),
              lang='eng',
              builder=pyocr.builders.TextBuilder()
            )
            os.remove(img_path)
            # print(image_rent)
            rent = formatRent(image_rent)
            # print(rent)
            result[atbb.search_result_headers[j]] = f'{rent}万円'
            j += 1
          elif (re.search(r'</span>', property_data)):
            nbsp_group = re.search(r'\<span.+\>\&nbsp\;\<\/span\>(.+)', property_data)
            # Check if Inside <span> is $nbsp for Badges
            if(nbsp_group):
              badge_title = row.find_by_tag('span').first['title']
              result[atbb.search_result_headers[j]] = f'[{ badge_title }] { cleanFilteredData(nbsp_group.group(1)) }'
              j += 1
            else:
              # print(property_data)
              matched_data = re.findall(r'(.+)\<.+\>\<.+\>(.+)\<\/.+\>\<\/.+\>(.+)',property_data)
              filtered_data = cleanFilteredData(" ".join([x for xs in matched_data for x in xs]))
              result[atbb.search_result_headers[j]] = filtered_data
              j += 1
          elif (re.search(r'\<\/a\>|\<\/p\>', property_data)):
            # print(property_data)
            matched_data = re.findall(r'\<p.+\>(.+)\<\/p\>|\<a.+\>(.+)\<\/a\>|(.+)\<a.+\>(.*)\<\/a\>',property_data)
            filtered_data = cleanFilteredData(" ".join([x for xs in matched_data for x in xs]))
            result[atbb.search_result_headers[j]] = filtered_data
            j += 1
          else:
            filtered_data = cleanFilteredData(property_data)
            result[atbb.search_result_headers[j]] = filtered_data
            j += 1

      # print(result)
      test_results[str(i)] = result
      result = []
      j = 0

  print(json.dumps(test_results))

  # Log out
  b.find_by_css('.shuryoBtn').click()

else:
  pass
#   print('Cannot Log-in')

# print('Closed...')
b.quit()
