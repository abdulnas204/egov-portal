@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
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
        	@foreach($votings as $voting)
        		<tr>
        			<td>{{$voting->name}}</td>
                    <td width="25%">
                        @php 
                            $voted = false; 

                            foreach ($voting->votes as $vote) {
                                if($vote->citizen_id == Auth::user()->id){
                                    $voted = true;
                                }
                            }
                        @endphp

                        @if(!$voted)
            				<a href="{{route('voting.vote', [$voting->id])}}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i> {{__('form.buttons.view')}}
                            </a>
                        @else
                            <i>You already voted!</i>
                        @endif
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>

@endsection