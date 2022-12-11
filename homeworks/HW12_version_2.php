<?php

interface ITaxi {
    public function getTaxi($type): Car;
    public function car($type);
}

interface Car{
    public function getModelCar();
    public function getPrice();
}

class Taxi implements ITaxi {

    public function getTaxi($type): Car
    {
        switch ($type){
            case 'econom':
                return new CarEconom();
                break;
            case 'standart':
                return new CarStandart();
                break;
            case 'lux':
                return new CarLux();
                break;
        }
    }

    public function car ($type){
        $car = $this->getTaxi($type);

        return ['modelCar'=>$car->getModelCar(),
            'priceCar'=>$car->getPrice()];
    }
}

class CarEconom implements Car{

    public function getModelCar()
    {
        return "Your model car is Lada";
    }

    public function getPrice()
    {
        return 50;
    }
}

class CarStandart implements Car{

    public function getModelCar()
    {
        return "Your model car is Renault";
    }

    public function getPrice()
    {
        return 70;
    }
}

class CarLux implements Car{

    public function getModelCar()
    {
        return "Your model car is Audi";
    }

    public function getPrice()
    {
        return 90;
    }
}

function clientCode(ITaxi $taxi, string $type){
    if ($type != 'econom' && $type != 'standart' && $type != 'lux'){
        throw new Exception('Enter valid Car type: econom, standart or lux');
    }

    echo $taxi->car($type)['modelCar'].'<br>';
    echo "Trip price: ".$taxi->car($type)['priceCar'].'<br><br>';
}

echo 'Econom Car: <br>';
clientCode(new Taxi, 'econom');

echo 'Standart Car: <br>';
clientCode(new Taxi, 'standart');

echo 'Lux Car: <br>';
clientCode(new Taxi, 'lux');
