<?php

namespace API;

use Controller, Input, Centre;

/**
 * ApiController
 */
class ApiController extends Controller {
    
    public function postChangeCentre()
    {
        $centre = Centre::find( Input::get('id') );
        if ($centre) {
            \Session::set('centre_id', Input::get('id'));
        }
        return $centre;
    }
}
