<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
       // $user = User::with('feedbacks')->get();
       $feedbacks = Feedback::with('user')->get();

        return view('feedback.index', ['feedbacks' => $feedbacks]);
    }

    public function create(){
        return view('feedback.create');
    }

    public function save(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $f = new  Feedback();
        $f->title = $request->title;
        $f->body = $request->body;
        $f->user_id = Auth::user()->id;
        $f->save();

        return redirect()->route('feedback')->with('status', [
            'class' => 'success',
            'message' => 'A new feedback has been added.'
        ]);
    }


}
