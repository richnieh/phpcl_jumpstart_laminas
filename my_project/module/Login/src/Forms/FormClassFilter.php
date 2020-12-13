<?php
namespace Login\Forms;
use Laminas\InputFilter\{InputFilter,Input};
use Laminas\Filter\{StripTags,StringTrim};
use Laminas\Validator\{StringLength,EmailAddress,NotEmpty};
use Laminas\I18n\Validator\Alnum;

class FormClassFilter extends InputFilter
{
    public function __construct()
    {
        $email = new Input('email');
        $email->getValidatorChain()
            ->attach(new EmailAddress());
        $email->setErrorMessage("The valid email is required as your username");
        $pwd = new Input('password');
        $pwd->getValidatorChain()
            ->attach(new StringLength(8))
            ->attach(new Alnum());
        $pwd->setErrorMessage("Password is required");
        $this->add($email)
            ->add($pwd);
        foreach ($this->getInputs() as $input){
            $input->getValidatorChain()
                ->attach(new NotEmpty());
            $input->getFilterChain()
                ->attach(new StripTags())
                ->attach(new StringTrim());
        }
    }
}