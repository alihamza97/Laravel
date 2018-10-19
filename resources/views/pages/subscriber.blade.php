@extends('layouts.App')
@section('content')
    <html>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    <style>
        .hover
        {
            width: 300px;
            border: 1px solid #9325BC;
            padding: 10px;
        }
        .hover:hover
        {
            /*-moz-box-shadow: 0 0 10px #ccc;*/
            /*-webkit-box-shadow: 0 0 10px #ccc;*/
            /*box-shadow: 0 0 10px #ccc;*/
            -webkit-filter: blur(2px); /* Safari 6.0 - 9.0 */
            filter: blur(2px);
            image-rendering: pixelated;

        }

    </style>
   
    <div class="container" >
        <div class="table-wrapper">

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Car <b>Details</b></h2></div>
                </div>
            </div>
            {{--< class="well">--}}
            <table class="table table-bordered" id="myTable">
                <thead>
                <tr>
                    <th>carImage</th>
                    <th>name</th>
                    <th>year</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach($WikiCars as $wikiCar)
                    @if(Auth::Check()&&Auth::user()->id===$wikiCar->userId)
                    <tbody>
                <tr>
                    <td class="hover"><img src="/images/cars/{{$wikiCar->carImage}}"  style="width:50%; border-radius: 10%"></td>
                    <td><a href="{{ route('wikicar.show',$wikiCar->id) }}"> {{($wikiCar->carTitle)}}</a></td>
                    <td>{{($wikiCar->year)}}</td>

                    <td>  {{substr($wikiCar->description,0,15)}} {{strlen($wikiCar->description>10?"......":"")}}</td>
                    <td>
                        <a href="/delete/{{$wikiCar->id}}" class="label label-danger">Delete</a>
                        <a href="/update/{{$wikiCar->id}}" class="label label-primary">Update</a>
                    </td>
                </tr>
                </tbody>
                        @elseif(Auth::Check()&&Auth::user()->job_title==='Admin')
                        <tbody>
                        <tr>
                            <td class="hover"><img src="/images/cars/{{$wikiCar->carImage}}"  style="width:50%; border-radius: 10%"></td>
                            <td><a href="{{ route('wikicar.show',$wikiCar->id) }}"> {{($wikiCar->carTitle)}}</a></td>
                            <td>{{($wikiCar->year)}}</td>

                            <td>  {{substr($wikiCar->description,0,15)}} {{strlen($wikiCar->description>10?"......":"")}}</td>
                            <td>
                                <a href="/delete/{{$wikiCar->id}}" class="label label-danger">Delete</a>
                                <a href="/update/{{$wikiCar->id}}" class="label label-primary">Update</a>
                            </td>
                        </tr>
                        </tbody>
                    @endif
                @endforeach
            </table>

            </div>
        </div>


@endsection


    </html>

