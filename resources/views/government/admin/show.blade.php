@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.officials.edit', [$admin->id])}}">
				<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
			</a>
		</span>
	</legend>
	<hr>

	<div class="row">
		<div class="col-12 col-md-6">
			<table class="table table-striped">
				<tr>
					<td>Name</td>
					<td>{{$admin->full_name}}</td>
				</tr>
				<tr>
					<td>Position</td>
					<td>{{$admin->position_name}}</td>
				</tr>
				<tr>
					<td>Username</td>
					<td>{{$admin->name}}</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<span id="hide-password">###############</span>
						@if(Auth::user()->role == 1)
							<span id="hide-password-button">
								<a href="javascript:void(0);" onclick="showPassword()" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> {{__('form.buttons.edit')}}</a>
							</span>
						@endif
					</td>
				</tr>
				<tr>
					<td>Role</td>
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
				</tr>
				<tr>
					<td>Active</td>
					<td>
						@if($admin->active)
        					<span class="badge badge-success">active</span>
        				@else
        					<span class="badge badge-danger">not active</span>
        				@endif
					</td>
				</tr>
			</table>
		</div>
		<div class="col-12 col-md-6">
		</div>
		@if(Auth::user()->role < 3)
			<div class="col-12">
				<legend>Activity (Last 100)</legend>
				<hr>
				<table class="table table-striped table-bordered datatable">
			        <thead>
			            <tr>
			            	<th>ID</th>
			                <th>URL</th>
			                <th>Date</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($logs as $log)
			        		<tr>
				                <td>{{$log->id}}</td>
				                <td>{{$log->url}}</td>
				                <td>{{$log->created_at}}</td>
				            </tr>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		@endif
	</div>
@endsection

@section('scripts')
	@if(Auth::user()->role == 1)
		<script type="text/javascript">

			function showPassword()
			{
				$('#hide-password').html('<input type="text" class="form-control w-75" name="password" id="new-password" placeholder="New password">');
				$('#hide-password-button').html('<a href="javascript:void(0);" onclick="sendPassword()" class="btn btn-sm btn-warning"><i class="fas fa-save"></i> {{__('form.buttons.save')}}</a>');
			}

			function sendPassword()
			{
				$.post( "{{route('government.officials.changepassword', [$admin->id])}}", { 
	               _token: '{{ csrf_token() }}',
	               password: $('#new-password').val()
	            })
	            .done(function( data ) {
	            	$('#hide-password').html('###############');
	            	$('#hide-password-button').html('<a href="javascript:void(0);" onclick="showPassword()" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> {{__('form.buttons.edit')}}</a>');
	            });
	        };
		</script>
	@endif
@endsection