# Evalnode - CBT

> ### Evalnode is an online multi-tenant app for online assessments 

This repo is under development!

----------
# Getting started

## Installation
Please check the official laravel 6 installation guide for installing via composer before you start. [Official Documentation](https://laravel.com/docs/6.x)

Open the bash terminal

Clone the repository

````
git clone 
````

Switch to the repo folder

````
cd 
````

Install all the dependencies using composer

````
composer install
````

Copy the example env file and make the required configuration changes in the .env file

````
cp .env.example .env
````
- you need to makesure the name of the databse is the same on line 12 of the .env file. ensure line 12,13 & 14 are correct 

Run the database migrations (**Set the database connection in .env before migrating**) and seed the default users and configurations

````
php artisan migrate --seed
````


**TL;DR command list**

    git clone 
    cd 
    composer install
    cp .env.example .env
    
**Make sure you set the correct database connection information before running the migrations in the .env file** [Environment variables](#environment-variables)

    php artisan migrate --seed
    php -S localhost:8000 -t public

**OR**

    php artisan serve
    
   
## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------
