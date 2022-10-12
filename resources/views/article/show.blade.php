@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $article->title }}</h4>
                        @foreach($article->categories as $category)
                            <span class="badge rounded-pill text-bg-dark">{{ $category->name }}</span>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <div class="row m-2">
                            <div class="col-10">
                                {{ $article->content }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Komentarai</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('articles.comment', $article) }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input name="email" type="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}" required/>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Komentaras</label>
                                        <input name="comment" type="text" class="form-control" value="{{ old('comment') }}" required/>
                                            @error('comment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Komentuoti</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr/>

                        @forelse($article->comments as $comment)
                            <div class="row d-inline">
                                <div class="col-12">
                                    <b>{{ $comment->email }}:</b> {{ $comment->comment }}
                                </div>
                            </div>
                        @empty
                            Komentaru nera
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
