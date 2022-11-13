<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

use App\Http\Requests\ContactValidation;
use App\Interfaces\ContactRepositoryInterface;
use App\Repositories\ContactRepository;


class ContactController extends Controller
{
    protected $contactRepo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->middleware('auth');
        $this->contactRepo = $contact;
    }

    public function index()
    {
        return view('contacts.index',['contacts'=>$this->contactRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create')->with('success','data inserted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactValidation $request)
    {
        $input = $request->validated();
        $this->contactRepo->create($input);
        return redirect()->route('contacts.index')->with('stored-msg', ' Data is successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contacts.show',['tshow'=>$this->contactRepo->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('contacts.edit',['contact'=>$this->contactRepo->find($id)]);
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
        $validatedData = $request->validate([
            'name' => '',
            'email' => '',
            'phone' => '',
            'contact' => '',
            'company_name' => '',
            'address' => '',
            'message' => '',

        ]);
        $this->contactRepo->update($request,$id);
        return redirect()->route('contacts.index')->with('update-msg', ' Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        contact::findOrFail($contact->id)->delete();

        return redirect()->route('contacts.index')->with('delete-msg', ' Data is successfully deleted');
    }
}
