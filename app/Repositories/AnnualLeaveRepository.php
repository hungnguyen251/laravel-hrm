<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\AnnualLeave;
use Exception;
use Illuminate\Support\Facades\Config;

class AnnualLeaveRepository implements RepositoryInterface
{
    protected $leave;

    public function __construct(AnnualLeave $leave) 
    {
        $this->leave = $leave;
    }

    public function getAll($attrs)
    {
        return $this->leave->filter($attrs)->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->leave->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->leave->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->leave->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->leave->findOrFail($id);

        return (bool) $data->delete();
    }
}