@extends('layouts.master')

@section('title', 'Design ERD')

@section('content')
    <div class="col-12 mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2>ERD Design</h2>
            <a href="/article" class="btn btn-primary btn-sm">Go to Article Page >></a>
        </div>
        <hr>
        <img src="{{ asset('/laravelquiz.png') }}" alt="" class="img-fluid">
    </div>
@endsection