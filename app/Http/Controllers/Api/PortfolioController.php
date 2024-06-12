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
}
