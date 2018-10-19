<?php

namespace App\Http\Controllers;

use App\WikiCars;
use Illuminate\Http\Request;
use \PDF;

class pdfController extends Controller
{
    //this function creates pdf file.
    public function pdf($id) {
        $wikiCars =  WikiCars::find($id);
        $pdf = PDF::loadView('pages.pdf', ['wikiCars' => $wikiCars]);
        return $pdf->download('pages.pdf');
    }
}
