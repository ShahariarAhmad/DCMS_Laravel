<?php

namespace App\interfaces;

use GuzzleHttp\Psr7\Request;

interface BlogInterface
{

    function all();
    function upload($request);
    function edit($blogId);
    function update($request);
}
