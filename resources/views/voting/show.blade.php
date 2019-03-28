@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
	</legend>
	<hr>

	<p class="lead">Please select one option.</p>
	<form method="POST" action="{{route('voting.store', [$vote->id])}}">
		@csrf
		@foreach($vote->options as $option)
			<div class="custom-control custom-radio">
				<input type="radio" id="customRadio_{{$option->id}}" name="voting_option_id" value="{{$option->id}}" class="custom-control-input">
				<label class="custom-control-label" for="customRadio_{{$option->id}}">{{$option->name}}</label>
			</div>
		@endforeach
		<button type="submit" class="btn btn-lg btn-success mt-3"><i class="fas fa-vote-yea"></i> {{__('form.buttons.vote')}}</button>
	</form>

@endsection