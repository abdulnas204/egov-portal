@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.voting.store')}}">
				@csrf
				<table class="table table-striped">
					<tr>
						<td>Question</td>
						<td><input type="text" name="name" value="" class="form-control"></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<select name="status" class="form-control">
								<option></option>
								<option value="open">Open for voting</option>
								<option value="closed">Closed for voting</option>
								<option value="concept" selected="selected">Concept</option>
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