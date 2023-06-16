@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Students </h2>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Detail</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @if (count($students) > 0)
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <button class="btn btn-info editButton" data-id="" data-toggle="modal"
                                data-target="">Detail</button>
                        </td>
                        <td>
                            <button class="btn btn-danger deleteButton" data-id="{{ $student->id }}" data-toggle="modal"
                                data-target="#deleteStudentModal">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Students not Found!</td>
                </tr>
            @endif
        </tbody>

    </table>


    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="deleteQnaModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteStudent">
                    @csrf
                    <div class="modal-body">
                        <p>Are you sure want to delete user?</p>
                        <input type="hidden" name="id" id="student_id">
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

             //delete Q&A

             $('.deleteButton').click(function(){
                var id = $(this).attr('data-id');
                $('#student_id').val(id);
            });

            $('#deleteStudent').submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('deleteStudent') }}",
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