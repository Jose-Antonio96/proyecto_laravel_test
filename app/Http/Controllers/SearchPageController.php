<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchPageController extends Controller
{
    public function search(){
        return view('traveliens.searchpage');
    }
}


