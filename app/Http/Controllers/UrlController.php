<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'original' => ['required', 'url']
        ]);

        $validated['user_id'] = Auth::user()->id ?? null;
        $validated['uid'] = Str::random(8);

        // dd($validated);

        Url::create($validated);

        return redirect()->back()->with('flash', [
            'banner' => 'URL Shortened!',
            'bannerStyle' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        $url->increment('clicks');
        $url->save();

        return redirect()->to($url->original);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();

        return redirect()->back()->with('flash', [
            'banner' => 'URL Deleted!',
            'bannerStyle' => 'success'
        ]);
    }
}
