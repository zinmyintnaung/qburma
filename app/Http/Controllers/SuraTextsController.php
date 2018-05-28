<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Sura;
use App\SuraText;
use App\Language;

class SuraTextsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.suratexts.index')->with('suratexts', SuraText::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suras = Sura::all();
        $languages = Language::all();//Purpose is to filter sura based on selected language
        if($suras->count() == 0){
            Session::flash('info', 'You must have sura before creating sura text');
            return redirect()->back();
        }
        return view('admin.suratexts.create')->with('suras', $suras)->with('languages', $languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sura_id'=>'required',
            'verse_id'=>'required',
            'ayah'=>'required',
        ]);

        $sura = SuraText::create([
            'sura_id'=>$request->sura_id,
            'verse_id'=>$request->verse_id,
            'ayah'=>$request->ayah,
            
        ]);
        Session::flash('success', 'Sura Text created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratext = SuraText::find($id);
        return view('admin.suratexts.edit')->with('suratext', $suratext)->with('suras', Sura::all())->with('languages', Language::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sura_id'=>'required',
            'verse_id'=>'required',
            'ayah'=>'required',
        ]);
        
        $suratext = SuraText::find($id);
        
        $suratext->sura_id = $request->sura_id;
        $suratext->verse_id = $request->verse_id;
        $suratext->ayah = $request->ayah;
        $suratext->save();
        
        Session::flash('success', 'Successfully updated the sura text');
        
        return redirect()->route('suratexts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suratext = SuraText::find($id);
        $suratext->delete();
        Session::flash('success', 'The sura text was just trashed.');
        return redirect()->back();
    }
    public function kill($id){
        //$post = Post::find($id); -> find by ID will not work here coz the post we are looking is already trashed by Laravel eloquent
        $suratext = SuraText::withTrashed()->where('id', $id)->first();
        $suratext->forceDelete();
        Session::flash('success', 'The sura text deleted permantly');
        return redirect()->back();
    }
    public function trashed(){
        $suratexts = SuraText::onlyTrashed()->get();
        return view('admin.suratexts.trashed')->with('suratexts', $suratexts);
    }
    public function restore($id){
        $suratext = SuraText::withTrashed()->where('id', $id)->first();
        $suratext->restore();
        Session::flash('success', 'Sura text restored successfully');
        return redirect()->route('suratexts');
    }
}
