@extends('layouts.App')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h2>crUd</h2>

    <form method="POST" action="{{url('/updatedUser',array($User->id))}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Car Title</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name" value="<?php echo $User->name;?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    @if(count($errors)>0 )
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif


@endsection