<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Notification;
use Exception;
use Illuminate\Support\Facades\Config;

class NotificationRepository implements RepositoryInterface
{
    protected $notifications;

    public function __construct(Notification $notifications) 
    {
        $this->notifications = $notifications;
    }

    public function getAll()
    {
        return $this->notifications->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->notifications->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->notifications->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->notifications->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->notifications->findOrFail($id);

        return (bool) $data->delete();
    }
}