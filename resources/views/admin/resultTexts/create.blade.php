@extends('admin._layouts.app')

@section('form_content')
<div class="row">
  <div class="col-12">
    <h3 class="mb-4 text-center">Create Result Texts</h3>
  </div>

  <div class="col-12">
    @include('admin._includes.alert')
  </div>

  <div class="col-12">
    {{ Form::open(['route' => 'admin.resultTexts.store', 'method' => 'post']) }}

    <div class="form-row">
      <div class="form-group col-md-6">
        {{ Form::label('page_type_id', 'Type') }}
        {{ Form::select('page_type_id', ['' => 'Select'] + $pageTypes, [], ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('final', 'It is a final result text?') }}
        {{ Form::select('final', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-4">
        {{ Form::label('score_min', 'Score Min.') }}
        {{ Form::number('score_min', null, ['class' => 'form-control', 'step' => '0.10']) }}
      </div>

      <div class="form-group col-md-4">
        {{ Form::label('score_max', 'Score Max.') }}
        {{ Form::number('score_max', null, ['class' => 'form-control', 'step' => '0.10']) }}
      </div>

      <div class="form-group col-md-4">
        {{ Form::label('order', 'Order') }}
        {{ Form::text('order', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group text-right mt-3">
      <button class="btn btn-block btn-success" type="submit">Save</button>
    </div>

    {{ Form::close() }}
  </div>
</div>
@endsection