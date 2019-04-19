@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.laws.show', [$law->id])}}">
				<i class="fas fa-eye"></i> {{__('form.buttons.show')}}
			</a>
		</span>
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.laws.update', [$law->id])}}">
				@method('PUT')
				@csrf
				<table class="table table-striped">
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" value="{{$law->name}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Role</td>
						<td>
							<select name="status" class="form-control">
								<option></option>
								<option value="1" @if($law->status == "decree") selected="selected" @endif>Presidential decree</option>
								<option value="2" @if($law->status == "order") selected="selected" @endif>Government order</option>
								<option value="3" @if($law->status == "ordinance") selected="selected" @endif>Ministerial ordinance</option>
								<option value="4" @if($law->status == "constitution") selected="selected" @endif>Constitutional act</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Top portion</td>
						<td>
							<textarea class="summernote form-control" name="top">{!!$law->top!!}</textarea>
						</td>
					</tr>
					<tr>
						<td>Body</td>
						<td>
							<textarea class="summernote form-control" name="body">{!!$law->body!!}</textarea>
						</td>
					</tr>
					<tr>
						<td>Bottom portion</td>
						<td>
							<textarea class="summernote form-control" name="bottom">{!!$law->bottom!!}</textarea>
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