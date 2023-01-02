<?php

namespace App\Repositories;

use App\Http\Requests\StaffRequest;
use App\Interfaces\RepositoryInterface;
use App\Models\Staff;
use Exception;

class StaffRepository implements RepositoryInterface
{
    private Staff $staff;

    public function __construct(Staff $staff) 
    {
        $this->staff = $staff;
    }

    public function getAll()
    {
        return $this->staff->all();
    }

    public function getById(int $id)
    {
        return $this->staff->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->staff->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function update(int $id, array $attrs)
    {
        try {
            $data =  $this->staff->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->staff->findOrFail($id);

        return (bool) $data->delete();
    }
}