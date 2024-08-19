<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = $this->randomQuotes(5);
        return view('dashboard', compact('quotes'));
    }

    public function getQuotes($count = 5)
    {
        $quotes = $this->randomQuotes($count);
        return response()->json($quotes);
    }

    public function randomQuotes($count)
    {
        $response = Http::get('https://api.kanye.rest/quotes');
        $quotes = collect($response->json());
        return $quotes->random($count);
    }
}
