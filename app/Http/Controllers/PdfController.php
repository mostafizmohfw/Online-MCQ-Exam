<?php

namespace App\Http\Controllers;

use \Mpdf\Mpdf as PDF;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function certificate($id)
    {
        $result= Result::findOrFail($id);
        // dd($result);
        $name = "certificate.pdf";

        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);


        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$name.'"'
        ];

        $document->WriteHTML(view('certificate.generate_pdf', [
            'result' => $result
        ]));

        Storage::disk('public')->put($name, $document->Output($name, "S"));

        return Storage::disk('public')->download($name, 'Request', $header);
    }
}
