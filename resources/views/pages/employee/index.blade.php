@extends('layouts.default')
@section('title', 'Data Karyawan')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Data Karyawan</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-right">
                            <a data-toggle="modal" data-target="#filterModalForm">
                                <button class="btn btn-warning btn-round ml-auto">
                                Filter
                                </button>
                            </a>
                            <a href="{{ route('employee.create') }}">
                                <button class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Tambah Karyawan
                                </button>
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Nik</th>
                                    <th>No. Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Modal -->
<div id="filterModalForm" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row form-group">
                <label class="col-md-12">NIK</label>
                <div class="col-md-12">
                    <input type="input" class="form-control" id="nik" name="nik">
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-12">Nama</label>
                <div class="col-md-12">
                    <input type="input" class="form-control" id="nama" name="nama">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-filter">Cari</button>
        </div>
      </div>
    </div>
</div>

@push('after-script')
    <script >
        @if(Session::has('message_alert'))  
            swal(
                'Success!',
                '{{ Session::get("message_alert") }}',
                'success'
            );
        @endif

        // $(document).ready(function() {
        //     $('#basic-datatables').DataTable({
        //     });
        // });
        $(function () {
            var dtTable = $('#basic-datatables').DataTable({
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],

                processing: true,
                serverSide: true,
                lengthMenu: [5, 10, 20, 50, 100, 200],
                ajax: {
                    "url" : "{!! route('employee.datatables') !!}",
                    "data": function ( d ) {
                        // console.log(d);
                        // d.filter_title = $('#filter_title').val();
                        d.nik = $('#nik').val();
                        d.nama = $('#nama').val();

                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'name', name: 'name' },
                    { data: 'nik', name: 'nik' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center display-block' }

                ],
                order: [[ 0, 'asc' ]],
                drawCallback: function () {
            }
	    });

		$('#btn-filter').click(function(){
	    	dtTable.draw();
	    	$('#filterModalForm').modal('hide');
		});
	})

    </script>
@endpush