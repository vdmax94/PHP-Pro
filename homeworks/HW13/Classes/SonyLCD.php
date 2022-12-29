<?php

namespace HW13;

class SonyLCD implements AbstractLCD
{

    public function getScreen()
    {
        return ['screen'=>'LCD', "diagonal"=>65, "HDR"=>true];
    }

    public function getSound()
    {
        return ['power'=>'25 Wt', 'bluetooth' => true];
    }

    public function getFunction()
    {
        return ['SmartTV' => true, 'Apple'=>true, 'USB'=>true];
    }
}