<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// List only the students / courses
Route::get('students','StudentsController@index');
Route::get('courses','CoursesController@index');

// List only single student / course
Route::get('student/{id}','StudentsController@show');
Route::get('course/{id}', 'CoursesController@show');

// Add student / course
Route::post('student','StudentsController@store');
Route::post('course', 'CoursesController@store');

// Update student / course
Route::put('student','StudentsController@update');
Route::put('course', 'CoursesController@update');

// Delete student / course
Route::delete('student/{id}','StudentsController@destroy');
Route::delete('course/{id}', 'CoursesController@destroy');

// List all the students with all the courses each follows
Route::get('students/courses','StudentsCoursesController@index');

// List a single student with all the courses that he follows.
Route::get('student/{id}/courses','StudentsCoursesController@show');

// Add relationship - enroll a student in a course
Route::post('student/course','StudentsCoursesController@store');

// Delete the relationship
Route::delete('student/{id}/course','StudentsCoursesController@destroy');





