<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:200',
            'mensaje' => 'required|string|min:5|max:1000',
        ]);

        // Buscar mensajes existentes con los mismos datos
        $mensajesIguales = ContactMessage::where('nombre', $request->nombre)
            ->where('email', $request->email)
            ->where('mensaje', $request->mensaje)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($mensajesIguales->count() >= 2) {
            // Si hay 2 o más mensajes iguales, actualiza el último
            $ultimo = $mensajesIguales->first();
            $ultimo->touch(); // Actualiza la fecha updated_at
        } else {
            // Si no hay suficientes repetidos, crea uno nuevo
            ContactMessage::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'mensaje' => $request->mensaje,
            ]);
        }

        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }

}
