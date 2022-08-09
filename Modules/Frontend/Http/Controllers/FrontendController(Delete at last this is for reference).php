<?php

namespace Modules\Frontend\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Alumni\Entities\Alumni;
use Modules\Career\Entities\Career;
use Modules\Classes\Entities\Klass;
use Modules\CommitteMember\Entities\CommitteMember;
use Modules\Facility\Entities\Facility;
use Modules\Faq\Entities\Faq;
use Modules\Gallery\Entities\Gallery;
use Modules\NewsEvent\Entities\Event;
use Modules\Notice\Entities\Notice;
use Modules\Site\Entities\OpeningHour;
use Modules\Site\Entities\Site;
use Modules\Slider\Entities\Slider;
use Modules\Partner\Entities\Partner;
use Modules\Team\Entities\Team;
use Modules\Testimonial\Entities\Testimonial;
use Illuminate\Support\Facades\Mail;
use Modules\Blog\Entities\Blog;
use Modules\Department\Entities\Department;
use Modules\News\Entities\News;
use Modules\Service\Entities\Service;
use Modules\Product\Entities\Product;
use Modules\Site\Entities\About;
use Modules\Site\Entities\Mission;
use Modules\Contactus\Entities\Contactus;
use Modules\Frontend\Entities\Subscribe;
use Modules\Client\Entities\Client;
use Modules\Page\Entities\Page;
use Modules\WorkingProcess\Entities\WorkingProcess;
use Modules\Incident\Entities\Incident;

class FrontendController extends Controller
{
    public $info;
    use ValidatesRequests;

    public function __construct()
    {
        $this->info = Site::latest()->first();
    }

    public function index()
    {
        $site = Site::latest()->first();
        $openingHour = OpeningHour::latest()->first();
        $testimonials = Testimonial::where('publish', 1)->orderBy('order_row', 'ASC')->get();
        $blogs  = Blog::where('publish', 1)->orderBy('order_row', 'ASC')->limit(4)->get();
        $teams = Team::where('publish', 1)->orderBy('order_row', 'ASC')->limit(4)->get();
        $departments = Department::where('publish', 1)->orderBy('order_row', 'ASC')->get();
        $services = Service::where('publish', 1)->orderBy('order_row', 'ASC')->limit(6)->get();
        $products = Product::where('publish', 1)->orderBy('order_row', 'ASC')->limit(3)->get();
        $sliders = Slider::where('publish', 1)->orderBy('created_at', 'ASC')->get();
        $partners = Partner::where('publish', 1)->orderBy('order_row', 'ASC')->get();
        $clients = Client::where('publish', 1)->orderBy('created_at', 'DESC')->get();
        $workingProcesses = WorkingProcess::where('publish', 1)->orderBy('created_at', 'ASC')->get();
        // dd($workingProcesses);
        return view('frontend::index', compact('openingHour', 'testimonials', 'blogs', 'teams', 'departments', 'services','products', 'site', 'sliders','partners','clients','workingProcesses'));
    }

    public function about()
    {
        $about  = About::latest()->first();
        return view('frontend::about', compact('about'));
    }

    public function mission()
    {
        $mission = Mission::latest()->first();
        return view('frontend::mission', compact('mission'));
    }

    public function teams()
    {
        $teams = Team::where('publish', 1)->orderBy('order_row', 'ASC')->paginate(16);
        return view('frontend::team', compact('teams'));
    }



    public function news()
    {
        $newses = News::where('publish', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('frontend::news', compact('newses'));
    }

    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $recent = News::where('id', '!=', $news->id)->where('publish', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('frontend::newsdetail', compact('news', 'recent'));
    }
    public function service()
    {
        $services = Service::where('publish', 1)->orderBy('order_row', 'ASC')->paginate(9);
        return view('frontend::service', compact('services'));
    }
    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $recentServices = Service::where('id', '!=', $service->id)->where('publish', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('frontend::servicedetail', compact('service', 'recentServices'));
    }
    public function product()
    {
        $products = Product::where('publish', 1)->orderBy('order_row', 'ASC')->paginate(9);
        return view('frontend::product', compact('products'));
    }
    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $recentProducts = Product::where('id', '!=', $product->id)->where('publish', 1)->orderBy('created_at', 'DESC')->limit(2)->get();
        return view('frontend::productdetail', compact('product', 'recentProducts'));
    }
    public function partner()
    {
        $partners = Partner::where('publish', 1)->orderBy('order_row', 'ASC')->get();
        return view('frontend::partner', compact('partners'));
    }
    public function blog()
    {
        $blogs = Blog::where('publish', 1)->orderBy('order_row', 'ASC')->paginate(9);
        return view('frontend::blog', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::where('id', '!=', $blog->id)->where('publish', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('frontend::blogdetail', compact('blog', 'recentBlogs'));
    }

    public function submitIncident()
    {
        return view('frontend::submit-incident');
    }


    public function incidentMail(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            'title' => 'required',
            'office' => 'required',
            'email' => 'required|email',
            'contact' => 'required|integer',
            'incidentDate' => 'required',
            'incidentTime' => 'required',
            'location' => 'required',
            'appName' => 'required',
            'description' => 'required',
        ]);
        try {
            $all = $request->all();
            Incident::create($all);
            // Mail::send('mail.incident', $all, function ($sender) use ($all) {
            //     $sender->from($all['email'], '');
            //     $sender->to($this->info->email1, 'info@loksec.com');
            //     $sender->subject("Incident Reported");
            // });
            return redirect()->back()->with('message', 'Sent Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Server Error');
        }
    }

