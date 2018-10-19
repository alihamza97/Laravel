@extends('layouts.App')
@section('content')
    <html>
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
    <div class="container">
        <div class="table-wrapper">

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Users</h2></div>
                </div>
            </div>
            {{--< class="well">--}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    {{--<th>carImage</th>--}}
                    <th>name</th>
                    {{--<th>description</th>--}}
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach($Users as $User)
                    {{--@if(Auth::Check()&&Auth::user()->id===$wikiCar->userId)--}}

                    <tbody>
                <tr>

                    <td>{{$User->name}}</td>
                    {{--<td><a href="{{ route('wikicar.show',$wikiCar->id) }}"> {{($wikiCar->carTitle)}}</a></td>--}}
                    {{--<td>{{$wikiCar->description}}</td>--}}

                    <td>
                        @if(Auth::Check()&&Auth::user()->job_title==='Admin')
                        <a href="/del/{{$User->id}}" class="label label-danger">Delete</a>
                        @endif

                    @if(Auth::Check()&&Auth::user()->name===$User->name)
                            <a href="/updateUser/{{$User->id}}" class="label label-primary">Update</a>
                        @elseif(Auth::Check()&&Auth::user()->job_title==='Admin')
                                <a href="/updateUser/{{$User->id}}" class="label label-primary">Update</a>
                                @endif
                    </td>
                </tr>
                </tbody>
                    {{--@endif--}}
                @endforeach
            </table>
                {{--<img src="images/cars/{{$wikiCar->carImage}}"  style="width:100%; border-radius: 50%">--}}

            </div>

        </div>


@endsection
    </html>

