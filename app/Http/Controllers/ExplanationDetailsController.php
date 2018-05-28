<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\SuraText;
use App\ExplanationDetail;

class ExplanationDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.explanationdetails.index')->with('explanationdetails', ExplanationDetail::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suratexts = SuraText::all();
        //dd($suratexts);
        if($suratexts->count() == 0){
            Session::flash('info', 'You must have sura text before adding explanation');
            return redirect()->back();
        }
        return view('admin.explanationdetails.create')->with('suratexts', $suratexts);
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
            'sura_text_id'=>'required',
            'explanation_detail'=>'required',
        ]);

        $explanationdetail = ExplanationDetail::create([
            'sura_text_id'=>$request->sura_text_id,
            'explanation_detail'=>$request->explanation_detail,
        ]);
        Session::flash('success', 'Explanation Detail created successfully');
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
        $explanationdetail = ExplanationDetail::find($id);
        return view('admin.explanationdetails.edit')->with('explanationdetail', $explanationdetail)->with('explanationdetails', ExplanationDetail::all())->with('suratexts', SuraText::all());
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
            'sura_text_id'=>'required',
            'explanation_detail'=>'required',
        ]);
        
        $explanationdetail = ExplanationDetail::find($id);
        
        $explanationdetail->sura_text_id = $request->sura_text_id;
        $explanationdetail->explanation_detail = $request->explanation_detail;
        $explanationdetail->save();
        
        Session::flash('success', 'Successfully updated the explanation detail');
        
        return redirect()->route('explanationdetails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $explanationdetail = ExplanationDetail::find($id);
        $explanationdetail->delete();
        Session::flash('success', 'The Explanation was just trashed.');
        return redirect()->back();
    }
    public function kill($id){
        //$post = Post::find($id); -> find by ID will not work here coz the post we are looking is already trashed by Laravel eloquent
        $explanationdetail = ExplanationDetail::withTrashed()->where('id', $id)->first();
        $explanationdetail->forceDelete();
        Session::flash('success', 'The Explanation deleted permantly');
        return redirect()->back();
    }
    public function trashed(){
        $explanationdetails = ExplanationDetail::onlyTrashed()->get();
        return view('admin.explanationdetails.trashed')->with('explanationdetails', $explanationdetails);
    }
    public function restore($id){
        $explanationdetail = ExplanationDetail::withTrashed()->where('id', $id)->first();
        $explanationdetail->restore();
        Session::flash('success', 'Explanation restored successfully');
        return redirect()->route('explanationdetails');
    }
}
