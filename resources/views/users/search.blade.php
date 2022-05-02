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
  @if(!in_array($userlist->id, array_column($followlist, 'follow')))
  <li><a href="/follow/{{ $userlist->id }}">フォローをする</a></li>
  @else
  <li><a href="/unfollow/{{ $userlist->id }}">フォローを外す</a></li>
  @endif
</ul>
@endforeach

@endsection
