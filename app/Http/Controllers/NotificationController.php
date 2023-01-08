<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
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
    public function index()
    {
        $notifications = $this->notifications->getAllNotification();

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

        return redirect()->route('notifications.index')->with('success', 'Thêm phòng ban thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $notification = $this->notifications->getNotificationById($id);

        return response()->json($notification, Response::HTTP_OK);
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
}
