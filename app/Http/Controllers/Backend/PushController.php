<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PushSubscription;
use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class PushController extends Controller
{
    /*===========================================
    NOTIFICATION PAGE 
    ===========================================*/

    public function AdminnotifView(){
        $notifs = PushSubscription::latest()->get();
        $pushs = PushSubscription::whereNotNull('user_id')->get();
        return view('pages.notifs.notif_view',compact('notifs','pushs'));
    } //End Method

    /* STORE USER NOTIF REGISTER CODE */
    public function AdminnotifStore(Request $request){
        $request->validate([
        'title'=>'required',
        'body'=>'required',
        ],[
            'title'=>'saisir le titre',
            'body'=>'saisir le texte',
        ]);

        $webPush = new WebPush([
            'VAPID' => [
                'subject' => 'https://agencedigitals/', // can be a mailto: or your website address
                'publicKey' => 'BEimBL7RHnFAHTgcwPXp7eiNFRXnIFCVNZR6oeilA4i21p7TJ-KQM9zB1DlpnSgCWtwb3NEYmfBu0-d_yX7e2vI', // (recommended) uncompressed public key P-256 encoded in Base64-URL
                'privateKey' => 'RLry20vFoFJVWCIPiux0WCqUzQizmoxoJx9V9dOPYfM', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
            ]
        ]);

        if ($request->user_id) {

            $notif = PushSubscription::where('user_id',$request->user_id)->first();
            $webPush->sendOneNotification(
                Subscription::create(json_decode($notif->data, true)),
                json_encode($request->input())
            );
        } else {

            $notifs = PushSubscription::latest()->get();
            foreach ($notifs as $value) {
                # code...
               $webPush->sendOneNotification(
                    Subscription::create(json_decode($value->data, true)),
                    json_encode($request->input())
                );
            }
        }

        $notification = array(
            'message' =>'Notification envoyee avec succes',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
        
    } //End Method


    public function AdminnotifDelete($id){

        PushSubscription::findOrFail($id)->delete();
        $notification = array(
            'message' =>'Notification supprrimer avec succes',
            'alert-type'=>'info'
        );

        return redirect()->back()->with($notification);

    } //End Method
}
