@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.voting.create')}}">
				<i class="fas fa-plus"></i> {{__('form.buttons.add')}}
			</a>
		</span>
	</legend>
	<hr>

	<table class="table table-striped table-bordered datatable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($votings as $voting)
        		<tr>
        			<td>{{$voting->name}}</td>
                    <td>
                        @if($voting->status == "open")
                            <span class="badge badge-success">active</span>
                        @elseif($voting->status == "concept")
                            <span class="badge badge-secondary">concept</span>
                        @else
                            <span class="badge badge-danger">closed</span>
                        @endif
                    </td>
                    <td width="25%">
        				@if(Auth::user()->role == 1)
        					<a href="{{route('government.voting.edit', [$voting->id])}}" class="btn btn-warning">
            					<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
            				</a>
                            <a href="{{route('government.voting.options.index', [$voting->id])}}" class="btn btn-info">
                                <i class="fas fa-eye"></i> {{__('form.buttons.options')}}
                            </a>
        				@endif

                        <a href="{{route('government.voting.votes.index', [$voting->id])}}" class="btn btn-secondary">
                            <i class="fas fa-chart-pie"></i> {{__('form.buttons.results')}}
                        </a>
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>

@endsection