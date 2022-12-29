<?php

namespace HW13;

class LgLED implements AbstractLED
{

    public function getScreen()
    {
        return ['screen'=>'LED', "diagonal"=>83, "HDR"=>true];
    }

    public function getSound()
    {
        return ['power'=>'40 Wt', 'bluetooth' => true];
    }

    public function getFunction()
    {
        return ['SmartTV' => true, 'Apple'=>true, 'USB'=>true, 'HbbTV'=>false];
    }
}