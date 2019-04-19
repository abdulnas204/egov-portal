@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.laws.create')}}">
				<i class="fas fa-plus"></i> {{__('form.buttons.add')}}
			</a>
		</span>
	</legend>
	<hr>

	<table class="table table-striped table-bordered datatable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($laws as $law)
        		<tr>
        			<td>{{$law->name}}</td>
        			<td>
        				@if($law->status == "decree")
        					<span class="badge badge-success">Presidential decree</span>
        				@elseif($law->status == "order")
        					<span class="badge badge-warning">Government order</span>
                        @elseif($law->status == "ordinance")
                            <span class="badge badge-info">Ministerial ordinance</span>
                        @else
                            <span class="badge badge-secondary">Constitutional act</span>
        				@endif
        			</td>
        			<td>
        				<a href="{{route('government.laws.show', [$law->id])}}" class="btn btn-info">
        					<i class="fas fa-eye"></i> {{__('form.buttons.show')}}
        				</a>
                        <a href="{{route('government.laws.pdf', [$law->id])}}" class="btn btn-info">
                            <i class="fas fa-file-pdf"></i> {{__('form.buttons.show')}}
                        </a>
        				@if(Auth::user()->role == 1)
        					<a href="{{route('government.laws.edit', [$law->id])}}" class="btn btn-warning">
            					<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
            				</a>
        				@endif
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>

@endsection