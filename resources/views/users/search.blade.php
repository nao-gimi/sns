@extends('layouts.login')

@section('content')
<form action="/search" method="post">
@csrf
  <input type="text" name="search" placeholder="ユーザー検索">
  <input type="submit" value="検索">
</form>

@foreach($userlists as $userlist)
<ul>
  <li><img src="/images/{{ $userlist->images }}"></li>
  <li>{{ $userlist->username }}</li>
  <li><a href="">フォローをする</a></li>
  <li><a href="">フォローを外す</a></li>
</ul>
@endforeach

@endsection
