<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Http\Response;
use App\Repository\ChampionRepository;
class ChampionController extends Controller
{
    public function index():Response
    {
        $championRepository = new ChampionRepository();
        $champions = $championRepository->findAll();

        return $this->render("champion/index", [
            "pageTitle"=>"Les Champions",
            "champions"=>$champions,
        ]);
    }
    public function show():Response
    {
        $id = null;
        if (!empty($_GET['id'])&& ctype_digit($_GET['id'])){
            $id = $_GET['id'];
        }
        if (!$id){
            return $this->redirect();
        }
        $championRepository = new ChampionRepository();
        $champions = $championRepository->find();

        return $this->render("champion/show",[
            "pageTitle"=>"Le champion",
            "champions"=>$champions,
        ]);
    }
}