<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    // Show the contact form (optional)
    public function showForm()
{
    return view('contact.contact');  // Update to the correct folder and view name
}


    // Handle the contact form submission
    public function submitForm(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact form submission in the database
        ContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->route('contact.form')->with('status', 'Thank you for your message!');
    }
}
