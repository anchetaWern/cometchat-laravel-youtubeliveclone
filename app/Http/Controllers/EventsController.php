<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Auth;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'DESC')->get();
        return view('events', ['events' => $events]);
    }

    public function detail($id)
    {
        $event = Event::where('cometchat_group_id', $id)->first();
        return view('event', [
            'event' => $event,
            'cometchat_user_id' => Auth::user()->cometchat_user_id
        ]);
    }
}
