@extends('layouts.app')

@section('notloggedinmenu', '')

@section('content')
	
	<div class="container">
		<legend class="my-5">
			{{$law->name}}
			<span class="float-right">
				<a href="{{route('lex.overview')}}" class="btn btn-info">
	                <i class="fas fa-undo"></i> {{__('form.buttons.back')}}
	            </a>
				<a href="{{route('lex.pdf', [$law->id, Illuminate\Support\Str::slug($law->name, '-')])}}" class="btn btn-secondary">
                    <i class="fas fa-file-pdf"></i> {{__('form.buttons.show')}}
                </a>	
			</span>
		</legend>


		<div class="w-100 text-center mb-5"> 
			<img src="http://egov.lostisland.org/images/logo.png">
			<hr>
			@if($law->status == "decree")
				<strong>PRESIDENTIAL DECREE</strong>
			@elseif($law->status == "order")
				<strong>GOVERNMENT ORDER</strong>
		    @elseif($law->status == "ordinance")
		        <strong>MINISTERIAL ORDINANCE</strong>
		    @endif
		    <div class="text-left my-3">
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
	</div>

@endsection
