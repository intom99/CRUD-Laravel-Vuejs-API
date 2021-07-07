<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'asc')->get();
        return response()->json([
            'message' => '',
            'data' => $product
        ], 200);
    }
}
