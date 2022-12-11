<?php
interface Car{
    public function getModelCar();
    public function getPrice();
}

abstract class Taxi{
    abstract public function getTaxi(): Car;

    public function car (){
        $car = $this->getTaxi();

        return ['modelCar'=>$car->getModelCar(),
                'priceCar'=>$car->getPrice()];
    }
}

class TaxiEconom extends Taxi{
    public function getTaxi(): Car
    {
        return new CarEconom();
    }
}

class TaxiStandart extends Taxi{
    public function getTaxi(): Car
    {
        return new CarStandart();
    }
}

class TaxiLux extends Taxi{
    public function getTaxi(): Car
    {
        return new CarLux();
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

function clientCode(Taxi $taxi){
    echo $taxi->car()['modelCar'].'<br>';
    echo "Trip price: ".$taxi->car()['priceCar'].'<br><br>';
}

echo 'Standart Car: <br>';
clientCode(new TaxiStandart());

echo 'Econom Car: <br>';
clientCode(new TaxiEconom());

echo 'Lux Car: <br>';
clientCode(new TaxiLux());


