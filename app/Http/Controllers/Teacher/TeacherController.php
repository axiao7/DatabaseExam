<?php

namespace App\Http\Controllers\Teacher;

use App\Choice;
use App\Subject;
use App\Teacher;
use App\TestPaper;
use App\Torf;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    //protected $testpaper_id = 0;

    //教师首页
    public function index () {
        return view('teacher.index');
    }

    public function login (Request $req) {

        if ($req->isMethod('post')){

            $validator = \Validator::make($req->input(), [
                'Teacher.teacher_id' => 'required|integer',
                'Teacher.password' => 'required'
            ], [
                'required' => ':attribute 为必填项',
                'integer' => ':attribute 必须为整数'

            ], [
                'Teacher.teacher_id' => '工号',
                'Teacher.password' => '密码'
            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }


            $data = $req->input('Teacher');
            $teas = Teacher::all();
//            dd($stus);
//            exit;
            foreach ($teas as $tea)
            {
                if ($tea['attributes']['teacher_id'] == $data['teacher_id'] && $tea['attributes']['password'] == $data['password']) {
                    Session::put('teacher', 'success');
                    return redirect('teacher');
                }
            }

            return redirect()->back()->with('error', '用户名或者密码错误!');

        }

        return view('teacher.login');
    }

    // 题库管理部分
    public function bankhome()
    {
        return view('teacher.questionbank.home');
    }

    // 单选题
    public function choice () {
        $choices = Choice::get();

        //dd($choices);

        return view('teacher.questionbank.choicequestion',[
            'choices' => $choices,
            'id_' => 1,
        ]);
    }

    // 判断题
    public function torf () {
        $torfs = Torf::get();

        return view('teacher.questionbank.trueorfalse',[
            'torfs' => $torfs,
            'id_' => 1,
        ]);
    }

    // 主观题
    public function subject () {
        $subjects = Subject::get();

        return view('teacher.questionbank.subjectitem',[
            'subjects' => $subjects,
            'id_' => 1,
        ]);
    }

    // 文件上传
    public function excelImport (Request $request, $name) {
        if($name == 'choice' && $request->isMethod('POST')){
            // var_dump($_FILES);
            $file = $request->file('source');

//            if($file->isValid()) {
//                dd($file);
//                exit;
//            }

            //文件是否上传成功
            if($file->isValid()){
                //文件信息
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();
                Excel::load($realPath, function($reader) {
                    $reader->each(function ($rows) {
                        $choice = new Choice();
                        $choice->topic_content = $rows[0];
                        $choice->option_A = $rows[1];
                        $choice->option_B = $rows[2];
                        $choice->option_C = $rows[3];
                        $choice->option_D = $rows[4];
                        $choice->right_answer = $rows[5];
                        $choice->difficulty = $rows[6];

                        if (!$choice->save()) {
                            return redirect()->back()->with('error', '添加失败!');
                        }

                    });
                });
                return redirect()->back()->with('success', '添加成功!');
            }
            exit;
        }

        if($name == 'torf' && $request->isMethod('POST')){
            // var_dump($_FILES);
            $file = $request->file('source');
//            if($file->isValid()) {
//                dd($file);
//                exit;
//            }
            // dd($file);
            //文件是否上传成功
            if($file->isValid()){
                //文件信息
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();
                Excel::load($realPath, function($reader) {
                    $reader->each(function ($rows) {
                        $torf = new Torf();
                        $torf->topic_content = $rows[0];
                        $torf->right_answer = $rows[1];
                        $torf->difficulty = $rows[2];

                        if (!$torf->save()) {
                            return redirect()->back()->with('error', '添加失败!');
                        }

                    });
                });
                return redirect()->back()->with('success', '添加成功!');
            }
            exit;
        }

        if($name == 'subject' && $request->isMethod('POST')){
            // var_dump($_FILES);
            $file = $request->file('source');
            // dd($file);
            //文件是否上传成功
            if($file->isValid()){
                //文件信息
                $ext = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();
                Excel::load($realPath, function($reader) {
                    $reader->each(function ($rows) {
                        $subject = new Subject();
                        $subject->topic_content = $rows[0];
                        $subject->right_answer = $rows[1];
                        $subject->difficulty = $rows[2];

                        if (!$subject->save()) {
                            return redirect()->back()->with('error', '添加失败!');
                        }

                    });
                });
                return redirect()->back()->with('success', '添加成功!');
            }
            exit;
        }

    }

    public function deletechoice($id)
    {
        if (Choice::find($id)->delete()) {
            return redirect()->back()->with('success', '删除成功!');
        } else {
            return redirect()->back()->with('error', '删除失败!');
        }

    }

    public function deletetorf($id)
    {
        if (Torf::find($id)->delete()) {
            return redirect()->back()->with('success', '删除成功!');
        } else {
            return redirect()->back()->with('error', '删除失败!');
        }

    }

    public function deletesubject($id)
    {
        if (Subject::find($id)->delete()) {
            return redirect()->back()->with('success', '删除成功!');
        } else {
            return redirect()->back()->with('error', '删除失败!');
        }

    }

    // 组合试卷部分
    // 组卷首页
    public function paperhome()
    {
        return view('teacher.createtestpaper.home');
    }

    public function seekpaper($paper_id)
    {
        $topic = TestPaper::find($paper_id);

        if ($topic) {
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
                return view('teacher.createtestpaper.paper_A',[
                    'no_info' => 0,
                    'choices' => $choices,
                    'torfs' => $torfs,
                    'subjects' => $subjects,
                    'id' => $id,
                ]);
            } else if ($paper_id==2){
                return view('teacher.createtestpaper.paper_B',[
                    'no_info' => 0,
                    'choices' => $choices,
                    'torfs' => $torfs,
                    'subjects' => $subjects,
                    'id' => $id,
                ]);
            } else ;

        }
        else if ($paper_id==1){
            return view('teacher.createtestpaper.paper_A',[
                'no_info' => 1,
            ]);
        }
        else if ($paper_id==2){
            return view('teacher.createtestpaper.paper_B',[
                'no_info' => 1,
            ]);
        } else ;


    }

    public function makepaper(Request $req)
    {
//        if ($req->isMethod('post')) {
//        $data = $req->input('Choice');
//        dd($data);
//        return ;
//            $data = 'lwx';
            //return response()->json(array('msg'=> $data), 200);
//        }

        $data = $_POST['checkId'];
        $paper = $_POST['paper'];
//        dd($data);
//        return ;
        if (TestPaper::find($paper)) {
            $testpaper = TestPaper::find($paper);
        } else {
            $testpaper = new TestPaper();
        }

        $testpaper->choice_1 = $data[0];
        $testpaper->choice_2 = $data[1];
        $testpaper->choice_3 = $data[2];
        $testpaper->choice_4 = $data[3];
        $testpaper->choice_5 = $data[4];
        $testpaper->choice_6 = $data[5];
        $testpaper->choice_7 = $data[6];
        $testpaper->choice_8 = $data[7];
        $testpaper->choice_9 = $data[8];
        $testpaper->choice_10 = $data[9];

        $testpaper->choice_11 = $data[10];
        $testpaper->choice_12 = $data[11];
        $testpaper->choice_13 = $data[12];
        $testpaper->choice_14 = $data[13];
        $testpaper->choice_15 = $data[14];
        $testpaper->choice_16 = $data[15];
        $testpaper->choice_17 = $data[16];
        $testpaper->choice_18 = $data[17];
        $testpaper->choice_19 = $data[18];
        $testpaper->choice_20 = $data[19];

        if ($testpaper->save()){
            return response()->json(array('msg'=> 'success'), 200);
        }
        else
            return view('teacher.questionbank.choicequestion');

    }

    public function makepaper_torf(Request $req)
    {
        $data_torf = $_POST['checkId_torf'];
        $paper = $_POST['paper'];
//        dd($data);
//        return ;

        if (TestPaper::find($paper)) {
            $testpaper = TestPaper::find($paper);
        } else {
            $testpaper = new TestPaper();
        }

        $testpaper->torf_1 = $data_torf[0];
        $testpaper->torf_2 = $data_torf[1];
        $testpaper->torf_3 = $data_torf[2];
        $testpaper->torf_4 = $data_torf[3];
        $testpaper->torf_5 = $data_torf[4];
        $testpaper->torf_6 = $data_torf[5];
        $testpaper->torf_7 = $data_torf[6];
        $testpaper->torf_8 = $data_torf[7];
        $testpaper->torf_9 = $data_torf[8];
        $testpaper->torf_10 = $data_torf[9];

        if ($testpaper->save()){
            return response()->json(array('msg'=> 'success'), 200);
        }
        else
            return view('teacher.questionbank.trueorfalse');

    }

    public function makepaper_subject(Request $req)
    {
        $data_subject = $_POST['checkId_subject'];
        $paper = $_POST['paper'];
//        dd($data);
//        return ;
        if (TestPaper::find($paper)) {
            $testpaper = TestPaper::find($paper);
        } else {
            $testpaper = new TestPaper();
        }

        $testpaper->subject_1 = $data_subject[0];
        $testpaper->subject_2 = $data_subject[1];
        $testpaper->subject_3 = $data_subject[2];
        $testpaper->subject_4 = $data_subject[3];
        $testpaper->subject_5 = $data_subject[4];


        if ($testpaper->save()){
            return response()->json(array('msg'=> 'success'), 200);
        }
        else
            return view('teacher.questionbank.subjectitem');

    }

    public function check()
    {
        $testpaper = TestPaper::find();
        $testpaper->check_or_not = 1;
        if ($testpaper->save()){
            return 1;
        }
    }
//view('teacher.createtestpaper.home')
}
