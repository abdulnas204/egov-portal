<?php

return [
	'notloggedin' 	=> 'Lostislandic government information portal',
	'dashboard'		=> 'Lostislandic e-Government Dashboard',

	'citizen'		=> [
		"login"			=>	"Verify citizenship",
		"2fa"			=>	"Two Factor Authentication",
	],

	'voting'		=> [
		"index"			=>	"List of Votings",
		"show"			=>	"Vote on :Name",
	],

	'government'	=> [
		"login"			=>	"Verify Government Registration",
		"2fa"			=>	"Two Factor Authentication",
		'admin'			=>	[
			'index'			=>	"Overview | Government Officials",
			'show'			=>	"Profile of :Name  | Government Officials",
			'edit'			=>	"Edit profile of :Name  | Government Officials",
			'create'		=>	"New profile  | Government Officials",
		],
		'citizens'			=>	[
			'index'			=>	"Overview | Citizens",
			'show'			=>	"Profile of :Name  | Citizens",
			'edit'			=>	"Edit profile of :Name  | Citizens",
			'create'		=>	"New profile  | Citizens",
		],
		'voting'			=>	[
			'index'			=>	"Overview | Voting",
			'edit'			=>	"Edit ':Name'  | Voting",
			'create'		=>	"New profile  | Voting",
			'options'		=> 	[
				'index'			=>	"Overview | Options | Voting",
				'edit'			=>	"Edit ':Name'  | Options | Voting",
				'create'		=>	"New profile  | Options | Voting",
			],
			'votes'		=> 	[
				'index'			=>	"Results ':Name' | Voting",
			],
		],
	],
];