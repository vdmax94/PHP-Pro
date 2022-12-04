<?php
class User {
    private $id;
    private $password;

    public function __construct($id = NAN, $password = NAN){
        if(!is_int($id) || !isset($id)){
             throw new Exception('The ID is not integer or not set');
        }else{
            $this->id = $id;
        }

        if(strlen($password)>8 || !isset($password)){
            throw new Exception("The password is more than 8 characters or not set");
        }else{
            $this->password = $password;
        }
    }

    public function getUserData(){
        return ['id' => $this->id, 'password' => $this->password];
    }
}

try {
    $user = new User (34, 986786);
    $userData = $user->getUserData();
    echo "User's ID: ".$userData['id'].", and password: ".$userData['password'];
}catch (Exception $e){
    echo "Error: ". $e->getMessage(). ", in file: ". $e->getFile(). ", on line: ".$e->getLine();
}
