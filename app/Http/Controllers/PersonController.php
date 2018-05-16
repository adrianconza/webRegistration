<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Person;
use App\Workshop;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();
        return view('web.people.index')
            ->with('people', $people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $from = $request->input('from');
        $workshops = Workshop::where('active', true)->get();
        return view('web.people.create')
            ->with('workshops', $workshops)
            ->with('from', $from == null ? 1 : $from);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'bail|alpha_num|digits_between:10,13|numeric|is_valid_cedula',
            'phone' => 'bail|digits_between:6,16|numeric',
            'birth_date' => 'bail|after:"1900-01-01"|before:"2017-12-31"|date',
            'workshops' => 'bail|array|required',
        ]);
        $person = Person::create($request->all());
        $person->workshops()->attach($request->workshops);
        if($request->from == 1)
            return redirect()->route('people.create');
        return redirect()->route('people.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);
        return view('web.people.show')
            ->with('person', $person);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);
        return view('web.people.edit')
            ->with('person', $person);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cedula' => 'bail|alpha_num|digits_between:10,13|numeric|is_valid_cedula',
            'phone' => 'bail|digits_between:6,16|numeric',
            'birth_date' => 'bail|after:"1900-01-01"|before:"2017-12-31"|date',
            'workshops' => 'bail|array|required',
        ]);
        $person = Person::find($id);
        $person->fill($request->all())->save();
        return redirect()->route('people.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id)->delete();
        return redirect()->route('people.index');
    }
}
