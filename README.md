# Robot Move Application

## Introduction

The Robot Move Application is a program that controls the movement of a robot. It allows the user to specify different commands to make the robot move in various directions.

## Usage

To use the Robot Move Application, follow these steps:

1. Install the application by running the following commands:
    ```bash
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan storage:link
    php artisan serve
    ```
2. Call {{base_url}}/robot/movement url and pass move input to it



