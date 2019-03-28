@extends('layouts.app')

@section('content')
	
	<form method="POST" action="{{route('auth.expired.store')}}">
		@csrf
		<table class="table table-striped">
			<tr>
				<td>Current password</td>
				<td><input type="password" name="current_password" value="" class="form-control"></td>
			</tr>
			<tr>
				<td>New password</td>
				<td><input type="password" name="password" value="" class="form-control"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="{{__('form.buttons.save')}}" class="btn btn-success"></td>
			</tr>
		</table>
	</form>

@endsection