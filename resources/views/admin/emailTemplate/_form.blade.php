<div class="form-group">
    {!! Form::label('constantName',"Constant Name",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-6 {{ $errors->has('constant') ? ' has-error' : '' }}">
        {!! Form::text('constant',null,["class"=>"form-control","required"=>"true"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('constant') }}</strong></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('subjectName',"Subject",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-6 {{ $errors->has('subject') ? ' has-error' : '' }}">
        {!! Form::text('subject',null,["class"=>"form-control","required"=>"true"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('subject') }}</strong></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('emailTemplate',"Email Template",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-10">
        {!! Form::textarea('message',null,["class"=>"form-control","required"=>"true"]) !!}
    </div>
</div>

@ckeditor('message')



