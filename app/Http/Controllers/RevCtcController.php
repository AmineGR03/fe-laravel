<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Contact;

class RevCtcController extends Controller
{
    public function newReview(Request $request)
    {
        $request -> validate([
            'user_id' => 'required',
            'content' => 'required',
            'rating' => 'required',
            
        ]);

        $review = new Review();
        $review->user_id = $request->user_id;
        $review->content = $request->content;
        $review->rating = $request->rating;
        
        $review->save();

        return response()->json(['success' => true], 200);
    }
    public function reviews()
    {
        $reviews = Review::with('user')->get();
        return response()->json(['reviews' => $reviews], 200);
    }
    public function newContact(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        
        $contact->save();
        return response()->json(['success' => true], 200);
    }

}
