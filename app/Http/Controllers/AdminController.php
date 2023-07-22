<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Answer;
use App\Models\Result;
use App\Models\QnaExam;
use App\Models\Subject;
use App\Models\Question;
use App\Models\ExamAnswer;
use App\Models\ExamAttempt;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
     //
     public function addSubject(Request $request)
     {
          //    return $request->all();
          try {

               Subject::insert([
                    'subject' => $request->subject
               ]);
               return response()->json(['success' => false, 'msg' => 'Subject added Successfully!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     //edit subject
     public function editSubject(Request $request)
     {
          //    return $request->all();
          try {

               $subject = Subject::find($request->id);
               $subject->subject = $request->subject;
               $subject->save();
               return response()->json(['success' => false, 'msg' => 'Subject updated Successfully!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     //delete subject
     public function deleteSubject(Request $request)
     {
          //    return $request->all();
          try {

               Subject::where('id', $request->id)->delete();
               return response()->json(['success' => false, 'msg' => 'Subject Deleted Successfully!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     // exam dashboard
     public function examDashboard()
     {
          $subjects = Subject::all();
          $exams = Exam::with('subjects')->get();
          return view('admin.exam-dashboard', ['subjects' => $subjects, 'exams' => $exams]);
     }

     //add exam
     public function addExam(Request $request)
     {
          try {
               $unique_id = uniqid('exid');
               Exam::insert([
                    'exam_name' => $request->exam_name,
                    'subject_id' => $request->subject_id,
                    'date' => $request->date,
                    'time' => $request->time,
                    'attempt' => $request->attempt,
                    'enterance_id' => $unique_id
               ]);
               return response()->json(['success' => false, 'msg' => 'Subject added Successfully!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     public function getExamDetail($id)
     {
          try {

               $exam = Exam::where('id', $id)->get();
               return response()->json(['success' => true, 'data' => $exam]);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     public function updateExam(Request $request)
     {
          try {
               // $exam = Exam::find($request->exam_id); 
               // $exam->exam_name = $request->exam_name;
               // $exam->subject_id = $request->subject_id;
               // $exam->date = $request->date;
               // $exam->time = $request->time;
               // $exam->save();


               $exam_data =  Exam::findOrFail($request->id);  // iki mau $request->exam_id
               $array = [
                    "exam_name" => $request->exam_name,
                    "subject_id" => $request->subject_id,
                    "date" => $request->date,
                    "time" => $request->time,
                    "attempt" => $request->attempt
               ];
               $update = $exam_data->update($array);
               if ($update) {
                    return response()->json(['success' => true, 'msg' => 'Exam updated successfull!']);
               } else {
                    die("Error!");
               }
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }


     //delete Exam
     public function deleteExam(Request $request)
     {
          try {
               Exam::where('id', $request->exam_id)->delete();
               return response()->json(['success' => true, 'msg' => 'Exam deleted successfull!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     // read qna
     public function qnaDashboard()
     {
          $questions = Question::with('answers')->get();

          return view('admin.qnaDashboard', compact('questions'));
     }

     //add qna
     public function addQna(Request $request)
     {

          // dd($request->all());
          try {

               $exaplanation = null;
               if (isset($request->explanation)) {
                    $explanation = $request->explanation;
               }
               $questionId = Question::insertGetId([
                    'question' => $request->question,
                    'explanation' => $explanation
               ]);

               foreach ($request->answers as $answer) {
                    $is_correct = 0;
                    if ($request->is_correct == $answer) {
                         $is_correct = 1;
                    }

                    Answer::insert([
                         'question_id' => $questionId,
                         'answer' => $answer,
                         'is_correct' => $is_correct
                    ]);
               }

               return response()->json(['success' => true, 'msg' => 'Add Q&A successfull!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     public function getQnaDetails(Request $request)
     {
          $qna = Question::where('id', $request->qid)->with('answers')->get();

          return response()->json(['data' => $qna]);
     }

     public function deleteAns(Request $request)
     {
          Answer::where('id', $request->id)->delete();
          return response()->json(['success' => true, 'msg' => 'Answer deleted successfully']);
     }

     public function updateQna(Request $request)
     {
          try {
               // dd($request->all());
               $exaplanation = null;
               if (isset($request->explanation)) {
                    $explanation = $request->explanation;
               }
               Question::where('id', $request->question_id)->update([
                    'question' => $request->question,
                    'explanation' => $explanation
               ]);

               //old answer update
               if (isset($request->answers)) {

                    foreach ($request->answers as $key => $value) {

                         $is_correct = 0;
                         if ($request->edit_is_correct == $value) {
                              $is_correct = 1;
                         }

                         Answer::where('id', $key)
                              ->update([
                                   'question_id' => $request->question_id,
                                   'answer' => $value,
                                   'is_correct' => $is_correct
                              ]);
                    }
               }

               //new answer add
               if (isset($request->new_answers)) {

                    foreach ($request->new_answers as $key => $answer) {

                         $is_correct = 0;
                         if ($request->is_correct == $answer) {
                              $is_correct = 1;
                         }

                         Answer::insert([
                              'question_id' => $request->question_id,
                              'answer' => $answer,
                              'is_correct' => $is_correct
                         ]);
                    }
               }

               return response()->json(['success' => true, 'msg' => 'QnA updated success']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     public function deleteQna(Request $request)
     {
          Question::where('id', $request->id)->delete();
          Answer::where('questions_id', $request->id)->delete();

          return response()->json(['success' => true, 'msg' => 'QnA deleted successfully']);
     }


     // user dashboard
     public function studentsDashboard()
     {
          $students = User::where('is_admin', 0)->get();
          return view('admin.studentsDashboard', compact('students'));
     }


     //delete user
     public function deleteStudent(Request $request)
     {
          try {
               User::where('id', $request->id)->delete();
               return response()->json(['success' => true, 'msg' => 'Student deleted successfully']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
     }

     //get questions
     public function getQuestions(Request $request)
     {
          try {
               $questions = Question::all();

               if (count($questions) > 0) {

                    $data = [];
                    $counter = 0;

                    foreach ($questions as $question) {
                         $qnaExam = QnaExam::where(['exam_id' => $request->exam_id, 'question_id' => $question->id])->get();
                         if (count($qnaExam) == 0) {
                              $data[$counter]['id'] = $question->id;
                              $data[$counter]['questions'] = $question->question;
                              $counter++;
                         }
                    }
                    return response()->json(['success' => true, 'msg' => 'Questions data!', 'data' => $data]);
               } else {
                    return response()->json(['success' => false, 'msg' => 'Questions not Found']);
               }
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
     }

     public function addQuestions(Request $request)
     {
          try {
               if (isset($request->questions_ids)) {
                    foreach ($request->questions_ids as $qid) {
                         QnaExam::insert([
                              'exam_id' => $request->exam_id,
                              'question_id' => $qid
                         ]);
                    }
               }
               return response()->json(['success' => true, 'msg' => 'Questions added success']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => 'Questions not Found']);
          }
     }


     public function getExamQuestions(Request $request)
     {
          try {
               $data = QnaExam::where('exam_id', $request->exam_id)->with('question')->get();
               return response()->json(['success' => true, 'msg' => 'Questions details', 'data' => $data]);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
     }



     public function deleteExamQuestions(Request $request)
     {
          try {
               QnaExam::where('id', $request->id)->delete();
               return response()->json(['success' => true, 'msg' => 'Questions deleted']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
     }

     public function loadMarks()
     {
          $exams = Exam::with('getQnaExam')->get();
          return view('admin.marksDashboard', compact('exams'));
     }


     public function updateMarks(Request $request)
     {
          try {

               Exam::where('id', $request->exam_id)->update([
                    'marks' => $request->marks,
                    'pass_marks' => $request->pass_marks
               ]);
               return response()->json(['success' => true, 'msg' => 'Marks Updated!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
     }

     //review exam
     public function reviewExams()
     {
          $attempts =  ExamAttempt::with(['user','exam'])->get();

          // $data = Exam::select('id', 'exam_name')->get();

         
          return view('admin.review-exams', compact('attempts'));
     }


     public function reviewQna(Request $request)
     {
          try {

               $attemptData = ExamAnswer::where('attempt_id', $request->attempt_id)->with(['question', 'answers'])->get();
               return response()->json(['success' => true, 'data' => $attemptData]);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
     }


     public function approvedQna(Request $request)
     {

          // dd($request->all());
          try {

               $attemptId = $request->attempt_id;

               $examData = ExamAttempt::where('id', $attemptId)->with('user', 'exam')->get();

               $marks = $examData[0]['exam']['marks'];

               $attemptData = ExamAnswer::where('attempt_id', $attemptId)->with('answers')->get();

               $totalMarks = 0;

               if (count($attemptData) > 0) {

                    foreach ($attemptData as $attempt) {

                         if ($attempt->answers->is_correct == 1) {
                              $totalMarks += 1;
                         }
                    }
               }

               ExamAttempt::where('id', $attemptId)->update([
                    'status' => 1,
                    'marks' => $totalMarks,
                    'score' => $totalMarks * 5
               ]);



               $url = URL::to('/');

               $data['url'] = $url . '/results';
               $data['name'] = $examData[0]['user']['name'];
               $data['email'] = $examData[0]['user']['email'];
               $data['exam_name'] = $examData[0]['exam']['exam_name'];
               $data['title'] = $examData[0]['exam']['exam_name'] . 'Result';

               Mail::send('result-mail', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
               });

               return response()->json(['success' => true, 'msg' => 'Approved Succefully!', 'data' => $attemptData]);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
     }

     public function seePoint(Request $request)
     {
          $data = ExamAnswer::with('answers')->where('attempt_id', $request->id)->get();
          //    dd($data->toArray());?
          $point = 0;
          foreach ($data as $key => $val) {

               if ($val->answers->is_correct == "1") {
                    // echo "yes";
                    $point += 1;
               }
          }

          //    dd($point);
          return $point;
     }



     // interview
     public function interviews()
     {
          // return $request->all();
          $user = User::with('interview')->where('is_admin', '!=', '1')->orderBy('name', 'asc')->get();
          // return $user;
          return view('admin.interview', compact('user'));
     }

     public function addInterGet(Request $request)
     {

          $data = User::where('id', $request->id)->with(['exam_attempt' => function ($q) {
               $q->with(['exam' => function ($q) {
                    $q->with('subjects');
               }]);
          }])->get()->toArray();
          // dd($data);
          $nilai_psikotest = null; 
          $nilai_tertulis = null;

          foreach ($data as $key => $val) {
               foreach ($val['exam_attempt'] as $a => $b) {
                    if (isset($b['exam']['subjects']['subject'])) {
                         if ($b['exam']['subjects']['subject'] == "psikotest") {
                              $nilai_psikotest = $b['score'];
                         }
                    }

                    if (isset($b['exam']['subjects']['subject'])) {
                         if ($b['exam']['subjects']['subject'] == "tertulis") {
                              $nilai_tertulis = $b['score'];
                         }
                    }
               }
          }

          return response()->json([
               'id' => $data[0]['id'],
               'name' => $data[0]['name'],
               'address' => $data[0]['address'],
               'gender' => $data[0]['gender'],
               'examp_psikotest' => $nilai_psikotest,
               'examp_tertulis' => $nilai_tertulis
          ]);
     }


     public function seeInter(Request $request)
     {
          $data = Interview::find($request->id);
          // dd($data->toArray());

          // return $data;
          return response()->json([
               'user_id' => $data->user_id,
               'user_name' => $data->user_name,
               'address' => $data->address,
               'gender' => $data->gender,
               'n_tertulis' => $data->n_tertulis,
               'n_psikotes' => $data->n_psikotes,
               'n_kejujuran' => $data->n_kejujuran,
               'n_komun' => $data->n_komun,
               'n_kesop' => $data->n_kesop,
               'n_praktek' => $data->n_praktek
          ]);
     }

     public function addInterPost(Request $request)
     {
          // dd($request->all());
          try {
               $unique_id = uniqid('exid');
               Interview::insert([
                    'user_id' => $request->user_id,
                    'user_name' => $request->user_name,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'n_tertulis' => $request->ntertulis,
                    'n_psikotes' => $request->npsikotes,
                    'n_kejujuran' => $request->njujur,
                    'n_komun' => $request->nkom,
                    'n_kesop' => $request->nsopan,
                    'n_praktek' => $request->npraktek
               ]);
               return response()->json(['success' => false, 'msg' => 'added Successfully!']);
          } catch (\Exception $e) {
               return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          };
     }

     // public function index(Request $request)
     // {
     // //      //  dd ('index');
     // //      //   return view ('/admin/saw/index');
     // //      if ($request->ajax()) {
     // //           $data = Interview::select('user_name', 'n_komun', 'n_kejujuran', 'n_kesop', 'n_psikotes', 'n_tertulis', 'n_praktek')->get();
     // //           // return $data;


     // //           return Datatables::of($data)
     // //                ->addIndexColumn()
     // //                ->make(true);
     // //      }

     // //      return view('admin.saw.index', [
     // //           'title' => 'Data Interview',

     // //      ]);
     // }
}
