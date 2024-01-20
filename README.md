# The following credentials provide access to the application as administrator
email: achil@email.com
password: achil1234

or

email: odin@email.com
password: odin1234

# WEB DEVELOPMENT 1 PROJECT

Welcome to the Recipe App, a platform for exploring and managing awesome recipes. Dive into a world of culinary delights with diverse recipe categories such as salads, pasta, fish, meat, and desserts.

## Features
User-Friendly Navigation:
Easily explore recipes across five categories, making it simple to find the perfect dish for any occasion. Navigate through categories via a dropdown menu in the navigation bar, search for recipes, and build your list of favorites.

Ingredient-Based Search:
Use the search by ingredient option on the home page to discover recipes that match your preferred ingredients.

User Accounts:
Sign up and log in to create your account. Once logged in, you can save and manage your favorite recipes.

Favorite Recipes:
Build and maintain your list of favorite recipes. Add and remove recipes at your convenience. Every recipe card in a category offers the option to be added to your favorites list. The recipe cards that appear in your favorites list offer the option to be removed from it.

Administrator Privileges:
A designated administrator can access the Content Management System (CMS) feature, allowing for CRUD operations on both recipes and user accounts.

### Administrator's Guide
For administrators, the CMS feature provides the following capabilities:

Recipe Management:
Create, read, update, and delete recipes effortlessly.

User Management:
Manage user accounts with the ability to create, update, and delete user profiles.
User password modification is not permitted.


# Docker template for PHP projects
This repository provides a starting template for PHP application development.

It contains:
* NGINX webserver
* PHP FastCGI Process Manager with PDO MySQL support
* MariaDB (GPL MySQL fork)
* PHPMyAdmin

## Installation

1. Install Docker Desktop on Windows or Mac, or Docker Engine on Linux.
1. Clone the project

## Usage

In a terminal, run:
```bash
docker-compose up
```

NGINX will now serve files in the app/public folder. Visit localhost in your browser to check.
PHPMyAdmin is accessible on localhost:8080

If you want to stop the containers, press Ctrl+C. 
Or run:
```bash
docker-compose down
```
