# CPSC 471 - Hotel Management System: User Guide
Submited by

Patricia Lively - 30061152

Carmen Khuu - 10061552

Hamza Gohar - 30066720

### API Documentation
https://documenter.getpostman.com/view/13734852/TVmV5DtR#85875c7c-502f-41be-8f1e-ea4bab8bcfcb

## Installation

To use the API and make requests, a web server and database server is required. For this guide, XAMPP will be used.

First, install XAMPP and start the Apache web server and the MariaDB database server.

Download the file titled
```cpsc471-hms.sql```

Navigate to phpMyAdmin on localhost and create a new database named ```cpsc471-hms```. Import the sql file to the database.

Download the contents of the entire repository and store in a location accessible by the web server. For example, the localhost path to read all employees from the database should be:

```http://localhost/hotelmanagement/api/employee/read.php```

## Usage

### Testing API Endpoints on Postman
To test the API calls, Postman was used. Each folder inside the api folder contains create, read, update (where applicable) and delete requests.

To run one of the requests, for example, paste the link in Postman and enter a request in JSON format in the body section.

For example, to add a new customer named Dave Jones with the phone number 4032223333, in Postman, enter the URL:
```http://localhost/hotelmanagement/api/customer/create.php```

Change the HTTP method of the request to ```POST```.

Build a request in the body by clicking on the "Body" tab. The php files will attempt to decode JSON data, so to send the request, select the "raw" tab to send raw data, and change the format to JSON.

To send our request, enter the following data:

```
{
    "Phone": "4032223333",
    "Fname": "Dave",
    "Lname": "Jones"
}
```

Since the customer_id will automatically increment, the ```customer_id``` field is not required here. Hit send. If successful, a message that indicates a new customer has been successfully created will be displayed.

### Running Stored Procedures

To run the procedures  that is stored on the database, upon importing ```cpsc471-hms.sql``` to the ```cpsc471-hms``` database inside phpMyAdmin, select the database and click on the ```Routines``` tab (the ```Procedures``` button under the database will navigate to the same Routines tab as well).

To run a stored procedure, click on ```Execute```, and enter any required fields upon request.
