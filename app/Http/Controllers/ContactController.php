<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request){
        if($request->method() == 'POST'){
            $body = "<p><strong>Имя: </strong> {$request->input('name')}</p>";
            $body .= "<p><strong>E-mail: </strong> {$request->input('email')}</p>";
            $body .= "<p><strong>Massage: </strong><br/>".nl2br($request->input('text'))."</p>";
            Mail::to('kushiy@yandex.ru')->send(new TestMail($body));
            $request->session()->flash('success', 'Сообщение отправлено.');
            return redirect('send');
        }
        return view('send');
    }
}
