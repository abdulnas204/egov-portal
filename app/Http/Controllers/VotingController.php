<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Voting;
use App\Models\VotingOption;
use App\Models\VotingVote;

class VotingController extends Controller
{

	public function index()
    {
    	$seo_title 	= __('titles.voting.index');
    	$votings 	= Voting::byOpen()->get();
        return view('voting.index', compact('seo_title', 'votings'));
    }

    public function show($vote)
    {
    	$vote = Voting::find($vote);
    	$seo_title 	= __('titles.voting.show', ['name' => $vote->name]);
    	return view('voting.show', compact('seo_title', 'vote'));
    }

    public function store(Request $request, $vote)
    {
    	VotingVote::create([
    		'voting_id' => $vote,
    		'voting_option_id' => $request->input('voting_option_id'),
    		'citizen_id'	=> Auth::user()->id
    	]);

    	return redirect()->route('voting.index')->with('message', ['type' => 'alert-success', 'text' => 'Successfully voted!']);
    }

}