<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Reward;
use Exception;
use Illuminate\Support\Facades\Config;

class RewardRepository implements RepositoryInterface
{
    protected $rewards;

    public function __construct(Reward $rewards) 
    {
        $this->rewards = $rewards;
    }

    public function getAll()
    {
        return $this->rewards->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->rewards->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->rewards->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->rewards->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->rewards->findOrFail($id);

        return (bool) $data->delete();
    }
}