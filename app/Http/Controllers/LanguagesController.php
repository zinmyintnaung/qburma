<?php

namespace App\Http\Controllers;
use Session;
use App\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function index(){
        return view('admin.languages.index')->with('languages', Language::all());
    }

    public function create(){
        return view('admin.languages.create');
    }

    public function store(Request $request)
    {
        #dd($request->all());
        $this->validate($request, [
            'language'=>'required',
            'translator'=>'required',
        ]);

        $language = Language::create([
            'language'=>$request->language,
            'translator'=>$request->translator,
            'description'=>$request->description,
        ]);

        Session::flash('success', 'Language created successfully');

        return redirect()->back();
    }
}
