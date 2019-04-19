@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.laws.store')}}">
				@csrf
				<table class="table table-striped">
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Role</td>
						<td>
							<select name="status" class="form-control">
								<option></option>
								<option value="1">Presidential decree</option>
								<option value="2">Government order</option>
								<option value="3">Ministerial ordinance</option>
								<option value="4">Constitutional act</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Top portion</td>
						<td>
							<textarea class="summernote form-control" name="top"></textarea>
						</td>
					</tr>
					<tr>
						<td>Body</td>
						<td>
							<textarea class="summernote form-control" name="body"></textarea>
						</td>
					</tr>
					<tr>
						<td>Bottom portion</td>
						<td>
							<textarea class="summernote form-control" name="bottom"></textarea>
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