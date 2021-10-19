<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function contactus(){
        $contact_numbers = [
            '09123123123' => 'James Gosling',
            '09123121212' => 'Taylor Otwel',
            '09123112344' => 'Rasmus Lerdorf'
        ];
        return view('pages.contactus', [
            'phone_numbers' => $contact_numbers
        ]);
    }

    public function show_page($id){
        return view('pages.showpage', [ 'page_id' => $id ]);
    }

}
