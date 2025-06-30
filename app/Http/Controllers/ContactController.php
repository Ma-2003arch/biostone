<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use App\Notifications\ContactConfirmation; // ✅ Notification
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable; // ✅ Trait pour notification anonyme

class ContactController extends Controller
{
   
    public function index(Contact $contact)
    {
        return view('emails.form', compact('contact'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email',
            'Phone' => 'nullable|string|max:20',
            'Message' => 'required|string',
        ]);

        // Enregistrement dans la base
        $contact = Contact::create([
            'name' => $validated['Name'],
            'email' => $validated['Email'],
            'phone' => $validated['Phone'],
            'message' => $validated['Message'],
        ]);

        // ✅ Notifier l'utilisateur avec une notification anonyme
        $anonymousUser = new class {
            use Notifiable;
            public $email;

            public function routeNotificationForMail()
            {
                return $this->email;
            }
        };

        $anonymousUser->email = $contact->email;
        $anonymousUser->notify(new ContactConfirmation($contact));


        // ✅ Notifier l'admin avec un email
        Mail::to('mapayenedouti@gmail.com')->send(new ContactMail($contact));

        return redirect()->back()->with('success', 'Message envoyé avec succès !');
    }
}
