@if(Session::has('message'))
	<div class="alert {{Session::get('message')['type']}}">
		{{Session::get('message')['text']}}
	</div>
@endif