<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller {

    public function index () {
        return view('admin.index');
    }

    public function student () {
        return view('admin.student');
    }

    public function teacher () {
        return view('admin.teacher');
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
                Session::put('admin', 'success');
                return redirect('admin');
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

    public function excelImport (Request $request, $id) {
        if($id == 'student' && $request->isMethod('POST')){
            // var_dump($_FILES);
            $file = $request->file('source');
            // dd($file);
            //文件是否上传成功
            if($file->isValid()){

                //文件信息
                $originalname = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();
                $filename = date('Y-m-d-H-m-s').'-'.uniqid().'.'.$ext;
//                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                Excel::load($realPath, function($reader) {
                    var_dump($reader->all());
                });
//                var_dump($id);
//                var_dump($file);

            }
            exit;
        }
//        return view('student.upload');
    }

    public function export(){
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create('student',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

}
