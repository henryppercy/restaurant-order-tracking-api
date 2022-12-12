[//]: # (To Do:)

[//]: # (Refer to Frontend when testing is complete) and how to connect the FE to BE

[//]: # (Update instructions for editing DB connection parameters)
# The Hawks (2022 August Cohort): Final Project

## Restaurant Orders API

## 1. About
### Content
This is a RESTful API built to simulate the backend of an order management system for a fictional restaurant.
This was completed as part the Final Project for the [iO Academy Full Stack Track course](https://io-academy.uk/).

### Objective
We were tasked with building RESTful API. The components of this build include:
+ Writing a script to construct a database from an existing JSON file
+ Creating an OOP API based on an exising [API documentation](https://github.com/iO-Academy/furniture-api-template)

This project was designed to reinforce our knowledge of the following:
+ OOP programming working to SOLID principles in PHP
+ Writing documentation for the RESTful endpoints
+ Git workflow and best practices as a development team
+ Database Design
---

## 2. Getting Started
### Dependencies
To use this app you will require the following dependencies

    - PHP version 7.4.0+, 
    - MySQL version 5.6 + 
    - Composer version 1+
    - PHPUnit version 6.5+
---

## 3. Install and Setup
### 3.1 Backend

1. Clone this repo: `git clone git@github.com:Carinav/2022-aug-restaurant-api.git`
2. Navigate into the newly created repo: `cd 2022-aug-restaurant-api`
3. From the root of the project run: `composer install`
4. To run the application locally run: `composer start`
5. Run this command in the application directory to run the test suite: `composer test`

### 3.2 Database

This project was built within a docker environment with a custom configuration for the database connection. As such you
may need to update your local settings to connect to the database. If so complete the following within `2022-aug-restaurant-api`:

[//]: # (1. Navigate to `docs/json_to_DB.php` and change `$host = 'db'` to `$host = '127.0.0.1'`)

[//]: # (2. Then navigate to `src/DataAccess/Database.php` and change `$host = 'db'` to `$host = '127.0.0.1'`)

To set the database up locally:

1. Create a new database in your MySQL Database GUI called `restaurantorders`
2. Import the sql file  `docs/restaurant_api_db_creation.sql` and run it
3. You should now have four new tables in this database called `menu_items`, `order_items`, `orders` and `statuses`
---

## 4. Using the API

[//]: # (To update as we progress through each story)
## Authors
Carina Volkes - [@Carinav](https://github.com/Carinav)

Henry Percy - [@henryppercy](https://github.com/henryppercy)

Pedro Nunes- [@TherealGuah](https://github.com/TherealGuah)

Phone Naing - [@PNaing107](https://github.com/PNaing107)
