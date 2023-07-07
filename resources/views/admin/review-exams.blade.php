@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Users Exam </h2>


    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Exam</th>
            <th>Status</th>
            <th>Review</th>
            <th>Point</th>
        </thead>
        <tbody>
            @php
                $x = 1;
                $a = 10;
            @endphp
            @if (count($attempts) > 0)
                @foreach ($attempts as $attempt)
                    <tr>
                        <td>{{ $x++ }}</td>
                        <td>{{ $attempt->user->name }}</td>
                        <td>{{ $attempt->exam->exam_name }}</td>
                        <td>
                            @if ($attempt->status == 0)
                                <span style="color:red">Pending</span>
                            @else
                                <span style="color:green">Approved</span>
                            @endif
                        </td>
                        <td>
                            @if ($attempt->status == 0)
                                <a href="#" class="reviewExam" data-id="{{ $attempt->id }}" data-toggle="modal"
                                    data-target="#reviewExamModal">Review & Approved</a>
                            @else
                                Completed!
                            @endif
                        </td>
                        <td>
                            {{-- @if ($attempt->answers->is_correct == 1)
                                        {{ $attempt*$a }}
                                    @else
                                        <span style="color:red">0</span>
                                    @endif --}}

                            <button class="btn btn-primary seePoint" data-toggle="modal" data-target="#seePointModal"
                                data-id="{{ $attempt->id }}" id="seeklik">See</button>
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Users not Attempt Exams!</td>
                </tr>
            @endif

        </tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="reviewExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Review Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="reviewForm">
                    @csrf
                    <input type="hidden" name="attempt_id" id="attempt_id">
                    <div class="modal-body review-exam">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary approved-btn">Approved</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="seePointModal" tabindex="-1" role="dialog" aria-labelledby="seePointModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="seePoint">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <center>
                                <h2 id="pointnya"></h2>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

            $('.reviewExam').click(function() {
                var id = $(this).attr('data-id');
                $('#attempt_id').val(id);
                $.ajax({
                    url: "{{ route('reviewQna') }}",
                    type: "GET",
                    data: {
                        attempt_id: id
                    },
                    success: function(data) {

                        var html = '';

                        if (data.success == true) {

                            var data = data.data;
                            if (data.length > 0) {

                                console.log(data);

                                for (let i = 0; i < data.length; i++) {

                                    let isCorrect =
                                        '<span style="color:red;" class="fa fa-close"></span>';

                                    if (data[i]['answers']['is_correct'] == 1) {
                                        isCorrect =
                                            '<span style="color:green;" class="fa fa-check"></span>';
                                    }

                                    let answer = data[i]['answers']['answer'];

                                    html += `
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h6>Q(` + (i + 1) + `). ` + data[i]['question']['question'] + `</h6>
                                                    <p>Ans:- ` + answer + `  ` + isCorrect + `</p>
                                                </div>
                                            </div>
                                            `;
                                }
                            } else {
                                html += `<h6>User not attempt any Questions!</h6>
                                        <p>If you Approve this Exam User will fail!</p>`;
                            }
                        } else {
                            html += `<p>Having some server issue!`;
                        }

                        $('.review-exam').html(html);
                    }
                });
            });


            // approved exam
            $('#reviewForm').submit(function(event) {
                event.preventDefault();

                $('.approved-btn').html('Please wait <i class="fa fa-spinner fa-spin"></i>');

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('approvedQna') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        //console.log(data);

                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });

            });

            $("#seePointModal").on("show.bs.modal", function(event) {
                $.ajax({
                    url: "{{ route('seePoint') }}",
                    type: "GET",
                    data: {
                        'id': $(event.relatedTarget).data('id'),
                        '_token': '{{ csrf_token() }}'

                    },
                    success: function(data) {
                      $("#pointnya").html(data);
                    }
                });
            });


        });
    </script>
@endsection
