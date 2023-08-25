<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\VisitorLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

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
            'original' => ['required', 'url'],
            'custom_path' => ['nullable', 'alpha_dash', 'unique:urls,uid']
        ]);

        $validated['user_id'] = Auth::user()->id ?? null;
        $validated['uid'] = $validated['custom_path'] ?? Str::random(8);

        Url::create($validated);

        return redirect()->back()->with('flash', [
            'banner' => 'URL Shortened!',
            'bannerStyle' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url, Request $request)
    {
        $url->increment('clicks');
        $url->save();

        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer 8ee4423d8a101a'
        ];

        $ipInfoUrl = 'http://ipinfo.io/json';

        $response = $client->get($ipInfoUrl, ['headers' => $headers]);
        $data = json_decode($response->getBody(), true);
        $ip = $data['ip'];
        $country = $data['country'] ?? null;
        $city = $data['city'] ?? null;

        VisitorLog::create([
            'ip_address' => $ip,
            'country' => $country,
            'city' => $city,
            'url_uid' => $url->uid,
        ]);
        $originalUrl = 'original';

        if ($originalUrl) {
            return redirect(301)->away($url->$originalUrl);
        } else {
            return response(404);
        }
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
