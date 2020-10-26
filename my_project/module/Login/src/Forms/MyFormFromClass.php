<?php
namespace Login\Forms;

use Laminas\Form\{Form,Element};

class MyFormFromClass extends Form
{
    //The form take $name of the form and options
    public function __construct($name, $opt = [])
    {
        parent::__construct($name);
        $email = new Element\Email("email");
        $email->setLabel("Email")
              ->setAttributes(["size"=>40,
                              "placeholder"=>"Please insert your email as username"]);
        $pwd   = new Element\Password("password");
        $pwd->setLabel("Password")
            ->setAttributes(["size"=>20]);
        $submit= new Element\Submit("submit");
        $submit->setValue("Login");
        $this->add($email)
            ->add($pwd)
            ->add($submit);
    }
}