<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller {
    public function send(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        try {
            Mail::send([], [], function ($message) use ($data) {
                $message->to('tu-correo@dominio.com') // ← Cambia esto
                        ->from($data['email'], $data['name'])
                        ->subject('Nuevo mensaje de contacto: ' . $data['name'])
                        ->text($data['message']);
            });

            return redirect()->route('contact.success');

        } catch (\Exception $e) {
            Log::error('Error al enviar correo: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Hubo un problema al enviar el mensaje. Inténtalo más tarde.']);
        }
    }

    public function success()
    {
        return view('home.gracias'); // Renderizará resources/views/gracias.blade.php
    }
}
