@extends('app')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
	@forelse ($blogs as $blog)
		<div id="content">
			
			<div class="title">
				<h2><a href="{{ $blog->path() }}" >{{ $blog->title }}</a></h2>
				<span class="byline">{{ $blog->excerpt }}</span> </div>
			<p><img src="{{ asset('assets/images/banner.jpg') }}" alt="" class="image image-full" /> </p>
			<p>{{ $blog->body }}</p>
			
		</div>
		@empty
				<p> No Blog Found About That Tag. </p>
		@endforelse
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