<?php

namespace App\Http\Controllers;

use App\UserContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $data['contacts'] = UserContact::all();
        return view('contact.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $contact  = new UserContact();
            $contact->name = $request->name;
            $contact->subject = $request->subject;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->save();
            $message = [
                'status' => 'success',
                'text' => 'Success to submit your message',
            ];
            DB::commit();
            return redirect()->route('contact')->with('message', $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserContact  $userContact
     * @return \Illuminate\Http\Response
     */
    public function show(UserContact $userContact)
    {
        $data['contact'] = $userContact;
        return view('contact.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserContact  $userContact
     * @return \Illuminate\Http\Response
     */
    public function edit(UserContact $userContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserContact  $userContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserContact $userContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserContact  $userContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserContact $userContact)
    {
        try {
            $userContact->delete();
            $message = [
                'status' => 'success',
                'text' => 'Success to delete the message',
            ];
            return redirect()->route('user-contact.index')->with('message', $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
