@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-success" href="{{ route('admin.pages.create') }}">New</a>
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
        @foreach ($pages as $page)
        <tr>
          <td>{{ $page->pageType->name }}</td>
          <td>{{ $page->name }}</td>
          <td>{{ $page->title }}</td>
          <td>{{ $page->order }}</td>
          <td>
            <a class="btn btn-link" href="{{ route('admin.pages.edit', $page) }}">Edit</a>

            {{ Form::model($page,['route' => ['admin.pages.destroy', $page], 'method' => 'delete', 'class' => 'd-inline']) }}
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