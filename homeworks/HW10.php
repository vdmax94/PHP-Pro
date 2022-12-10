<?php
/*

#В цьому прикладі спостерігаємо сильну залежність класу Controller від Mysql

class Mysql
{
    public function getData()
    {
        return 'some data from database';
    }
}

class Controller
{
    private $adapter;

    public function __construct(Mysql $mysql)
    {
        $this->adapter = $mysql;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}
*/

#1) Для виправлення ситуації створимо інтерфейс, в якому буде визначено метод отримання інфи з бази даних

Interface IGetData {
    public function getData();
}

#2) Створимо клас, що імплементує інтерфейс IGetData з реалізацією методу getData. Але тепер таких класів може бути декілька (наприклад в залежності від БД) і вони всі залежать від однієї абстракції - інтерфейсу IGetData:
class Mysql implements IGetData
{
    public function getData()
    {
        return 'some data from database';
    }
}

# 3) Створимо контролер, який тепер не буде строго залежати від одного класу MySql. Тобто конструктор екземпляра класу може приймати об'єкти, які імплементують інтерфейс IGetData. Це може бути клас, який реалізує "спілкування" з MySQL, PostgreSQL та іншими базами даних. Всі вони повинні імплементувати інтерфейс IGetData.
class Controller
{
    private $adapter;

    public function __construct(IGetData $database)
    {
        $this->adapter = $database;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}