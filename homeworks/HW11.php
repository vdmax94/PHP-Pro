<?php
/*
interface Bird
{
    public function eat();
    public function fly();
}

class Swallow implements Bird
{
    public function eat() { ... }
    public function fly() { ... }
}

class Ostrich implements Bird
{
    public function eat() { ... }
    public function fly() { /* exception */ /*}
} */

# Розділяємо інтерфейс Bird на два зі своїми специфічними методами
interface ISwallow
{
    public function eat();
    public function fly();
}

interface IOstrich
{
    public function eat();
}

#А потім відповідний клас імплементує відповідний інтерфейс
class Swallow implements ISwallow {
    public function eat(){}
    public function fly(){}
}

class Ostrich implements IOstrich {
    public function eat(){}
}

