@extends('layout')
@section('title', 'アンケート回答ページ')

@section('content')
  <div class="container">
    <form action="{{ action('QuestionnaireController@create') }}" method="post" enctype="multipart/form-data">
      @if (count($errors) > 0)
        <ul>
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      @endif
      <p>
        氏名を教えてください。
        <input type="text" name="name">
      </p>
      <p>
        年齢を教えてください。
        <select name="age">
          <option value=""></option>
          <option value="1">20歳未満</option>
          <option value="2">20〜39歳</option>
          <option value="3">40歳〜59歳</option>
          <option value="4">60歳以上</option>
        </select>
      </p>
      <p>
        性別を教えてください。
        <input type="radio" name="gender" value="1">男性
        <input type="radio" name="gender" value="2">女性
      </p>
      <p>
        希望物件種別を教えてください。
        <input type="checkbox" name="desired_property_type[]" value="1">新築一戸建て
        <input type="checkbox" name="desired_property_type[]" value="2">中古一戸建て
        <input type="checkbox" name="desired_property_type[]" value="3">マンション
        <input type="checkbox" name="desired_property_type[]" value="4">土地
      </p>
      <p>
        その他ご要望をご入力ください。<br>
        <textarea name="request" rows="5" cols="50"></textarea>
      </p>
      {{ csrf_field() }}
      <input type="submit" class="btn btn-primary" value="送信">
    </form>
  </div>
@endsection
