<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyStats;
use App\Models\DetailedService;
use App\Models\HeroSection;
use App\Models\legalitas;
use App\Models\Product;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // Logic for the front page can be added here

        $herosections = HeroSection::all();
        $abouts = About::all();
        $companyStats = CompanyStats::all();
        $services = Service::all();
        $detailedServices = DetailedService::all();
        $products = Product::all();
        $teams = TeamMember::all(); // Fetching detailed services if needed
        $legalities = legalitas::all();
        return view('front.index', compact('herosections', 'abouts', 'companyStats', 'services', 'detailedServices', 'products', 'teams', 'legalities'));
    }

    public function services()
    {
        // Logic for the services page can be added here
        $herosections = HeroSection::all();
        $services = Service::all();
        return view('front.services.index', compact('services', 'herosections'));
    }


}
