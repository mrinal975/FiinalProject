<?php

namespace App\Http\Resources\DailySedule;

use Illuminate\Http\Resources\Json\Resource;
use Auth;
use App\User;
use App\InterestedOnEvent;
class DailyEventConllection extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user=User::where('id',$this->createdBy)->first();
        return [
            'id'=>$this->id,
            'eventImage'=>$this->eventImage,
            'eventType'=>$this->eventType,
            'eventName'=>$this->eventName,
            'eventPlace'=>$this->eventPlace,
            'eventStartDate'=>$this->eventStartDate,
            'eventStartTime'=>$this->eventStartTime,
            'eventEndDate'=>$this->eventEndDate,
            'eventEndTime'=>$this->eventEndTime,
            'createdBy'=>$this->createdBy,
            'createdByName'=>$user->name,
            'eventDescription'=>$this->eventDescription,
            'totalGoing'=>count(InterestedOnEvent::where('Interest_type',1)->where('event_id',$this->id)->get()),
            'totalInterested'=>count(InterestedOnEvent::where('Interest_type',2)->where('event_id',$this->id)->get()),
            'intereststatus'=>InterestedOnEvent::where('user_id',Auth::user('api')->id)
                                                ->where('event_id',$this->id)
                                                ->where('Interest_type',2)->first() ? 
                                                "Not interested":"Interested",
            'goingstatus'=>InterestedOnEvent::where('user_id',Auth::user('api')->id)
                                                ->where('event_id',$this->id)
                                                ->where('Interest_type',1)->first() ? 
                                                "Not going":"Going",
        ];
    }
}
