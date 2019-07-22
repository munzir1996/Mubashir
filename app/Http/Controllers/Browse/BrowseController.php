<?php

namespace App\Http\Controllers\Browse;
use DB;
use App\News;
use App\Team;
use App\Company;
use App\Client;
use App\Product;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrowseController extends Controller
{
    public function home()
    {
        $clients = Client::all();
        $products = DB::table('products')->limit(4)->get();
        $projects = DB::table('projects')->latest()->limit(4)->get();
        $teams  = DB::table('teams')->latest()->limit(4)->get();
        $news = DB::table('news')->latest()->limit(4)->get();
        $companies = DB::table('companies')->latest()->limit(1)->get();
        return view('pages.ar.index')
         ->withTeams($teams)
           ->withProjects($projects)
             ->withNews($news)
                ->withProducts($products)
                  ->withClients($clients)
                    ->withCompanies($companies);
    }

    public function about()
    {
        $companies = DB::table('companies')->latest()->limit(1)->get();

        return view('pages.ar.about')->withCompanies($companies);
    }
    public function account()
    {
        $accounts = DB::table('accounts')->latest()->limit(1)->get();

        return view('pages.ar.account')->withAccounts($accounts);
    }
    public function affair()
    {
        $affairs = DB::table('affairs')->latest()->limit(1)->get();

        return view('pages.ar.affair')->withAffairs($affairs);
    }
    public function pharmacy()
    {
        $pharmacies = DB::table('pharmacies')->latest()->limit(1)->get();

        return view('pages.ar.pharmacy')->withPharmacies($pharmacies);
    }
    public function sale()
    {
        $sales = DB::table('sales')->latest()->limit(1)->get();

        return view('pages.ar.sale')->withSales($sales);
    }
    public function support()
    {
        $supports = DB::table('supports')->latest()->limit(1)->get();

        return view('pages.ar.support')->withSupports($supports);
    }
    public function system()
    {
        $systems = DB::table('systems')->latest()->limit(1)->get();

        return view('pages.ar.system')->withSystems($systems);
    }

    public function project()
    {
        $projects = Project::all();

        return view('pages.ar.project')->withProjects($projects);
    }

    public function contact()
    {
        return view('pages.ar.contact');
    }

    public function team()
    {
        $teams = Team::all();

        return view('pages.ar.team')->withTeams($teams);
    }

    public function product()
    {
        $products = Product::all();

        return view('pages.ar.product')->withProducts($products);
    }

    public function proDesc($id)
    {
        $product =  Product::findOrFail($id);

        return view('pages.ar.product-desc')->withProduct($product);
    }
    public function news($id)
    {
        $all = News::all();
        $new = News::findOrFail($id);

        return view('pages.ar.news')
          ->withAll($all)
           ->withNew($new);
    }
    public function event()
    {
        $news = News::all();

        return view('pages.ar.event')->withNews($news);
    }

    public function ArDesc($id)
    {
        $project = Project::findOrFail($id);

        return view('pages.ar.description')->withProject($project);
    }


   // English pages
    public function Enhome()
    {
        $clients = Client::all();
        $products = DB::table('products')->limit(4)->get();
        $projects = DB::table('projects')->latest()->limit(4)->get();
        $teams  = DB::table('teams')->latest()->limit(4)->get();
        $news = DB::table('news')->latest()->limit(4)->get();
        $companies = DB::table('companies')->latest()->limit(1)->get();

        return view('pages.en.index')
         ->withTeams($teams)
           ->withProjects($projects)
             ->withNews($news)
                ->withProducts($products)
                ->withClients($clients)
                  ->withCompanies($companies);
    }

    public function Enabout()
    {
        $companies = DB::table('companies')->latest()->limit(1)->get();

        return view('pages.en.about')->withCompanies($companies);
    }
    public function Enaccount()
    {
        $accounts = DB::table('accounts')->latest()->limit(1)->get();

        return view('pages.en.account')->withAccounts($accounts);
    }
    public function Enaffair()
    {
        $affairs = DB::table('affairs')->latest()->limit(1)->get();

        return view('pages.en.affair')->withAffairs($affairs);
    }
    public function Enpharmacy()
    {
        $pharmacies = DB::table('pharmacies')->latest()->limit(1)->get();

        return view('pages.en.pharmacy')->withPharmacies($pharmacies);
    }
    public function Ensale()
    {
        $sales = DB::table('sales')->latest()->limit(1)->get();

        return view('pages.en.sale')->withSales($sales);
    }
    public function Ensupport()
    {
        $supports = DB::table('supports')->latest()->limit(1)->get();

        return view('pages.en.support')->withSupports($supports);
    }
    public function Ensystem()
    {
        $systems = DB::table('systems')->latest()->limit(1)->get();

        return view('pages.en.system')->withSystems($systems);
    }

    public function Enproject()
    {
        $projects = Project::all();

        return view('pages.en.project')->withProjects($projects);
    }

    public function Enproduct()
    {
        $products = Product::all();

        return view('pages.en.product')->withProducts($products);
    }

    public function Encontact()
    {
        return view('pages.en.contact');
    }

    public function Enteam()
    {
        $teams = Team::all();

        return view('pages.en.team')->withTeams($teams);
    }

    public function Ennews($id)
    {
        $all = News::all();
        $new = News::findOrFail($id);

        return view('pages.en.news')
          ->withAll($all)
           ->withNew($new);
    }

    public function EnDesc($id)
    {
        $project = Project::findOrFail($id);

        return view('pages.en.description')->withProject($project);
    }


    public function proEnDesc($id)
    {
        $product =  Product::findOrFail($id);

        return view('pages.en.product-desc')->withProduct($product);
    }

}
