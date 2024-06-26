<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index() {
        $portfolios = Portfolio::with('technologies', 'type')->get();
        
        return response()->json([
            'success' => true,
            'results' => $portfolios,
        ]);
    }

    public function show($slug) {

        $portfolio = Portfolio::where('slug', '=', $slug)->with('technologies', 'type')->first();

        if($portfolio) {
            $data = [
                'success' => true,
                'portfolio' => $portfolio, 
            ];
        } else {
            $data = [
                'success' => false,
                'error' => "Data not found", 
            ];
        }
        

        return response()->json($data);

    }
}
