<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceGenerate($id)
    {
        $payment = Payment::find($id);
        $pdf = PDF::loadView('layouts.backend.pages.invoice', compact('payment'));
        return $pdf->stream('invoice.pdf');
    }
}
