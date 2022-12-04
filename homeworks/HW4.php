<?php
class Color {
    //Обьявление свойств
    private int $red, $green, $blue;

    public function __construct($red, $green, $blue)
    {
        //установка цветов
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    //сеттер красного цвета
    private function setRed(int $red)
    {
        if ($red<0 || $red>255){
            throw new Exception("Red should be more than 0 and less then 255");
        }

        $this->red = $red;
    }

    //сеттер зеленого цвета
    private function setGreen(int $green)
    {
        if ($green<0 || $green>255){
            throw new Exception("Green should be more then 0 and less then 255");
        }else{
            $this->green=$green;
        }
    }

    //сеттер синего цвета
    private function setBlue(int $blue)
    {
        if ($blue<0 || $blue>255){
            throw new Exception("Blue should be more then 0 and less then 255");
        }
        $this->blue = $blue;
    }

    //геттер красного цвета
    public function getRed()
    {
        return $this->red;
    }

    //геттер зеленого цвета
    public function getGreen()
    {
        return $this->green;
    }

    //геттер синего цвета
    public function getBlue()
    {
        return $this->blue;
    }

    //метод сравнения обьектов цветов
    public function equals(object $color) {
        if ($this->red == $color->getRed() && $this->green == $color->getGreen() && $this->blue == $color->getBlue()){
            return ['bool'=>true, 'red'=>$color->getRed(), 'green' => $color->getGreen(), 'blue' => $color->getBlue()];
        }else{
            return ['bool'=>false, 'red'=>$color->getRed(), 'green' => $color->getGreen(), 'blue' => $color->getBlue()];
        }
    }

    //статический метод случайного цвета
    public static function random () : Color
    {
        return new Color(rand(0,255), rand(0,255), rand(0,255));
    }

    //Метод смешанного цвета из двух объектов цветов
    public function mixColor(object $color) : Color{
        $red = ($this->red+$color->getRed())/2;
        $green = ($this->green+$color->getGreen())/2;
        $blue = ($this->blue+$color->getBlue())/2;
        return new Color ($red, $green, $blue);
    }
}


try {
    $color = new Color(100,200,200);
    $mixedColor = $color->mixColor(new Color(220,140,200));
    $equalColor = $color->equals(new Color(100,200,200));
    ?>
    <table style='padding: 3px; border: 1px solid; border-spacing: 0; border-collapse: collapse;'>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid' colspan='2'>Фиксированный цвет</td>
            <td style='padding: 3px; border: 1px solid' colspan='2'>Фактический цвет</td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Красный</td>
            <td style='padding: 3px; border: 1px solid'><?=$color->getRed()?></td>
            <td style='padding: 3px; border: 1px solid; background-color: rgb(<?=$color->getRed()?>,<?=$color->getGreen()?>,<?=$color->getBlue()?>)' rowspan='3' colspan="2"></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Зеленый</td>
            <td style='padding: 3px; border: 1px solid'><?=$color->getGreen()?></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Синий</td>
            <td style='padding: 3px; border: 1px solid'><?=$color->getBlue()?></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid' colspan='2'>Рандомный цвет</td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Красный</td>
            <td style='padding: 3px; border: 1px solid'><?=Color::random()->getRed()?></td>
            <td style='padding: 3px; border: 1px solid; background-color: rgb(<?=Color::random()->getRed()?>,<?=Color::random()->getGreen()?>,<?=Color::random()->getBlue()?>)' rowspan='3' colspan="2"></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Зеленый</td>
            <td style='padding: 3px; border: 1px solid'><?=Color::random()->getGreen()?></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Синий</td>
            <td style='padding: 3px; border: 1px solid'><?=Color::random()->getBlue()?></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid' colspan='2'>Микс цветов (два обьекта: <br> Красный, зеленый, синий - 100/200</td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Красный</td>
            <td style='padding: 3px; border: 1px solid'><?=$mixedColor->getRed()?></td>
            <td style='padding: 3px; border: 1px solid; background-color: rgb(<?=$mixedColor->getRed()?>,<?=$mixedColor->getGreen()?>,<?=$mixedColor->getBlue()?>)' rowspan='3' colspan="2"></td>

        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Зеленый</td>
            <td style='padding: 3px; border: 1px solid'><?=$mixedColor->getGreen()?></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Синий</td>
            <td style='padding: 3px; border: 1px solid'><?=$mixedColor->getBlue()?></td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid' colspan='2'>Тождественность обьектов цветов</td>
        </tr>
        <tr style='border: 1px solid'>
            <td style='padding: 3px; border: 1px solid'>Равны или нет?</td>
            <td style='padding: 3px; border: 1px solid'><?php echo ($equalColor['bool'] ? 'Да' : 'Нет')?></td>
            <td style='padding: 3px; border: 1px solid; background-color: rgb(<?=$color->getRed()?>,<?=$color->getGreen()?>,<?=$color->getBlue()?>)'>Цвет 1 <br> ($color)</td>
            <td style='padding: 3px; border: 1px solid; background-color: rgb(<?=$equalColor['red']?>,<?=$equalColor['green']?>,<?=$equalColor['blue']?>)'>Цвет 2 <br> ($equalColor)</td>
        </tr>
    <?php
}catch (Exception $e){
    echo $e->getMessage();
}


