@extends('admin._layouts.app')

@section('form_content')
<div class="row">
  <div class="col-12">
    <h3 class="mb-4 text-center">Management Settings</h3>
  </div>

  <div class="col-12">
    @include('admin._includes.alert')
  </div>

  <div class="col-12">
    {{ Form::open(
      [
        'route' => 'admin.configs.update', 
        'method' => 'post',
        'files' => true
      ]
      ) }}

    <div class="form-row">

      <div class="form-group col-md-12">
        {{ Form::label('images[header_logo_left]', 'Left Header Image') }}
        <div class="input-group">
          <div class="custom-file">
            {{ Form::label('images[header_logo_left]', 'Select file', ['class' => 'custom-file-label']) }}
            {{ Form::file('images[header_logo_left]', null, ['class' => 'custom-file-input']) }}
          </div>
        </div>
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('images[header_logo_right]', 'Right Header Image') }}
        <div class="input-group">
          <div class="custom-file">
            {{ Form::label('images[header_logo_right]', 'Select file', ['class' => 'custom-file-label']) }}
            {{ Form::file('images[header_logo_right]', null, ['class' => 'custom-file-input']) }}
          </div>
        </div>
      </div>
    </div>

    <div class="form-group text-right mt-3">
      <button class="btn btn-block btn-success" type="submit">Save</button>
    </div>

    {{ Form::close() }}
  </div>
</div>
@endsection