# Online Voting System
 
* [Requirements](#feature1)
* [How to install](#feature2)
* [License](#feature3)

<a name="feature1"></a>
## Requirements
* PHP
* MySql
* Composer

<a name="feature2"></a>
## How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Create database](#step3)
* [Step 4: Install](#step4)
* [Step 5: Start Page](#step5)

-----
<a name="step1"></a>
### Step 1: Get the code

Download the repository and extract it.

Or clone respository

    git clone https://github.com/trungict/voting_system.git

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies

Laravel utilizes [Composer](http://getcomposer.org/) to manage its dependencies. First, download a copy of the composer.phar.
Once you have the PHAR archive, you can either keep it in your local project directory or move to
usr/local/bin to use it globally on your system.
On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).

Move inside project's folder, then run:

    composer install

-----
<a name="step3"></a>
### Step 3: Create database

You must create database with utf-8 collation(uft8_general_ci), to install and application work perfectly.

After that, copy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.

Linux:

    cp .env.example .env

Change DB information in .env file

    DB_CONNECTION=mysql
    DB_HOST={YOUR_DB_HOST}
    DB_PORT={YOUR_DB_PORT}
    DB_DATABASE={YOUR_DB_NAME}
    DB_USERNAME={YOUR_DB_USERNAME}
    DB_PASSWORD={YOUR_DB_PASSWORD}

-----
<a name="step4"></a>
### Step 4: Install

Generate application key

    php artisan key:generate

Now that you have the environment configured, you need to create a database configuration for it. For create database tables use this command:

    php artisan migrate --seed

-----
<a name="step5"></a>
### Step 5: Start Page

Use PHP's built-in development server to serve your application

    php artisan serve
    
You can access application in web browse at:

    http://localhost:8000

You can now login to administrator:

    username: admin@voting.example
    password: 123456
    
OR user

    username: trunglb@voting.example
    password: 123456

-----
<a name="feature3"></a>
## License

This is free software distributed under the terms of the MIT license
