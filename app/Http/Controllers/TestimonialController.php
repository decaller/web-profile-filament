<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)->latest()->paginate(24);
        return view('pages.testimonials.index', compact('testimonials'));
    }
}
