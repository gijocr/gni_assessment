@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-success" href="{{ route('admin.resultTexts.create') }}">New</a>
  </div>

  <div class="col-12">
    <table class="table table-hover datatable bg-white ">
      <thead>
        <tr>
          <th>Type</th>
          <th>Name</th>
          <th>Title</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($resultTexts as $resultText)
        <tr>
          <td>{{ $resultText->pageType->name }}</td>
          <td>{{ $resultText->name }}</td>
          <td>{{ $resultText->title }}</td>
          <td>{{ $resultText->order }}</td>
          <td>
            <a class="btn btn-link" href="{{ route('admin.resultTexts.edit', $resultText) }}">Edit</a>

            {{ Form::model($resultText,['route' => ['admin.resultTexts.destroy', $resultText], 'method' => 'delete', 'class' => 'd-inline']) }}
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