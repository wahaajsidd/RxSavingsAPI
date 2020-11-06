# Rx Savings API to get closest pharmacies
**Programming language used:**
<br/>•	PHP 5.6
<br/>•	Lumen Framework 5.4
<br/><br/>**Database:**
<br/>•	MySQL
<br/><br/>**Dependencies:**
<br/>•	Composer 2.0.4


## Official Documentation

Documentation for the API can be found in the email.

## Explanation

Lumen is used to create a single endpoint API that takes location as an input and returns the closest pharmacy to entered coordinates. The controller of the API calls the Pharmacy model which gets the data from the database. The query calculates the closest distance from the provided latitude and longitude. The output of the API has Name, Address, City, State, Zip and Miles in a consumable response packet.