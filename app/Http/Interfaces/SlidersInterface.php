<?php

namespace App\Http\Interfaces;

use App\Interfaces\BaseInterface;

interface SlidersInterface
{
    public function edit();
    public function update($request , $id);
}
