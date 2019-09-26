@extends('admin._layouts.app')

@section('form_content')
<div class="row">
  <div class="col-12">
    <h3 class="mb-4 text-center">Update Assessment Users</h3>
  </div>

  <div class="col-12">
    @include('admin._includes.alert')
  </div>

  <div class="col-12">
    {{ Form::model(
      $assessmentUser,
      [
        'route' => ['admin.assessmentUsers.update', $assessmentUser],
        'method' => 'put'
      ]
    ) }}

    <div class="form-row">
      <div class="form-group col-md-12">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('email', 'E-mail') }}
        {{ Form::email('email', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-12">
        {{ Form::label('organization', 'Organization') }}
        {{ Form::text('organization', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('job', 'Job') }}
        {{ Form::text('job', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-6">
        {{ Form::label('area', 'Area') }}
        {{ Form::text('area', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group text-right mt-3">
      <button class="btn btn-block btn-success" type="submit">Save</button>
    </div>

    {{ Form::close() }}
  </div>
</div>
@endsection