<?php

namespace App\Services;

use App\Repositories\NotificationRepository;
use Illuminate\Support\Facades\Auth;

class NotificationService
{
    protected $notifications;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notifications = $notificationRepository;
    }

    public function getAllNotification()
    {
        return $this->notifications->getAll();
    }

    public function getNotificationById(int $id)
    {
        return $this->notifications->getById($id);
    }

    public function createNotification(array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->notifications->store($data);
    }

    public function updateNotificationById(int $id, array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->notifications->updateById($id, $data);
    }


    public function deleteNotificationById(int $id)
    {
        return $this->notifications->deleteById($id);
    }

    public function handleFieldInput(array $attrs)
    {
        if (isset($attrs['_token'])) {
            unset($attrs['_token']);
        }

        if (isset($attrs['_method'])) {
            unset($attrs['_method']);
        }

        if (Auth::check()) {
            if (empty($attrs['user_id'])) {
                $attrs['user_id'] = Auth::user()->id;
            }

            if (empty($attrs['department_id'])) {
                $attrs['department_id'] = Auth::user()->staff->department_id;
            }
        }

        return $attrs;
    }
}