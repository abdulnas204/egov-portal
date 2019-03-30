@extends('layouts.app')

@section('notloggedinmenu', '')

@section('content')
	
	<section class="py-5 bg-secondary">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-8">
					<h1 class="display-5">Lostislandic government information portal</h1>
					<p class="lead">The best place to find government services and information<br>Simpler, clearer, faster</p>
					<a class="btn btn-success mr-2" href="/login">
						<i class="fas fa-shield-alt"></i> Citizen login
					</a>
					{{-- <a class="btn btn-warning" href="/lex">
						<i class="fas fa-gavel"></i> Lostislandic laws
					</a> --}}
				</div>
				<div class="col-12 col-md-4">
				</div>
			</div>
		</div>
	</section>

	<section class="py-4">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4 pt-md-4">
					<ul class="list-unstyled">
						<li>
							<span class="text-primary">Births, deaths, marriages and care</span>
							<p>Parenting, civil partnerships, marriage, divorce and Power of Attorney</p>
						</li>
						<li>
							<span class="text-primary">Citizenship and living</span>
							<p>Voting, community participation, international projects</p>
						</li>
						<li>
							<span class="text-primary">Crime, justice and the law</span>
							<p>Legal processes, courts and the police</p>
						</li>
						<li>
							<span class="text-primary">Money and tax</span>
							<p>Includes debt, Self Assessment and taxation</p>
						</li>
					</ul>
				</div>
				<div class="col-12 col-md-7 offset-md-1">
					<p class="lead">
						The Federal Republic of Lostisland is a global sovereignty and a cultural and social project resembling a new country based on the ideals of freedom and democracy. Being originally created in 2008 as a roleplay game, Lostisland since then turned into a multinational project with a total of over 200 participants (“citizens”) from countries such Russia, Argentina, Brazil, Spain, Great Britain, France, United States and many others, and with four languages, such as English, Dutch, Turkish, Russian having official status. Nowadays, amongst “citizens” of Lostisland can be found art workers, lawyers, IT specialists, journalists and people of many other qualifications who devote their skills to the succesful growth and development of the organization.
					</p>
				</div>
			</div>
		</div>
	</section>

@endsection