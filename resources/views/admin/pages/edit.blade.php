@extends('admin._layouts.app')

@section('form_content')
<div class="row">
  <div class="col-12">
    <h3 class="mb-4 text-center">Update Pages</h3>
  </div>

  <div class="col-12">
    @include('admin._includes.alert')
  </div>

  <div class="col-12">
    {{ Form::model(
      $page, 
      [
        'route' => ['admin.pages.update', $page], 
        'method' => 'put'
      ]
      ) }}

    <div class="form-row">
      <div class="form-group col-md-12">
        {{ Form::label('page_type_id', 'Type') }}
        {{ Form::select('page_type_id', ['' => 'Select'] + $pageTypes, null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('footer_label', 'Footer Label') }}
        {{ Form::text('footer_label', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('button_label', 'Button Label') }}
        {{ Form::text('button_label', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-6">
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