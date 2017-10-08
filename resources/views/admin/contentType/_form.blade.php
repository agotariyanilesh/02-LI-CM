<div class="form-group">
    {!! Form::label('contentType',"Content Type",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-6 {{ $errors->has('contentType') ? ' has-error' : '' }}">
        {!! Form::text('contentType',null,["class"=>"form-control","required"=>"true"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('contentType') }}</strong></span>
    </div>
</div>



