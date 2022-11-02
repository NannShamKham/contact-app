<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromArray;

class ContactsExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $contacts;


    public function __construct(array $contacts)
    {
        $this->contacts = $contacts;
    }

    public function array():array
    {
        $ids = $this->contacts;
        $Arr = [];
//        return $ids;
        foreach ($ids[0] as $key=>$value){
           array_push($Arr,$value);
        }

//        dd($Arr);
        return [Contact::all()->whereIn('id',$Arr)];
    }

}
