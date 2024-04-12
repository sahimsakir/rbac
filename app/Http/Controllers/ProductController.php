<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $request->file('image1')->move(public_path('assets/images/products/'), time() . $request->file('image1')->getClientOriginalName());

        $imageName2 = null;
        if ($request->hasFile('image2')) {
            $imageName2 = $request->file('image2')->getClientOriginalName();
            $request->image2->move(public_path('assets/images/products/'), time() . $request->file('image2')->getClientOriginalName());
        }

        $imageName3 = null;
        if ($request->hasFile('image3')) {
            $imageName3 = $request->file('image3')->getClientOriginalName();
            $request->image3->move(public_path('assets/images/products/'), time() . $request->file('image3')->getClientOriginalName());
        }

        $product = new Product();
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image1 = 'assets/images/products/' . time() . $request->file('image1')->getClientOriginalName();
        $product->image2 = $imageName2 ? 'assets/images/products/' . time() . $request->file('image2')->getClientOriginalName() : null;
        $product->image3 = $imageName3 ? 'assets/images/products/' . time() . $request->file('image3')->getClientOriginalName() : null;
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasfile('image1')) {
            $request->file('image1')->move(public_path('assets/images/products/'), time() . $request->file('image1')->getClientOriginalName());
            $product->image1 = 'assets/images/products/' . time() . $request->file('image1')->getClientOriginalName();
        }


        if ($request->hasfile('image2')) {
            $request->file('image2')->move(public_path('assets/images/products/'), time() . $request->file('image2')->getClientOriginalName());
            $product->image2 = 'assets/images/products/' . time() . $request->file('image2')->getClientOriginalName();
        }

        if ($request->hasfile('image3')) {
            $request->file('image3')->move(public_path('assets/images/products/'), time() . $request->file('image3')->getClientOriginalName());
            $product->image3 = 'assets/images/products/' . time() . $request->file('image3')->getClientOriginalName();
        }
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
