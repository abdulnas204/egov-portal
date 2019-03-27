@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.officials.show', [$admin->id])}}">
				<i class="fas fa-eye"></i> {{__('form.buttons.show')}}
			</a>
		</span>
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.officials.update', [$admin->id])}}">
				@method('PUT')
				@csrf
				<table class="table table-striped">
					<tr>
						<td>Name</td>
						<td><input type="text" name="full_name" value="{{$admin->full_name}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Position</td>
						<td><input type="text" name="position_name" value="{{$admin->position_name}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="name" value="{{$admin->name}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Role</td>
						<td>
							<select name="role" class="form-control">
								<option></option>
								<option value="1" @if($admin->role == 1) selected="selected" @endif>Top-level official</option>
								<option value="2" @if($admin->role == 2) selected="selected" @endif>Minister of State Security</option>
								<option value="3" @if($admin->role == 3) selected="selected" @endif>FISS Director</option>
								<option value="4" @if($admin->role == 4) selected="selected" @endif>Minister (other)</option>
								<option value="5" @if($admin->role == 5) selected="selected" @endif>Secretary</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Active</td>
						<td>
							<select name="active" class="form-control">
								<option></option>
								<option value="1" @if($admin->active) selected="selected" @endif>Active</option>
								<option value="0" @if(!$admin->active) selected="selected" @endif>Not active</option>
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