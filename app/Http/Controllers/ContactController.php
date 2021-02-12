<?php

namespace App\Http\Controllers;

use Validator;
use App\Email;
//use App\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function index(){

    //     $rows = ContactInfo::findorFail(1);
    //     return view('contact')->with('rows', $rows);
    // }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'email' => 'string|max:255',
            'message' => 'string|max:1200',
        ]);
    }

    protected function create(array $data)
    {
        return Email::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'subject' => $data['subject'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $info = $this->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Mesajınız göndərildi.',
            'info' => $info
        ]);
    }



}