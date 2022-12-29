<?php

namespace HW13;

class LgLCD implements AbstractLCD
{

    public function getScreen()
    {
        return ['screen'=>'LCD', "diagonal"=>68, "HDR"=>true];
    }

    public function getSound()
    {
        return ['power'=>'35 Wt', 'bluetooth' => false];
    }

    public function getFunction()
    {
        return ['SmartTV' => true, 'Apple'=>true, 'USB'=>true];
    }
}