@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-success" href="{{ route('admin.answers.create') }}">New</a>
  </div>

  <div class="col-12">
    <table class="table table-hover datatable bg-white ">
      <thead>
        <tr>
          <th>Title</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($answers as $answer)
        <tr>
          <td>{{ $answer->title }}</td>
          <td>{{ $answer->order }}</td>
          <td>
            <a class="btn btn-link" href="{{ route('admin.answers.edit', $answer) }}">Edit</a>

            {{ Form::model($answer,['route' => ['admin.answers.destroy', $answer], 'method' => 'delete', 'class' => 'd-inline']) }}
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