@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Result SAW </h2>
   
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExamModel">
        Add Exam
    </button>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Time</th>
                <th>Attempt</th>
                <th>Add Question</th>
                <th>Show Question</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        

        </tbody>
    </table>
 
@endsection
