<?php

namespace App\Http\Controllers;

use Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PdfController extends Controller
{
    public function downloadPdf($data): BinaryFileResponse
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path('invoiceBill') . "/" . $data . ".pdf";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $data . '.pdf', $headers);
    }
}
