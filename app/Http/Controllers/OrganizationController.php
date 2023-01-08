<?php

namespace App\Http\Controllers;

use App\Services\OrganizationService;

class OrganizationController extends Controller
{
    protected $organization;

    /**
     * Controller constructor.
     *
     * @param  \App\  $notifications
     */
    public function __construct(OrganizationService $organizationPersonel)
    {
        $this->organization = $organizationPersonel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPersonnelOrganization()
    {
        $data = $this->organization->getAll();

        return view('organizations.show', compact('data'));
    }
}
