@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.citizens.create')}}">
				<i class="fas fa-plus"></i> {{__('form.buttons.add')}}
			</a>
		</span>
	</legend>
	<hr>

	<table class="table table-striped table-bordered datatable">
        <thead>
            <tr>
                <th>iDentifier</th>
                <th>Name</th>
                <th>Status</th>
                <th>Active</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($citizens as $citizen)
        		<tr>
        			<td>{{$citizen->identifier}}</td>
                    <td>{{$citizen->first_name}} {{$citizen->last_name}}</td>
        			<td>
                        @if($citizen->status == "citizen")
                            <span class="badge badge-success">citizen</span>
                        @elseif($citizen->status == "honorary")
                            <span class="badge badge-secondary">honorary citizen</span>
                        @elseif($citizen->status == "government")
                            <span class="badge badge-info">government</span>
                        @else
                            <span class="badge badge-danger">{{$citizen->status}}</span>
                        @endif
                    </td>
                    <td>
        				@if($citizen->active)
        					<span class="badge badge-success">active</span>
        				@else
        					<span class="badge badge-danger">not active</span>
        				@endif
        			</td>
        			<td>
        				<a href="{{route('government.citizens.show', [$citizen->id])}}" class="btn btn-info">
        					<i class="fas fa-eye"></i> {{__('form.buttons.show')}}
        				</a>
        				@if(Auth::user()->role == 1)
        					<a href="{{route('government.citizens.edit', [$citizen->id])}}" class="btn btn-warning">
            					<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
            				</a>
        				@endif
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>

@endsection