<?php

namespace App\View\Composers;

use App\Repositories\ContactRepository;
use Inertia\Inertia;
 
class ContactComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        protected ContactRepository $contacts,
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(Inertia $inertia): void
    {
        $inertia->share('contactCount', $this->contacts->count());
    }
}