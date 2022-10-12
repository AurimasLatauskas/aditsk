@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nauja naujiena</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                @if(session('message'))
                                    <div class="alert alert-success mb-5" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('articles.update', $article) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Pavadinimas:</label>
                                        <input name="title" type="text" class="form-control" value="{{ $article->title }}" required/>
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Turinys</label>
                                        <input name="content" type="text" class="form-control" value="{{ $article->content }}" required/>
                                            @error('content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>

                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, $articleCategories) ? 'checked' : '' }}/>
                                            <label class="form-check-label">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                        @error('categories')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary mt-3">Sukurti</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
