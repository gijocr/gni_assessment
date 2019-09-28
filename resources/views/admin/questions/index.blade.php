@extends('admin._layouts.app')

@section('content')
<div class="row">
  <div class="col-12 text-right">
    <a class="btn btn-success" href="{{ route('admin.questions.create') }}">New</a>
  </div>

  <div class="col-12">
    <table class="table table-hover datatable bg-white ">
      <thead>
        <tr>
          <th>Page Type</th>
          <th>Question Type</th>
          <th>Description</th>
          <th>Order</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($questions as $question)
        <tr>
          <td>{{ $question->pageType->name }}</td>
          <td>{{ $question->questionType->name }}</td>
          <td>{!! $question->description !!}</td>
          <td>{{ $question->order }}</td>
          <td>
            <a class="btn btn-link" href="{{ route('admin.questions.edit', $question) }}">Edit</a>

            {{ Form::model($question, ['route' => ['admin.questions.destroy', $question], 'method' => 'delete', 'class' => 'd-inline']) }}
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