    public function contact()
    {
        $site  = Site::latest()->first();
        return view('frontend::contact', compact('site'));
    }

    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        try {
            $all = $request->except(['Contact']);
            $all['type'] = 'Contact';
            // dd($all);
            Contactus::create($all);
            $notification = array(
                'message' => 'Message Send Successfully',
                'alert-type' => 'success'
            );
            // Mail::send('mail.contact', $all, function ($sender) use ($all) {
            //     $sender->from($all['email'], '');
            //     $sender->to($this->info->email1, 'demo@mail.com');
            // });
            return redirect()->back()->with('message','Enquiry Send Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Server Error');
        }
    }
    public function productInquire(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'message' => 'required'
        ]);
        try {
            $data = $request->except(['Inquire']);
            $data['type'] = 'Product Inquire';
            // dd($data);
            Contactus::create($data);
            $notification = array(
                'message' => 'Message Send Successfully',
                'alert-type' => 'success'
            );
            // Mail::send('mail.contact', $all, function ($sender) use ($all) {
            //     $sender->from($all['email'], '');
            //     $sender->to($this->info->email1, 'demo@mail.com');
            // });
            return redirect()->back()->with('message','Enquiry Send Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Server Error');
        }
    }
    public function serviceInquire(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'message' => 'required'
        ]);
        try {
            $data = $request->except(['Inquire']);
            $data['type'] = 'Service Inquire';
            // dd($data);
            Contactus::create($data);
            $notification = array(
                'message' => 'Message Send Successfully',
                'alert-type' => 'success'
            );
            // Mail::send('mail.contact', $all, function ($sender) use ($all) {
            //     $sender->from($all['email'], '');
            //     $sender->to($this->info->email1, 'demo@mail.com');
            // });
            return redirect()->back()->with('message','Enquiry Send Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Server Error');
        }
    }

    public function subscribe(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data);
            //Check if user already exist
            $this->validate($request, [
                'email' => 'required|email',
            ]);

            $subscribeCountCount = Subscribe::where('email',$data['email'])->count();
            if($subscribeCountCount>0){
                $message = "You have alredy subscribed!";
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            }else{
                //Register the Subscribe
                $user = new Subscribe;
                $user->email = $data['email'];
                $user->save();

                //Redirect back with success message
                $message = "Subscribed Successfully";
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function question(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|integer',
            'service' => 'required',
            'from' => 'required|date',
            'to' => 'required|date'
        ]);
        try {
            $all = $request->except('message');
            $all['content']  = $request->message;
            Mail::send('mail.question', $all, function ($sender) use ($all) {
                $sender->from($all['email'], '');
                $sender->to($this->info->email1, 'demo@mail.com');
                $sender->subject("Questions");
            });
            return redirect()->back()->with('success', 'Sent Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Server Error');
        }
    }
    public function privacy()
    {
        return view("frontend::privacy");
    }
    public function dynamicPages($slug)
    {
        //for terms
        if($slug == 'terms-of-service'){
        $termofService = $termofService = Page::where('publish', 1)->where('slug', $slug)->first();
        // dd($detail);
        return view('frontend::terms-of-service',compact('termofService'));
        die;
        }
        //for terms
        if($slug == 'privacy-policy'){
        $detailprivacypolicy = $detailprivacypolicy = Page::where('publish', 1)->where('slug', $slug)->first();
        // dd($detailprivacypolicy);

        return view('frontend::privacy-policy',compact('detailprivacypolicy'));
        die;
        }
        if ($slug != 'terms-of-service' && $slug != 'privacy-policy')
        {
            return view('errors.404');
        }
    }

    public function haveibeenpwned(Request $request)
    {
        $response = Http::withHeaders([

            'hibp-api-key' => '2a2dc7813c494f41a7981d870a4eccf6',
            'Accept' => 'application/json',

            ])->get('https://haveibeenpwned.com/api/v3/breachedaccount/'.$request->data.'?truncateResponse=false');
        // $test = json_decode($response->body());
        // return $test;
        if($response->status() == 200)
        {
            return response()->json(['data' => json_decode($response->body())],200);
        }else{
            return response()->json(['data'=>[]],200);
        }
    }
}
