<?php

namespace App\Http\Controllers\Teacher;

use App\Choice;
use App\Subject;
use App\Torf;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    //教师首页
    public function index () {
        return view('teacher.index');
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

    public function makepaper(Request $req)
    {
//        if ($req->isMethod('post')) {
            $data = $req->input();
//            $data = 'lwx';
            return response()->json(array('msg'=> $data), 200);
//        }
    }

}
