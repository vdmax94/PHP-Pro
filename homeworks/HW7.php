<?php
class User {
    private $name, $age, $email;

    public function __construct($name, $age, $email)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setEmail($email); //при активном обращении к несуществующему методу setEmail произойдёт вывод ошибки (прописана в __call).
    }

    public function __call($name, $arguments){
        if(!method_exists($this, $name)){
            throw new Exception("The method $name not determined"); //обработка ошибки
        }else{
            $this->$name($arguments[0]);
        }
    }

    private function setName ($name)
    {
        $this->name = $name;
    }

    private function setAge($age){
        $this->age = $age;
    }

    public function getAll(){
        return ['name'=>$this->name, 'age' => $this->age, 'email' => $this->email];
    }
}

try{
    $user = new User('John', 23, 'test@local');
    $user->setName("Vitya"); //Т.к. метод существует (прописано в __call), то произойдёт перезапись поля $user->name.
    var_dump($user->getAll()); //проверка результата
}catch (Exception $e){
    echo $e->getMessage(); //вывод ошибки
}