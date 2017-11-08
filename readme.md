# Welcome to Beer

## Requirements

1. PHP 5.6
1. MySQL database
1. Composer (see https://getcomposer.org/ for installation instructions)

## Installation instructions

1. download/clone the repository into the project directory (`$ git clone https://github.com/softfrog/beer.git <project_dir>`)
1. change to the project directory and run `$ composer install`
1. create your database and run database/sql/create_tables.sql to create the tables
1. edit your database configuration in config/database.php
1. run `$ php artisan db:seed` in the project directory to seed the database with some useful values
1. you can set up the site using your preferred web server, or test by running `$ php artisan serve` in the project directory and direct all requests to http://localhost:8000

## To call the API

### Add a user

To register on the system, send your name, email, password and password_confirmation in a POST request to `api/register` e.g.

```
$ curl -X POST http://localhost:8000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Root Beer", "email": "root@beer.com", "password": "crackopenacoldone", "password_confirmation": "crackopenacoldone"}'
 ```
 
 A JSON object will be returned showing the contents of your new user record including an api_token. This token must be used with all future requests. To logout submit a POST request to `api/logout`, and to login again submit the POST containing your email and password to `api/login` - this will provide you with a new api_token.

### Create a new beer

Submit a POST request to `api/beers` providing the new beer details (name, brewery, style, ibu, calories, abv) as well as your api_token. You will receive a JSON object with the contents of the new record as confirmation if your request is successful, else an error message if not.

NOTE: you may only add one beer every 24 hours.

### List all beers

GET request `api/beers?api_token=<token>`

### Rate a beer

Submit your POST to `api/reviews` providing name of the beer (`"beer": <name>`) and some/all of the following review scores (aroma, appearance, taste).

### View ratings for a beer

GET request of the form `api/reviews/<beer name>?api_token=<token>`

### Get overall rating for a beer

GET request of the form `api/overall/<beer name>?api_token=<token>` - the returned JSON object will contain the count of reviews and the average overall score for the beer.

