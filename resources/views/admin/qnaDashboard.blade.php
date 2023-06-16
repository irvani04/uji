@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Q&A </h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQnaModal">
        Add Q&A
    </button>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Question</th>
            <th>Answers</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @if (count($questions) > 0)
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question }}</td>
                        <td>
                            <a href="#" class="ansButton" data-id="{{ $question->id }}" data-toggle="modal"
                                data-target="#showAnsModal">See Answers</a>
                        </td>
                        <td>
                            <button class="btn btn-info editButton" data-id="{{ $question->id }}" data-toggle="modal"
                                data-target="#editQnaModal">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-danger deleteButton" data-id="{{ $question->id }}" data-toggle="modal"
                                data-target="#deleteQnaModal">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Questions & Answers not Found!</td>
                </tr>
            @endif
        </tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="addQnaModal" tabindex="-1" role="dialog" aria-labelledby="addQnaModal" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQnaModal">Add Q&A</h5>

                    <button id="addAnswer" class="ml-5 btn btn-info">Add Answer</button>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formaddQnaModal">
                    @csrf
                    <div class="modal-body addModalAnswers">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="w-100" name="question" placeholder="Enter question" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                              <textarea name="explanation" class="w-100" placeholder="Enter you explanation(Optional)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="error" style="color:red;"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="submitAdd" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- Edit Q&A Modal -->
    <div class="modal fade" id="editQnaModal" tabindex="-1" role="dialog" aria-labelledby="editQnaModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Q&A</h5>

                    <button id="addEditAnswer" class="ml-5 btn btn-info">Add Answer</button>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editQna">
                    @csrf
                    <div class="modal-body editModalAnswers">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="question_id" id="question_id">
                                <input type="text" class="w-100" name="question" id="question"
                                    placeholder="Enter question" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                              <textarea name="explanation" id="explanation" class="w-100" placeholder="Enter you explanation(Optional)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="editError" style="color:red;"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Q&A</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- Show answer Modal -->
    <div class="modal fade" id="showAnsModal" tabindex="-1" role="dialog" aria-labelledby="showAnsModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showAnsModal">Show Answers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Answer</th>
                            <th>Is Correct</th>
                        </thead>
                        <tbody class="showAnswers">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete qna Modal -->
    <div class="modal fade" id="deleteQnaModal" tabindex="-1" role="dialog" aria-labelledby="deleteQnaModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete QnA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteQna">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure want to delete Q&A?</p>
                        <input type="hidden" name="id" id="delete_qna_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS code -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <!--JS below-->


    <script>
        $(document).ready(function() {

            //submit
            $("#submitAdd").click(function(e) {
                e.preventDefault();

                if ($('input[name="answers[]"]').length < 1) {
                    $(".error").text("Please add minimun two answers.")
                    setTimeout(function() {
                        $(".error").text("");
                    }, 2000);
                } else {
                    var checkIsCorrect = false;
                    for (let i = 0; i < $(".is_correct").length; i++) {
                        if ($(".is_correct:eq(" + i + ")").prop('checked') == true) {
                            checkIsCorrect = true;
                            $(".is_correct:eq(" + i + ")").val($(".is_correct:eq(" + i + ")").next().find(
                                'input').val());
                        }
                    }

                    if (checkIsCorrect) {
                        var formData = $("#formaddQnaModal").serialize();
                        console.log(formData);
                        $.ajax({
                            url: "{{ route('addQna') }}",
                            type: "POST",
                            data: formData,
                            success: function(data) {
                                console.log(data);
                                if (data.success == true) {
                                    location.reload();
                                } else {
                                    alert(data.msg);
                                }
                            }
                        });
                    } else {
                        $(".error").text("Please select anyone correct answer.")
                        setTimeout(function() {
                            $(".error").text("");
                        }, 2000);
                    }

                }

            });

            //add answer
            $("#addAnswer").click(function() {
                if ($('input[name="answers[]"]').length > 3) {
                    $(".error").text("You can add Maximum 4 answers.")
                    setTimeout(function() {
                        $(".error").text("");
                    }, 2000);
                } else {
                    var html = `
                    <div class="row mt-2 answers">
                    <input type="radio" name="is_correct" class="is_correct">
                        <div class="col">
                            <input type="text" class="w-100" name="answers[]" id="answers" placeholder="Enter Answer" required>
                        </div>
                        <button class="btn btn-danger removeButton">Remove</button>
                    </div>`;

                    $(".addModalAnswers").append(html);
                }
            });

            $(document).on("click", ".removeButton", function() {
                $(this).parent().remove();
            });


            //show answer

            $(".ansButton").click(function() {

                var questions = @json($questions);
                var qid = $(this).attr('data-id');
                var html = '';

                for (let i = 0; i < questions.length; i++) {

                    if (questions[i]['id'] == qid) {

                        var answersLength = questions[i]['answers'].length;
                        for (let j = 0; j < answersLength; j++) {
                            if (questions[i]['answers'].length > 0) {
                                let is_correct = 'No';
                                if (questions[i]['answers'][j]['is_correct'] == 1) {
                                    is_correct = 'Yes';
                                }

                                html+= `
                                <tr>
                                    <td>` + (j + 1) + `</td>
                                    <td>` + questions[i]['answers'][j]['answer'] + `</td>
                                    <td>` + is_correct + `</td>
                                </tr>
                            `;
                            }
                        } 
                        break;
                    }
                }

                $('.showAnswers').html(html);
            });

            //edit QnA
            $("#addEditAnswer").click(function() {
                if ($('input[name="editAnswers[]"]').length > 3) {
                    $(".editError").text("You can add Maximum 4 answers.")
                    setTimeout(function() {
                        $(".editError").text("");
                    }, 2000);
                } else {
                    var html = `
                    <div class="row mt-2 editAnswers">
                    <input type="radio" name="edit_is_correct" class="edit_is_correct">
                        <div class="col">
                            <input type="text" class="w-100" name="new_answers[]" placeholder="Enter New Answer" required>
                        </div>
                        <button class="btn btn-danger removeButton">Remove</button>
                    </div>`;

                    $(".editModalAnswers").append(html);
                }
            });

            $(".editButton").click(function(){

                var qid = $(this).attr('data-id');

                $.ajax({
                    url:"{{ route('getQnaDetails') }}",
                    type:"GET",
                    data:{qid:qid},
                    success:function(data){
                        console.log(data);


                        var qna = data.data[0];
                        $("#question_id").val(qna['id']);
                        $("#question").val(qna['question']);
                        $("#explanation").val(qna['explanation']);
                        $(".editAnswers").remove();

                        var html='';

                        for(let i = 0; i < qna['answers'].length; i++){

                            var checked = '';
                            if(qna['answers'][i]['is_correct'] == 1){
                                checked = 'checked';
                            }


                            html += `
                                    <div class="row mt-2 editAnswers">
                                    <input type="radio" name="edit_is_correct" class="edit_is_correct" `+checked+`>
                                        <div class="col">
                                            <input type="text" class="w-100" name="answers[`+qna['answers'][i]['id']+`]" placeholder="Enter New Answer" value ="`+qna['answers'][i]['answer']+`" required>
                                        </div>
                                        <button class="btn btn-danger removeButton removeAnswer" data-id="`+qna['answers'][i]['id']+`">Remove</button>
                                    </div>`;

                        }
                        $(".editModalAnswers").append(html);
                    }
                });
            });

            // $(document).on("click", ".removeButton", function() {
            //     $(this).parent().remove();
            // });


         //update qna submit
         $("#editQna").click(function(e) {
                e.preventDefault();

                if ($('.edit_is_correct').length < 1) {
                    $(".editError").text("Please add minimun one answers.")
                    setTimeout(function() {
                        $(".editeError").text("");
                    }, 2000);
                } else {
                    var checkIsCorrect = false;
                    for (let i = 0; i < $(".edit_is_correct").length; i++) {
                        if ($(".edit_is_correct:eq(" + i + ")").prop('checked') == true) {
                            checkIsCorrect = true;
                            $(".edit_is_correct:eq(" + i + ")").val($(".edit_is_correct:eq(" + i + ")").next().find(
                                'input').val());
                        }
                    }

                    if (checkIsCorrect) {
                      
                        var formData = $(this).serialize();

                        $.ajax({
                            url:"{{ route('updateQna') }}",
                            type:"POST",
                            data:formData,
                            success:function(data){
                                if(data.success == true){
                                    // console.log(data.msg);
                                    location.reload();
                                }
                                else{
                                    alert(data.msg);
                                }
                            }
                        });

                    } else {
                        $(".editError").text("Please select anyone correct answer.")
                        setTimeout(function() {
                            $(".editError").text("");
                        }, 2000);
                    }

                }

            });

            //remove Answers
            $(document).on('click','.removeAnswer',function(){

                var ansId = $(this).attr('data-id');

                $.ajax({
                    url:"{{ route('deleteAns') }}",
                    type:"GET",
                    data:{id:ansId},
                    success:function(data){
                        if(data.success == true){
                            console.log(data.msg);
                        }
                        else{
                            alert(data.msg);
                        }
                    }
                });
            });


            //delete Q&A

            $('.deleteButton').click(function(){
                var id = $(this).attr('data-id');
                $('#delete_qna_id').val(id);
            });

            $('#deleteQna').submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('deleteQna') }}",
                    type:"POST",
                    data:formData,
                    success:function(data){
                        if(data.success == true){
                            location.reload();
                        }
                        else{
                            alert(data.msg);
                        }
                    }
                });
            });
        });
    </script>
@endsection
