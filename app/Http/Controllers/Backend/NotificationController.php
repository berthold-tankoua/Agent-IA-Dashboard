<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AutoPublish;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function NotificationView(){

        $notifications = Notification::where('user_id',Auth::id())->latest()->get();
        return view('backend.notification.notif_list', compact('notifications'));

    } //End Method

    public function NotificationAcceptUpdate($id){

        $notif=Notification::where('id',$id)->first();

        AutoPublish::findOrFail($notif->post_id)->update([
            'status' => 'Validé',
        ]);

        Notification::findOrFail($id)->update([
            'status' => 'Vue',
        ]);

        $notification = array(
            'message' =>'Mise a jour avec succes',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function NotificationDeclineUpdate($id){

        $notif=Notification::where('id',$id)->first();

        AutoPublish::findOrFail($notif->post_id)->update([
            'status' => 'Rejeté',
        ]);

        Notification::findOrFail($id)->update([
            'status' => 'Vue',
        ]);

        $notification = array(
            'message' =>'Mise a jour avec succes',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
