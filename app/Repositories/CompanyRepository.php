<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\Config;

class CompanyRepository implements RepositoryInterface
{
    protected $companies;

    public function __construct(Company $companies) 
    {
        $this->companies = $companies;
    }

    public function getAll()
    {
        return $this->companies->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->companies->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->companies->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->companies->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->companies->findOrFail($id);

        return (bool) $data->delete();
    }
}