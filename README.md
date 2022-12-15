
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
5. The API can be accessed at port `8080` or whichever is specified in the terminal
6. Run this command in the application directory to run the test suite: `composer test`

### 3.2 Database

This project was built within a docker environment with a custom configuration for the database connection. As such you
may need to update your local settings to connect to the database. If so complete the following within `2022-aug-restaurant-api`:

1. Navigate to `src/DataAccess/Database.php` and change `$host = 'db'` to `$host = '127.0.0.1'`

To set the database up locally:

1. Create a new database in your MySQL Database GUI called `restaurantorders`
2. Import the sql file  `docs/restaurant_api_db_creation.sql` and run it
3. You should now have four new tables in this database called `menu_items`, `order_items`, `orders` and `statuses`

### 3.3 Frontend

This backend was built to be used in conjunction with a frontend which was built as part of a 
final project by another group also on [iO Academy Full Stack Track course](https://io-academy.uk/).
If you wish to use this, navigate to `https://github.com/fatimaseghir/restaurant-order-tracking-fe` and follow the installation instructions.

---

## 4. Using the API

### Return all menu items

* **URL**

  `/menu`

* **Method:**

  `GET`

* **URL Params**

  There are no URL params

  **Example:**

  `/menu`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
    "success": 1, 
    "message": "Menu successfully retrieved.",
    "data":
    [
        {
            "id": 1,
            "name": "Classic Burguer",
            "description": "A delicious beef burger with all the fixings, including lettuce, tomato, onion, pickles, ketchup, and mustard",
            "price": 8.99,
            "imageURL": "https://images.unsplash.com/photo-1572448862527-d3c904757de6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80",
            "imageAlt": "Classic Burger"
        },
        {
            "id": 2,
            "name": "BBQ Burguer",
            "description": "A beef burger topped with smoky BBQ sauce, crispy onion rings, and melted cheddar cheese",
            "price": 7.99,
            "imageURL": "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1299&q=80",
            "imageAlt": "BBQ Burger"
        }
    ]
  }
  ```

* **Error Responses:**
    * **Code:** 400 BAD REQUEST<br />
      **Content:** `{"message": "Something went wrong.", "data": []}`<br />
      
    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Something went wrong.", "data": []}`

### Create New Order

* **URL**

  `/orders`

* **Method:**

  `POST`

* **URL Params**

  There are no URL params

  **Example:**

  `/orders`

* **Body Data:**

  ```json
        {
            "customerName": "Donald Duck",
            "customerEmail": "therealDonald@duckmail.com",
            "deliveryAddress": "13 Bell St, St Andrews, Fife, KY16 9UR"
        }
  ```
* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{"message": "Successfully created new order",
      "data": {"orderNumber": 12}}`

* **Error Responses:**
  * **Code:** 400 BAD REQUEST<br />
    **Content:** `{"message": "Something went wrong.", "data": []}`
  * **If email is not valid** <br />
    **Code:** 400 BAD REQUEST<br />
    **Content:** `{"message": "Email is not valid.", "data": []}`
  * **If there was a server error** <br />
    **Code:** 500 SERVER ERROR <br />
    **Content:** `{"message": "Something went wrong.", "data": []}`

### Add New Item to Order

* **URL**

    `/additems/{orderNumber}`

* **Method:**

  `POST`

* **URL Params** <br />
There are no URL params

  **Example:**

  `/additems/3`

* **Body Data:**

  ```json
      {
          "menuItemNumber": 1,
          "quantity": 3
      }
  ```
* **Success Response:**

    * **Code:** 200 <br />
      **Content:** `{"message": "Item successfully added.",
      "data": []`


* **Error Responses:**

    * **If the order number does not exist** <br />
      **Code:** 400 BAD REQUEST<br />
      **Content:** `{"message": "Order number doesn't yet exist.", "data": []}`
    * **If the order is not active** <br />
      **Code:** 400 BAD REQUEST<br />
      **Content:** `{"message": "Order is not in progress.", "data": []}`
    * **If it is not a valid menu item**
      **Code:** 400 BAD REQUEST<br />
      **Content:** `{"message": "Menu item doesn't exist.", "data": []}`
    * **If the menu item has already been added to the order** <br />
      **Code:** 400 BAD REQUEST<br />
      **Content:** `{"message": "Menu item already added to order.", "data": []}`
    * **If the menu item has a quantity of zero or below** <br />
      **Code:** 400 BAD REQUEST<br />
      **Content:** `{"message": "Item quantity should be above zero.", "data": []}`
    * **If there was a server error** <br />
      **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Something went wrong.", "data": []}`

### Delete Item from Order

* **URL**

  `/deleteitems/{orderNumber}`

* **Method:**

  `DELETE`

* **URL Params** <br />
  There are no URL params

    **Example:**

  `/deleteitems/3`

* **Body Data:**

  ```json
      {
          "menuItemNumber": 1
      }
  ```
* **Success Response:**

    * **Code:** 200 <br />
      **Content:** `{"message": "Item successfuly deleted.",
      "data": []`


* **Error Responses:**

  * **If the order number does not exist** <br />
    **Code:** 400 BAD REQUEST<br />
    **Content:** `{"message": "Order number doesn't yet exist.", "data": []}`
  * **If the order is not active** <br />
    **Code:** 400 BAD REQUEST<br />
    **Content:** `{"message": "Order is not in progress.", "data": []}`
  * **If it is not a valid menu item**
    **Code:** 400 BAD REQUEST<br />
    **Content:** `{"message": "Menu item doesn't exist.", "data": []}`
  * **If the menu item didn't exist in the order** <br />
    **Code:** 400 BAD REQUEST<br />
    **Content:** `{"message": "Menu item didn't exist in order.", "data": []}`
  * **If there was a server error** <br />
    **Code:** 500 SERVER ERROR <br />
    **Content:** `{"message": "Something went wrong.", "data": []}`

  
---


## Authors
Carina Volkes - [@Carinav](https://github.com/Carinav)

Henry Percy - [@henryppercy](https://github.com/henryppercy)

Pedro Nunes- [@TherealGuah](https://github.com/TherealGuah)

Phone Naing - [@PNaing107](https://github.com/PNaing107)

