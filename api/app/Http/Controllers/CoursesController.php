<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Resources\Course as CourseResource;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return CourseResource::collection($courses);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();

        $course->name = $request['name'];
        $course->num_classes = $request['num_classes'];

        if($course->save()){
            return new CourseResource($course);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return new CourseResource($course);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $course = Course::findOrFail($request->id);

        $course->name = $request['name'];
        $course->num_classes = $request['num_classes'];

        if($course->save()){
            return new CourseResource($course);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if($course->delete()){
            return new CourseResource($course);
        }
    }
}
