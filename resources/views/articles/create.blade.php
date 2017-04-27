@extends('app')

@section('content')
  <h1>Write a new Article </h1>

  <hr />

  {!! Form::open() !!}
    <div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class' => 'form-control']) !!}
   </div>
  
   <div class="form-group">
      {!! Form::label('body', 'Body:') !!}
      {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
   </div>
  {!! Form::close() !!}
@stop
