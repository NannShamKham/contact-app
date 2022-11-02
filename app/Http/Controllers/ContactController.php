<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Exports\ContactsExport;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contacts = Contact::when(\request()->trash,fn($q)=>$q->onlyTrashed())
            ->where('user_id',Auth::id())
            ->get();
//        $contacts = Contact::get();

        return view('contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->fname = $request->first;
        $contact->lname = $request->last;
        $contact->phone = $request->phone;
        $contact ->email = $request->email;
        $contact->fullName = $request->first." ".$request->last;
        if ($request->company){
            $contact->company = $request->company;
        }
        if ($request->job){
            $contact->jobTitle = $request->job;
        }
        if ($request->birthday){
            $contact->birthday =$request->birthday;
        }
        if ($request->notes){
            $contact->notes = $request->notes;
        }
        if ($request->hasFile('photo')){
            $newName = $request->file('photo')->store('public');

            $contact->photo = $newName;
        }

        $contact->save();
//         return $contact;
        return redirect()->route('contact.index')->with('status', $contact->fullName." is created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
//        return $request;
        $contact->fname = $request->first;
        $contact->lname = $request->last;
        $contact->phone = $request->phone;
        $contact ->email = $request->email;
        $contact->fullName = $request->first." ".$request->last;
        if ($request->company){
            $contact->company = $request->company;
        }
        if ($request->job){
            $contact->jobTitle = $request->job;
        }
        if ($request->birthday){
            $contact->birthday =$request->birthday;
        }
        if ($request->notes){
            $contact->notes = $request->notes;
        }
        if ($request->hasFile('photo')){
            $newName = $request->file('photo')->store('public');
            $contact->photo = $newName;

        }

        $contact->update();
//        return $contact;
        return redirect()->route('contact.index')->with('status', $contact->fullName." is created successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $contact=Contact::withTrashed()->findOrFail($id)->first();
//        return $contact;
        if (\request('delete') === 'force'){
            $contact=Contact::withTrashed()->findOrFail($id);

            $message = $contact->fullName." is deleted successfully";
            $contact->forceDelete();

            if($contact->photo){
                Storage::delete($contact->photo);
            }
        }elseif (request('delete') === 'restore'){
            $contact=Contact::withTrashed()->findOrFail($id);

            $message = $contact->fullName." is restore successfully";
            $contact->restore();
        }else{
            $contact=Contact::withTrashed()->findOrFail($id);
            $message = $contact->fullName." is moved to trash successfully";
            $contact->delete();
        }

//        $contact->delete();

        return redirect()->route('contact.index')->with('status',$message);
    }

    public function destroyMultiple(\Illuminate\Http\Request $request)
    {
//    return $request;
        //delete photo from storage
        $arr=[];
        foreach ( $request->multipleId as $item) {
            if ( Contact::find($item)->photo){
                array_push($arr, Contact::find($item)->photo);
            }
        }
        Storage::delete($arr);
        //delete from database

        Contact::destroy(collect($request->multipleId));
        return redirect()->route('contact.index')->with(['status','multiple  deleted']);
    }

    public function copy($id){
        $contact = Contact::find($id);
        $newContact = $contact->replicate();
        $newContact->created_at = Carbon::now();
        $newContact->save();
//       return $contact;
       return redirect()->route('contact.index')->with(['status','multiple  deleted']);
    }


    public function copyMultiple(\Illuminate\Http\Request $request){


        $copyContacts = Contact::whereIn('id',$request->multipleId)->get();
        foreach ($copyContacts as $copyContact){
            $newContact = $copyContact->replicate();
            $newContact->created_at = Carbon::now();
            $newContact->save();
        }

        return redirect()->route('contact.index')->with(['status','multiple  deleted']);
    }

    public function export(){
//        return "export";
       return Excel::download(new ContactExport(),'contacts-collection.xlsx');

    }
    public function exportMultiple(\Illuminate\Http\Request $request){
        $export  = new ContactsExport([$request->multipleId]);

//        return "export";
        return Excel::download($export,'contacts-collection.xlsx');

    }
    public function exportSingle($id){
//        return $id;
        $export  = new ContactsExport([[$id]]);

//        return "export";
        return Excel::download($export,'contacts-collection.xlsx');

    }

    public function printAll(){
        $contacts = Contact::all();
        print_r($contacts) ;
//        return $id;
//        $export  = new ContactsExport([[$id]]);

//        return "export";
//        return Excel::download($export,'contacts-collection.xlsx');

    }

}
