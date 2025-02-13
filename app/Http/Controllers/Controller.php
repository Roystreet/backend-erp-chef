<?php

namespace App\Http\Controllers;

use App\Models\Article;

abstract class Controller
{

    public function getArticle($id)
    {
        return Article::find($id);
    }

    public function getAllArticles()
    {
        return Article::all();
    }

    public function getFilterArticles($filter)
    {
        return Article::where('name', 'like', '%' . $filter . '%')->get();
    }
}
