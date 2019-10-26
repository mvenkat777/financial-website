## Financial Website - Certificates Management
### Documentation

- Refer to "class_diagram.pdf" file for technical overiew of the application developed and it also covers the request life cycle of rendering a web page from request to response.  
   	
### Instructions to run application inside docker
-  Download the financial-website zip folder provided
-  Run file database-schema/financialwebsite.sql at mysql database 	 	
-  Make sure to change the mysql database connection credentials at DatabaseSetup.php 	
-  cd financial-website
-  php -S localhost:8000 -t .
-  Run http://localhost:8000/ in chrome to see the financial website running


### List of tasks accomplished

- Created certificate with isin, trading market, currency, issuer, issuing_price and current_price
- Created bonus certificate with special parameter of barrier level along with above parameters
- Created guarantee certificate with special parameter of participation rate along with above parameters
- Update certificate with one or more fields at once
- Logged prices history during update of certificate
- Update standard certificate to bonus or gurantee certificate with their respective parameters
- Display HTML: Show full details of certificate
- Display XML: Generated XML for standard and bonus certificate and threw message for guarantee certificate
- Designed DB and associated models for certificates, prices history and their documents