<?php

namespace Modules\Frontend\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Site\Entities\Site;
use Illuminate\Support\Facades\Mail;


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
        return view('frontend::setm.index', compact('site'));
    }

}
