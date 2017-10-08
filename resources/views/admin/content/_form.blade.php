<div class="form-group">
	{!! Form::label('ContentType',"Select Content Type",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
	<div class="col-sm-6 {{ $errors->has('category_name') ? ' has-error' : '' }}">
        {!! Form::select('contentTypeId',$contentType,null,["class"=>"form-control","name"=>"contentTypeId","id"=>"select2"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('contentTypeId') }}</strong></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('CategoryName',"Content Name",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-10 {{ $errors->has('category_name') ? ' has-error' : '' }}">
        {!! Form::text('title',null,["class"=>"form-control","required"=>"true"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('title') }}</strong></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('ContentDesc',"Content Description",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-10">
        {!! Form::textarea('content',null,["class"=>"form-control","required"=>"true"]) !!}
    </div>
</div>

@ckeditor('content')


