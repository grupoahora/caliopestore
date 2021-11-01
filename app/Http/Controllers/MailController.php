<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use SplSubject;

class MailController extends Controller
{
    public function store(Request $request)
    {
        Mail::send('emails.contact', $request->all(), function($smj){
            $smj->subject('Correo de Contacto');
            $smj->to('contacto@caliope.com.co');
        });
        Session::flash('message', 'Mensaje enviado correctamente');
        /* dd($request); */
        return redirect()->route('web.contact_us');
    }
}
