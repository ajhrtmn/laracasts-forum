@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<a href="#">{{ $thread->creator->name }}</a> posted:
					{{ $thread->title }}
				</div>

				<div class="card-body">
					{{ $thread->body }}
				</div>
			</div>
		</div>
	</div>
	</br>

	@if (auth()->check())
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Reply to post:
				</div>

				<div class="card-body">
					<form method='POST' action='{{ $thread->path() . '/replies' }}'>

						{{ csrf_field() }}

						<div class ='form-group'>
							<textarea name='body' id='body' class='form-control' placeholder="I'm ready to listen."></textarea>
						</div>
						<button type='submit' class='btn btn-secondary float-right'>Reply</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</br>
	@else
	<p class='text-center'>Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
	</br>
	@endif

	@foreach ($thread->replies as $reply)
		@include ('threads.reply')
	@endforeach
</div>
@endsection
