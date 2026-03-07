<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Journal;
use PDO;
use App\Repository\journalsRepository;

class HomeController extends Controller
{
    private $_journalsRepository;

    function __construct()
    {
        $this->_journalsRepository = new journalsRepository();
    }

    
public function index()
{   
    $journals = $this->_journalsRepository->getAll();
    $this->render('index', ['journals' => $journals]);
}
}