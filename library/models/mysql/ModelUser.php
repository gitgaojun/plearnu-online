<?php
namespace models\mysql;
use models\mysql\ModelBase as Base;

class ModelUser extends Base
{

    public function __construct($configArray = array())
    {
        parent::__construct($configArray);
    }

}