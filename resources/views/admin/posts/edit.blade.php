@extends('layouts.admin')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Modifica il post</h1>
                <form action="{{route('admin.posts.update', $post->id)}}" method="post">
                    @csrf
                    @method('PUT')
            
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo" value="{{ old('title',$post->title) }}"">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Contenuto</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci il contenuto...">{{ old('content',$post->content) }}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tag del post --}}
                    <div class="form-group">
                        <label>Tags</label>
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <input class="form-check-input" name="tags[]" type="checkbox" 
                                value="{{$tag->id}}" {{$post->tags->contains($tag) ? "checked" : "" }} id="{{$tag->slug}}"

                                {{-- se la validazione fallisce --}}
                                @if($errors->any())       
                                {{-- se ci sono errori di validazione devo recuperare old --}}
                                    {{in_array($tag->id, old('tags', [])) ? "checked" : ""}} 
                                @else
                                {{-- se NON ci sono errori di validazione devo recuperare post tags --}}
                                    {{$post->tags->contains($tag) ? "checked" : ""}}
                                @endif>

                                <label class="form-check-label" for="{{$tag->slug}}">
                                    {{$tag->title}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    {{-- Categoria del post --}}
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control form-control-md" name="category_id" id="category_id">
                            <option value="">--seleziona categoria--</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Salva</button>
                    <a href="{{route("admin.posts.index")}}"><button type="button" class="btn btn-primary">Torna ai posts</button></a>
                </form>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    </div>
@endsection

