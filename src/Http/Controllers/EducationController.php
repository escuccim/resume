<?php

namespace Escuccim\Resume\Http\Controllers;

use Illuminate\Http\Request;
use Escuccim\Resume\Models\Education;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $educations = Education::get();
        return view('education.index', compact('educations'));
    }

    public function create(){
        $education = new Education();
        return view('education.create', compact('education'));
    }

    public function store(Request $request){
        // validate the form
        $this->validate($request,[
           'school' => 'required',
            'location' => 'required',
            'major' => 'required',
            'end_date' => 'required',
            'lang' => 'required',
        ]);
        // store the data
        $education = Education::create($request->all());
        $education->lang = $request->lang;
        $education->save();
        // redirect
        return redirect('/education');
    }

    public function edit($id){
        $education = Education::where('id', $id)->first();
        return view('education.edit', compact('education'));
    }

    public function update($id, Request $request){
        // validate the form
        $this->validate($request,[
            'school' => 'required',
            'location' => 'required',
            'major' => 'required',
            'end_date' => 'required',
            'lang' => 'required',
        ]);
        $education = Education::find($id);
        $education->update($request->all());
        $education->lang = $request->lang;
        $education->save();
        return redirect('/education');
    }

    public function destroy($id){
        Education::destroy($id);
        return redirect('/education');
    }
}
