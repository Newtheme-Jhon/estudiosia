<?php

namespace App\Http\Controllers;

use App\Mail\NotifyFormContact;
use App\Models\FormContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FormContactController extends Controller
{
    public function sendFormContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if(Auth::check()){
            $data['user_id'] = Auth::user()->id;
        }else{
            $data['user_id'] = null;
        }

        FormContact::create($data);

        //enviar email a mi cuenta, ponemos en cola queue()
        //Mail::to(User::find(1)->email)->send(new NotifyFormContact($data));
        Mail::to(User::find(1)->email)->queue(new NotifyFormContact($data));

        //session banner flash types: danger, warning, success, info
        session()->flash('flash.banner', 'Formulario enviado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('pages.contacto');
    }
}
