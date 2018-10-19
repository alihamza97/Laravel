@extends('layouts.App')

@section('content')
    <h1>Most Popular Cars Info</h1>

        @foreach($WikiCars as $wikiCar)

            <div class="well"> <table><tr> <td><a href="{{ route('wikicar.show',$wikiCar->id) }}"> {{($wikiCar->carTitle)}}</a></td>
                <td>
                   {{substr($wikiCar->description,0,100)}} {{strlen($wikiCar->description>100?"......":"")}}
                </td></tr></table>
            <small>Written On {{$wikiCar->created_at}}</small></div>
    @endforeach
 {{--<p>   @foreach ($WikiCar as $wikiCar) {--}}
    {{--echo $wikiCar->carTile;}--}}
     {{--@endforeach</p>--}}
    {{--<h3>{{ $name }}</h3>--}}
    @endsection