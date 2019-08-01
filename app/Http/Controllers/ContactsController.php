<?php

namespace App\Http\Controllers;

use App\User;
use App\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $user = Auth::user();
        $contacts = Contacts::where('user_id', '=', Auth::id())->get();
        return view("user")->with('user',$user)->with('contacts',$contacts);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('contact' );
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $contact = new Contacts;
        $contact->name = $request->name;
        $contact->number = $request->number;
        $contact->user_id = $userId;
        $contact->save();
       
       return redirect('show');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        $contacts = Contacts::where('user_id', '=', Auth::id())->get();
        return view('showcontact')->with('contacts', $contacts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $contact = Contacts::where('id',$request->contact_id)
                    ->update(array('name' => $request->contact_name, 
                                    'number' => $request->contact_number)
                            );


        return redirect('show');
    }


        /*
    * Get the contact that needs to be edited
    *
    *
    */
    public function getUser()
    {
       // var_dump($request);
       $id = $_GET['id'];   
       $contacts = Contacts::where('id', '=', $id)->get();
       // print_r($contacts[0]->name);
       return ['id'=>$contacts[0]->id,'name'=>$contacts[0]->name,'number'=>$contacts[0]->number];
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacts $contacts)
    {
            //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $id = $request->id;

        $contacts = Contacts::where('id', '=', $id)->delete();

        return response()->json(['success'=>'success']);

    }
}
