# Laravel Library
### Author: Javier Alejandro Garcia Hernandez

#Dependencies

For the installation you will need :

- composer v2
- node (to use npm)
- php 7.3 or up

#How to Install

After downloading the project you will need to run the following commands: 

``composer install``

``npm install``

``npm run prod``

After installing al dependencies you need to run the migrations to create the database:

in your ".env" add your database connection and then run:

``php artiasn migrate``

If you want to  populate the database i created som factories, you can run 

``php artiasn migrate --seed``

#How to run the project

you can use the command 
``php artisan serve`` to run the Laravel server
