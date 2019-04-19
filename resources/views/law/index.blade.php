@extends('layouts.app')

@section('notloggedinmenu', '')

@section('content')
	
	<div class="container py-4">
		<h1>Laws of the Federal Republic of Lostisland</h1>
		<div class="row mt-2">
			<div class="col-4">
				<select id="type" class="form-control">
					<option>Choose a type</option>
					<option value="*">All</option>
					<option value="decree">Presidential decrees</option>
					<option value="order">Government order</option>
					<option value="ordinance">Ministerial ordinance</option>
					<option value="constitution">Constitutional act</option>
				</select>
			</div>
			<div class="col-4">
				<select id="year" class="form-control">
					<option>Year of issuing</option>
					<option value="*">All</option>
					@for($y=2016;$y<=intval(date('Y'));$y++)
						<option value="{{$y}}">{{$y}}</option>
					@endfor
				</select>
			</div>
			<div class="col-4">
				<button onclick="filterLaws();" class="btn btn-success"><i class="fas fa-search"></i> Filter results</button>
			</div>
		</div>
		<div id="laws" class="mt-5">
			<small>Please use the filters...</small>
		</div>
	</div>

@endsection

@section('scripts')

<script type="text/javascript">
	function filterLaws(){
		$.post( "/lex/ajax", { 
            status: $('#type').val(),
            year: $('#year').val(),
            _token: '{{ csrf_token() }}' 
        })
        .done(function( data ) {
        	$('#laws').html(data);
        });
	}
</script>

@endsection