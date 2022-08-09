<?php
namespace App\ViewComposer;
use Illuminate\View\View;
use Modules\Site\Entities\Site;
use Modules\Address\Entities\Address;
use Modules\Service\Entities\Service;
use Modules\Partner\Entities\Partner;
use Modules\Blog\Entities\Blog;

class ViewComposer {
	private $dashboard;
	public function __construct() {
	}
	public function compose(View $view) {
        $site = Site::latest()->first();
        $addresses  = Address::where('publish', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
        $partners = Partner::where('publish', 1)->orderBy('order_row', 'DESC')->get();
        $services = Service::where('publish', 1)->orderBy('order_row', 'DESC')->limit(6)->get();
        $blogs  = Blog::where('publish', 1)->orderBy('order_row', 'ASC')->limit(4)->get();
        


		// dd($addresses);

		$view->with([
			'dashboard_site'=>$site,
			'dashboard_addresses'=>$addresses,
			'dashboard_partners'=>$partners,
			'dashboard_services'=>$services,
			'dashboard_blogs'=>$blogs,
		]);
	}

}
