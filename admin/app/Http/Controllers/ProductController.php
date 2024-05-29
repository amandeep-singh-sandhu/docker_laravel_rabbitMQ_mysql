<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    public function show($id)
    {
        if ($product = Product::find($id)) {
            return Product::find($id);
        } else {
            return response()->json(
                [
                    'message' => 'Product not found',
                ],
                404,
            );
        }
    }

    public function store(Request $request)
    {
        $product = Product::create($request->only('title', 'image'));

        ProductCreated::dispatch($product->toArray())->onQueue('main_queue');

        return response()->json($product, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->only(['title', 'image']));

            ProductUpdated::dispatch($product->toArray())->onQueue('main_queue');

            return response()->json($product, Response::HTTP_OK);
        } else {
            return response()->json(
                [
                    'message' => 'Product not found',
                ],
                Response::HTTP_NOT_FOUND,
            );
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();

            ProductDeleted::dispatch($id)->onQueue('main_queue');

            return response()->json(['message' => 'Product with id ' . $id . ' is deleted successfully'], Response::HTTP_OK);
        } else {
            return response()->json(
                [
                    'message' => 'Product not found',
                ],
                Response::HTTP_NOT_FOUND,
            );
        }
    }
}
