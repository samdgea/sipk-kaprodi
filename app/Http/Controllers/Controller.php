<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Samdgea\Licensee\Checker;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function __construct(Checker $checker)
//    {
//        $checker->setKey('PKEY')
//                ->setPrivateKey('PRIVATE_KEY')
//                ->setActivationDomains(['activate.abdilah.id'])
//                ->check();
//    }
}
