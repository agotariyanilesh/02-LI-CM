@extends('layouts.admin.app')

@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
                <small>Setting</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/home') }}"><i class="fa fa-user"></i> Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    
                </div>
                <!-- left column -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Manage Profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::model($record,['url' => url('/admin/profile/info'), 'method' => 'post','name'=>'admin_profile','files'=>'true']) !!}
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                                    {{ Form::text('name',null,['class' => 'form-control','placeholder'=>'Name']) }}
                                </div>

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">Email address <span class="text-danger">*</span></label>
                                    {{ Form::text('email',null,['class' => 'form-control','placeholder'=>'Email']) }}
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Image</label>
                                    <div class="{{ $errors->has('profile_img') ? ' has-error' : '' }}"> 
                                        {!! Form::file('profile_img',["class"=>"form-control"]) !!}
                                        <span class="help-block" id="error_name"><strong>{{ $errors->first('profile_img') }}</strong></span><br>
                                    </div>
                                    <img src="{{ ($record->profile_img!='') ? url('uploads/admin/').'/'.$record->profile_img : url('uploads/admin/').'/default_user.png' }}" height="150">
                                </div>                            
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit"  class="btn btn-primary">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Password  Reset</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['url' => url('admin/profile/password'), 'method' => 'post']) !!}
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label">New Password <span class="text-danger">*</span></label>
                                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
	                                    {!! Form::password('password', ['class' => 'form-control']) !!}
	                                    <span class="help-block" id="error_password"><strong>{{ $errors->first('password') }}</strong></span>
	                                </div>
                                </div>
                                
                               <div class="form-group">
                                   <label class="control-label">Password Confirmation <span class="text-danger">*</span></label>
                                   <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                                   {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
	                                   <span class="help-block" id="error_password_confirmation"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
	                                </div>
                               </div>                                
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    
@endsection

@section('script')
@stop