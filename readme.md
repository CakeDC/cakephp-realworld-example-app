# ![CakePHP RealWorld Example App](logo.png)

> ### Example CakePHP codebase containing real world examples (CRUD, auth, advanced patterns and more) that adheres to the [RealWorld](https://github.com/gothinkster/realworld-example-apps) spec and API.

This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

## Installation

Please check the official cakephp installation guide for server requirements before you start. [Official Documentation](https://book.cakephp.org/3.0/en/installation.html)

Clone the repository

    git clone git@github.com:CakeDC/cakephp-realworld-example-app.git

Switch to the repo folder

    cd cakephp-realworld-example-app

Install all the dependencies using composer

    composer install

Copy the example app config file and make the required configuration changes in the config/app.php file

    cp config/app.php.default config/app.php

Run the database migrations (**Set the database connection in app.php**)

    bin/cake migrations migrate
	
Start the local development server

    bin/cake server

You can now access the server at http://localhost:8765
	
## API Specification

This application adheres to the api specifications set by the [Thinkster](https://github.com/gothinkster) team. This helps mix and match any backend with any other frontend without conflicts.

> [Full API Spec](https://github.com/gothinkster/realworld/tree/master/api)

For more information on how to this works with other frontends/backends, head over to the [RealWorld](https://github.com/gothinkster/realworld) repo.


# How it works

----------

# Code overview

## Dependencies

- [cakedc/cakephp-api](https://github.com/cakedc/cakephp-api) - For easy REST api implementation.
- [muffin/slug](https://github.com/UseMuffin/Slug) - For auto generation of unique slugs.
- [muffin/tags](https://github.com/UseMuffin/Tags) - For tags managements.
- [cakephp/authentication](https://github.com/cakephp/authentication) - For authentication using JSON Web Tokens

## Folders

- `src` - Contains all the application logic.
- `config` - Contains all the application configuration files.
- `src/Model/Entity` - Contains all cakephp ORM entites.
- `src/Model/Table` - Contains all cakephp ORM tables.
- `app/Service` - Contains application services that represents root api endpoints.
- `app/Service/Action` - Contains application endpoints logic logic.
- `app/Service/Renderer` - Contains the final api response formatter.
- `app/config/Migrations` - Contains all the database migrations.

## Environment configuration

- `config/app.php` - Configuration settings can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the cakephp development server

    bin/cake server

The api can now be accessed at

    http://localhost:8765/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|
| Optional 	| Authorization    	| Token {JWT}      	|

Refer the [api specification](#api-specification) for more info.

----------
 
# Authentication
 
This applications uses JSON Web Token (JWT) to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The JWT authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.
 
- https://jwt.io/introduction/
- https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html

----------

# Cross-Origin Resource Sharing (CORS)
 
This applications has CORS enabled by default on all API endpoints. The default configuration allows requests from `http://localhost:3000` and `http://localhost:4200` to help speed up your frontend testing. The CORS allowed origins can be changed by setting them in the config file. Please check the following sources to learn more about CORS.
 
- https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
- https://en.wikipedia.org/wiki/Cross-origin_resource_sharing
- https://www.w3.org/TR/cors
