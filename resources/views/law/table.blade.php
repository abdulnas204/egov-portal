<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Status</th>
				<th>Date published</th>
				<th></th>
			</tr>
		</thead>
		@forelse($laws as $law)
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
				<td>{{ strftime('%B %e, %Y', strtotime($law->created_at)) }}</td>
				<td>
					<a href="{{route('lex.show', [$law->id, Illuminate\Support\Str::slug($law->name, '-')])}}" class="btn btn-info">
    					<i class="fas fa-eye"></i> {{__('form.buttons.show')}}
    				</a>
                    <a href="{{route('lex.pdf', [$law->id, Illuminate\Support\Str::slug($law->name, '-')])}}" class="btn btn-secondary">
                        <i class="fas fa-file-pdf"></i> {{__('form.buttons.show')}}
                    </a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="4">
					<small>No results found.</small>
				</td>
			</tr>
		@endforelse
	</table>
</div>