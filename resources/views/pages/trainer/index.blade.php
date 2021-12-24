@extends('layouts.default')
@section('title', 'Trainer')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Data Trainer</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-right">
                            <a href="{{ route('trainer.create') }}">
                                <button class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Tambah Trainer
                                </button>
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Trainer</th>
                                    <th>Phone</th>
                                    <th>Nama Training</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;?>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->phone_number }}</td>
                                        <td>{{ $row->training_name }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                    <a href="{{ route('trainer.edit', $row->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </button>
                                                {{-- <form action="{{ route('employee.destroy', $row->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-link btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++ ;?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Modal -->
{{-- <div id="confirm-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-dialog modal-sm w-400">
            <div class="modal-content">
                <div class="modal-header">
                    Hapus Karyawan
                </div>
                <form action="{{ route('employee.destroy', $row->id) }}" method="POST">
                    @csrf
                    
                    <div class="modal-body">
                        <p>Do you want to proceed?</p>
                        <p class="debug-url"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@push('after-script')
    <script >
        @if(Session::has('message_alert'))  
            swal(
                'Success!',
                '{{ Session::get("message_alert") }}',
                'success'
            );
        @endif

        $(document).ready(function() {
            $('#basic-datatables').DataTable({
            });

            $('#multi-filter-select').DataTable( {
                "pageLength": 5,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                                );

                            column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                    ]);
                $('#addRowModal').modal('hide');

            });
        });
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>
@endpush