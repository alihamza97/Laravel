@extends('layouts.App')
@section('content')
    <h1 class="media-heading" style="margin-left: 475px;margin-top: -25px">Details</h1>
    {{--@foreach($WikiCars as $WikiCar)--}}
    {{--@endforeach--}}
    <div style="margin-left: 300px">
        <img src="/images/cars/{{$WikiCar->carImage}}"  style="width:60%;border-radius: 30px;height:300px">

    </div>
    <div class="well">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Decription</th>
                <th>CreationDate</th>
                <th>UpdatedDate</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$WikiCar->id}}</td>
                <td>{{$WikiCar->carTitle}}</td>
                <td>{{$WikiCar->description}}</td>
                <td>{{$WikiCar->created_at}}</td>
                <td>{{$WikiCar->updated_at}}</td>
            </tr>

            </tbody>
        </table>
        <a href="{{ route('wikicar.download',$WikiCar->id) }}"> Download PDF</a>
    </div>

    @endsection