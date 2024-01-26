

## About The Project: hotel management system

This project is intended to serve as the backend and main logic center of a hotel room reservation system. The project will serve the public booking website, the admin dashboard, the mobile application and the desktop app. The project will be designed to utilize the repository system design patterns, hence, providing a layer of abstraction and seperation of database logic and the controllers. It will also use the eloquent Observer design pattern to add emails notifications to queues for future dispatching. 

## Authentication

This project will be designed to use sanctum access tokens. This will provide a light weight and easy to use authentication system.

## Setup in local environment
You are most likely seeing this project on github. Simply update the composer dependencies and the the package.json dependencies. 

Be in the root directory of the project and type the following commands in the command line "composer install" and "npm install"

After installing of project dependencies simply serve the project with this command "php artisan serve"