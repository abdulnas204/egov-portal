@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-secondary" href="{{route('government.voting.options.index', [$vote])}}">
                <i class="fas fa-undo"></i> {{__('form.buttons.back')}}
            </a>
        </span>
	</legend>
	<hr>

	<div class="row">
		<div class="col-12">
			<form method="POST" action="{{route('government.voting.options.store', [$vote])}}">
				@csrf
				<table class="table table-striped">
					<tr>
						<td>Answer</td>
						<td><input type="text" name="name" value="" class="form-control"></td>
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