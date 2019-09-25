@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-success" href="{{ route('admin.pages.create') }}">New</a>
  </div>

  <div class="col-12">
    <table class="table table-hover table-bordered datatable bg-white ">
      <thead>
        <tr>
          <th>Teste A</th>
          <th>Teste B</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
@endsection