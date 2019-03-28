@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-secondary" href="{{route('government.voting.index')}}">
                <i class="fas fa-undo"></i> {{__('form.buttons.back')}}
            </a>
            <a class="btn btn-success" href="{{route('government.voting.options.create', [$vote])}}">
				<i class="fas fa-plus"></i> {{__('form.buttons.add')}}
			</a>
		</span>
	</legend>
	<hr>

	<table class="table table-striped table-bordered datatable">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($options as $option)
        		<tr>
        			<td>{{$option->name}}</td>
                    </td>
                    <td width="25%">
        				@if(Auth::user()->role == 1)
        					<a href="{{route('government.voting.options.edit', [$vote, $option->id])}}" class="btn btn-warning">
            					<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
            				</a>
                            <a href="{{route('government.voting.options.destroy', [$vote, $option->id])}}" class="btn btn-danger">
                                <i class="fas fa-times"></i> {{__('form.buttons.destroy')}}
                            </a>
        				@endif
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>

@endsection