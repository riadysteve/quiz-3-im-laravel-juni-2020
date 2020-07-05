@extends('layouts.master')

@section('title', 'Detail Article')

@section('content')
  <div class="col-12">
    <div class="row">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
          <li class="breadcrumb-item"><a href="/article">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $articles->title }}</li>
        </ol>
      </nav>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h2 class="mb-1">{{ $articles->title }}</h2>
        <small class="text-muted">slug : {{ $articles->slug }}</small>
      </div>
      <div class="d-flex">
        <a href="/articles/{{ $articles->id }}/edit" class="btn btn-warning text-white btn-sm mr-2">Edit</a>
        <form action="/article/{{ $articles->id }}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger text-white btn-sm" onclick="return confirm('Are you sure want to delete this article?')">Delete</button>
        </form>
      </div>
    </div>
    <hr>
    <small class="text-muted">Content : </small>
    <p class="mb-5">{{ $articles->content }}</p>
    <hr>
    <small class="text-muted">Created at : {{ $articles->created_at }}</small>
    <br>
    <small class="text-muted">Updated at : {{ $articles->updated_at }}</small>

  </div>
@endsection