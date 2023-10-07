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
        return Contact::create($id);
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
        return Contact::create($data);
    }

    public function count()
    {
        return Contact::all()->count();
    } 
} 