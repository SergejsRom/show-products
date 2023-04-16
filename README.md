

## Requirements
Use latest version of Laravel PHP framework.
Use PHP >= 8.0.
GIT must be used for version control.
Usage of MySQL or SQLite database.
Usage of Bootstrap or any other CSS framework that you like for front-end
realization.

## Task

#### Create mini page with the following functionality:

###### Write a command which imports products from given JSON file (products.json)

###### Write a scheduled command which imports products stock from given JSON file (stocks.json)

##### Write a simple JSON API endpoint which can list all existing products.

#### Create a front-end:
###### List all products

###### Single product page with related products

###### Use cache for single product page information (keep in mind that stock must be shown in real-time).

----------------------------
#### Comments:
----------------------------
- [x] Save products to DB from json file.
- [x] scheduled stock update from json file.
- [x] Api endpoint for all Products.
- [x] Api endpoint for all Stock.
- [x] Api endpoints loading from cache for 24h or till create/update and reset.
- [x] Made Command, observers, resources, controllers to handle api. 
- [x] Created front page with all products list
- [x] $schedule->command(StockUpdate::class, ['schedule'])->hourly();

- [x] List pagination loading on button click (livewire)
- [x] Modal for "show" product (livewire)


-----------------------
To run shedule on local (linux)
###### crontab -e 
###### * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

