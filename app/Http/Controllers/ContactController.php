<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the form for editing the contact information.
     */
    public function edit()
    {
        $contact = Contact::first();
        
        if (!$contact) {
            // Create a default contact entry if none exists
            $contact = Contact::create([
                'email' => 'your.email@example.com',
                'phone' => '',
                'address' => '',
                'city' => '',
                'linkedin' => '',
                'github' => '',
                'additional_info' => '',
            ]);
        }
        
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the contact information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'additional_info' => 'nullable|string',
        ]);

        $contact = Contact::first();
        
        if (!$contact) {
            $contact = new Contact();
        }

        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'additional_info' => $request->additional_info,
        ];

        if ($contact->exists) {
            $contact->update($data);
        } else {
            Contact::create($data);
        }

        return redirect()->route('admin.contacts.edit')
                         ->with('success', 'Contact information updated successfully.');
    }

    // 🔓 Public: Show contact page
    public function publicShow()
    {
        $contact = Contact::first();
        return view('site.contact', compact('contact'));
    }
}
