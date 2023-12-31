<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\QnaExam;
use App\Models\ExamAttempt;
use App\Models\ExamAnswer;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    //
    public function loadExamDashboard($id)
    {
        $qnaExam = Exam::where('enterance_id',$id)->with('getQnaExam')->get();
        if(count($qnaExam) > 0){
            $attemptCount = ExamAttempt::where(['exam_id'=>$id,'user_id'=>auth()->user()->id])->count();
            // dd($attemptCount);
            if($attemptCount >= $qnaExam[0]['attempt']){
                return view('student.exam-dashboard',['success'=>false,'msg'=>'Your attempt exam has been completed','exam'=>$qnaExam]);
            }

           else if($qnaExam[0]['date'] == date('Y-m-d')){
                //return 'working';

                if(count($qnaExam[0]['getQnaExam']) > 0){

                    $qna = QnaExam::where('exam_id',$qnaExam[0]['id'])->with('question','answers')->inRandomOrder()->get();
                    return view('student.exam-dashboard',['success'=>true,'exam'=>$qnaExam,'qna'=>$qna]);
                }
                else{
                    return view('student.exam-dashboard',['success'=>false,'msg'=>'This exam is not available for now!','exam'=>$qnaExam]);
                } 
            }
            else if($qnaExam[0]['date'] > date('Y-m-d')){
                return view('student.exam-dashboard',['success'=>false,'msg'=>'This exam will be start on'.$qnaExam[0]['date'],'exam'=>$qnaExam]);
            }
            else{
                return view('student.exam-dashboard',['success'=>false,'msg'=>'This exam has been expired on'.$qnaExam[0]['date'],'exam'=>$qnaExam]);
            }
        }
        else{
            return view('404');
        }
    }

    public function examSubmit(Request $request)
    {

        // dd($request->ans_1);

        $cek = Exam::find($request->exam_id);
        if($cek){
            if($cek->attempt < 1){
                exit("submite entek");
            }else{
                $attempt_id = ExamAttempt::insertGetId([
                    'exam_id' => $request->exam_id,
                    'user_id' => Auth::user()->id
                ]);

        
                $qcount = count($request->q);
                if($qcount > 0){
                        foreach($request->q as $key => $v){
                        $k='ans_'.$key+1;
                        $arrv=[
                            'attempt_id' => $attempt_id,
                            'question_id' => $request->q[$key],
                            'answer_id' =>$request->$k ,
                        ];
                            ExamAnswer::insert($arrv);
                          
                      
                    }
                }
        
                $cek->update(['attempt'=>$cek->attempt-1]);
        
                return view('thank-you');
            }
        }

    }

    public function resultDashboard()
    {
       $attempts = ExamAttempt::where('user_id',Auth()->user()->id)->with('exam')->orderBy('updated_at')->get();
       return view('student.results',compact('attempts'));
    }



    public function reviewQna(Request $request)
    {
        try{

            $attemptData = ExamAnswer::where('attempt_id',$request->attempt_id)->with(['question','answers'])->get();

             return response()->json(['success'=>true,'msg'=>'Q&A Data','data'=>$attemptData]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }
}
