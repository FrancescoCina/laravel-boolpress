<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('admin.contacts.index', compact('leads'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('account@mail.it')->send(new SendNewMail($new_lead));
        return redirect()->route('admin.contacts.thanks')->with('alert-type', 'success')->with('alert-message', "Messaggio inviato con successo all'utente $new_lead->name");
    }



    public function thank()
    {
        return view('admin.contacts.thanks');
    }
}
