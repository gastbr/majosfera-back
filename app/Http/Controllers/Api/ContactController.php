<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactController extends Controller
{
    /**
     * Store a newly created contact message in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Si el usuario está autenticado, podrías asignar user_id:
        // $validatedData['user_id'] = auth()->check() ? auth()->id() : null;

        $contact = ContactForm::create($validatedData);

        return response()->json($contact);
    }
}
