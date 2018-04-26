<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function index () {
        return view('admin.index');
    }

    public function student () {
        return view('admin.student');
    }

    public function login (Request $req) {

        if ($req->isMethod('post')){

            $validator = \Validator::make($req->input(), [
                'Admin.admin_id' => 'required|integer',
                'Admin.password' => 'required'
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数'

            ], [
                'Admin.admin_id' => '工号',
                'Admin.password' => '密码'
            ]);


//            $data = $req->input('Student');
//            if (Student::create($data)) {
//                return redirect('student/index')->with('success', '添加成功');
//            } else {
//                return redirect()->back()->with('error', '添加失败!');
//            }

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }


            $data = $req->input('Admin');
            $adminer = Admin::where('admin_id', '=', '1000000000')->first();
            if ($adminer['attributes']['admin_id'] == $data['admin_id'] && $adminer['attributes']['password'] == $data['password']) {
                return redirect('admin')->with('admin', 'logining');
            } else {
                return redirect()->back()->with('error', '用户名或者密码错误!');
            }

//            return view('common.login', [
//                'data' => $data
//            ]);
//            var_dump($data);

        }

        return view('common.login');
    }

}
