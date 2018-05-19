<?php

namespace App\Http\Controllers\Student;

use App\AnswerPaper;
use App\Choice;
use App\Student;
use App\Subject;
use App\TestPaper;
use App\Torf;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    //

    public function index($stu_id)
    {
        $_name = Student::find($stu_id)->name;
        return view('student.index',[
            'stu_name' => $_name,
            '_stu_id' => $stu_id,
        ]);
        //return view('student.index');
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

            $stus = Student::all();
//            dd($stus);
//            exit;
            foreach ($stus as $stu)
            {
                if ($stu['attributes']['student_id'] == $data['student_id'] && $stu['attributes']['password'] == $data['password']) {
                    $stu_id = $stu['attributes']['id'];

                    Session::put('student', 'success');

                    return redirect('student/'.$stu_id);
                }
            }

            return redirect()->back()->with('error', '用户名或者密码错误!');

        }

        return view('student.login');
    }

    public function test($stu_id)
    {
        $topic = TestPaper::find(1);

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

            $stu_name = Student::find($stu_id)->name;

            Session::put('stu_id', $stu_id);

            return view('student.test',[
                'choices' => $choices,
                'torfs' => $torfs,
                'subjects' => $subjects,
                'id' => $id,
                'stu_name' => $stu_name,
                //'_stu_id' => $stu_id,
            ]);
        }

    }

    public function submit_paper(Request $req)
    {
        //$data = $req->input();
        //dd($data);

        $choice = $_POST['choice_answer'];
        $torf = $_POST['torf_answer'];
        $subject = $_POST['subject_answer'];

        for ($i=0;$i<count($choice);$i++)
        {
            if ($choice[$i]=="") {
                $choice[$i] = 0;
            }
        }

        for ($i=count($choice);$i<20;$i++)
        {
            $choice[$i] = 0;
        }

        for ($i=0;$i<count($torf);$i++)
        {
            if ($torf[$i]=="") {
                $torf[$i] = 0;
            }
        }

        for ($i=count($torf);$i<10;$i++)
        {
            $torf[$i] = 0;
        }

//        dd($choice);
//        dd($torf);
//        dd($subject);

        $stu_id = Session::get('stu_id');

        //$answer_choice = Student::find($stu_id);

        if (AnswerPaper::find($stu_id)) {
            $answerpaper = AnswerPaper::find($stu_id);
        } else {
            $answerpaper = new AnswerPaper();
        }

        $answerpaper->choice_1 = $choice[0];
        $answerpaper->choice_2 = $choice[1];
        $answerpaper->choice_3 = $choice[2];
        $answerpaper->choice_4 = $choice[3];
        $answerpaper->choice_5 = $choice[4];
        $answerpaper->choice_6 = $choice[5];
        $answerpaper->choice_7 = $choice[6];
        $answerpaper->choice_8 = $choice[7];
        $answerpaper->choice_9 = $choice[8];
        $answerpaper->choice_10 = $choice[9];

        $answerpaper->choice_11 = $choice[10];
        $answerpaper->choice_12 = $choice[11];
        $answerpaper->choice_13 = $choice[12];
        $answerpaper->choice_14 = $choice[13];
        $answerpaper->choice_15 = $choice[14];
        $answerpaper->choice_16 = $choice[15];
        $answerpaper->choice_17 = $choice[16];
        $answerpaper->choice_18 = $choice[17];
        $answerpaper->choice_19 = $choice[18];
        $answerpaper->choice_20 = $choice[19];

        $answerpaper->torf_1 = $torf[0];
        $answerpaper->torf_2 = $torf[1];
        $answerpaper->torf_3 = $torf[2];
        $answerpaper->torf_4 = $torf[3];
        $answerpaper->torf_5 = $torf[4];
        $answerpaper->torf_6 = $torf[5];
        $answerpaper->torf_7 = $torf[6];
        $answerpaper->torf_8 = $torf[7];
        $answerpaper->torf_9 = $torf[8];
        $answerpaper->torf_10 = $torf[9];

        $answerpaper->subject_1 = $subject[0];
        $answerpaper->subject_2 = $subject[1];
        $answerpaper->subject_3 = $subject[2];
        $answerpaper->subject_4 = $subject[3];
        $answerpaper->subject_5 = $subject[4];

        if ($answerpaper->save()){
            return response()->json(array('msg' => 'success'), 200);
        }
        else
            return view('student.test');


        //dd($stuid);
        //dd($choice);
        //dd($torf);
        //dd($subject);

        //return response()->json(array('msg'=> 'success'), 200);
    }
}
