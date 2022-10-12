@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Articles</div>

                    <div class="card-body">
                        @forelse($articles as $article)
                            <div class="row m-2">
                                <div class="col-10">
                                    <a href="{{ route('articles.show', $article) }}"><h4>{{ $article->title }}</h4></a>
                                    @foreach($article->categories as $category)
                                        <span class="badge rounded-pill text-bg-dark">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                                <div class="col-2">
                                    {{ $article->created_at }}
                                </div>
                            </div>
                            <hr/>
                        @empty
                            <div class="alert alert-warning" role="alert">
                                Naujienu nerasta
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
