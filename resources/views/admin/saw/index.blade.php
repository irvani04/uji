@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb4"> Hitung SAW </h2>


    <div class="card">
        <div class="card-header">
            Data Karyawan
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
                    <table id="data-table" class="table table-striped table-bordered">
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
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <center><button type="submit" class="btn btn-sm btn-primary float">Hitung</button></center>
                </div>
                
            </body>
        </div>
    </div>

    {{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}

<!-- Modal -->
<div id="address" class="modal fade" role="dialog">
  <div class="modal-dialog">
 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
			<h5 class="text-center">Pilih Alamat Pengiriman</h5>
			<table class="table table-striped" id="address-table" width="100%">
			  <thead id="tblHead">
				<tr>
				  
				  <th>address</th>
				  <th class="text-right">action</th>
				</tr>
			  </thead>
			  <tbody>
				
			  </tbody>
			</table>
		  </div>
		  <div class="modal-footer">
			
		  </div>
      </div>
    </div>
 
  </div>
</div>
  
  <!-- script -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src=" https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                url: "{{ route('saw.index') }}",
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'user_name'
                    },
                    {
                        data: 'n_komun'
                    },
                    {
                        data: 'n_kejujuran'
                    },
                    {
                        data: 'n_kesop'
                    },
                    {
                        data: 'n_psikotes'
                    },
                    {
                        data: 'n_tertulis'
                    },
                    {
                        data: 'n_praktek'
                    },
                ],
            });

        });
    </script>
@endsection
