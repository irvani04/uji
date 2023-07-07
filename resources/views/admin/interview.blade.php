@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Interview </h2>


    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Add Point</th>
            <th>See</th>
        </thead>
        <tbody>
            @if (count($user) > 0)
                @foreach ($user as $key => $val)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->address }}</td>
                        <td>{{ $val->gender }}</td>
                        <td>
                            <button class="btn btn-primary addPoint" data-toggle="modal" data-target="#addPointModal"
                                data-id="{{ $val->id }}" id="pointklik">Add Point</button>
                        </td>
                        <td>
                            <button class="btn btn-info seePoint" data-toggle="modal" data-target="#seeInterModel"
                                data-id="{{ isset($val->interview->id) ? $val->interview->id : '' }}">See</button>
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">This page is empty!</td>
                </tr>
            @endif

        </tbody>

    </table>

    <!-- Modal -->

    <!-- Modal See-->
    <div class="modal fade" id="seeInterModel" tabindex="-1" role="dialog" aria-labelledby="seeInterModel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="seeInter">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Interview Point</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="user_name" id="user_name_see"  placeholder="Enter User Name" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="address" id="address_see"  placeholder="Enter User Address" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="gender" id="gender_see"  placeholder="Enter User Gender" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="ntertulis" id="ntertulis_see" placeholder="Enter Nilai Tertulis"
                            class="w-100" required>
                        <br><br>
                        <input type="text" name="npsikotes" id="npsikotes_see"  disabled placeholder="Enter Nilai Psikotes"
                            class="w-100" required>
                        <br><br>
                        <input type="text" name="njujur" id="njujur_see"  placeholder="Enter Nilai Kejujuran" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="nkom" id="nkom_see" placeholder="Enter Nilai Komunikasi" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="nsopan" id="nsopan_see" placeholder="Enter Nilai Kesopanan" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="npraktek" id="npraktek_see" placeholder="Enter Nilai Praktek" class="w-100" required>
                        <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal fade" id="addPointModal" tabindex="-1" role="dialog" aria-labelledby="addInterModel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="addInter">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Interview Point</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal"
                            data-target="#addInterModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="text" name="user_name" id="user_name" readonly placeholder="Enter User Name" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="address" id="address" readonly placeholder="Enter User Address" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="gender" id="gender" readonly placeholder="Enter User Gender" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="ntertulis" id="ntertulis" readonly placeholder="Enter Nilai Tertulis" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="npsikotes" id="npsikotes" readonly placeholder="Enter Nilai Psikotes" class="w-100"
                            required>
                        <br><br>
                        <input type="text" name="njujur" placeholder="Enter Nilai Kejujuran" class="w-100" required>
                        <br><br>
                        <input type="text" name="nkom" placeholder="Enter Nilai Komunikasi" class="w-100" required>
                        <br><br>
                        <input type="text" name="nsopan" placeholder="Enter Nilai Kesopanan" class="w-100" required>
                        <br><br>
                        <input type="text" name="npraktek" placeholder="Enter Nilai Praktek" class="w-100" required>
                        <br><br>
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
    <!--JS below-->
    <script>
        $(document).ready(function() {
            $("body").on('click',"#pointklik",function(e) {
                $.ajax({
                    url: "{{ route('addInterGet') }}",
                    type: "GET",
                    data: {'id':$(this).data('id')},
                    success: function(data) {
                        $("#user_id").val(data.id);
                        $("#user_name").val(data.name);
                        $("#address").val(data.address);
                        $("#gender").val(data.gender);
                        $("#ntertulis").val(data.examp_tertulis);
                        $("#npsikotes").val(data.examp_psikotest);
                    }
                });
            });

            $("#addInter").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('addInterPost') }}",
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

            $("#seeInterModel").on("show.bs.modal", function(event) {
                $.ajax({
                    url: "{{ route('seeInter') }}",
                    type: "GET",
                    data: {
                        'id': $(event.relatedTarget).data('id'),
                        '_token': '{{ csrf_token() }}'

                    },
                    success: function(data) {
                        $("#user_id_see").val(data.user_id);
                        $("#user_name_see").val(data.user_name);
                        $("#address_see").val(data.address);
                        $("#gender_see").val(data.gender);
                        $("#ntertulis_see").val(data.n_tertulis);
                        $("#nsopan_see").val(data.n_kesop);
                        $("#njujur_see").val(data.n_kejujuran);
                        $("#nkom_see").val(data.n_komun);
                        $("#npraktek_see").val(data.n_praktek);
                        $("#npsikotes_see").val(data.n_psikotest);
                    }
                });
            });



            $(".body").on('click',"#pointkliksee",function(e) {
                $.ajax({
                    url: "{{ route('seeInter') }}",
                    type: "GET",
                    data: {'id':$(this).data('id')},
                    success: function(data) {
                        $("#user_id").val(data.id);
                        $("#user_name").val(data.name);
                        $("#address").val(data.address);
                        $("#gender").val(data.gender);
                        $("#ntertulis").val(data.examp_tertulis);
                        $("#njujur").val(data.njujur);
                        $("#npsikotes").val(data.examp_psikotest);
                    }
                });
            });
        });
    </script>


@endsection
