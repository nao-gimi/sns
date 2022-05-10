@extends('layouts.login')

@section('content')
<div>
  <img src="/images/{{ Auth::user()->images }}">
  <form action="/myprofile" method="post" enctype="multipart/form-data">
  @csrf
  <label>UserName</label>
  <input type="text" name="username" value="{{ Auth::user()->username }}">
  <label>MailAdress</label>
  <input type="text" name="mail" value="{{Auth::user()->mail }}">
  <label>Password</label>
  <input type="password" name="password" value="{{ Auth::user()->password }}" readonly>
  <label>NewPassword</label>
  <input type="password" name="newpassword">
  <label>Bio</label>
  <input type="text" name="bio" value="{{ Auth::user()->bio }}">
  <label>Icon Image</label>
  <input type="file" name="icon">
  <input type="submit" value="更新">
</form>
</div>


@endsection
