<?php
namespace App\Controller;

use App\Controller\AppController;

class AProposController extends AppController
{

	public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
    }
	
	public function index()
    {
        $this->loadComponent('Paginator');
    }

}