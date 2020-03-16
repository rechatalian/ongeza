If you are using xampp on local PC (assuming xampp is installed and running):
1. Copy 'ongeza' folder to C:\xampp\htdocs
2. Open phpmyadmin, and manually create database called 'ongeza_test' then import the db dump file "create_database.sql" or 
  simply open "create_database.sql" and copy file content and paste on SQL pane and run the script.
3. Change database connection settings by editing the file ongeza/includes/config.php
  - you can change credentials if your pc (mysql server - phpmyadmin) is using different credentials
  - do not change the database name
4. Open browser and on the url enter "localhost/ongeza/index.php to start using the application


If you are using apache server:
1. Copy folder 'ongeza' to the http root folder
2. import the database dump file "create_database.sql" to the mysql server
2. Change database connection settings by editing the file ongeza/includes/config.php
  - change "localhost" to IP address of the server, you can change credentials if your server is using different credentials
  - do not change the database name
3. Open browser and on the url enter "your-server-ip-address/ongeza/index.php to start using the application

Note: 
JavaScript file can be found at ongeza/includes/resources/myScript.js
