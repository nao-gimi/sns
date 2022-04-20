@extends('layouts.login')

@section('content')
<form action="/postcreat" method="post">
  @csrf
  <input type="text" name="post">
  <input type="image" src="/images/post.png" alt="送信する">
</form>

@foreach($tweets as $tweet)
<ul>
  <li><img src="/images/{{ $tweet->images }}"></li>
  <li>{{ $tweet->username }}</li>
  <li>{{ $tweet->posts }}</li>
  <li>{{ $tweet->created_at }}</li>

    <div style="text-align:right">
    <img src="/images/edit.png" class="modalopen" data-target="{{ $tweet->id }}">
      <form action="/delete/{{ $tweet->id }}" method="post">
        @csrf
        @method('DELETE')
        <input type="image" width="30px" height="30px" src="/images/trash_h.png" alt="削除する" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
      </form>
    </div>
</ul>
<div class='update' id="{{ $tweet->id }}">
  <form action="/update/{{ $tweet->id }}" method="post">
  @csrf
    <input type="text" name="update" value="{{ $tweet->posts }}">
    <input type="image" src="/images/edit.png" >
  </form>
</div>

@endforeach

@endsection
