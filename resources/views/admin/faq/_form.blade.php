<div class="form-group">
	{!! Form::label('faqCategory',"Select FAQ Category",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
	<div class="col-sm-6 {{ $errors->has('question') ? ' has-error' : '' }}">
        {!! Form::select('faqCatId',$contentType,null,["class"=>"form-control","name"=>"faqCatId","id"=>"select2"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('faqCatId') }}</strong></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('FaqQuestion',"FAQ Question",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-10 {{ $errors->has('question') ? ' has-error' : '' }}">
        {!! Form::text('question',null,["class"=>"form-control","required"=>"true"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('question') }}</strong></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('Answer',"FAQ Answer",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-10">
        {!! Form::textarea('answer',null,["class"=>"form-control","required"=>"true"]) !!}
    </div>
</div>

@ckeditor('answer')


