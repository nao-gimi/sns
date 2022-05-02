@extends('layouts.login')

@section('content')
@foreach($followerlist as $followerlist)
<a href="/other/{{ $followerlist->id }}"><img src="/images/{{ $followerlist->images }}"></a>
@endforeach
@foreach($followerpost as $followerpost)
<ul>
  <li><img src="/images/{{ $followerpost->images }}"></li>
  <li>{{ $followerpost->username }}</li>
  <li>{{ $followerpost->posts }}</li>
  <li>{{ $followerpost->created_at }}</li>
</ul>
@endforeach
@endsection
