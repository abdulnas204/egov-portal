@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.officials.store')}}">
				@csrf
				<table class="table table-striped">
					<tr>
						<td>Name</td>
						<td><input type="text" name="full_name" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Position</td>
						<td><input type="text" name="position_name" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="name" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Role</td>
						<td>
							<select name="role" class="form-control">
								<option></option>
								<option value="1">Top-level official</option>
								<option value="2">Minister of State Security</option>
								<option value="3">FISS Director</option>
								<option value="4">Minister (other)</option>
								<option value="5">Secretary</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Active</td>
						<td>
							<select name="active" class="form-control">
								<option></option>
								<option value="1">Active</option>
								<option value="0">Not active</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="{{__('form.buttons.add')}}" class="btn btn-success"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
@endsection