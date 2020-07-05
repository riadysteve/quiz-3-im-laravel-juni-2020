@extends('layouts.master')

@section('title', 'Create Article')

@section('content')
  <div class="col-12">
    
    <div class="row">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
          <li class="breadcrumb-item"><a href="/article">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Article</li>
        </ol>
      </nav>
    </div>
    <h2>Create New Article</h2>
    <hr>
    
    
    <form action="/article" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Your Article Title here" value="{{ old('title') }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="4" name="content" placeholder="Your Article Content here">{{ old('content') }}</textarea>
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="tag">Tag</label>
        <input type="text" class="form-control" id="tag" name="tag" placeholder="Add Tags" value="{{ old('tag') }}">
        <small id="emailHelp" class="form-text text-muted">*Optional, using space to add multiple tags</small>
      </div>
      
      <button type="submit" class="btn btn-primary mt-2">Add Article</button>
    </form>
  </div>
@endsection

