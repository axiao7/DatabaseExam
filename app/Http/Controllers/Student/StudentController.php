<?php

namespace App\Http\Controllers\Student;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    //
    public function index()
    {
        return view('student.index');
    }

    public function login (Request $req) {

        if ($req->isMethod('post')){

            $validator = \Validator::make($req->input(), [
                'Student.student_id' => 'required|integer',
                'Student.password' => 'required'
            ], [
                'required' => ':attribute 为必填项',
                'integer' => ':attribute 必须为整数'

            ], [
                'Student.student_id' => '学号',
                'Student.password' => '密码'
            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }


            $data = $req->input('Student');
            //$adminer = Admin::where('admin_id', '=', '1000000000')->first();
            $stus = Student::all();
//            dd($stus);
//            exit;
            foreach ($stus as $stu)
            {
                if ($stu['attributes']['student_id'] == $data['student_id'] && $stu['attributes']['password'] == $data['password']) {
                    Session::put('student', 'success');
                    return redirect('student');
                }
            }

            return redirect()->back()->with('error', '用户名或者密码错误!');

        }

        return view('student.login');
    }

    public function test()
    {
        return view('student.test');
    }
}
