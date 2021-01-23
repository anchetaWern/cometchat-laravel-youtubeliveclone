<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateUser;
use Illuminate\Support\Facades\Http;
use Str;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }


    public function create(ValidateUser $request)
    {
        $cometchat_user_id = Str::random(10);

        $data = [
            'uid' => $cometchat_user_id,
            'name' => request('name'),
        ];

        try {
            Http::withHeaders([
                'appId' => config('services.comet_chat.app_id'),
                'apiKey' => config('services.comet_chat.api_key'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
                ->withBody(json_encode($data), 'application/json')
                ->post('https://api-us.cometchat.io/v2.0/users');

            User::create(array_merge($request->validated(), ['cometchat_user_id' => $cometchat_user_id]));

            return back()
                ->with('alert', ['type' => 'success', 'text' => "You are now registered!"]);

        } catch (\Exception $e) {
            return back()
                ->with('alert', ['type' => 'danger', 'text' => "An error occurred."]);
        }
    }
}
