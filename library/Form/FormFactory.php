<?php

namespace Form;

use Form\FormFactoryInterface;

/**
 * Class FormFactory
 *
 * 1, 设置验证表单数据对象
 * 2, 遍例对象
 * 3, 返回对应验证规则的信息
 *
 * @package Form
 */
class FormFactory implements FormFactoryInterface
{

    protected $formValidationObj;

    public function __construct($formName = '')
    {
        if('' === $formName) {
            return new \Exception('formName is not empty,please into you validation form name.');
        }
        $form = 'Form\FormModel' . $formName;
        $this->formValidationObj = new $form;
    }

    public function validation()
    {

    }

}
