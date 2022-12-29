<?php

namespace HW13;

class SonyLED implements AbstractLED
{

    public function getScreen()
    {
        return ['screen'=>'LED', "diagonal"=>55, "HDR"=>true];
    }

    public function getSound()
    {
        return ['power'=>'20 Wt', 'bluetooth' => true];
    }

    public function getFunction()
    {
        return ['SmartTV' => true, 'Apple'=>true, 'USB'=>true, 'HbbTV'=>true];
    }
}