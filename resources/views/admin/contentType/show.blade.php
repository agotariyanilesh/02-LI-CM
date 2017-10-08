@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="pull-left">
                {{ $title }} Details
            </h1>
            <p>&nbsp;</p>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="pull-left col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="30%">Category Name</th>
                                    <td width="70%">{{ $record['contentType'] }}</td>
                                </tr>

                                <tr>
                                    <th width="30%">Status</th>
                                    <td width="70%">{{ ($record['status']==1 ? 'Active':'Deactive') }}</td>
                                </tr> 

                                </thead>

                            </table>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="{{ url($path) }}" type="submit" class="btn btn-default pull-left">Back</a>
                        </div>
                    </div>

                            <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#example1').DataTable();
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endsection