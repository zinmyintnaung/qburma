<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Sura;
use App\Language;

class SurasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Sura::all());
        return view('admin.suras.index')->with('suras', Sura::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        if($languages->count() == 0){
            Session::flash('info', 'You must have language before creating sura');
            return redirect()->back();
        }
        return view('admin.suras.create')->with('languages', $languages);
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
            'language_id'=>'required',
            'sura_number'=>'required',
            'sura_title_text'=>'required',
        ]);

        $sura = Sura::create([
            'language_id'=>$request->language_id,
            'sura_number'=>$request->sura_number,
            'sura_title_text'=>$request->sura_title_text,
            'sura_note'=>$request->sura_note,
        ]);
        Session::flash('success', 'Sura created successfully');
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
        $sura = Sura::find($id);
        return view('admin.suras.edit')->with('sura', $sura)->with('languages', Language::all());
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
            'language_id'=>'required',
            'sura_number'=>'required',
            'sura_title_text'=>'required',
        ]);
        
        $sura = Sura::find($id);
        
        $sura->language_id = $request->language_id;
        $sura->sura_number = $request->sura_number;
        $sura->sura_title_text = $request->sura_title_text;
        $sura->sura_note = $request->sura_note;
        $sura->save();
        
        Session::flash('success', 'Successfully updated the sura');
        
        return redirect()->route('suras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sura = Sura::find($id);
        $sura->delete();
        Session::flash('success', 'The sura was just trashed.');
        return redirect()->back();
    }
    public function kill($id){
        //$post = Post::find($id); -> find by ID will not work here coz the post we are looking is already trashed by Laravel eloquent
        $sura = Sura::withTrashed()->where('id', $id)->first();
        $sura->forceDelete();
        Session::flash('success', 'The sura deleted permantly');
        return redirect()->back();
    }
    public function trashed(){
        $suras = Sura::onlyTrashed()->get();
        return view('admin.suras.trashed')->with('suras', $suras);
    }
    public function restore($id){
        $sura = Sura::withTrashed()->where('id', $id)->first();
        $sura->restore();
        Session::flash('success', 'Sura restored successfully');
        return redirect()->route('suras');
    }
}
