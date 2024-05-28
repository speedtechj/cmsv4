<?php

namespace App\Http\Controllers;

use App\Models\Shippingbooking;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class Shippinginstruction extends Controller
{
    public function instruction(Shippingbooking $record)
    {

        $data['record'] = $record;
        // $companyinfo = Companyinfo::all()->first();
        // $data['companyinfo'] = $companyinfo;
dd($data);
        // $pdf = PDF::loadView("pdf.shippinginstruction", $data);
        // return $pdf->inline();

    }
}
