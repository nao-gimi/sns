@extends('layouts.login')

@section('content')
@foreach($followlist as $followlist)
<a href="/other/{{ $followlist->id }}"><img src="/images/{{ $followlist->images }}"></a>
@endforeach
@foreach($followpost as $followpost)
<ul>
  <li><img src="/images/{{ $followpost->images }}"></li>
  <li>{{ $followpost->username }}</li>
  <li>{{ $followpost->posts }}</li>
  <li>{{ $followpost->created_at }}</li>
</ul>
@endforeach
@endsection
