@extends('layouts.main')
@section('title_page') Jobs @endsection
@section('content')
    <div class="container">
        <div class="row">
            <h2> Location : </h2>

            <div class="col-lg-4">
                <ul>
                    @foreach($list_location as $location)
                        <li>
                            <a href="{{route('job.location', $location->location)}}">
                                {{$location->location}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-8 row">
                @foreach($jobs as $job)
                    <a href="{{route('job.show', $job)}}" class="col-lg-4">
                        <div class="card border-primary mb-3 mx-auto-5" style="max-width: 18rem;">
                            <div class="card-header">{{$job->location}}</div>
                            <div class="card-body text-primary">
                                <h5 class="card-title">{{$job->title}}</h5>
                                <img src="{{$job->logo}}" style="width: 150px; height: 150px" alt="">
                            </div>
                        </div>
                    </a>
                @endforeach


            </div>
            <nav aria-label="Page navigation example">
                {{ $jobs->links() }}
            </nav>
        </div>
    </div>

    <style>
        .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between div:nth-child(2) {
            display: none !important;
        }
    </style>





@endsection
