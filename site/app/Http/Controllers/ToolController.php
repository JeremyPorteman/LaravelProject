<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;

class ToolController extends Controller
{
    public function index(Request $request) {
        $tools = Tool::query();
        if ($request->filled('price_higher_than')) {
            $amount = (float) $request->query('price_higher_than');
            $tools->wherePriceIsGreaterThan($amount);
        }

        //dd($tools->toSql());
        $tools = $tools->get();

        return view('tools.index', ['tools' => $tools]);
    }

    public function show(Tool $tool) {
        return view('tools.show', ['tool' => $tool]);
    }

    public function testScope() {
        $tools = Tool::query()
        ->wherePriceIsGreaterThan(30)
        ->get();

        return $tools;
    }
}
