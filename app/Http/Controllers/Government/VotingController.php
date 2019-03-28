<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Voting;
use App\Models\VotingOption;
use App\Models\VotingVote;

class VotingController extends Controller
{

	public function index()
    {
    	$seo_title 	= __('titles.government.voting.index');
    	$votings 	= Voting::all();
        return view('government.voting.index', compact('seo_title', 'votings'));
    }

    public function edit($vote)
    {
    	$voting 	= Voting::find($vote);
    	$seo_title 	= __('titles.government.voting.edit', ['name' => $voting->name]);
        return view('government.voting.edit', compact('seo_title', 'voting'));
    }

    public function update(Request $request, $vote)
    {
        $voting = Voting::find($vote);
        $voting->update([
            'name'		=> $request->input('name'),
            'status'    => $request->input('status'),
        ]);

        return redirect()->route('government.voting.edit', [$voting->id])->with('message', ['type' => 'alert-success', 'text' => 'Voting updated!']);
    }

    public function create()
    {
    	$seo_title 	= __('titles.government.voting.create');
        return view('government.voting.create', compact('seo_title'));
    }

    public function store(Request $request)
    {
    	$voting = Voting::create($request->all());

    	return redirect()->route('government.voting.edit', [$voting->id])->with('message', ['type' => 'alert-success', 'text' => 'Voting added!']);
    }

    public function optionsIndex($vote)
    {
    	$seo_title 	= __('titles.government.voting.options.index');
    	$options 	= VotingOption::where('voting_id', $vote)->get();
        return view('government.voting.options.index', compact('seo_title', 'options', 'vote'));
    }

    public function optionsEdit($vote, $option)
    {
    	$option 	= VotingOption::find($option);
    	$seo_title 	= __('titles.government.voting.options.edit', ['name' => $option->name]);
        return view('government.voting.options.edit', compact('seo_title', 'option', 'vote'));
    }

    public function optionsUpdate(Request $request, $vote, $option)
    {
        $option = VotingOption::find($option);
        $option->update([
            'name'		=> $request->input('name'),
        ]);

        return redirect()->route('government.voting.options.edit', [$vote, $option->id])->with('message', ['type' => 'alert-success', 'text' => 'Option updated!']);
    }

    public function optionsCreate($vote)
    {
    	$seo_title 	= __('titles.government.voting.options.create');
        return view('government.voting.options.create', compact('seo_title', 'vote'));
    }

    public function optionsStore(Request $request, $vote)
    {
    	$option = VotingOption::create(['voting_id' => $vote, 'name' => $request->input('name')]);

    	return redirect()->route('government.voting.options.edit', [$vote, $option->id])->with('message', ['type' => 'alert-success', 'text' => 'Option added!']);
    }

    public function optionsDestroy($vote, $option)
    {
    	VotingOption::find($option)->delete();

    	return redirect()->route('government.voting.options.index', [$vote])->with('message', ['type' => 'alert-danger', 'text' => 'Option deleted!']);
    }

    public function votesIndex($vote)
    {
    	$vote = Voting::find($vote);
    	$seo_title 	= __('titles.government.voting.votes.index', ['name' => $vote->name]);
    	$results 	= VotingVote::where('voting_id', $vote->id)->get();
    	$options 	= VotingOption::where('voting_id', $vote->id)->get();
        return view('government.voting.results.index', compact('seo_title', 'results', 'vote', 'options'));
    }

}