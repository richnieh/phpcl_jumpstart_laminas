<?php

namespace Login\Forms;
use Laminas\Form\Annotation as ANO;

/**
 * @ANO\Name("login-form-from-anno")
 */
class FormFromAnno
{
    /**
     * @ANO\Type("Laminas\Form\Element\Email")
     * @ANO\Options({"label":"Email"})
     * @ANO\Attributes({"size":40,"placeholder":"Please insert your email address as username"})
     * @ANO\Validator({"name":"EmailAddress"})
     * @ANO\Filter({"name":"StringTrim"})
     * @ANO\Filter({"name":"StripTags"})
     */
    protected $email;
    /**
     * @ANO\Type("Laminas\Form\Element\Password")
     * @ANO\Options({"label":"Passowrd"})
     * @ANO\Attributes({"size":20})
     * @ANO\Validator({"name":"StringLength","options":{"max":8}})
     * @ANO\Filter({"name":"StringTrim"})
     * @ANO\Filter({"name":"StripTags"})
     */
    protected $password;
    /**
     * @ANO\Type("Laminas\Form\Element\Submit")
     * @ANO\Attributes({"value":"Login"})
     */
    protected $submit;
}