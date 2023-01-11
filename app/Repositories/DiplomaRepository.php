<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Diploma;
use Exception;
use Illuminate\Support\Facades\Config;

class DiplomaRepository implements RepositoryInterface
{
    protected $diplomas;

    public function __construct(Diploma $diplomas) 
    {
        $this->diplomas = $diplomas;
    }

    public function getAll($attrs)
    {
        return $this->diplomas->filter($attrs)->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->diplomas->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->diplomas->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->diplomas->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->diplomas->findOrFail($id);

        return (bool) $data->delete();
    }
}