@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Subject </h2>
    <!-- Button trigger modal -->

    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> --}}

    <!--CB-modal -->
    <!-- Button trigger modal -->
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubjectModel">
        Add Subject
    </button> --}}


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @if (count($subjects) > 0)
                @foreach ($subjects as $subject)
                    <tr>
                        <td> {{ $subject->id }} </td>
                        <td> {{ $subject->subject }} </td>
                        <td>
                            <button class="btn btn-info editButton" data-id="{{ $subject->id }}"
                                data-subject="{{ $subject->subject }}" data-target="#editSubjectModel"
                                data-toggle="modal">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-danger deleteButton" data-id="{{ $subject->id }}"
                                data-target="#deleteSubjectModel" data-toggle="modal">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Subjects Not Found!</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Modal -->
    {{-- <div class="modal fade" id="addSubjectModel" tabindex="-1" role="dialog" aria-labelledby="addSubjectModel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="addSubject">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Subject:-</label>
                        <input type="text" name="subject" placeholder="Enter Subject Name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JS code -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <!--JS below--> --}}

    <!-- Edit Subject Modal -->
    <div class="modal fade" id="editSubjectModel" tabindex="-1" role="dialog" aria-labelledby="editSubjectModel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editSubject">
                    @csrf
                    <div class="modal-body">
                        <label>Subject:-</label>
                        <input type="text" name="subject" placeholder="Enter Subject Name" id="edit_subject" required>
                        <input type="hidden" name="id" id="edit_subject_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
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


    <!-- Delete Subject Modal -->
    <div class="modal fade" id="deleteSubjectModel" tabindex="-1" role="dialog" aria-labelledby="deleteSubjectModel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteSubject">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure want to delete subject?</p>
                        <input type="hidden" name="id" id="delete_subject_id">
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


    <!--modal-->

    <script>
        $(document).ready(function() {

            $("#addSubject").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('addSubject') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });

            //edit subject

            $(".editButton").click(function() {
                var subject_id = $(this).attr('data-id');
                var subject = $(this).attr('data-subject');
                $("#edit_subject").val(subject);
                $("#edit_subject_id").val(subject_id);
            });

            $("#editSubject").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('editSubject') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });

            //delete subject
            $(".deleteButton").click(function() {
                var subject_id = $(this).attr('data-id');
                $("#delete_subject_id").val(subject_id);
            });
            $("#deleteSubject").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('deleteSubject') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });

        });
    </script>
@endsection
