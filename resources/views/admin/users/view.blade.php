@extends('layouts.admin.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User Management</li>
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
                        <h3 class="box-title">User List</h3>
                        <!--<div class="pull-right">
                            <a href="{{ url('admin/category/create') }}" class="btn btn-primary">Add Category</a>
                        </div>-->
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped dt-responsive"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="5%">Delete</th>
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
            
            // var metas = document.getElementsByTagName('meta'); 

            // for (var i=0; i<metas.length; i++) { 
            //     if (metas[i].getAttribute("name") == "_token") { 
            //         //alert(metas[i].getAttribute("content")); 
            //     } 
            // } 

            // setTimeout(function(){
            //     //do what you need here
            // }, 2000);
            
            var otable = $('#example').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                type: "post",
                ajax: "{!! route('getusertable') !!}",
                columns: [
                    {data: "id"},
                    {data: "name"},
                    {data: "email"},
                    {data: "delete", orderable: false, searchable: false},
                ],
                "order": [[ 1, 'asc' ]]
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
                            url: "{{url('admin/users')}}/" + id,
                            data: {_method: 'delete', _token: token},
                            beforeSend: function () {
                                //$('#wait').html("Wait for checking");
                            },
                            success: function (data) {
                                otable.draw();
                                swal("Deleted!", "User has been deleted.", "success");
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
                            url: "{{ url('admin/category') }}/" + id + "/edit",
                            data: {_token: token},
                            beforeSend: function () {
                                //$('#wait').html("Wait for checking");
                            },
                            success: function (data) {
                                otable.draw();
                                swal("Success!", "Category has been updated.", "success");
                            },
                            error: function () {
                                otable.draw();
                                swal("Oops!", "Something went wrong", "error");
                            }
                        });
                    });
            });
        });
    </script>
@stop