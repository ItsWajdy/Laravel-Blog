<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome', compact('posts'));
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact() {
        $this->validate(request(), [
            'email'   => 'required|email',
            'message' => 'required|min:10'
        ]);

        $data = [
            'email'    => request('email'),
            'subject'       => request('subject'),
            'body_message'  => request('message')
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('myemail@domain.com');
            $message->subject($data['subject']);
        });

        Session::flash('message', 'Email Sent');
        return redirect('/');
    }
}
