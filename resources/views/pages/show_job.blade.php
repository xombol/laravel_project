@extends('layouts.main')
@section('title_page') {{$job->title}} @endsection
@section('content')
<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col-lg-4">
            Title : {{$job->title}}
            <hr>
            Location : {{$job->location}}
            <hr>
            Company : {{$job->company}}
            <hr>
            <img src="{{$job->logo}}" alt="">
            <hr>
        </div>
        <div class="col-lg-8">
            {!! $job->description !!}
        </div>
    </div>
</div>





@endsection
