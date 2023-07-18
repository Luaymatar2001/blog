<?php

namespace App\Http\Controllers;

use App\Http\Requests\emailRequest;
use App\Models\User;
use App\Notifications\sendEmail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function pageEmail($id)
    {
        return view('formEmail')->with('user_id', $id);
    }
    public function sendEmail(emailRequest $request)
    {
        $user = User::where('id', $request['user_id'])->first();
        // Mail::to($user->email)->send(new ContactMail());
        $user->notify(
            new sendEmail($request['name'], $request['email'], $request['subject'], $request['message'])
        );

        return redirect()->back()->with('status', true);
    }
}
