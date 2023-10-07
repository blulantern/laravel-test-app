<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository Implements ContactRepositoryInterface{
    public function create($data)
    {
        return Contact::create($data);
    }
    public function delete($id)
    {
        return Contact::destroy($id);
    }
    public function getAll() 
    {
        return Contact::all();
    }
    public function getById($id, ?bool $jsonify=false) 
    {
        $contact = Contact::findOrFail($id);
        return $jsonify? $contact->outputJson() : $contact;
    }
    public function update($id, $data) 
    {
        return Contact::whereId($id)->update($data);
    }

    public function count()
    {
        return Contact::all()->count();
    } 
} 