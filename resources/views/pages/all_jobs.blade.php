@extends('layouts.main')
@section('title_page') Jobs @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    @foreach($list_location as $location)
                        <li>
                            <form action="{{route('job.location', $location)}}" method="post">
                                @csrf
                                <input type="hidden" name="location" value="{{$location->location}}">
                                <input type="submit" value=" {{$location->location}}">


                            </form>
                        </li>
                    @endforeach
                        <li>
                            <form action="/project.com/job/list" method="get">
                                <input type="submit" value="all">
                            </form>
                        </li>
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
                    <nav aria-label="Page navigation example">
                        {{ $jobs->links() }}
                    </nav>
            </div>

        </div>
    </div>

    <style>
        .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between div:nth-child(2) {
            display: none !important;
        }
    </style>





@endsection
