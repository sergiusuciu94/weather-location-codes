# -*- coding: utf-8 -*-
import scrapy

class LocationsSpider(scrapy.Spider):
    name = 'locations'
    allowed_domains = ['weather.codes']
    start_urls = ['https://weather.codes/']

    def parse(self, response):
        urls = response.css('body > footer > div.footer__countries > div > ul > li > a::attr(href)').extract()
        for url in urls:
            request = scrapy.Request(url='https://weather.codes' + url, callback=self.parse_data)
            request.meta['url'] = url
            yield request


    def parse_data(self, response):
        table = response.css('body > main > div > div.container > div > div.col-md-9 > div > dl')
        yield {
            'url' : response.meta['url'],
            'codes' : table.css("dt::text").extract(),
            'city' : table.css("dd::text").extract()
        }
