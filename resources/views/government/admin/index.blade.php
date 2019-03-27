@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.officials.create')}}">
				<i class="fas fa-plus"></i> {{__('form.buttons.add')}}
			</a>
		</span>
	</legend>
	<hr>

	<table class="table table-striped table-bordered datatable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Role</th>
                <th>Active</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($admins as $admin)
        		<tr>
        			<td>{{$admin->full_name}}</td>
        			<td>{{$admin->position_name}}</td>
        			<td>
        				@if($admin->role == 1)
        					Top-level official
        				@elseif($admin->role == 2)
        					Minister of State Security
        				@elseif($admin->role == 3)
        					FISS Director
        				@elseif($admin->role == 4)
        					Minister (other)
        				@elseif($admin->role == 5)
        					Secretary
        				@endif
        			</td>
        			<td>
        				@if($admin->active)
        					<span class="badge badge-success">active</span>
        				@else
        					<span class="badge badge-danger">not active</span>
        				@endif
        			</td>
        			<td>
        				<a href="{{route('government.officials.show', [$admin->id])}}" class="btn btn-info">
        					<i class="fas fa-eye"></i> {{__('form.buttons.show')}}
        				</a>
        				@if(Auth::user()->role == 1)
        					<a href="{{route('government.officials.edit', [$admin->id])}}" class="btn btn-warning">
            					<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
            				</a>
        				@endif
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>

@endsection