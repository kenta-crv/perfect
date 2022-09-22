import re

from splinter import Browser
from selenium import webdriver

class Table021:

    def switch(self, index, element):
        default = getattr(self, '_default')
        return getattr(self, 'case_' + str(index), lambda: default)(element)

    def _default(self, element):
      return '-'

    # Text on the Left
    def case_0(self, element):
        return self.clearText(re.sub(r'<a.*', '', element.html))

    # Tatemono Class
    def case_1(self, element):
        return self.clearText(element.find_by_css('.tatemono-name').html)

    # Span in Between
    def case_2(self, element):
        new_html = re.sub(r'<span .*">', '', element.html)
        new_html = re.sub(r'</span.*>', '', new_html)
        return self.clearText(new_html)

    # A Tag Shogo
    def case_3(self, element):
        return self.aTagShogo(element)

    # A Tag Shogo
    def case_4(self, element):
        return self.aTagShogo(element)
      
    # Helper
    def clearText(self, html):
      return " ".join(html.replace('&nbsp;', '').replace('<br>', '').split())

    # A Tag Shogo Helper
    def aTagShogo(self, el):
      return self.clearText(el.find_by_tag('a').html)