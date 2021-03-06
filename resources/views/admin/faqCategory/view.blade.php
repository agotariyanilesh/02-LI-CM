@extends('layouts.admin.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            FAQ Category Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">FAQ Category Management</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @include('errors.flash')
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">FAQ Category List</h3>
                        <div class="pull-right">
                            <a href="{{ url('admin/faqCat/create') }}" class="btn btn-primary">Add FAQ Category</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="category" class="table table-bordered table-striped dt-responsive"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            var otable = $('#category').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{!! url('admin/faqCat') !!}",
                columns: [
                    {data: "title",name:'title'},
                    {data: 'status', name: 'status', searchable: false,orderable : false,className : 'text-center'},
                    {data: "action", orderable: false, searchable: false},
                    
                ],
                "order": [[ 1, 'asc' ]]
            });

             $('#category').on('draw.dt', function () {
                $('.chk_status').each(function () {
                    $(this).bootstrapToggle()
                });
            });

            $(document).on('click', '#delete', function () {
                var id = $(this).attr('val');
                var token = $(this).data('token');
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function () {
                        $.ajax({
                            type: "post",
                            url: "{{url('admin/faqCat')}}/" + id,
                            data: {_method: 'delete', _token: token},
                            beforeSend: function () {
                                //$('#wait').html("Wait for checking");
                            },
                            success: function (data) {
                                otable.draw();
                                swal("Deleted!", "Category has been deleted.", "success");
                            },
                            error: function () {
                                otable.draw();
                                swal("Oops!", "Something went wrong", "error");
                            }
                        });

                    });
            });
            $(document).on('click', '#action', function () {
                var id = $(this).attr('val');
                var token = $(this).data('token');
                swal({
                        title: "Are you sure?",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        closeOnConfirm: false
                    },
                    function () {
                        $.ajax({
                            type: "post",
                            url: "{{ url('admin/faqCat') }}/" + id + "/edit",
                            data: {_token: token},
                            beforeSend: function () {
                                //$('#wait').html("Wait for checking");
                            },
                            success: function (data) {
                                otable.draw();
                                swal("Success!", "FAQ Category has been updated.", "success");
                            },
                            error: function () {
                                otable.draw();
                                swal("Oops!", "Something went wrong", "error");
                            }
                        });
                    });
            });

             $("body").on("change", ".chk_status", function () {
                var row_id = $(this).val();
                if ($(this).is(':checked')) {
                    var status = 1;     // If checked
                } else {
                    var status = 0; // If not checked
                }
                
                $.ajax({
                    type: "PUT",
                    url: '{{ url('admin/faqCat') }}/' + row_id ,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": row_id,
                        "status": status,
                    },
                    beforeSend: function () {
                        //$('#datatable1').waitMe({effect: 'roundBounce'});
                    },
                    complete: function () {
                        //$('#datatable1').waitMe('hide');
                    },
                    error: function (result) {
                    },
                    success: function (result) {
                        //Success Code.
                    }
                });
            });

        });
    </script>
@stop