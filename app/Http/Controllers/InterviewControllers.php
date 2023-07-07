<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewControllers extends Controller
{
    //
    public function index()
    {
        return view('/admin/interview.index');
    }
}
