<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationController extends Controller
{
    protected $notifications;

    /**
     * Controller constructor.
     *
     * @param  \App\  $notifications
     */
    public function __construct(NotificationService $notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notifications = $this->notifications->getAllNotification($request);

        return view('notifications.show', compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(NotificationRequest $request)
    {
        $this->notifications->createNotification($request->all());

        return redirect()->route('notifications.index')->with('success', 'Thêm thông báo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $userId)
    {
        $notifications = $this->notifications->getNotificationByUserId($userId);

        return view('notifications.show_id', compact('notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, NotificationRequest $request)
    {
        $this->notifications->updateNotificationById($id, $request->all());

        return redirect()->route('notifications.index')->with('success', 'Cập nhật thông báo thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->notifications->deleteNotificationById($id);

        return redirect()->route('notifications.index')->with('success', 'Xóa thông báo thành công'); 
    }

    /**
     * Edit a notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $notification = $this->notifications->getNotificationById($id);

        return view('notifications.edit', compact('notification'));
    }

    /**
     * Create a notification.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Request for leave.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function requestLeave(Request $request)
    {
        $this->notifications->createRequestLeave($request->all());

        return redirect()->route('notifications.show')->with('success', 'Tạo đơn xin nghỉ phép thành công');
    }

    /**
     * Change status.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function changeApproveStatus($id)
    {
        $this->notifications->changeNotificationApproveStatus($id);

        return redirect()->route('notifications.index')->with('success', 'Phê duyệt thông báo thành công');
    }
}
