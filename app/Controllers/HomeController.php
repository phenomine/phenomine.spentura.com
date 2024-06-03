<?php

namespace App\Controllers;

use App\Helpers\Search;
use App\Models\Post;
use Phenomine\Support\Routing\Get;
use App\Models\User;

class HomeController
{

    #[Get('/', 'index')]
    public function index() {
        return view('pages.index');
    }

    #[Get('/search')]
    public function searchIndex()
    {
        $search = new Search();
        $search->generateDataset();
    }
}
