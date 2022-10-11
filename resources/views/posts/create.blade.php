@extends('layouts.app')

@section('content')
    <div class="container">
        <form 
        action="{{route('admin.posts.store')}}" 
        method="POST"
        >
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input 
                type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{old('title')}}"
                required
                max="255"
                >

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea 
                name="description"
                id="description"
                class="form-control"
                required
                >
                    {{old('description')}}
                </textarea>

                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category">Category</label>

                <select 
                name="category_id"
                id="category"
                class="custom-select"
                >
                    <option
                    value=""
                    {{(old('category_id')=="")?'selected':''}}
                    >
                        Nessuna Categoria
                    </option>
                    
                    @foreach ($categories as $category)
                        <option 
                        value="{{$category->id}}"
                        {{(old('category_id')==$category->id)?'selected':''}}
                        >
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection