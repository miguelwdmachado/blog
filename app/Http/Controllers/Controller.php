<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function AdminAllowed() {
        if(Auth::User()->type->type === 'admin') {
              return true;
         }

        return false;
    }

    public function AutorAllowed() {
        if(Auth::User()->type->type === 'autor') {
              return true;
         }

        return false;
    }
}
