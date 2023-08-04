<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Job;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Policy;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Business;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Service_requestRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ServiceRequest;
use App\Models\Setting;
use App\Services\SEO\SEOToolsFrontService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        (new SEOToolsFrontService)->render(new Setting);
    }


    public function index()
    {
        $sliders = Slider::first();
        $about_us = AboutUs::first();
        $services = Service::limit(3)->get();
        $clients = Client::get();
        $categories = ProjectCategory::with('projects')->get();
        $projects = Project::with('categories')->get();
        $employees = Employee::get();
        return view('frontend.index', compact('sliders','categories','employees','projects','about_us','services', 'clients'));
    }



    public function about_us()
    {
        $about_us = AboutUs::first();
        $services = Service::limit(3)->get();
         $employees = Employee::get();
        return view('frontend.about_us', compact('about_us','services','employees'));
    }


    public function contact_us()
    {
        return view('frontend.contact');
    }

    public function blogs()
    {
        $blogs = Blog::get();

        return view('frontend.blogs', compact('blogs'));
    }

    public function blogDetails($id)
    {
        $blog = Blog::with('categories')->findOrFail($id);

        $relatedBlogs = Blog::where('id', '!=', $id)->whereHas("categories", function ($q) use ($blog) {
            $q->whereIn('category_id', $blog->categories->pluck('id')->toArray());
        })->get();

        return view('frontend.blog-details', compact('blog', 'relatedBlogs'));
    }



    public function services()
    {
        $services = Service::get();

        return view('frontend.service', compact('services'));
    }

    public function serviceDetails($id)
    {
        $service = Service::with('service_details')->findOrFail($id);
        return view('frontend.package', compact('service'));
    }

    public function project()
    {
        $projects = Project::with('categories')->get();
        $categories = ProjectCategory::with('projects')->get();
        return view('frontend.project',compact('projects','categories'));
    }
    public function team()
    {
        $employees = Employee::get();
        return view('frontend.team',compact('employees'));
    }

    public function checkout($id)
    {
        $service = Service::findOrFail($id);
        return view('frontend.service_detail',compact('service'));
    }

    public function store(Service_requestRequest $request , $id)
    {
        $service = Service::findOrFail($id);
         ServiceRequest::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'service_id'=>$service->id,
        ]);
        return redirect()->back()->with('success',translate('The service has been requested successfully'));
    }

    public function privacyPolicy()
    {
        $privacyPolicies = Policy::where('type', 'privacy-policy')->get();

        return view('frontend.privacy-policy', compact('privacyPolicies'));
    }

    public function usagePolicy()
    {
        $usagePolicies = Policy::where('type', 'usage-policy')->get();

        return view('frontend.usage-policy', compact('usagePolicies'));
    }

    public function recruitment()
    {
        $jobs = Job::all();
        return view('frontend.recruitment', compact('jobs'));
    }

}
