<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderInvoicesController extends Controller
{
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $invoice = preg_split("/(-|_)/", $id);
        $nameInvoice = '';
        if (isset($invoice[1])) {
            $nameInvoice = $invoice[0].$invoice[1].".pdf";
        } else {
            $invoice = str_split($id, 2);
            $nameInvoice = implode($invoice).".pdf";
        }
        $url = "http://aveonline.co/assets/data/fe/pdf/$invoice[0]/". $nameInvoice;

        $response = file_get_contents($url);

        $base = base64_encode($response);
        $base64 = 'data:application/pdf;base64,'. $base;
        return [
            'status' => 'ok',
	        'name' => $nameInvoice,
            'base' => $base64
        ];

    }

}
