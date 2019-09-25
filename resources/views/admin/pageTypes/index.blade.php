@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-success" href="{{ route('admin.pageTypes.create') }}">New</a>
  </div>

  <div class="col-12">
    <table class="table table-hover datatable bg-white ">
      <thead>
        <tr>
          <th>Name</th>
          <th>Order</th>
          <th>Text Color</th>
          <th>Header Color</th>
          <th>Body Color</th>
          <th>Footer Color</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pageTypes as $pageType)
        <tr>
          <td>{{ $pageType->name }}</td>
          <td>{{ $pageType->order }}</td>
          <td>{{ $pageType->text_color }}</td>
          <td>{{ $pageType->header_color }}</td>
          <td>{{ $pageType->body_color }}</td>
          <td>{{ $pageType->footer_color }}</td>
          <td>
            <a class="btn btn-link" href="{{ route('admin.pageTypes.edit', $pageType) }}">Edit</a>

            {{ Form::model($pageType,['route' => ['admin.pageTypes.destroy', $pageType], 'method' => 'delete', 'class' => 'd-inline']) }}
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