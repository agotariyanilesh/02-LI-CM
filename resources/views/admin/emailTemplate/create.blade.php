@extends('layouts.admin.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
             Email Template 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Email Template Management</li>
            <li class="active">Email Template Type Details</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(!empty($category))
                    {!! Form::model($category,["files"=>true,"method"=>"PATCH","class"=>"form-horizontal","action"=> ['Admin\EmailTemplateController@update',$category->id]]) !!}
                @else
                    {!! Form::open(["class"=>"form-horizontal","url"=> url('admin/email'),"files"=> true]) !!}
                @endif
                
                
                <div class="box">
                    @include('errors.flash')
                    <div class="box-body">
                        @include('admin.emailTemplate._form')
                    </div>
                    <div class="box-footer">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            {!! Form::button("Submit",["class"=>"btn btn-success btn-flat","type"=>"submit"]) !!}
                            <a href="{{ url('admin/contentType') }}" class="btn btn-danger btn-flat">Cancel</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop

@section('script')
    <script type="text/javascript" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
           //  var i = 0;
            $('form').validate({
                rules: {},
                errorClass: "text-red",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    if (element.context.name == 'x') {
                        error.appendTo(element.parents(".col-sm-10:last"));
                    }
                    else {
                        error.appendTo(element.parents(".col-sm-10:first"));
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents('.form-group').addClass('has-error');
                    $(element).parents('.form-group').removeClass('has-success');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents('.form-group').removeClass('has-error');
                    $(element).parents('.form-group').addClass('has-success');
                }
            });

        });

    </script>
@stop