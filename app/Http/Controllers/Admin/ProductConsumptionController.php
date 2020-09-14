<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductConsumptionRequest;
use App\Http\Requests\StoreProductConsumptionRequest;
use App\Http\Requests\UpdateProductConsumptionRequest;
use App\Product;
use App\ProductConsumption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductConsumptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_consumption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_consumptions = ProductConsumption::with('product')->get();

        return view('admin.product-consumptions.index', compact('product_consumptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_consumption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.product-consumptions.create',compact('products'));
    }

    public function store(StoreProductConsumptionRequest $request)
    {
        $product_consumption = ProductConsumption::create($request->all());

        $product = Product::findOrFail($product_consumption->product_id);

        $productNewQuantity = $product->quantity - $product_consumption->quantity;

        $product->update([
            'quantity' => $productNewQuantity
        ]);

        return redirect()->route('admin.product-consumptions.index');
    }

    public function edit(ProductConsumption $productConsumption)
    {
        abort_if(Gate::denies('product_consumption_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.product-consumptions.edit', compact('productConsumption','products'));
    }

    public function update(UpdateProductConsumptionRequest $request, ProductConsumption $productConsumption)
    {
        $old_qunatity = $productConsumption->quantity;
        
        $productConsumption->update($request->all());

        $product = Product::findOrFail($productConsumption->product_id);

        if(request('quantity') != $old_qunatity){
            $productNewQuantity = $product->quantity - $productConsumption->quantity;

            $product->update([
                'quantity' => $productNewQuantity
            ]);
        }
      

        return redirect()->route('admin.product-consumptions.index');
    }

    public function show(ProductConsumption $productConsumption)
    {
        abort_if(Gate::denies('product_consumption_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.product-consumptions.show', compact('productConsumption'));
    }

    public function destroy(ProductConsumption $productConsumption)
    {
        abort_if(Gate::denies('product_consumption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::findOrFail($productConsumption->product_id); 

        $productNewQuantity = $product->quantity + $productConsumption->quantity;

        $product->update([
            'quantity' => $productNewQuantity
        ]);

        $productConsumption->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductConsumptionRequest $request)
    {

        foreach (request('ids') as $value) {
            $productConsumption = ProductConsumption::findOrFail($value);

            $product = Product::findOrFail($productConsumption->product_id); 

            $productNewQuantity = $product->quantity + $productConsumption->quantity;

            $product->update([
                'quantity' => $productNewQuantity
            ]);
        }

        ProductConsumption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
