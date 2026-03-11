<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::latest()->paginate(12);
        return view('pages.publications.index', compact('publications'));
    }

    public function show($slug)
    {
        $publication = Publication::where('slug', $slug)->firstOrFail();
        return view('pages.publications.show', compact('publication'));
    }
}
