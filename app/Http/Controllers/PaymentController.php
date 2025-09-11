<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\MercadoPagoService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $mercadoPago;
    
    public function __construct(MercadoPagoService $mercadoPago)
    {
        $this->mercadoPago = $mercadoPago;
    }
    
    public function createPayment(Request $request)
    {
        $orderData = [
            'items' => [
                [
                    'name' => 'Producto 1',
                    'quantity' => 2,
                    'price' => 100.50
                ],
                [
                    'name' => 'Producto 2',
                    'quantity' => 1,
                    'price' => 200.00
                ]
            ],
            'customer' => [
                'name' => 'Juan',
                'surname' => 'Pérez',
                'email' => 'juan@example.com'
            ],
            'external_reference' => 'ORD-12345' // ID de tu orden
        ];
        
        try {
            $preference = $this->mercadoPago->createPreference($orderData);
            
            return response()->json([
                'id' => $preference->id,
                'init_point' => $preference->init_point,
                'sandbox_init_point' => $preference->sandbox_init_point
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}