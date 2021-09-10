@extends('app')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			
			<div class="title">
				<h2>{{ $blog->title }}</h2>
				<span class="byline">{{ $blog->excerpt }}</span> </div>
			<p><img src="{{ asset('assets/images/banner.jpg') }}" alt="" class="image image-full" /> </p>
			<p>{{ $blog->body }}</p>
			<div class="">
				@foreach($blog->tag as $tag)
			<a href="{{ route('blog.index',['tag' => $tag->tag_name])}}">{{ $tag->tag_name }}</a>
				@endforeach
			</div>
		</div>
		<div id="sidebar">
			<ul class="style1">
			@foreach($blogs as $blog)
				<li class="first">
					<h3>{{ $blog->title }}</h3>
					<p><a href="{{ route('blog.show',$blog->id) }}">{{ substr($blog->excerpt,0,150) }}</a></p>
				</li>
				@endforeach
			</ul>
			
		</div>
	</div>
</div>
@endsection