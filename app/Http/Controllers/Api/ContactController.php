<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'property_id' => 'nullable|exists:properties,id',
        ]);

        $contact = Contact::create($validated);

        // TODO: Send notification email to admin

        return response()->json([
            'message' => 'Mensaje enviado correctamente',
            'contact' => $contact
        ], 201);
    }

    // Admin methods
    public function index(Request $request)
    {
        $query = Contact::with('property')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return $query->paginate(20);
    }

    public function show($id)
    {
        $contact = Contact::with('property')->findOrFail($id);

        // Mark as read if not already
        if (!$contact->read_at) {
            $contact->markAsRead();
        }

        return $contact;
    }

    public function updateStatus(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,read,replied,archived',
        ]);

        $contact->update($validated);

        return $contact;
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully']);
    }

    public function stats()
    {
        return [
            'total' => Contact::count(),
            'pending' => Contact::pending()->count(),
            'unread' => Contact::unread()->count(),
            'today' => Contact::whereDate('created_at', today())->count(),
        ];
    }
}
