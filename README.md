# How to use This Project

## Introduction

This is a project for a test of a company.

## Installation

1. Download this repository

2. Install dependencies: `composer install` and `npm install`

3. Create a copy of your .env file: `cp .env.example .env`

4. Generate an app encryption key: `php artisan key:generate`

5. Create an empty database for our application

6. In the .env file, add database information to allow Laravel to connect to the database

7. Migrate the database: `php artisan migrate`

8. Seed the database: `php artisan db:seed`

9. Run `npm run dev`

10. Start the server: `php artisan serve`

11. Visit `localhost:8000` in your browser
