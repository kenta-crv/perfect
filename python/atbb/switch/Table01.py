import re

from splinter import Browser
from selenium import webdriver

class Table01:

    def switch(self, index, element):
        default = getattr(self, '_default')
        return getattr(self, 'case_' + str(index), lambda: default)(element)

    def case_0(self, element):
        if ('span' in element.html):
          new_html =  re.sub(r'<span.*title="', '', element.html)
          new_html =  re.sub(r'">.*', '', new_html)
          return self.clearText(new_html)
        else:
          return self.clearText(element.html)

    def case_1(self, element):
        return element.find_by_tag('img').first['src']

    def case_2(self, element):
        return element.html
      
    # Helper
    def clearText(self, html):
      return " ".join(html.replace('&nbsp;', '').split())
    
    def _default(self, element):
      return '-'