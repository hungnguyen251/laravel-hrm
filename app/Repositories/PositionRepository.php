<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Position;
use Exception;
use Illuminate\Support\Facades\Config;

class PositionRepository implements RepositoryInterface
{
    protected $positions;

    public function __construct(Position $positions) 
    {
        $this->positions = $positions;
    }

    public function getAll()
    {
        return $this->positions->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->positions->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->positions->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->positions->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->positions->findOrFail($id);

        return (bool) $data->delete();
    }
}