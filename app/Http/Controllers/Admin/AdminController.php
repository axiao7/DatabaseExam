<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Choice;
use App\Http\Controllers\Controller;
use App\Student;
use App\Subject;
use App\Teacher;
use App\TestPaper;
use App\Torf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function student()
    {
        return view('admin.student');
    }

    public function teacher()
    {
        return view('admin.teacher');
    }

    public function login(Request $req)
    {

        if ($req->isMethod('post')) {

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

            if ($validator->fails()) {
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

    public function excelImport(Request $request, $id)
    {
        if ($id == 'teacher' && $request->isMethod('POST')) {
            // var_dump($_FILES);
            $file = $request->file('source');
            // dd($file);
            //文件是否上传成功
            if ($file->isValid()) {
                //文件信息
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();
                Excel::load($realPath, function ($reader) {
                    $reader->each(function ($rows) {
                        $teacher = new Teacher();
                        $teacher->teacher_id = $rows[0];
                        $teacher->password = $rows[1];

                        if (!$teacher->save()) {
                            return redirect()->back()->with('error', '添加失败!');
                        }

                    });
                });
                return redirect()->back()->with('success', '添加成功!');
            }
            exit;
        }
        if ($id == 'student' && $request->isMethod('POST')) {
            // var_dump($_FILES);
            $file = $request->file('source');
            // dd($file);
            //文件是否上传成功
            if ($file->isValid()) {
                //文件信息
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();
                Excel::load($realPath, function ($reader) {
                    $reader->each(function ($rows) {
                        $student = new Student();
                        $student->student_id = $rows[0];
                        $student->password = $rows[1];
                        $student->name = $rows[2];
                        $student->class = $rows[3];

                        if (!$student->save()) {
                            return redirect()->back()->with('error', '添加失败!');
                        }

                    });
                });
                return redirect()->back()->with('success', '添加成功!');
            }
            exit;
        }

    }

    public function export()
    {
        $cellData = [
            ['学号', '姓名', '成绩'],
            ['10001', 'AAAAA', '99'],
            ['10002', 'BBBBB', '92'],
            ['10003', 'CCCCC', '95'],
            ['10004', 'DDDDD', '89'],
            ['10005', 'EEEEE', '96'],
        ];
        Excel::create('student', function ($excel) use ($cellData) {
            $excel->sheet('score', function ($sheet) use ($cellData) {
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    public function check_paper($paper_id)
    {

        $topic = TestPaper::find($paper_id);

        if (!$topic) {
            if ($paper_id==1) {
                return view('admin.check_paper_A',[
                    'no_paper' => 1,
                    'no_info' => 1,
                ]);
            } else if ($paper_id==2){
                return view('admin.check_paper_B',[
                    'no_paper' => 1,
                    'no_info' => 1,
                ]);
            } else ;
        }

        if ($topic->check_or_not==1) {
            $choices[0] = Choice::find($topic->choice_1);
            $choices[1] = Choice::find($topic->choice_2);
            $choices[2] = Choice::find($topic->choice_3);
            $choices[3] = Choice::find($topic->choice_4);
            $choices[4] = Choice::find($topic->choice_5);
            $choices[5] = Choice::find($topic->choice_6);
            $choices[6] = Choice::find($topic->choice_7);
            $choices[7] = Choice::find($topic->choice_8);
            $choices[8] = Choice::find($topic->choice_9);
            $choices[9] = Choice::find($topic->choice_10);

            $choices[10] = Choice::find($topic->choice_11);
            $choices[11] = Choice::find($topic->choice_12);
            $choices[12] = Choice::find($topic->choice_13);
            $choices[13] = Choice::find($topic->choice_14);
            $choices[14] = Choice::find($topic->choice_15);
            $choices[15] = Choice::find($topic->choice_16);
            $choices[16] = Choice::find($topic->choice_17);
            $choices[17] = Choice::find($topic->choice_18);
            $choices[18] = Choice::find($topic->choice_19);
            $choices[19] = Choice::find($topic->choice_20);

            $torfs[0] = Torf::find($topic->torf_1);
            $torfs[1] = Torf::find($topic->torf_2);
            $torfs[2] = Torf::find($topic->torf_3);
            $torfs[3] = Torf::find($topic->torf_4);
            $torfs[4] = Torf::find($topic->torf_5);
            $torfs[5] = Torf::find($topic->torf_6);
            $torfs[6] = Torf::find($topic->torf_7);
            $torfs[7] = Torf::find($topic->torf_8);
            $torfs[8] = Torf::find($topic->torf_9);
            $torfs[9] = Torf::find($topic->torf_10);

            $subjects[0] = Subject::find($topic->subject_1);
            $subjects[1] = Subject::find($topic->subject_2);
            $subjects[2] = Subject::find($topic->subject_3);
            $subjects[3] = Subject::find($topic->subject_4);
            $subjects[4] = Subject::find($topic->subject_5);

            $id = 1;

            if ($paper_id==1) {
                return view('admin.check_paper_A',[
                    'no_paper' => 0,
                    'no_info' => 0,
                    'choices' => $choices,
                    'torfs' => $torfs,
                    'subjects' => $subjects,
                    'id' => $id,
                ]);
            } else if ($paper_id==2){
                return view('admin.check_paper_B',[
                    'no_paper' => 0,
                    'no_info' => 0,
                    'choices' => $choices,
                    'torfs' => $torfs,
                    'subjects' => $subjects,
                    'id' => $id,
                ]);
            } else ;

        } else {
            if ($paper_id==1) {
                return view('admin.check_paper_A',[
                    'no_paper' => 0,
                    'no_info' => 1,
                ]);
            } else if ($paper_id==2){
                return view('admin.check_paper_B',[
                    'no_paper' => 0,
                    'no_info' => 1,
                ]);
            } else ;
        }
    }

    public function submit_checkinfo(Request $req)
    {
        $_info = $_POST['info'];
        $_id = $_POST['paper_id'];
        $paper = TestPaper::find($_id);
        $paper->pass_or_not = $_info;
        if ($paper->save()) {
            return response()->json(array('msg'=> 'success'), 200);
        }
    }

}