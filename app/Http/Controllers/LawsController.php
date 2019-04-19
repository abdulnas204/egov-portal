<?php

namespace App\Http\Controllers;

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
        return view('law.index', compact('seo_title'));
    }

    public function ajax(Request $request)
    {
        $laws = null;

        if($request->input('status') != "" && $request->input('status') != "*"){
            if(null === $laws){
                $laws = Law::where('status', $request->input('status'));
            }else{
                $laws->where('status', $request->input('status'));
            }
        }

        if($request->input('year') != "" && $request->input('year') != "*"){
            if(null === $laws){
                $laws = Law::whereBetween('created_at', [
                    $request->input('year')."-01-01 00:00:00",
                    $request->input('year')."-12-31 23:59:59"
                ]);
            }else{
                $laws->whereBetween('created_at', [
                    $request->input('year')."-01-01 00:00:00",
                    $request->input('year')."-12-31 23:59:59"
                ]);
            }
        }

        if(null !== $laws){
            $laws = $laws->get();
        }else{
            $laws = Law::all();
        }

        return view('law.table', compact('laws'));
    }

    public function show($id)
    {
    	$law = Law::find($id);
    	$seo_title 	= __('titles.government.law.show', ['name' => $law->name]);
        return view('law.show', compact('seo_title', 'law'));
    }

    public function pdf($id)
    {
        $law = Law::find($id);
        $pdf = PDF::loadView('pdf.law', ['law' => $law]);
        return $pdf->stream(Str::slug($law->name, '-').'.pdf');
    }
}
