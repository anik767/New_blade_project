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
                'title' => 'Contact Information',
                'content' => 'Get in touch with us for any inquiries or collaborations.',
                'email' => 'your.email@example.com',
                'phone' => '',
                'address' => '',
                'social_links' => '',
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'social_links' => 'nullable|string',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'social_links' => $request->social_links,
        ];

        $contact = Contact::firstOrCreate([], $data);
        $contact->update($data);

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
