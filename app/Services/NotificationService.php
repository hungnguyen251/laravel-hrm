<?php

namespace App\Services;

use App\Repositories\NotificationRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class NotificationService
{
    protected $notifications;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notifications = $notificationRepository;
    }

    public function getAllNotification($attrs)
    {
        return $this->notifications->getAll($attrs);
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

        if (isset($attrs['status'])) {
            if ('Chờ phê duyệt' == $attrs['status']) {
                $attrs['status'] = 'waiting';
            } else if ('Phê duyệt' == $attrs['status']) {
                $attrs['status'] = 'approve';
            } else {
                $attrs['status'] = 'refuse';
            }
        } else {
            $attrs['status'] = 'waiting';
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

    public function createRequestLeave(array $attrs)
    {
        $data = $this->handleRequestLeaveInput($attrs);

        return $this->notifications->store($data);
    }

    public function handleRequestLeaveInput(array $attrs)
    {
        $handleData = $this->handleFieldInput($attrs);
        
        $startTime = isset($handleData['start_time']) ? $handleData['start_time'] : '';
        $startDate = isset($handleData['start_date']) ? $handleData['start_date'] : '';
        $endTime = isset($handleData['end_time']) ? $handleData['end_time'] : '';
        $endDate = isset($handleData['end_date']) ? $handleData['end_date'] : '';
        $note = isset($handleData['note']) ? $handleData['note'] : '';
        $numberLeave = isset($handleData['number_leave']) ? $handleData['number_leave'] : '';
        $reason = isset($handleData['reason']) ? $handleData['reason'] : '';

        $content = [
            'Nghỉ từ : ' . $startTime . ' ' . $startDate,
            'Đến : ' .$endTime . ' ' . $endDate,
            'Số ngày nghỉ : ' .  $numberLeave,
            'Lý do : ' . $reason,
            'Bàn giao công việc : ' . $note,
        ];

        $handleData['content'] = strval(implode(', ', $content));

        $handleData = Arr::except($handleData, ['start_time','start_date','end_time','end_date','note','number_leave','reason']);

        return $handleData;
    }
}