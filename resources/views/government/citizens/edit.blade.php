@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.citizens.show', [$citizen->id])}}">
				<i class="fas fa-eye"></i> {{__('form.buttons.show')}}
			</a>
		</span>
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.citizens.update', [$citizen->id])}}">
				@method('PUT')
				@csrf
				<table class="table table-striped">
					<tr>
						<td>First name</td>
						<td><input type="text" name="first_name" value="{{$citizen->first_name}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Last name</td>
						<td><input type="text" name="last_name" value="{{$citizen->last_name}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							<select name="gender" class="form-control">
								<option></option>
								<option value="M" @if($citizen->gender == "M") selected="selected" @endif>Male</option>
								<option value="F" @if($citizen->gender == "F") selected="selected" @endif>Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Date of birth</td>
						<td><input type="text" name="date_of_birth" value="{{$citizen->date_of_birth}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Date joined</td>
						<td><input type="text" name="date_joined" value="{{$citizen->date_joined}}" class="form-control"></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><input type="text" name="email" value="{{$citizen->email}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Country</td>
						<td>
							<select name="country_id" class="select2 form-control">
								<option></option>
								@foreach($countries as $country)
									<option value="{{$country->id}}" @if($citizen->country_id == $country->id) selected="selected" @endif>{{$country->name}}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<select name="status" class="form-control">
								<option></option>
								<option value="citizen" @if($citizen->status == "citizen") selected="selected" @endif>Citizen</option>
								<option value="honorary" @if($citizen->status == "honorary") selected="selected" @endif>Honorary citizen</option>
								<option value="government" @if($citizen->status == "government") selected="selected" @endif>Government member</option>
								<option value="denounced" @if($citizen->status == "denounced") selected="selected" @endif>Denounced</option>
								<option value="revoked" @if($citizen->status == "revoked") selected="selected" @endif>Revoked</option>
								<option value="disappeared" @if($citizen->status == "disappeared") selected="selected" @endif>Disappeared</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Active</td>
						<td>
							<select name="active" class="form-control">
								<option></option>
								<option value="1" @if($citizen->active) selected="selected" @endif>Active</option>
								<option value="0" @if(!$citizen->active) selected="selected" @endif>Not active</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="{{__('form.buttons.save')}}" class="btn btn-success"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
@endsection