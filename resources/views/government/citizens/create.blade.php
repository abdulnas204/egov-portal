@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.citizens.store')}}">
				@csrf
				<table class="table table-striped">
					<tr>
						<td>iDentifier</td>
						<td><input type="text" name="identifier" value="{{$identifier}}" class="form-control disabled"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>First name</td>
						<td><input type="text" name="first_name" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Last name</td>
						<td><input type="text" name="last_name" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							<select name="gender" class="form-control">
								<option></option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Date of birth</td>
						<td><input type="text" name="date_of_birth" value="" placeholder="YYYY-MM-DD" class="form-control"></td>
					</tr>
					<tr>
						<td>Date joined</td>
						<td><input type="text" name="date_joined" value="" placeholder="YYYY-MM-DD" class="form-control"></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><input type="text" name="email" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Country</td>
						<td>
							<select name="country_id" class="select2 form-control">
								<option></option>
								@foreach($countries as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<select name="status" class="form-control">
								<option></option>
								<option value="citizen">Citizen</option>
								<option value="honorary">Honorary citizen</option>
								<option value="government">Government member</option>
								<option value="denounced">Denounced</option>
								<option value="revoked">Revoked</option>
								<option value="disappeared">Disappeared</option>
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