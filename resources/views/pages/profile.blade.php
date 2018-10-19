@extends('layouts.App')
@section('content')
<html>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

</style>


<div class="container">
    <div class="row">
        <div class="well">
            {{--list of cars--}}
            <a href="{{route('subs.store')}}">You are authorized now</a>
            {{--@foreach($users as $user)--}}

            <div class="card">
                <img src="images/avatar/{{$user->avatar}}"  style="width:100%; border-radius: 50%">
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="button" style="margin-left:-20px;display: table-row;size: 100px">
                    <h1>{{Auth::user()->name}}</h1>

                    <p class="title">Hello!</p>
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </div>

                </form>



            <h2>User Name: {{$user->name}}</h2>
            <h5>{{$user->email}}</h5>
            {{--@endforeach--}}

@endsection


</html>