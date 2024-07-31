<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaleCollection;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        
        return new SaleCollection( $sales );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // GENERAR PLANILLA DE VENTA
        $sale = new Sale();

        $sale->client = $request->client;
        $sale->user_id = $request->user_id;
        $sale->total = $request->total;

        $sale->save();


        // GENERAR DETALLES DE VENTA
        $products = $request->products;
        $details = [];

        foreach ($products as $product ) {
            
            $details[] = [
                "sale_id" => $sale['id'],
                "product_id" => $product['id'],
                "quantity" => $product['quantity'],            
            ];


            // ACTUALIZAR STOCK DE PRODUCTOS
            $product_updated = Product::find( $product['id'] );

            if( $product['quantity'] > $product_updated['stock'] )
            {
                $sale->delete();

                return response()->json([
                    "message" => "No hay stock suficiente",
                ], 400);
            }

            $product_updated['stock'] = $product_updated['stock'] - $product['quantity'];
            $product_updated->update();
        }

        ProductSale::insert($details);


        return response()->json([
            "message" => "Venta realizada con exito"
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
