<pre>
<?php
interface IContactBuilder {
    public function name (string $name): IContactBuilder;
    public function surname (string $surname): IContactBuilder;
    public function email (string $email): IContactBuilder;
    public function phone (string $phone): IContactBuilder;
    public function address (string $address): IContactBuilder;
    public function getContact(): array;
}

class Contact implements IContactBuilder {
    protected $contact;

    public function __construct(){
        $this->reset();
    }

    protected function reset(): void
    {
        $this->contact = new stdClass();
    }

    public function name (string $name): IContactBuilder
    {
        $this->contact->fullContact['name'] = $name;
        return $this;
    }

    public function surname(string $surname): IContactBuilder
    {
        $this->contact->fullContact['surname'] = $surname;
        return $this;
    }

    public function email(string $email): IContactBuilder
    {
        $this->contact->fullContact['email'] = $email;
        return $this;
    }

    public function phone(string $phone): IContactBuilder
    {
        $this->contact->fullContact['phone'] = $phone;
        return $this;
    }

    public function address(string $address): IContactBuilder
    {
        $this->contact->fullContact['address'] = $address;
        return $this;
    }

    public function getContact(): array
    {
        return $this->contact->fullContact;
    }

}
$contact = new Contact();

$newContact = $contact
    ->phone('000-000-000')
    ->address('Shevchenka')
    ->name('Dima')
    ->surname('lastname')
    ->email('admin@mail')
    ->getContact();
var_dump($newContact);


