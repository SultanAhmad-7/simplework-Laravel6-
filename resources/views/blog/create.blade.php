@extends('app')
@section('bulma')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
@endsection
@section('content')
<div id="wrapper">
	<div id="page" class="container">

    <form action="{{ route('blog.store') }}" method="post">
        @csrf

		<div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
                <input type="text" name="title" id="" class="input @error('title') is-danger @enderror" value="{{ old('title')}}">
                @error('title')
                    <p class="help is-danger"> {{ $errors->first('title')}} </p>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="excerpt" class="label">Excerpt</label>
            <div class="control">
                <textarea name="excerpt" id="excerpt" cols="20" rows="05" class="textarea @error('excerpt') is-danger @enderror">
                {{ old('excerpt') }}
                </textarea>   
                @error('excerpt')
                    <p class="help is-danger"> {{ $errors->first('excerpt')}} </p>
                @enderror 
             
            </div>
        </div>

        <div class="field">
            <label for="body" class="label">Body</label>
            <div class="control">
                <textarea name="body" id="body" cols="20" rows="05" class="textarea"> {{ old('body') }}</textarea>    
            </div>
            @error('body')
                    <p class="help is-danger"> {{ $errors->first('body')}} </p>
                @enderror
        </div>

        <div class="field">
            <label for="title" class="label">Tag</label>
            <div class="control">
                <select name="tags[]" id="">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->tag_name }}</option>
                    @endforeach
                </select>
                @error('title')
                    <p class="help is-danger"> {{ $errors->first('title')}} </p>
                @enderror
            </div>
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Save</button>
            </div>
        </div>
    </form>
	</div>
</div>
@endsection