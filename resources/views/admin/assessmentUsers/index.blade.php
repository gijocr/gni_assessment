@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-success" href="{{ route('admin.assessmentUsers.create') }}">New</a>
  </div>

  <div class="col-12">
    <table class="table table-hover datatable bg-white ">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Organization</th>
          <th>Job</th>
          <th>Area</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($assessmentUsers as $assessmentUser)
        <tr>
          <td>{{ $assessmentUser->name }}</td>
          <td>{{ $assessmentUser->email }}</td>
          <td>{{ $assessmentUser->organization }}</td>
          <td>{{ $assessmentUser->job }}</td>
          <td>{{ $assessmentUser->area }}</td>
          <td>
            <a class="btn btn-link" href="{{ route('admin.assessmentUsers.edit', $assessmentUser) }}">Edit</a>

            {{ Form::model($assessmentUser,['route' => ['admin.assessmentUsers.destroy', $assessmentUser], 'method' => 'delete', 'class' => 'd-inline']) }}
            <button type="submit" class="btn btn-link text-danger">Delete</button>
            {{ Form::close() }}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection