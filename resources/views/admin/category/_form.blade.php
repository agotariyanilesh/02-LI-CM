<div class="form-group">
    {!! Form::label('CategoryName',"Category Name",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-6 {{ $errors->has('category_name') ? ' has-error' : '' }}">
        {!! Form::text('category_name',null,["class"=>"form-control","required"=>"true"]) !!}
        <span class="help-block" id="error_name"><strong>{{ $errors->first('category_name') }}</strong></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('CategoryDesc',"Category Description",["class"=>"col-sm-2 control-label","id"=>"Label_Id"]) !!}
    <div class="col-sm-6">
        {!! Form::textarea('category_desc',null,["class"=>"form-control","required"=>"true"]) !!}
    </div>
</div>

