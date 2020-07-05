@extends('layouts.master')

@section('title', 'Homepage')

@section('content')
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Home</h2>
      <a href="/article/create" class="btn btn-primary">+ Add Article</a>
    </div>
    <hr>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($articles->isEmpty())
        <div class="p-3 d-flex flex-column justify-content-center align-items-center" style="height: 350px;">
          <p class="text-muted mb-1">Opps, Sorry! There's no article available right now.</p>
        </div>
    @else
        @foreach ($articles as $article)
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                  <h5 class="card-title mb-1 font-weight-bold">{{ $article->title }}</h5>
                  <small class="text-muted">Slug : {{ $article->slug }}</small>
                </div>
                <a href="/article/{{ $article->id }}" class="btn btn-outline-info btn-sm">Info</a>
              </div>
              
              <p class="card-text mb-0">{{ $article->content }}</p>
              @foreach (explode(" ", $article->tag) as $key => $tag)
                  <p class="badge badge-success">{{ $tag }}</p>
              @endforeach
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</small></p>
                </div>
                <div class="d-flex">
                  <a href="/article/{{ $article->id }}/edit" class="btn btn-warning btn-sm text-white mr-2">Edit Article</a>
                  <form action="/article/{{ $article->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white btn-sm" onclick="return confirm('Are you sure want to delete this article?')">Delete Article</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    @endif
  </div>
  

@endsection

@push('scripts')
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>
@endpush