@extends('admin._layouts.app')

@section('form_content')
<div class="row">
  <div class="col-12">
    <h3 class="mb-4 text-center">Update Answers</h3>
  </div>

  <div class="col-12">
    @include('admin._includes.alert')
  </div>

  <div class="col-12">
    {{ Form::model(
        $answer,
        ['route' => ['admin.answers.update', $answer], 
        'method' => 'put'
      ]) 
    }}

    <div class="form-row">
      <div class="form-group col-md-12">
        {{ Form::label('question_types', 'Type') }}
        {{ Form::select(
          'question_types[ids][]',
          $questionTypes, 
          $answer->questionTypes,
          [
            'class' => 'form-control select2',
            'multiple' => 'multiple',
            'required' => 'required',
          ]
        ) }}
      </div>
      @foreach($answer->questionTypes as $questionType)
      <div class="form-group col-md-12">
        <b class="d-block mb-2">{{  $questionType->title }}</b>

        <div class="form-row">
          <div class="form-group col-md-6">
            {{ Form::label('question_types[score][' . $questionType->id . ']', 'Score') }}
            {{ Form::text('question_types[score]['. $questionType->id .']', $questionType->pivot->score, ['class' => 'form-control']) }}
          </div>

          <div class="form-group col-md-6">
            {{ Form::label('question_types[factor][' . $questionType->id . ']', 'Factor') }}
            {{ Form::text('question_types[factor][' . $questionType->id . ']', $questionType->pivot->factor, ['class' => 'form-control']) }}
          </div>
        </div>

      </div>
      @endforeach

      <div class="form-group col-md-12">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
      </div>

      <div class="form-group col-md-4">
        {{ Form::label('order', 'Order') }}
        {{ Form::text('order', null, ['class' => 'form-control']) }}
      </div>
    </div>

    <div class="form-group text-right mt-3">
      <button class="btn btn-block btn-success" type="submit">Save</button>
    </div>

    {{ Form::close() }}
  </div>
</div>
@endsection