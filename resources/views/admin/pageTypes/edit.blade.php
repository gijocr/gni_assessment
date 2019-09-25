@extends('admin._layouts.app')

@section('form_content')
<div class="row">
  <div class="col-12">
    <h3 class="mb-4 text-center">Update Page Type</h3>
  </div>

  <div class="col-12">
    @include('admin._includes.alert')
  </div>

  <div class="col-12">
    {{ Form::model(
        $pageType,
        ['route' => ['admin.pageTypes.update', $pageType], 
        'method' => 'put'
      ]) 
    }}

    <div class="form-row">
      <div class="form-group col-md-6">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('order', 'Order') }}
        {{ Form::text('order', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('text_color', 'Text Color') }}
        {{ Form::text('text_color', null, ['class' => 'form-control', 'maxlength' => '7']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('header_color', 'Header Color') }}
        {{ Form::text('header_color', null, ['class' => 'form-control', 'maxlength' => '7']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('body_color', 'Body Color') }}
        {{ Form::text('body_color', null, ['class' => 'form-control', 'maxlength' => '7']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('footer_color', 'Footer Color') }}
        {{ Form::text('footer_color', null, ['class' => 'form-control', 'maxlength' => '7']) }}
      </div>
    </div>

    <div class="form-group text-right mt-3">
      <button class="btn btn-block btn-success" type="submit">Save</button>
    </div>

    {{ Form::close() }}
  </div>
</div>
@endsection