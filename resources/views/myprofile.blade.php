@extends('layouts.app')

@section('content')

<h1>Welcome to MyProfile</h1>
<h1>Name : {{$name}}</h1>
<h1>Email: {{$email}}</h1>
<a href="/myprofile/updateProfile"><button>Update Profile</button></a>

@endsection