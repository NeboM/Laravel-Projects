<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Resources\Student as StudentResource;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->first_name = $request['first_name'];
        $student->last_name = $request['last_name'];
        $student->address = $request['address'];
        $student->email = $request['email'];
        $student->description = $request['description'];

        if($student->save()){
            return new StudentResource($student);
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
        $student = Student::findOrFail($id);
        return new StudentResource($student);
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
        $student = Student::findOrFail($request->id);

        $student->first_name = $request['first_name'];
        $student->last_name = $request['last_name'];
        $student->address = $request['address'];
        $student->email = $request['email'];
        $student->description = $request['description'];

        if($student->save()){
            return new StudentResource($student);
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
        $student = Student::findOrFail($id);

        if($student->delete()){
            return new StudentResource($student);
        }
    }
}
