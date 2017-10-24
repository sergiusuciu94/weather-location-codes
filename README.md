# weather-location-codes
A scraper and migration + seeds for location codes to be used with Yahoo! Weather API (might use for autocomplete in some projects)



# Requirements
1) pip + scrapy
2) composer

# How to run
1) cd `$YOUR_LOCATION/locationCodes/locationCodes/`
2) run `scrapy crawl locations -o locations.json`
3) cd ..
4) fun `composer install`
5) edit `phinx.yml` to match you database data
6) run `php vendor/bin/phinx migrate`
7) run `php vendor/bin/phinx seed:run`
