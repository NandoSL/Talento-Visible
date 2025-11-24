<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomEmailVerification;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class CustomEmailNotificationController extends Controller
{
    /**
     * Enviar una notificación de verificación de correo electrónico personalizada.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        // Generar el hash del correo electrónico del usuario
        $hash = sha1($user->getEmailForVerification());

        // Generar una URL firmada con una expiración (por ejemplo, 60 minutos)
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // Nombre de la ruta de verificación
            Carbon::now()->addMinutes(60), // Tiempo de expiración
            [
                'id' => $user->getKey(), // Pasar el ID del usuario
                'hash' => $hash, // Pasar el hash del email
            ]
        );

        // Enviar el correo de verificación con la URL firmada
        //Mail::to($user->email)->send(new CustomEmailVerification($user, $verificationUrl));

        return back()->with('send', 'link-sent-2');

    }
}
