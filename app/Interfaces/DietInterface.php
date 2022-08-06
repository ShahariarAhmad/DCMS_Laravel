<?php

namespace App\interfaces;

use GuzzleHttp\Psr7\Request;

interface DietInterface
{

    public function store($request);

    public function destroy();

    public function update($request);

    public function premadeSearch($request);

    public function request_form($request);

    public function sendPremade($request);

    public function records();
    
    public function premadeRecords();
    
}
