<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Tool;
use App\Models\Client;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function index(Request $request) {
        $order = $request->query('order');
        $invoices = [];

        if ($order == "asc" || $order == "desc") {
            $invoices = Invoice::query()->orderBy('total_amount' ,$order)->paginate(10);
        } else {
            $invoices = Invoice::query()->paginate(10);
        }

        return view('invoices.index', ['invoices' => $invoices->appends($request->query())]);
    }

    function show(Invoice $invoice) {
        return view('invoices.show', ['invoice' => $invoice]);
    }

    function search(Request $request) {
        $invoices = Invoice::query()
        ->with('client')
        ->withCount('tools');

        if ($request->filled('email')) {
            $invoices->whereRelation('client', 'email', $request->query('email'));
        }

        if ($request->filled('price_higher_than')) {
            $invoices->where('total_amount', '>', $request->query('price_higher_than'));
        }

        if ($request->filled('price_lower_than')) {
            $invoices->where('total_amount', '<', $request->query('price_lower_than'));
        }

        $invoices = $invoices->get();

        return view('invoices.search', ['invoices' => $invoices]);
    }

    function create() {
        $numberOfClient = Client::count();

        for ($i = 0; $i < 100; $i++) {
            $invoice = new Invoice;
            $invoice->client_id = rand(1, $numberOfClient);
            $invoice->purchase_order_id = rand(0,20);
            $invoice->total_amount = rand(1, 3000);
            $invoice->tax = 0.20;
            $invoice->amount_before_tax = $invoice->total_amount * (1-$invoice->tax);
            $invoice->send_at = now();
            $invoice->acquitted_at = now();
            $invoice->save();
        }

        return redirect('/invoices');
    }
}
