<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentCRUD extends Controller
{
    function addStudent(Request $request)
    { //TODO

        $name = $request->input('name');
        $ksuId = $request->input('ksuId');

        $student = Student::create([
            "name" => "$name",
            "ksuId" => "$ksuId"
        ]);
        return $student;
    }

    function getStudent()
    { //TODO
        $students = Student::all();
        return $students;
    }

    function getOneStudent($id)
    { //TODO
        $students = Student::find($id);
        return $students;
    }

    function deleteStudent($id)
    { //TODO
        $students = Student::find($id);
        $students->delete();
        return "Student deleted";
    }



    function updateAllStudent(Request $request, $id, $name, $ksuId)
    { //TODO
        $students = Student::find($id);
        $students->name = $name;
        $students->ksuId = $ksuId;
        $students->save();
        return $students;
    }

    function updateSomeStudent(Request $request, $id, $name)
    { //TODO
        $students = Student::find($id);
        $students->name = $name;
        $students->save();
        return $students;
    }
}
