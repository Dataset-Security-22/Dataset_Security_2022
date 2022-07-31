<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Session;

class LfmConfigHandler extends \UniSharp\LaravelFilemanager\Handlers\ConfigHandler
{
    public function userField()
    {
        return base64_encode(md5(crypt(Session::get('email'), Session::get('email'))));
    }
}
