<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Session;

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
            // 'jobs'=>Jobs::latest()->filter(request(['tag','search']))->get()
            'jobs'=>Jobs::latest()->filter(request(['tag','search']))->paginate(6)
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

    // create job form
    public function createJob(){
        return view('jobs.create');
    }

    // store job to db or insert operation
    public function addJob(Request $request){
        // dd($request->tags);
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required'], //Rule::unique('jobs','company')
            'location'=>'required',
            'website'=>['required','url'],
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for picture
        ]);
        $formFields['user_id'] = auth()->user()->id;
        if($request->hasFile('picture')){
            $formFields['picture'] = $request->file('picture')->store('picture','public');
        }

        Jobs::create($formFields);
        // Session:: flash('message','Job created Successfully');
        return redirect('/')->with('message','Job created successfully');
    }

    public function editJob(Jobs $job){
        return view('jobs.edit',['job'=>$job]);
    }

    public function updateJob(Request $request, Jobs $job)
    {
        if($job->user_id != auth()->user()->id){
            abort(403,"You don't have permission to update this job");
        }
            $formData = $request->validate([
            'title' => 'required',
            'company' => ['required'], //Rule::unique('jobs','company')
            'location' => 'required',
            'website' => ['required', 'url'],
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for picture
        ]);

        $formData['user_id'] = auth()->id();
        if ($request->hasFile('picture')) {
            $formData['picture'] = $request->file('picture')->store('picture', 'public');
        }

        // Update the job with the validated formFields array
        $job->update($formData);

        return redirect('/jobs/' . $job->id)->with('message', 'Job updated successfully');
    }

    public function deleteJob(Jobs $job) {

        if($job->user_id != auth()->user()->id){
            abort(403,"You don't have permission to delete this job");
        }

        $job->delete();
        return redirect('/')->with('message','Job deleted successfully');

    }

    // manage job page

    public function manageJob(){
            return view('jobs.manage',
            [
                'heading'=>'PHP GIGS',
                // get all jobs
                // 'jobs'=>Jobs::all()
                // get all latest jobs or sort by latest
                // 'jobs'=>Jobs::latest()->filter(request(['tag','search']))->get()
                // 'jobs'=>Jobs::latest()->filter(request(['tag','search']))->paginate(6);
                'jobs'=>Jobs::latest()->where('user_id',auth()->id())->paginate(6)
                // 'jobs'=>auth()->user()->jobs()->get()
           ]);
    }


}