<?php

namespace Escuccim\Resume\Http\Controllers;

use Illuminate\Http\Request;
use Escuccim\Resume\Models\Job;
use Escuccim\Resume\Models\Education;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
	public function __construct(){
		$this->middleware('admin')->except(['cv']);
	}
    
	/**
	 * Displays the cv page
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function cv(){
		setLanguage();
		$lang = getLocale();
        	$educations = Education::orderBy('end_date', 'desc')->language($lang)->get();
		$jobs = Job::orderBy('order', 'asc')->language($lang)->get();
		return view('cv::cv.cv', compact('jobs', 'educations'));
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$lang = $request->input('lang', 'all');
        $jobs = Job::orderBy('order', 'asc')->language($lang)->get();
        
       	return view('cv::cv.index', compact('jobs', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv::cv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$job = Job::create($request->all());
    	
    	flash()->success('The job entry has been successfully created');
    	
    	return redirect('cvadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$job = Job::where('id', $id)->first();
    	
    	if(!$job){
    		return redirect('cvadmin');
    	}
    	
    	return view('cv::cv.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$job = Job::findOrFail($id);
    	
    	return view('cv::cv.edit', compact('job'));
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
        $job = Job::findOrFail($id);
        
        $job->update($request->all());
        
        flash()->success('The job entry has been updated!');
        
        return redirect('cvadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::destroy($id);
        
        return redirect('cvadmin');
    }

    /**
     * Reorder the items as per the form
     * @param Request $request
     */
	public function order(Request $request){
		$data = $request->input('item');
		$i = 0;
		
		foreach($data as $value){
			$job = Job::find($value);
			$job->order = $i;
			$job->save();
			$i++;
		}
	}
}
