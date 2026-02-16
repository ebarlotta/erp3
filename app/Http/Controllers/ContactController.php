<?php

namespace App\Http\Controllers;

use App\Models\contacto;
use Illuminate\Http\Request;
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

        $contacto = new contacto;
        $contacto->name = $request->name;
        $contacto->email = $request->email;
        $contacto->message = $request->message;
        $contacto->save();

        echo 'Correo enviado con éxito.';
        return redirect()->route('contact.success');
    }

    public function success() {
        return view('gracias'); // Renderizará resources/views/gracias.blade.php
    }
}
