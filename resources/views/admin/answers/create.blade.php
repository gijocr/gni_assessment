@extends('admin._layouts.app')

@section('form_content')
<div class="row">
  <div class="col-12">
    <h3 class="mb-4 text-center">Create Answers</h3>
  </div>

  <div class="col-12">
    @include('admin._includes.alert')
  </div>

  <div class="col-12">
    {{ Form::open(['route' => 'admin.answers.store', 'method' => 'post']) }}

    <div class="form-row">
      <div class="form-group col-md-12">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('order', 'Order') }}
        {{ Form::text('order', null, ['class' => 'form-control', 'maxlength' => '7']) }}
      </div>
    </div>

    <div class="form-group text-right mt-3">
      <button class="btn btn-block btn-success" type="submit">Save</button>
    </div>

    {{ Form::close() }}
  </div>
</div>
@endsection