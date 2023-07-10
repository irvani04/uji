<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\InterviewControllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register',[AuthControllers::class,'loadRegister']);
Route::post('/register',[AuthControllers::class,'studentRegister'])->name('studentRegister');

Route::get('/login',function(){
    return redirect('/');
});

Route::get('/dashboard2',[ViewController::class,'index']);

Route::get('/',[AuthControllers::class,'loadLogin']);
Route::post('/login',[AuthControllers::class,'userLogin'])->name('userLogin');

Route::get('/logout',[AuthControllers::class,'logout']);

Route::get('/forget-password',[ViewControllers::class,'forgetPasswordload']);
Route::post('/forget-password',[AuthControllers::class,'forgetPassword'])->name('forgetPassword');

Route::get('/reset-password',[AuthControllers::class,'resetPasswordLoad']);
Route::post('/reset-password',[AuthControllers::class,'resetPassword'])->name('resetPassword');

Route::group(['middleware'=>['web','checkAdmin']],function(){
    Route::get('/admin/dashboard',[AuthControllers::class,'adminDashboard']);

    //subject route
    Route::post('/add-subject',[AdminController::class,'addSubject'])->name('addSubject');
    Route::post('/edit-subject',[AdminController::class,'editSubject'])->name('editSubject');
    Route::post('/delete-subject',[AdminController::class,'deleteSubject'])->name('deleteSubject');


    //exam route
    Route::get('/admin/exam',[AdminController::class,'examDashboard']);
    Route::post('/add-exam',[AdminController::class,'addExam'])->name('addExam');
    Route::get('/get-exam-detail/{id}',[AdminController::class,'getExamDetail'])->name('getExamDetail');
    Route::post('/update-exam',[AdminController::class,'updateExam'])->name('updateExam');
    Route::post('/delete-exam',[AdminController::class,'deleteExam'])->name('deleteExam');


    //Q&A Route
    Route::get('/admin/qna-ans',[AdminController::class,'qnaDashboard']);
    Route::post('/add-qna-ans',[AdminController::class,'addQna'])->name('addQna');
    Route::get('/get-qna-details',[AdminController::class,'getQnaDetails'])->name('getQnaDetails');
    Route::get('/delete-ans',[AdminController::class,'deleteAns'])->name('deleteAns');
    Route::post('/update-qna-ans',[AdminController::class,'updateQna'])->name('updateQna');
    Route::post('/delete-qna-ans',[AdminController::class,'deleteQna'])->name('deleteQna');


    // user route
    Route::get('/admin/students',[AdminController::class,'studentsDashboard']);
    Route::post('/delete-student',[AdminController::class,'deleteStudent'])->name('deleteStudent');


    //qna exams route
    Route::get('/get-questions',[AdminController::class,'getQuestions'])->name('getQuestions');
    Route::post('/add-questions',[AdminController::class,'addQuestions'])->name('addQuestions');
    Route::get('/get-exam-questions',[AdminController::class,'getExamQuestions'])->name('getExamQuestions');
    Route::get('/delete-exam-questions',[AdminController::class,'deleteExamQuestions'])->name('deleteExamQuestions');


    //exam marks routes
    Route::get('/admin/marks',[AdminController::class,'loadMarks']);
    Route::post('/update-marks',[AdminController::class,'updateMarks'])->name('updateMarks');


    //exam review routes
    Route::get('/admin/review-exams',[AdminController::class,'reviewExams'])->name('reviewExams');
    Route::get('/admin/get-reviewed-qna',[AdminController::class,'reviewQna'])->name('reviewQna');
    Route::get('/admin/get-seepoint',[AdminController::class,'seePoint'])->name('seePoint');

    Route::post('/approved-qna',[AdminController::class,'approvedQna'])->name('approvedQna');


    //interview
    Route::get('/admin/inter',[AdminController::class,'interviews'])->name('interviews');
    Route::post('/add-inter',[AdminController::class,'addInterPost'])->name('addInterPost');
    Route::get('/add-inter',[AdminController::class,'addInterGet'])->name('addInterGet');
    Route::get('/admin/get-seeinter',[AdminController::class,'seeInter'])->name('seeInter');



    //saw route
    Route::get('/admin/{type}',[AdminController::class,'interviews'])->name('interviews');
   




    //knn route
    
});

Route::group(['middleware'=>['web','checkStudent']],function(){
    Route::get('/dashboard',[AuthControllers::class,'loadDashboard']);
    Route::get('/exam/{id}',[ExamController::class,'loadExamDashboard']);

    Route::post('/exam-submit',[ExamController::class,'examSubmit'])->name('examSubmit');

    Route::get('/results',[ExamController::class,'resultDashboard'])->name('resultDashboard');

    Route::get('/review-student-qna',[ExamController::class,'reviewQna'])->name('resultStudentQna');
});



