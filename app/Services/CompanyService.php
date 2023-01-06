<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected $companies;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companies = $companyRepository;
    }

    public function getAllCompany()
    {
        return $this->companies->getAll();
    }

    public function getCompanyById(int $id)
    {
        return $this->companies->getById($id);
    }

    public function createCompany(array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->companies->store($data);
    }

    public function updateCompanyById(int $id, array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->companies->updateById($id, $data);
    }


    public function deleteCompanyById(int $id)
    {
        return $this->companies->deleteById($id);
    }

    public function storageImage($image)
    {
        return $image->move('images/logo', $image->getClientOriginalName());
    }

    public function handleFieldInput(array $attrs)
    {
        if (isset($attrs['_token'])) {
            unset($attrs['_token']);
        }

        if (isset($attrs['_method'])) {
            unset($attrs['_method']);
        }

        if (isset($attrs['founding_date'])) {
            $foundingDate = str_replace('/', '-', $attrs['founding_date']);
            $attrs['founding_date'] = date('Y-m-d', strtotime($foundingDate));
        }

        //Lưu file ảnh
        if (isset($attrs['logo']) && $attrs['logo'] != null) {
            $this->storageImage($attrs['logo']);
            $attrs['logo'] = $attrs['logo']->getClientOriginalName();
        }

        return $attrs;
    }
}