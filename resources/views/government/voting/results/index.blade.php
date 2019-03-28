@extends('layouts.app')

@section('content')
	
	<legend>
		{{$seo_title}}
		<span class="float-right">
			<a class="btn btn-secondary" href="{{route('government.voting.index')}}">
                <i class="fas fa-undo"></i> {{__('form.buttons.back')}}
            </a>
		</span>
	</legend>
	<hr>

    <div class="row">
        <div class="col-12 col-md-3">
            <h1>Results</h1>
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div class="col-12 col-md-9">
        	<table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        @if(Auth::user()->role == 1)
                            <th>Name</th>
                        @endif
                        <th>Vote</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($results as $result)
                		<tr>
                            @if(Auth::user()->role == 1)
                                <td>{{$result->citizen->first_name}} {{$result->citizen->last_name}}</td>
                            @endif
                            <td>{{$result->votingoption->name}}</td>
                            <td>{{$result->created_at}}</td>
                		</tr>
                	@endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@php
    $data_tmp = [];
    $data = "";

    foreach ($options as $option) {
        $data_tmp[$option->id] = 0;
    }

    foreach($results as $result){
        $data_tmp[$result->voting_option_id]++;
    }

    foreach ($data_tmp as $data_tmp_item) {
        $data.= $data_tmp_item . ",";
    }

    $data = rtrim($data, ",");

@endphp

@section('scripts')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [@foreach($options as $option) '{{$option->name}}', @endforeach],
                datasets: [{
                    label: '# of Votes',
                    data: [{{$data}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection