<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Interfaces\ContactRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    //
    private ContactRepositoryInterface $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function index()
    {
        return Inertia::render('Contacts', [
            'contacts' => $this->contactRepository->getAll()
        ]);
    }

    public function apiIndex()
    {
        return response()->json([
            'contacts' => $this->contactRepository->getAll(true)
        ]);
    }

    public function show(Request $request)
    {
        $contact = $this->contactRepository->getById($request->id);
       
        return Inertia::render('Contacts', [
            'contacts' => $this->contactRepository->getAll(),
        ]);
    }
    public function apishow(Request $request)
    {
        return response($this->contactRepository->getbyId($request->id, true));
    }
    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        $this->contactRepository->create($request->all());
        return redirect('/contacts');
    }

    public function update(ContactRequest $request)
    {
        $validated = $request->validated();
        $id = $request->route('id');
        $this->contactRepository->update($id, $request->all());
        return redirect('/contacts/'.$id);
    }

    public function delete($id)
    {
        $this->contactRepository->delete($id);
        return redirect('/contacts');
    }
}
