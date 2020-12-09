# CPSC 471 - Hotel Management System: User Guide
Submited by

Patricia Lively - 30061152

Carmen Khuu - 10061552

Hamza Gohar - 30066720


## Installation

To use the API and make requests, a web server and database server is required. For this guide, XAMPP will be used.

First, install XAMPP and start the Apache web server and the MariaDB database server.

Download the file titled
```cpsc471-hms.sql```

Navigate to phpMyAdmin on localhost and create a new database named cpsc471-hms. Import the sql file to the database.

Download the contents of the ```api``` folder and store in a location accessible by the web server.

## Usage

To test the API calls, Postman will be used in this example. Each folder inside the api folder contains create, read, update and delete requests (where applicable).

To run one of the requests, for example, past the link in Postman and enter a request in JSON format in the body section.

For example to retrieve all employees, in the link, put in the url to the read request:
```http://localhost/hotelmanagement/api/employee/read.php```
