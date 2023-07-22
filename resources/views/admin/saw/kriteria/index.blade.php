@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Kriteria SPK </h2>

    <div class="card">
        <div class="card-header">
            Data Kriteria
        </div>
        <div class="card-body">
            {{-- <blockquote class="blockquote mb-0">
            <p>A well-known quote, contained in a blockquote element.</p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
          </blockquote> --}}
            <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
            <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

            <body>
                <div class="container ">
                    <table id="criteria-table" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th> No </th>
                                <th> Nama </th>
                                <th> Kriteria </th>
                                <th> Bobot </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- script -->
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                <script src=" https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
            </body>
        </div>
    </div>
<!-- Edit Subject Modal -->
<div class="modal fade" id="editCriteriaModal" tabindex="-1" role="dialog" aria-labelledby="editCriteriaModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="editCriteria">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <input type="text" name="nama" id="nama" placeholder="Enter Criteria Name" class="w-100">
                <br><br>
                <input type="text" name="criteria" id="criteria" placeholder="Enter Criteria Name"  class="w-100">
                <br><br>
                <input type="text" name="bobot" id="bobot" placeholder="Enter Criteria Name"  class="w-100">
                <br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
</div>


    <script type="text/javascript">
        $(function() {
            table = $('#criteria-table').DataTable({
                processing: true,
                serverSide: true,
                url: "{{ route('kriteria.index') }}",
                columns: [{
                        data: 'DT_RowIndex'
            },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'criteria'
                    },
                    {
                        data: 'bobot'
                    },
                ],
            });

           
        });

        
    </script>
@endsection