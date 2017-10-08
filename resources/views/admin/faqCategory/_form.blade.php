<div class="form-group">
    {!! Form::label('faqCategory',"FAQ Category",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
        {!! Form::text('title',null,["class"=>"form-control","required"=>"true"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('title') }}</strong></span>
    </div>
</div>



