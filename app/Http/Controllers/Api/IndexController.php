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

    public function appointmentStore(Request $request)
    {
        $returnArray = [];
        $returnArray['status'] = 'false';
        $all = $request->except('_token');
        $control = Appointment::where('date', $all['date'])->where('time_id', $all['time_id'])->count();

        if ($control > 0) {
            $returnArray['message'] = 'Bu randevu saati dolu';
            return response()->json($returnArray);
        }

        $create = Appointment::create($all);
        if ($create) {
            $returnArray['status'] = 'true';
            $returnArray['message'] = 'Randevu başarıyla oluşturuldu';
            return response()->json($returnArray);
        } else {
            $returnArray['message'] = 'Randevu oluşturulamadı, Lütfen iletişime geçin';
            return response()->json($returnArray);
        }
    }
}
