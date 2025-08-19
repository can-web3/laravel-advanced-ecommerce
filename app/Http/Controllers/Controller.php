<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function success($redirectTo, $message)
    {
        session()->flash('alert_status', 'success');
        session()->flash('alert_message', $message);

        return redirect()->route($redirectTo);
    }

    public function error($redirectTo, $message)
    {
        session()->flash('alert_status', 'error');
        session()->flash('alert_message', $message);

        return redirect()->route($redirectTo);
    }
}
