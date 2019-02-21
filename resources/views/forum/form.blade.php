<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:', ['class' => 'control-label']) !!}
    <div  id="test-editormd">
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

</div>


@include('markdown::encode',['editors'=>['test-editormd']])
