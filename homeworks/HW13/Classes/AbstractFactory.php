<?php

namespace HW13;

interface AbstractFactory
{
    public function createLED (): AbstractLED;
    public function createLCD (): AbstractLCD;

}