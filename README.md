# APP FOR STORING ARCHIVE DATA

This app stores data from the Temettuat survey books kept in the Ottoman archives in Istanbul into a database.

## Database

The app uses a MySQL database to organize historical data from an Ottoman survey. An entry in `household` table is assigned to each household member, while their sources of income and payed taxes are stored in respective relational tables (`occupation_household`, `land_household`, `real_estate_household`, `livestock_household` and `tax_household`). Different occupations, land types, real estate, livestock and tax types are also stored in their respective tables (`occupation`, `land`, `real_estate`, `livestock` and `tax`). Settlement names are stored in `location_name` table, while types of settlements are stored in `location_type` table. `Occupation` and `location_name` are self-referential tables.

## Input Form

The app has a dynamic input form for creating entries for each household member listed in the registers. Since every household member can have more than one occupation, possess multiple land, real estate or livestock and pay multiple taxes, the form uses AJAX with JavaScript to increase or decrease the number of input fields. PHP is used for storing information into the database.

## Other Options

**Browse households** section will show all available info for the chosen household id. **Household list** shows the list of all households, with links to examine details for every individual household. Households can be edited or deleted.

## Setup

To set up the app in localhost (for XAMPP users) import the *assets/ottoman.sql* file into a MySQL database (via phpMyAdmin), adjust database connection in the *config.php* file and copy the entire project folder to *xampp/htdocs*.
