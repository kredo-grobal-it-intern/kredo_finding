<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPosting;
use App\Company;
use App\Country;
use Auth;

class JobPostingController extends Controller
{   
    private $job_posting;
    private $company;

    public function __construct(JobPosting $job_posting, Company $company)
    {
        $this->job_posting = $job_posting;
        $this->company = $company;
    }
    
    public function create()
    {   
        $countries = Country::pluck('name', 'code')->all();
        return view('mypage.postings.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'occupation' => 'required',
            'industry' => 'required',
            'employment_status' => 'required',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'country' => 'required',
            'salary' => 'required',
            'job_description' => 'required|max:500',
            'welcome_requirements' => 'required|max:500',
            'employee_benefits' => 'max:500',
        ]);

        $company = $this->company->Where('user_id', Auth::id())->first();

        $this->job_posting->occupation = $request->occupation;
        $this->job_posting->user_id = Auth::id();
        $this->job_posting->company_id = $company->id;
        $this->job_posting->industry = $request->industry;
        $this->job_posting->employment_status = $request->employment_status;
        $this->job_posting->city = $request->city;
        $this->job_posting->state = $request->state;
        $this->job_posting->country = $request->country;
        $this->job_posting->opening_time = $request->opening_time;
        $this->job_posting->closing_time = $request->closing_time;
        $this->job_posting->salary = $request->salary;
        $this->job_posting->job_description = $request->job_description;
        $this->job_posting->welcome_requirements = $request->welcome_requirements;
        $this->job_posting->employee_benefits = $request->employee_benefits;

        $this->job_posting->save();

        return redirect()->route('home');
    }
}
