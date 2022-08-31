<?php

namespace App\interfaces;

use GuzzleHttp\Psr7\Request;

interface PageInterface
{
  
    function createEvent($request);
    function updateEvent($request);
    function servicesUpdate($request);
    function aboutUpdate($request);
    function aboutServicesUpdate($request);
    function bannerAboutO($request);
    function bannerAboutT($request);
    function chamberDetailsUpdate($request);

}
