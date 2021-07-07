<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'asc')->get();
        return response()->json([
            'message' => 'view all product',
            'data' => $product
        ], 200);
    }

    public function store(Request $request)
    {
        // validate data
        $validator = Validator::make($request->all(), [
            'product_name' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'input data, here!',
                'data' => $validator->errors()
            ], 400);
        } else {
            $product = Product::create($request->all());

            if ($product) {
                return response()->json([
                    'message' => 'Saved data'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'data failed to save'
                ], 400);
            }
        }
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        if ($product) {
            return response()->json([
                'message' => 'Detail of product',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'message' => "Data not found",
                'data' => ''
            ], 404);
        }
    }

    public function update(Request $resquest, $id)
    {
        $product = Product::findOrFail($id);
        // validate data
        $validator = Validator::make($resquest->all(), [
            'product_name' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Input data, here!',
                'data' => $validator->errors()
            ], 400);
        } else {

            $product->update($resquest->all());
            if ($product) {
                return response()->json([
                    'message' => 'Data updated'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Data failed to update'
                ], 500);
            }
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if ($product) {
            return response()->json([
                'message' => 'data deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'data failed to delete'
            ], 500);
        }
    }
}
