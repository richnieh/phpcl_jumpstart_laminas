<?php
namespace Login\Forms;

use Laminas\Form\{Form,Element};

class FormFromClass extends Form
{
    /**
     * @param string $name == name of the form
     * @param array $opts == form options
     */
    public function __construct($name = null, $opts = [])
    {
        parent::__construct($name);
        $email = new Element\Email('email');
        $email->setLabel($name)
              ->setAttributes(['size' => 40,
                    'placeholder' => 'Use your email address as a login name']);
        $pwd = new Element\Password();
        $pwd->setLabel('Password')
            ->setAttributes(['size' => 20]);
        $submit = new Element\Submit();
        $submit->setValue('Login');
        $this->add($email)
             ->add($pwd)
             ->add($submit);
    }
}
