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

    public function show($id){
        Feedback::findOrFail($id);
        $feedback = Feedback::with('user')->where('id', $id)->first();

        return view('feedback.show' , ['feedback' => $feedback]);
    }

    public function edit($id){
        $feedback = Feedback::findOrFail($id);

        return view('feedback.edit', ['feedback' => $feedback]);
    }

    public function update(Request $request){
        $request->validate([
            'feedback_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $feedback = Feedback::findOrFail($request->feedback_id);
        $user = Auth::user();

        if ($user->id != $feedback->user_id && $user->type == 'USER')
            return redirect()->route('feedback')->with('status', [
                'class' => 'danger',
                'message' => "You do not have the privilege to modify this feedback."
            ]);

        if ($request->has('status'))
            $feedback->status = $request->status;

        $feedback->title = $request->title;
        $feedback->body = $request->body;
        $feedback->save();

        return redirect()->route('feedback')->with('status', [
            'class' => 'success',
            'message' => 'The feedback was updated successfully.'
        ]);
    }

    public function delete($id){
        $feedback = Feedback::findOrFail($id);

        $user = Auth::user();
        if ($user->id != $feedback->user_id && $user->type == 'USER')
            return redirect()->route('feedback')->with('status', [
                'class' => 'danger',
                'message' => "You do not have the privilege to modify this feedback."
            ]);

        $feedback->delete();

        return redirect()->route('feedback')->with('status', [
            'class' => 'success',
            'message' => 'Feedback is deleted successfully.'
        ]);
    }


}
