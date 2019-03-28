@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.voting.update', [$voting->id])}}">
				@method('PUT')
				@csrf
				<table class="table table-striped">
					<tr>
						<td>Question</td>
						<td><input type="text" name="name" value="{{$voting->name}}" class="form-control"></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<select name="status" class="form-control">
								<option></option>
								<option value="open" @if($voting->status == "open") selected="selected" @endif>Open for voting</option>
								<option value="closed" @if($voting->status == "closed") selected="selected" @endif>Closed for voting</option>
								<option value="concept" @if($voting->status == "concept") selected="selected" @endif>Concept</option>
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