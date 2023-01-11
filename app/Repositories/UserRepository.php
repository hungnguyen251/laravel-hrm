<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Config;

class UserRepository implements RepositoryInterface
{
    protected $users;

    public function __construct(User $users) 
    {
        $this->users = $users;
    }

    public function getAll($attrs)
    {
        return $this->users->filter($attrs)->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->users->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->users->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->users->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->users->findOrFail($id);

        return (bool) $data->delete();
    }
}