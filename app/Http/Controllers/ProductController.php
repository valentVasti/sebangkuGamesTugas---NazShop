<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Product';
        $product = Product::orderBy('highlighted', 'desc')->orderBy('created_at', 'desc')->paginate(10);

        return view('backend.product.index', compact('title', 'product'));
    }

    public function create()
    {
        $title = 'Product';

        return view('backend.product.create', compact('title'));
    }

    public function store(Request $request)
    {
        $rules = [
            'product_name' => 'required',
            'price' => 'required',
            'product_img' => 'required',
            'description' => 'required'
        ];

        $data = [
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_img' => $request->product_img,
            'description' => $request->description
        ];

        $message = [
            'product_name.required' => 'Product name is required!',
            'price.required' => 'Price is required!',
            'product_img.required' => 'Product image is required!',
            'description.required' => 'Product description is required!',
        ];

        $validator = Validator::make($data, $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // To repopulate the form fields with the old input
        }

        $product_img = $request->file('product_img');

        $originalName = str_replace([' ', '\t', '\n', '\r'], '', $product_img->getClientOriginalName());
        $img_name = time() . '_productImg_' . $originalName;
        $path = public_path('images/database/product');
        $product_img->move($path, $img_name);

        Product::create([
            'product_name' => $data['product_name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'product_img' => $img_name,
            'status' => true,
        ]);

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $title = 'Product';
        $product = Product::find($id);

        return view('backend.product.edit', compact('product', 'title'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'product_name' => 'required',
            'price' => 'required',
            'product_img' => 'nullable',
            'description' => 'required'
        ];

        $data = [
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_img' => $request->product_img,
            'description' => $request->description
        ];

        $message = [
            'product_name.required' => 'Product name is required!',
            'price.required' => 'Product description is required!',
            'description.required' => 'Product description is required!'
        ];

        $validator = Validator::make($data, $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // To repopulate the form fields with the old input
        }

        $product = Product::find($id);
        $product_img = $request->file('product_img');

        if ($product_img !== null) {
            $originalName = str_replace([' ', '\t', '\n', '\r'], '', $product_img->getClientOriginalName());
            $img_name = time() . '_productImg_' . $originalName;
            $path = public_path('images/database/product');
            $product_img->move($path, $img_name);


            $product->update([
                'product_name' => $data['product_name'],
                'price' => $data['price'],
                'product_img' => $img_name,
                'status' => $product->status,
            ]);
        }

        $product->update([
            'product_name' => $data['product_name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'status' => $product->status,
        ]);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {

        $product = Product::find($id);

        $product_image = $product->product_img;

        $old_path = public_path('images/database/product/');

        if (File::exists($old_path . $product_image)) {
            File::delete($old_path . $product_image);

            $product->delete();
        } else {
            return response()->json([
                'status' => 'Failed',
            ], 404);
        }

        return response()->json([
            'status' => 'Delete Success',
        ], 200);
    }

    public function activation($id, $type)
    {
        $product = Product::find($id);

        if ($type == "Activate") {
            $product->update([
                'status' => true
            ]);
        }else{
            $product->update([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => "Success",
            'message' => "Product successfully updated",
            'data' => $product
        ], 200);
    }

    public function highlight($id)
    {
        $product = Product::find($id);

        if ($product->highlighted == '1') {
            $product->update([
                'highlighted' => false
            ]);
        }else{
            $product->update([
                'highlighted' => true
            ]);
        }

        return response()->json([
            'status' => "Success",
            'message' => "Product successfully updated",
            'data' => $product
        ], 200);
    }
}
