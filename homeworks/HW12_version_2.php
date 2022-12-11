<?php
//Інтерфейс універсального креатору, що містить фабричний метод getCar(), який буде створювати об'єкт машини (типу економ, стандарт та люкс)
interface ITaxi {
    public function getCar($type): Car;
    public function car($type);
}

//Інтерфейс за яким будуть створюватись машини різних типів (економ, стандарт та люкс)
interface Car{
    public function getModelCar();
    public function getPrice();
}

//Універсальний креатор машин різних типів (економ, стандарт та люкс)
class Taxi implements ITaxi {

    public function getCar($type): Car
    {
        return match ($type){
            'econom' => new CarEconom(),
            'standart' => new CarStandart(),
            'lux' => new CarLux()
        };
    }

    public function car ($type){
        $car = $this->getCar($type);

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

//Універсальний клієнтський код, що "запускає" створення об'єктів. Також робить перевірку правильності введеня інформації щодо типу машини (економ, стандарт або люкс)
function clientCode(ITaxi $taxi, string $type){
    if ($type != 'econom' && $type != 'standart' && $type != 'lux'){
        throw new Exception('Enter valid Car type: econom, standart or lux');
    }

    echo $taxi->car($type)['modelCar'].'<br>';
    echo "Trip price: ".$taxi->car($type)['priceCar'].'<br><br>';
}

try {
    echo 'Econom Car: <br>';
    clientCode(new Taxi, 'econom');

    echo 'Standart Car: <br>';
    clientCode(new Taxi, 'standart');

    echo 'Lux Car: <br>';
    clientCode(new Taxi, 'lux');
}catch (Exception $e){
    echo $e->getMessage();
}