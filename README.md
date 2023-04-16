

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
- [x] Scheduled stock update from json file. 
        Loads stock only if "SKU" exists in Products table

- [x] Api endpoint for all Products.
- [x] Api endpoint for all Stock.
- [x] Api endpoints loading from cache for 24h or till create/update and reset on action.
- [x] Made Command, observers, resources, controllers to handle api. 
- [x] $schedule->command(StockUpdate::class, ['schedule'])->hourly();

- [x] "Welcome" page to choose Livewire or blade version

- [x] Created front page with all products list (livewire)
- [x] List pagination loading on button click (livewire)
- [x] Modal for "show" product (livewire)

- [x] List all products (blade)
- [x] "show" product from cache (blade)


-----------------------
To run shedule on local (linux)
###### crontab -e 
###### * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

