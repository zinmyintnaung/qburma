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

    public function edit($id)
    {
        $language = Language::find($id);
        return view('admin.languages.edit')->with('language', $language);
    }

    public function update(Request $request, $id)
    {
        $language = Language::find($id);
        $language->language = $request->language;
        $language->translator = $request->translator;
        $language->description = $request->description;
        $language->save();
        Session::flash('success', 'Successfully updated the language');
        return redirect()->route('languages');
    }

    public function destroy($id)
    {
        $language = Language::find($id);
        $language->delete();
        Session::flash('success', 'The language was just trashed');
        return redirect()->back();
    }

    public function trashed(){
        $languages = Language::onlyTrashed()->get();
        return view('admin.languages.trashed')->with('languages', $languages);
    }

    public function kill($id){
        $language = Language::withTrashed()->where('id', $id)->first();
        $language->forceDelete();
        Session::flash('success', 'The language deleted permantly');
        return redirect()->back();
    }

    public function restore($id){
        $language = Language::withTrashed()->where('id', $id)->first();
        $language->restore();
        Session::flash('success', 'Language restored successfully');
        return redirect()->route('languages');
    }
}