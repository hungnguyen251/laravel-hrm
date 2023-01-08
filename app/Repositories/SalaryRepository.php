<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Salary;
use Exception;
use Illuminate\Support\Facades\Config;

class SalaryRepository implements RepositoryInterface
{
    protected $salaries;

    public function __construct(Salary $salaries) 
    {
        $this->salaries = $salaries;
    }

    public function getAll()
    {
        return $this->salaries->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->salaries->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->salaries->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->salaries->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->salaries->findOrFail($id);

        return (bool) $data->delete();
    }
}