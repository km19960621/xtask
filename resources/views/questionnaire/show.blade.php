@extends('layout')
@section('title', '回答の詳細ページ')

@section('content')
  <div class="container">
    <p>
      氏名を教えてください。<br>
      →{{ $questionnaire->name }}
    </p>
    <p>
      年齢を教えてください。<br>
      →{{ $age_text }}
    </p>
    <p>
      性別を教えてください。<br>
      →{{ $gender_text }}
    </p>
    <p>
      希望物件種別を教えてください。<br>
      →
      @foreach($desired_property_type_text as $d)
        {{ $d }}
        @if (next($desired_property_type_text))
          、
        @endif
      @endforeach
    </p>
    <p>
      その他ご要望をご入力ください。<br>
      →{{ $questionnaire->request }}
    </p>
    <p>
      <a href="{{ action('QuestionnaireController@index') }}">一覧へ戻る</a>
    </p>
  </div>
@endsection
