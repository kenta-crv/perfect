# Dev Dependencies can be installed using `python -m pip install splinter[selenium4]`
# Read the Docs: https://splinter.readthedocs.io/en/latest/drivers/chrome.html

import os, time, re

from splinter import Browser
from selenium import webdriver


from atbb import Atbb

import pyocr
import pyocr.builders
from PIL import Image

f_path = os.path.abspath('./drivers')

# os.environ['PATH'] += r";C:/Users/HiPE/Desktop/python/python_selenium/drivers"
os.environ['PATH'] += f';{f_path}'
atbb = Atbb()

options = webdriver.ChromeOptions()
# options.add_experimental_option("debuggerAddress", "localhost:8989")

b = Browser('chrome', options = options, headless=True)
b.visit('https://members.athome.jp/login')
print(b.title)

# # For Select
# select_options = b.find_by_css('#sentaku1ShikugunList span select option', wait_time=3)
# select_options[0].click()
# for select_option in select_options:
#   option_html = select_option.html
#   get_option = re.search(r'(.+)\((\d+).\)', option_html)
#   option_count = int(get_option.group(2))
#   # option_name = get_option.group(1)
#   # print(f'Name:{option_name}, Count:{option_count}')
#   # Select less than 100 as placeholder
#   if( option_count > 0 and option_count < 100):
#     select_option.click()
#     time.sleep(3)
#     break

# b.find_by_value('選択 >>').click()
# time.sleep(3)
# b.find_by_value('条件入力画面へ').click()
# time.sleep(3)
# b.find_by_value('検索', wait_time = 10).click()
# time.sleep(3)

# def cleanFilteredData(data):
#   # Clean &nbsp;
#   data = data.replace('&nbsp;', '')

#   # Clean <br>
#   data = data.replace('<br>', '')

#   # Clean Whitespaces
#   data = " ".join(data.split())

#   return data

# def formatRent(image_rent):
#   # Check if .dot is ,comma
#   if(re.search(r'\,', image_rent)):
#     print('comma!')
#     image_rent = image_rent.replace(',', '')

#   # Format
#   if(not re.search(r'\.', image_rent)):
#     # print('filtered!')
#     # Assuming 2 decimal points or '0.00'
#     str_count = len(image_rent)
#     int_place = int(str_count/2)
#     return f'{image_rent[0:int_place]}.{image_rent[int_place:str_count]}'
#   else:
#     return re.findall(r'(\d+.\d+)', image_rent)[0]

# # For Results
# b.find_by_name('pngDisplayCount', wait_time = 3).first.find_by_tag('option', wait_time = 3)[2].click()
# results = b.find_by_css('div.bukkenKensakuKekkaWrapper', wait_time=10)
# tables = results.find_by_css('table[border="1"] tbody')
# print(len(tables))
# test_results = {}

# # Init Pyocr
# pyocr_tool = pyocr.get_available_tools()[0]

# # Focus
# b.execute_script("window.scrollTo(0, document.body.scrollHeight)")
# b.execute_script("$('.stickyHeader').hide()")

# if(len(tables) > 0 ):
#   for i, table in enumerate(tables):
#     rows = table.find_by_css('tr td')
#     result = {}
#     j = 0
#     for row in rows:
#       if(row.html != '' and not re.search(r'bkn_no_img_div|ichiranGazoIcon|bukkenKensakuKekkaIchiranElement', row.html)):
#         if(re.search(r'<span class="flt-lft">', row.html)):
#           # print('End!')
#           break
#         property_data = " ".join(row.html.split())
#         if (re.search(r'price_img', property_data)):
#           img_path = row.find_by_tag('img').screenshot(f"{os.path.abspath('.')}/")
#           # print(img_path)
#           # print('Image!')
#           image_rent = pyocr_tool.image_to_string(
#             Image.open(img_path).resize((276, 50)),
#             lang='eng',
#             builder=pyocr.builders.TextBuilder()
#           )
#           os.remove(img_path)
#           print(image_rent)
#           rent = formatRent(image_rent)
#           print(rent)
#           result[atbb.search_result_headers[j]] = f'{rent}万円'
#           j += 1
#         elif (re.search(r'</span>', property_data)):
#           nbsp_group = re.search(r'\<span.+\>\&nbsp\;\<\/span\>(.+)', property_data)
#           # Check if Inside <span> is $nbsp for Badges
#           if(nbsp_group):
#             badge_title = row.find_by_tag('span').first['title']
#             result[atbb.search_result_headers[j]] = f'[{ badge_title }] { cleanFilteredData(nbsp_group.group(1)) }'
#             j += 1
#           else:
#             # print(property_data)
#             matched_data = re.findall(r'(.+)\<.+\>\<.+\>(.+)\<\/.+\>\<\/.+\>(.+)',property_data)
#             filtered_data = cleanFilteredData(" ".join([x for xs in matched_data for x in xs]))
#             result[atbb.search_result_headers[j]] = filtered_data
#             j += 1
#         elif (re.search(r'\<\/a\>|\<\/p\>', property_data)):
#           # print(property_data)
#           matched_data = re.findall(r'\<p.+\>(.+)\<\/p\>|\<a.+\>(.+)\<\/a\>|(.+)\<a.+\>(.+)\<\/a\>',property_data)
#           filtered_data = cleanFilteredData(" ".join([x for xs in matched_data for x in xs]))
#           result[atbb.search_result_headers[j]] = filtered_data
#           j += 1
#         else:
#           filtered_data = cleanFilteredData(property_data)
#           result[atbb.search_result_headers[j]] = filtered_data
#           j += 1

#     # print(result)
#     result.pop('-')
#     test_results[str(i)] = result
#     result = []
#     j = 0

# print(test_results)

# Log out
# b.find_by_css('.shuryoBtn').click()


  # Traverse All
  # for table in tables:
  #   rows = table.find_by_css('tr td')
  #   print(f'New Table with rows: {len(rows)}')
  #   for row in rows:
  #     print(row.html)
  #     print('not empty') if row.html is True else print('skipped...')
    #   found_image = row.find_by_css('div img#price_img_0')
    #   print(len(found_image))
    #   if(len(found_image) > 0):
    #     # found_image.first.screenshot(f"{os.path.abspath('.')}/find.png")
    #     test_image = found_image.first.screenshot()
    #     break
    # break

  #Get Image Price
  # img = Image.open(test_image)

  # result = pyocr.get_available_tools()[0].image_to_string(
  #     img,
  #     lang='eng',
  #     builder=pyocr.builders.TextBuilder()
  # )
  # print(result)
