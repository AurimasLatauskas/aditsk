@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Articles</div>

                    <div class="card-body">

                        <a class="btn btn-primary" href="{{ route('articles.create') }}" role="button">Prideti Nauja</a>
                        <hr/>

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Naujiena</td>
                                    <td>Redaguoti</td>
                                    <td>Trinti</td>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $article)
                                <tr>
                                    <td>
                                        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('articles.edit', $article) }}" role="button">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Trinti</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td>Naujienu nerasta</td></tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
