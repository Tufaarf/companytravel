<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyStats;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // Logic for the front page can be added here

        $herosections = HeroSection::all();
        $abouts = About::all();
        $companyStats = CompanyStats::all();
        return view('front.index', compact('herosections', 'abouts', 'companyStats'));
    }
}
