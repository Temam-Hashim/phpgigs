<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    // get all jobs
    public function allJobs(){
        // dd(request());
        return view('jobs.index',[
            'heading'=>'PHP GIGS',
            // get all jobs
            // 'jobs'=>Jobs::all()
            // get all latest jobs or sort by latest
            'jobs'=>Jobs::latest()->filter(request(['tag','search']))->get()
       ]);
    }
    // get single job
    public function singleJob(Jobs $job){

        return view('jobs.show',[
            'job'=>$job,
        ]);

    // $job = Job::find($id);
    // if($job){
    //     return view('job',[
    //         'job'=>$job
    //     ]);
    // }else{
    //     abort(404);
    // }
    }

    // create job
    public function createJob(){
        return view('jobs.create');
    }

    // store job to db or insert operation
    public function storeJob(Request $request){
        // dd($request->tags);
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('jobs','company')],
            'location'=>'required',
            'website'=>['required','url'],
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required',
        ]);
        // now create the jobs using formField array
        Jobs::create($formFields);
        return redirect('/');
    }
}
