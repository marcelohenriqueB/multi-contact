<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\People;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(People $person ): View
    {
        //
        
        return View('contacts.create',[
            'person' => $person,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,People $person)
    {
        //

        $rules = [
            'country_code' => 'required|max:5',
            'number' => 'required|size:9',
        ];
        
        
        
        $validatedData = $request->validate($rules);


        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        } 
        $contacts_very =  Contact::where(
            [
                'country_code' => $request -> country_code,
                'number' => $request ->number, 
                'people_id' =>  $person ->id
            ]
        )->first();

        if ($contacts_very){
            return redirect()->back()->withErrors(['duplicate contact'])->withInput();
        }
        
        Contact::create($request -> all());
    
        return redirect()->route('people.show', ['person' => $person -> id]) -> with(['success' => 'Created successfully']);

       

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(People $person, Contact $contact ): View
    {
    
        return View('contacts.edit',[
            'person' => $person,
            'contact' => $contact
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,People $person, Contact $contact)
    {
        //

        $rules = [
            'country_code' => 'required|max:5',
            'number' => 'required|size:9',
        ];
        
        
        
        $validatedData = $request->validate($rules);


        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        } 
        $contacts_very =  Contact::where(
            [
                'country_code' => $request -> country_code,
                'number' => $request ->number, 
                'people_id' =>  $person ->id
            ]
        )->first();

        if ($contacts_very){
            if(!($contacts_very ->id == $contact ->id)){
                return redirect()->back()->withErrors(['duplicate contact'])->withInput();
            }  
        }
        
        $contact -> update($request -> all());
    
        return redirect()->route('contacts.edit', ['person' => $person -> id,'contact' => $contact ->id]) -> with(['success' => 'Updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $person, Contact $contact)
    {
        //
        $contact ->status = false;
        $contact ->save();
        return redirect()->route('people.show', ['person' => $person -> id]) -> with(['success' => 'Deleted successfully']);

    }
}
