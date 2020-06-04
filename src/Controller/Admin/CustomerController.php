<?php

namespace App\Controller\Admin;

use App\Factory\CustomerFactory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class CustomerController extends EasyAdminController
{
    /**
     * @var CustomerFactory
     * @required
     */
    public CustomerFactory $factory;

    protected function createNewEntity()
    {
        return $this->factory->create();
    }
}