<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\WorkingHours;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getWorkingHours($date = '')
    {
        $date = $date == '' ? date('Y-m-d') : $date;
        $returnArray = [];
        $hours = \App\Models\WorkingHours::all();
        foreach ($hours as $hour => $value) {
            $control = Appointment::where('date', $date)->where('time_id', $value->id)->count();
            if ($control > 0) {
                $value->status = 'full';
            } else {
                $value->status = 'empty';
            }
            $returnArray[] = $value;
        }
        return response()->json($returnArray);
    }
}
