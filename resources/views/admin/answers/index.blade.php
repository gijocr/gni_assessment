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
          <th></th>

          @foreach ($questionTypes as $questionType)
          <th>{{ $questionType->title }}</th>
          @endforeach

          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($answers as $answer)
        <tr>
          <td>{{ $answer->title }}</td>

          <td>
            @foreach ($answer->questionTypes as $answerQuestionType)
            @foreach ($questionTypes as $questionType)
            {{ $questionType->id === $answerQuestionType->id ? $answerQuestionType->pivot->score : '-' }}
            @endforeach
            @endforeach
          </td>

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