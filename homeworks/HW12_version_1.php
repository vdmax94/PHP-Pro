<?php
//Створюємо абстрактний класс креатора, що буде створювати об'єкт машини (типу економ, стандарт та люкс) за допомогою фабричного методу getCar().
abstract class Taxi{
    abstract public function getCar(): Car;

    public function car (){
        $car = $this->getCar();

        return ['modelCar'=>$car->getModelCar(),
                'priceCar'=>$car->getPrice()];
    }
}

// Креатор економ машини
class TaxiEconom extends Taxi{
    public function getCar(): Car
    {
        return new CarEconom();
    }
}

// Креатор стандарт машини
class TaxiStandart extends Taxi{
    public function getCar(): Car
    {
        return new CarStandart();
    }
}

// Креатор люкс машини
class TaxiLux extends Taxi{
    public function getCar(): Car
    {
        return new CarLux();
    }
}

//Інтерфейс за яким будуть створюватись машини різних типів (економ, стандарт та люкс)
interface Car{
    public function getModelCar();
    public function getPrice();
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

//Універсальний клієнтський код, що "запускає" створення об'єктів
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


