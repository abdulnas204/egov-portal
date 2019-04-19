<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use App\Models\Law;
use App\Models\LogRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class LawsController extends Controller
{
    public function index()
    {
    	$seo_title 	= __('titles.government.law.index');
    	$laws 	= Law::all();
        return view('government.law.index', compact('seo_title', 'laws'));
    }

    public function show($id)
    {
    	$law = Law::find($id);
    	$seo_title 	= __('titles.government.law.show', ['name' => $law->name]);
        return view('government.law.show', compact('seo_title', 'law'));
    }

    public function pdf($id)
    {
        $law = Law::find($id);
        $pdf = PDF::loadView('pdf.law', ['law' => $law]);
        return $pdf->stream(Str::slug($law->name, '-').'.pdf');
    }

    public function edit($id)
    {
        $law = Law::find($id);
        $seo_title  = __('titles.government.law.edit', ['name' => $law->name]);
        return view('government.law.edit', compact('seo_title', 'law'));
    }

    public function update(Request $request, $id)
    {
        $law = Law::find($id);
        $law->update([
            'name'         => $request->input('name'),
            'status'     => $request->input('status'),
            'top'              => $request->input('top'),
            'body'              => $request->input('body'),
            'bottom'            => $request->input('bottom'),
        ]);

        return redirect()->route('government.laws.edit', [$law->id])->with('message', ['type' => 'alert-success', 'text' => 'Law updated!']);
    }

    public function create()
    {
        $seo_title  = __('titles.government.law.create');
        return view('government.law.create', compact('seo_title'));
    }

    public function store(Request $request)
    {
        $law = Law::create($request->all());
        return redirect()->route('government.laws.show', [$law->id])->with('message', ['type' => 'alert-success', 'text' => 'Law added!']);
    }
}
