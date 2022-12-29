<?php
require dirname(__DIR__, 2) ."/vendor/autoload.php";

function clientCode(\HW13\AbstractFactory $factory, $type = 'both'){
    $product = match($type){
        'lcd' => ['lcd'=>$factory->createLCD()],
        'led' => ['led'=>$factory->createLED()],
        'both' => [
            'lcd'=>$factory->createLCD(),
            'led'=>$factory->createLED()
        ]
    };

    $productsDescription = [];
    foreach ($product as $key=>$value){
        if (count($product) > 1){
            $productsDescription[$key]['screenDescription'] = $value->getScreen();
            $productsDescription[$key]['soundDescription'] = $value->getSound();
            $productsDescription[$key]['funcDescription'] = $value->getFunction();
        }else {
            $productsDescription['screenDescription'] = $value->getScreen();
            $productsDescription['soundDescription'] = $value->getSound();
            $productsDescription['funcDescription'] = $value->getFunction();
        }
    }

    return $productsDescription;
}
echo "<pre>";
echo "Sony Factory: <br>";
$sonyProductLCD = clientCode(new \HW13\SonyFactory(), 'lcd');
$sonyProductLED = clientCode(new \HW13\SonyFactory(), 'led');
$sonyProductBoth = clientCode(new \HW13\SonyFactory());
echo "Sony Factory - LCD: <br>";
d($sonyProductLCD);
echo "Sony Factory - LED: <br>";
d($sonyProductLED);
echo "Sony Factory - Both: <br>";
d($sonyProductBoth);

echo "LG Factory: <br>";
$lgProductLCD = clientCode(new \HW13\LGFactory(), 'lcd');
$lgProductLED = clientCode(new \HW13\LGFactory(), 'led');
$lgProductBoth = clientCode(new \HW13\LGFactory());
echo "LG Factory - LCD: <br>";
d($lgProductLCD);
echo "LG Factory - LED: <br>";
d($lgProductLED);
echo "LG Factory - Both: <br>";
d($lgProductBoth);