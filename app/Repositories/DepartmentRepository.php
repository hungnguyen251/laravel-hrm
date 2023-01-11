<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Department;
use Exception;
use Illuminate\Support\Facades\Config;

class DepartmentRepository implements RepositoryInterface
{
    protected $departments;

    public function __construct(Department $departments) 
    {
        $this->departments = $departments;
    }

    public function getAll($attrs)
    {
        return $this->departments->filter($attrs)->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->departments->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->departments->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->departments->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->departments->findOrFail($id);

        return (bool) $data->delete();
    }
}