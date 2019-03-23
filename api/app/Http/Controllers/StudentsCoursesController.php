<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Http\Resources\StudentCourse as StudentCourseResource;

class StudentsCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return StudentCourseResource::collection($students);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::findOrFail($request['student_id']);
        $course = Course::findOrFail($request['course_id']);
        /**
         * Before we attach we should check if the relationship already exists,
         * so we don't get Duplicate Entry error
         */
        $student->courses()->attach($course);

        return new StudentCourseResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return new StudentCourseResource($student);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $student = Student::findOrFail($id);
        $course = Course::findOrFail($request['course_id']);
        $student->courses()->detach($course);
        return new StudentCourseResource($student);

    }
}
