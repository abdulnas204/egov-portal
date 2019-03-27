<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\Country;
use App\Models\LogRequests;
use Illuminate\Http\Request;

class CitizensController extends Controller
{
    public function index()
    {
    	$seo_title 	= __('titles.government.citizens.index');
    	$citizens 	= Citizen::all();
        return view('government.citizens.index', compact('seo_title', 'citizens'));
    }

    public function show($id)
    {
    	$citizen = Citizen::find($id);
        $logs  = LogRequests::where('user', $citizen->id)->where('type', 'citizen')->orderBy('id', 'desc')->limit(100)->get();
    	$seo_title 	= __('titles.government.citizens.show', ['name' => $citizen->identifier]);
        return view('government.citizens.show', compact('seo_title', 'citizen', 'logs'));
    }

    public function edit($id)
    {
        $citizen = Citizen::find($id);
        $countries = Country::all();
        $seo_title  = __('titles.government.citizens.edit', ['name' => $citizen->identifier]);
        return view('government.citizens.edit', compact('seo_title', 'citizen', 'countries'));
    }

    public function update(Request $request, $id)
    {

        $citizen = Citizen::find($id);
        $citizen->update([
            'last_name'         => $request->input('last_name'),
            'first_name'        => $request->input('first_name'),
            'date_of_birth'     => $request->input('date_of_birth'),
            'date_joined'       => $request->input('date_joined'),
            'email'             => $request->input('email'),
            'gender'            => $request->input('gender'),
            'status'            => $request->input('status'),
            'active'            => $request->input('active'),
        ]);
        
        $citizen->country()->associate(Country::find($request->input('country_id')));
        $citizen->save();

        return redirect()->route('government.citizens.edit', [$citizen->id])->with('message', ['type' => 'alert-success', 'text' => 'Citizen updated!']);
    }

    public function create()
    {
        $seo_title  = __('titles.government.citizens.create');
        $countries = Country::all();
        $identifier = "AA".rand(1000000, 9999999);

        if(null !== Citizen::where('identifier', $identifier)->first()){
            $identifier = "AA".rand(1000000, 9999999);            
        }

        return view('government.citizens.create', compact('seo_title', 'countries', 'identifier'));
    }

    public function store(Request $request)
    {
        $citizen = Citizen::create($request->all());
        $citizen->country()->associate(Country::find($request->input('country_id')));
        $citizen->save();
        return redirect()->route('government.citizens.show', [$citizen->id])->with('message', ['type' => 'alert-success', 'text' => 'Citizen added!']);
    }

    public function editPassword(Request $request, $id)
    {
    	$citizen = Citizen::find($id);
    	$citizen->password = $request->input('password');
    	$citizen->save();
    }
}
