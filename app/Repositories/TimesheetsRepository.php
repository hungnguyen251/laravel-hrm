<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Timesheets;
use Exception;
use Illuminate\Support\Facades\Config;

class TimesheetsRepository implements RepositoryInterface
{
    protected $timesheets;

    public function __construct(Timesheets $timesheets) 
    {
        $this->timesheets = $timesheets;
    }

    public function getAll($attrs)
    {
        return $this->timesheets->filter($attrs)->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->timesheets->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->timesheets->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->timesheets->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->timesheets->findOrFail($id);

        return (bool) $data->delete();
    }
}