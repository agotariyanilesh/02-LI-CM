@extends('layouts.admin.app')

@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="pull-left">
                Site Settings
            </h1>
            
            <p>&nbsp;</p>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        @include('errors.flash')
                    </div>
                    <div class="box box-info">
                        <span class="text-right"><div class="help-block"><label><span class="text-danger">*</span></label> Indicates required field &nbsp;&nbsp;</div></span>
                        {!! Form::model($record, ['route' => [$route.'info'],'id'=>'myform', 'method' => 'post', 'class' => 'ajax_submit','files'=>'true']) !!}
                            
                            <div class="box-body">
                                <span class="section">Site Name, Logo and Favicon</span>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Site Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('site_name') ? ' has-error' : '' }}">
                                            {!! Form::text('site_name',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('site_name') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group ">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Site Logo <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-3 {{ $errors->has('site_logo') ? ' has-error' : '' }}">
                                            {!! Form::file('site_logo',["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('site_logo') }}</strong></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <img src="{{ ($record->site_logo!='') ? url('uploads/admin/logo').'/'.$record->site_logo : url('/uploads/admin/logo/default_user.png') }}" height="120" width="290" alt="Site Logo">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="form-group ">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Site Favicon <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-3 {{ $errors->has('site_favicon') ? ' has-error' : '' }}">
                                            {!! Form::file('site_favicon',["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('site_favicon') }}</strong></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <img src="{{ ($record->site_favicon!='') ? url('uploads/admin/logo').'/'.$record->site_favicon : url('uploads/admin/logo').'/default_user.png' }}" width="15%" alt="Site Favicon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-body">
                                <span class="section">Social Connect</span>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Facebook URL</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('fb_url') ? ' has-error' : '' }}">
                                            {!! Form::text('fb_url',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('fb_url') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Twitter URL</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('tw_url') ? ' has-error' : '' }}">
                                            {!! Form::text('tw_url',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('tw_url') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Linkedin URL</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('li_url') ? ' has-error' : '' }}">
                                            {!! Form::text('li_url',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('li_url') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-body">
                                <span class="section">Site Recipient Contact Details</span>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('contact_email') ? ' has-error' : '' }}">
                                            {!! Form::email('contact_email',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('contact_email') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Contact Number</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('contact_num') ? ' has-error' : '' }}">
                                            {!! Form::text('contact_num',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('contact_num') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-body">
                                <span class="section">Paypal Details</span>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>User Name</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('paypal_user') ? ' has-error' : '' }}">
                                            {!! Form::text('paypal_user',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('paypal_user') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Paypal Password</label>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <!-- {!! Form::password('paypal_pwd',["class"=>"form-control"]) !!} -->
                                            <input type="password" name="paypal_pwd" class="form-control" value="<?php echo $record['paypal_pwd'];?>">
                                            <span class="help-block" id="error_name"><strong></strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Paypal Secret</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('paypal_secret') ? ' has-error' : '' }}">
                                            {!! Form::text('paypal_secret',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('paypal_secret') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-body">
                                <span class="section">SMTP Details</span>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('smtp_user') ? ' has-error' : '' }}">
                                            {!! Form::text('smtp_user',null,["class"=>"form-control"]) !!}
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('smtp_user') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-2">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-sm-6 {{ $errors->has('smtp_pwd') ? ' has-error' : '' }}">
                                            <!-- {!! Form::password('smtp_pwd',["class"=>"form-control"]) !!} -->
                                            <input type="password" name="smtp_pwd" class="form-control" value="<?php echo $record['smtp_pwd'];?>">
                                            <span class="help-block" id="error_name"><strong>{{ $errors->first('smtp_pwd') }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a href="" type="submit"
                                   class="btn btn-default pull-left">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
@stop

@section('script')
@endsection