# Usage Instructions

1. Please make sure you have PHP and MYSQL installed and running.
2. Once after downloading the app and moving it to the root folder of the local machine or test server, please update the .env file with the appropriate credentials in the following block:
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1    
    DB_PORT=3306    
    DB_DATABASE= *#DB_NAME#*   
    DB_USERNAME= *#DB_USER#*    
    DB_PASSWORD= *#DB_PASSWORD#*    
    
3. Once the database has been configured, please run the following command to create the table in the database:
    
    php artisan migrate
    
    With the above command, the application will create the table structure on the database, so that the application can be functional.
3. Now the server is ready to run. Please start the application server with the following command:

    php artisan serve
    
    The above command will start the server on port 8000 by default. The application can be launched by the following ip address:
    
    http://127.0.0.1:8000 or http://localhost:8000

I have used laravel 5.3 for creating the CRUD application and AngularJS for the user interface. 
Since I am working on a single webpage, I didnt separte the application as 2 different section such as front-end and back-end, instead I set it inside the laravel as it would stay even. It can also be set as separate application if needed.
CSS has been managed by using bootstrap which has been supplied along with the laravel. 

Since this is a demo app, I didn't download any of the files onto the local machine. Instead I have attached the code directly from google CDN onto index page. It includes the links to Angularjs, Font-awesome etc...

If you have any trouble in running the application, please feel free to contact me **Harisankar.M.R** anytime on *mrsank@live.in*.

**Thanks**.

