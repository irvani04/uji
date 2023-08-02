@extends('layout/admin-layout')

@section('space-work')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <h2 class="mb4"> Hitung KNN </h2>


    <div class="card">
        <div class="card-header">
            Data Training
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
                    <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal"
                        data-target="#exampleModal" onclick="hitung()">
                        Hitung
                    </button>
                    <table id="data-table" class="table table-striped table-bordered" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th> No </th>
                                <th> Nama </th>
                                <th> Komunikasi </th>
                                <th> Kejujuran </th>
                                <th> Kesopanan </th>
                                <th> Kepribadian </th>
                                <th> Pengetahuan </th>
                                <th> Praktek </th>
                                <th> Hasil </th>
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
            </body>
        </div>
    </div>


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- DataTable will be rendered here -->
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th> No </th>
                                <th> Nama </th>
                                <th> Hasil </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    var table, table2;
    $(document).ready(function() {
            table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                url: "{{ route('knn.index') }}",
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'komun'
                    },
                    {
                        data: 'kejur'
                    },
                    {
                        data: 'kesop'
                    },
                    {
                        data: 'keprib'
                    },
                    {
                        data: 'penget'
                    },
                    {
                        data: 'praktek'
                    },
                    {
                        data: 'hasil',
                    },
                ],
            });

            table2 = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                url: "{{ route('knn.show', 1) }}",
                type: "GET",
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'user_name'
                    },
                    {
                        data: 'result3'
                    },
                ],
            });

        });

        function hitung() {
            var user_name = [];
            var result3 = [];

            $('#dataTable tbody tr').each(function() {
                var user_name = $(this).find("td:eq(2)").text();
                var result3 = $(this).find("td:eq(3)").text();

            });
            $('#exampleModal').modal('show');
        }
    </script>
@endsection
