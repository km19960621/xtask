@extends('layout')
@section('title', '回答の一覧ページ')

@section('content')
  <div class="container">
    <ul>
      @foreach($questionnaire as $q)
        <li>
          <p>
            <a href="{{ action('QuestionnaireController@show', ['id' => $q->id]) }}">{{ $q->name }}</a>
            （{{ $q->created_at->format('Y/m/d') }}）
          </p>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
