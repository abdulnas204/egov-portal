@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-success" href="{{route('government.citizens.edit', [$citizen->id])}}">
				<i class="fas fa-edit"></i> {{__('form.buttons.edit')}}
			</a>
		</span>
	</legend>
	<hr>

	<div class="row">
		<div class="col-12 col-md-6">
			<table class="table table-striped">
				<tr>
					<td>iDentifier</td>
					<td>{{$citizen->identifier}}</td>
				</tr>
				<tr>
					<td>Firstname</td>
					<td>{{$citizen->first_name}}</td>
				</tr>
				<tr>
					<td>Lastname</td>
					<td>{{$citizen->last_name}}</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						@if($citizen->gender == "M")
        					<span class="badge badge-info">Male</span>
        				@else
        					<span class="badge badge-danger">Female</span>
        				@endif
					</td>
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
					<td>Date of birth</td>
					<td>{{$citizen->date_of_birth}}</td>
				</tr>
				<tr>
					<td>Date joined</td>
					<td>{{$citizen->date_joined}}</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>{{$citizen->email}}</td>
				</tr>
				<tr>
					<td>Country</td>
					<td>{{$citizen->country->name}}</td>
				</tr>
				<tr>
					<td>Status</td>
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
				</tr>
				<tr>
					<td>Active</td>
					<td>
						@if($citizen->active)
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
				$.post( "{{route('government.citizens.changepassword', [$citizen->id])}}", { 
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