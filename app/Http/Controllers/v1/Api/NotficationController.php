<?php

namespace App\Http\Controllers\v1\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotficationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiTrait;
    public function index()
    {
        $notifcations = Notifications::where('notifiable_id',Auth::id())->first();
        if (Empty($notifcations)){
            return $this->ApiResponse(400, 'there are no Notification to show', null,null );
        }
        $notifcations = Notifications::where('notifiable_id',Auth::id())->get();
        return $this->ApiResponse(200, 'success', null, array('notifcations' => $notifcations));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ReadAll()
    {
        $notifcations = Notifications::where('notifiable_id',Auth::id())->first();
        if (Empty($notifcations)){
            return $this->ApiResponse(400, 'there are no Notification to Read', null,null );

        }
         Notifications::where('notifiable_id',Auth::id())->update(['read_at'=>now()]);
        $notifcations = Notifications::where('notifiable_id',Auth::id())->get();
        return $this->ApiResponse(200, 'success', null, array('notifcations' => $notifcations));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $notifcations = Notifications::where('id',$request->id)->first();
        if (Empty($notifcations)){
            return $this->ApiResponse(400, 'there are no Notification to show', null,null );

        }
        Notifications::where('id',$request->id)->update(['read_at'=>now()]);
        $notifcations = Notifications::where('id',$request->id)->first();

        return $this->ApiResponse(200, 'success', null, array('notifcations' => $notifcations));


    }



    public function destroy(Request $request)
    {
        $notifcations = Notifications::where('id',$request->id)->first();
        if (Empty($notifcations)){
            return $this->ApiResponse(400, 'there are no Notification to delete', null, null);

        }
        Notifications::where('id',$request->id)->delete();
        return $this->ApiResponse(200, 'success', null, 'Notification deleted successfully');

    }
    public function destroyALl()
    {
        $notifcations = Notifications::where('notifiable_id',Auth::id())->first();
        if (Empty($notifcations)){
            return $this->ApiResponse(400, 'there are no Notification to delete', null,null );

        }
        Notifications::where('notifiable_id',Auth::id())->delete();
        return $this->ApiResponse(200, 'success', null, 'Notifications deleted successfully');

    }
}
