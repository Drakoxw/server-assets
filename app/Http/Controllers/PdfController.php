<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;

class PdfController extends Controller
{
    public function Merge(Request $request)
    {
        $this->validate($request, [
            'guides' => 'required',
        ]);
        try {
            $dataReq = $request->all();
            $merger = new Merger;

            foreach ($dataReq['guides'] as $value) {
                $merger->addRaw(
                    file_get_contents($value)
                );
            }
            $fileName = isset($dataReq['name']) && !empty($dataReq['name']) ? $dataReq['name'] : time().'.pdf';
            $bin = $merger->merge();
            if ($dataReq['method'] == 'show') {
                return response($bin)
                    ->header('Content-type' , 'application/pdf');
            } else {
                return response([
                    'status'  => 'ok',
                    'name'    => $fileName,
                    'message' => 'archivo creado',
                    'base'    => 'data:application/pdf;base64,'.base64_encode($bin),
                ], 200);
            }
        } catch (\Throwable $e) {
            return response([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function Download()
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML('<h1>Styde.net</h1>');
        return $pdf->download('mi-archivo.pdf');
    }


}
