@extends('layouts.main')
@section('title_page') Home @endsection
@section('content')
<div class="container">

<h2>Need url to <strong>https://www.bestjobs.eu/</strong></h2>
    <hr>
    <form action="{{route('job.add')}}" method="post">
        @csrf
        <input type="text" name="url" placeholder="Введите url раздела" required>
        <input type="submit" value="Начать">
    </form>

</div>




@endsection
