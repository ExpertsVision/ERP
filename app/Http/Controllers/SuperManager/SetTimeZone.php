<?php

namespace App\Http\Controllers\SuperManager;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyTimeZones;

class SetTimeZone extends Controller
{
    public function companydefaulttimezone()
    {
        $id = Auth::id();
        $timezone = Input::get('timezone');
        $companytimezone = DB::table('companys_timezones')->insert(array(
                'timezone' => $timezone,
                'company_id' => $id
            ));
        return view('home');
    }
}
