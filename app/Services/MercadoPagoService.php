<?php

namespace App\Services;

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;


class MercadoPagoService
{
    public function __construct()
    {
        // SDK::setAccessToken(config('services.mercadopago.access_token'));
        // SDK::setPublicKey(config('services.mercadopago.public_key'));
        
        // if (config('services.mercadopago.sandbox')) {
        //     SDK::setIntegratorId("TU_INTEGRATOR_ID"); // Opcional
        // }
    }

    public function createPreference($orderData)
    {
        $preference = new Preference();
        
        // Configurar items
        $items = [];
        foreach ($orderData['items'] as $item) {
            $mpItem = new Item();
            $mpItem->title = $item['name'];
            $mpItem->quantity = $item['quantity'];
            $mpItem->unit_price = $item['price'];
            $mpItem->currency_id = 'ARS'; // o 'USD', 'BRL', etc.
            $items[] = $mpItem;
        }
        
        $preference->items = $items;
        
        // Configurar URLs de redirección
        $preference->back_urls = [
            'success' => route('mercadopago.success'),
            'failure' => route('mercadopago.failure'),
            'pending' => route('mercadopago.pending')
        ];
        
        $preference->auto_return = 'approved'; // Redirección automática
        $preference->notification_url = route('mercadopago.webhook');
        
        // Datos adicionales del comprador
        $preference->payer = [
            'name' => $orderData['customer']['name'],
            'surname' => $orderData['customer']['surname'],
            'email' => $orderData['customer']['email'],
        ];
        
        $preference->save();
        
        return $preference;
    }
}