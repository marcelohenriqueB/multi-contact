<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use \Illuminate\View\View;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //

        $people = People::get();
        
        return View('people.index',[
            'people' => $people
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        //
        return View('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $rules = [
            'email' => 'required|email',
            'name' => 'required',
        ];
    
        $validatedData = $request->validate($rules);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        } 
        
        $person = People::create($request ->all());

        return redirect()->route('people.edit', ['person' => $person -> id]) -> with(['success' => 'successfully created person']);

    }

    /**
     * Display the specified resource.
     */
    public function show(People $person): View
    {
        //

        return View('people.show',[
            'person' => $person
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(People $person): View
    {
        //

        return View('people.edit',[
            'person' => $person
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, People $person)
    {
        //
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
        ];
    
        $validatedData = $request->validate($rules);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        } 
        
        $person -> update($request ->all());
       
        return redirect()->route('people.edit', ['person' => $person -> id]) -> with(['success' => 'edit successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $people)
    {
        //
    }
}
