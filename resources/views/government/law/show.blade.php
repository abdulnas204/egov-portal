@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.laws.edit', [$law->id])}}">
				<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
			</a>
		</span>
	</legend>
	<hr>


	<div class="w-100 text-center"> 
		<img src="http://egov.lostisland.org/images/logo.png">
		<hr>
		@if($law->status == "decree")
			<strong>PRESIDENTIAL DECREE</strong>
		@elseif($law->status == "order")
			<strong>GOVERNMENT ORDER</strong>
	    @elseif($law->status == "ordinance")
	        <strong>MINISTERIAL ORDINANCE</strong>
	    @endif
	    <div class="text-left mb-3">
	    	{!! $law->top !!}
	    </div>
	    <div class="text-left mb-3">
	    	{!! $law->body !!}
	    </div>
	    <div class="text-left">
		    {!! $law->bottom !!}
		    <br><br>
		    {{ strftime('%B %e, %Y', strtotime($law->created_at)) }}
	    </div>
	</div>

@endsection