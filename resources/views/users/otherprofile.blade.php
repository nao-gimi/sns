@extends('layouts.login')

@section('content')
<div>
  <img src="/images/{{ $otherprofile->images }}">
  <p>{{ $otherprofile->username }}</p>
  <p>{{ $otherprofile->bio }}</p>
@if(!in_array($otherprofile->id, array_column($followlist, 'follow')))
  <a href="/follow/{{ $otherprofile->id }}">フォローをする</a>
  @else
  <a href="/unfollow/{{ $otherprofile->id }}">フォローを外す</a>
  @endif
</div>
@foreach($otherposts as $otherpost)
<ul>
  <li><img src="/images/{{ $otherpost->images }}"></li>
  <li>{{ $otherpost->username }}</li>
  <li>{{ $otherpost->posts }}</li>
  <li>{{ $otherpost->created_at }}</li>
</ul>
@endforeach
@endsection
