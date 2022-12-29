<?php

namespace HW13;

class LGFactory implements AbstractFactory
{

    public function createLED(): AbstractLED
    {
        return new LgLED;
    }

    public function createLCD(): AbstractLCD
    {
        return new LgLCD;
    }
}