# Laravel API

Example of an API in Laravel.

Database tables:
  - students
  - courses
##### Many-to-many relationship. 
##### Routes defined in routes/api.php.

#### Resources: 
    - Course.php
    - Student.php
    - StudentCourse.php
    
#### Controllers: 
    - CoursesController.php
    - StudentsController.php
    - StudentsCoursesController.php

###### Run: 
1. php artisan migrate
2. php artisan db:seed


You can use [postman](https://www.getpostman.com/) to test the application.
