@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-primary" href="{{ route('admin.configs.management') }}">Management</a>

    {{-- {{ Form::model($page,['route' => ['admin.pages.destroy', $page], 'method' => 'delete', 'class' => 'd-inline']) }}
    <button type="submit" class="btn btn-link text-danger">Delete</button>
    {{ Form::close() }} --}}
  </div>

  <div class="col-12">
    <table class="table table-hover datatable bg-white ">
      <thead>
        <tr>
          <th>Index</th>
          <th>Content</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($configs as $config)
        <tr>
          <td>{{ $config->content }}</td>
          <td>{{ $config->content }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection