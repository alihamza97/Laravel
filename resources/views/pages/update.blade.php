@extends('layouts.App')
@section('content')

    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <h2>crUd</h2>

    <form method="POST" action="{{url('/updated',array($wiki_cars->id))}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Car Title</label>
            <input type="text" name="carTitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title" value="<?php echo $wiki_cars->carTitle;?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Car Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="description" value="<?php echo $wiki_cars->description;?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Car Year</label>
            <input type="number" name="year" class="form-control" id="exampleInputPassword1" placeholder="number">
        </div>
        {{--<div class="form-group">--}}
            {{--<img src="images/carImage/{{$wiki_cars->carImage}}"  style="width:50%; border-radius: 20%">--}}
            {{--<label for="exampleInputPassword1">Upload image</label>--}}
            {{--<input type="file" name="carImage" >--}}
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{--<input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="description">--}}
        {{--</div>--}}

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