<?php
namespace App\Controllers;

use App\Controller;
use App\Service\JournalsService;
use App\Repository\journalsRepository;

class HomeController extends Controller
{
    private JournalsService $_journalsService;

    function __construct()
    {
        $repository = new journalsRepository();
        $this->_journalsService = new JournalsService($repository);
    }

    public function index()
    {
        $journals = $this->_journalsService->getAll();
        $this->render('index', ['journals' => $journals]);
    }
}