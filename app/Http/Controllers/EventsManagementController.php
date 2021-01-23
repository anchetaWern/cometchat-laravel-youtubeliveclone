<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Event;
use Str;
use App\Http\Requests\ValidateEvent;

class EventsManagementController extends Controller
{
    public function index()
    {
        return view('events.create');
    }

    public function create(ValidateEvent $request)
    {
        $cometchat_group_id = Str::random(10);

        $data = [
            'guid' => $cometchat_group_id,
            'name' => request('title'),
            'type' => 'public',
        ];

        try {
            Http::withHeaders([
                'appId' => config('services.comet_chat.app_id'),
                'apiKey' => config('services.comet_chat.api_key'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
                ->withBody(json_encode($data), 'application/json')
                ->post('https://api-us.cometchat.io/v2.0/groups');

            Event::create(array_merge($request->validated(), [
                'cometchat_group_id' => $cometchat_group_id
            ]));

            return back()
                ->with('alert', ['type' => 'success', 'text' => "Event created!"]);

        } catch (\Exception $e) {
            return back()
                ->with('alert', ['type' => 'danger', 'text' => "An error occurred."]);
        }
    }
}
