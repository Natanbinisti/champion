<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Http\Response;
use App\Repository\ChampionRepository;
use App\Entity\Champion;
class ChampionController extends Controller
{
    public function index(): Response
    {
        $championRepository = new ChampionRepository();
        $champions = $championRepository->findAll();

        return $this->render("champion/index", [
            "pageTitle" => "Les Champions",
            "champions" => $champions,
        ]);
    }

    public function show(): Response
    {
        $id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (!$id) {
            return $this->redirect();
        }
        $championRepository = new ChampionRepository();
        $champion = $championRepository->find($id);

        return $this->render("champion/show", [
            "pageTitle" => "Le champion",
            "champion" => $champion,
        ]);
    }

    public function remove(): Response
    {
        $id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            return $this->redirect();
        }


        $championRepository = new ChampionRepository();
        $champion = $championRepository->find($id);

        if (!$champion) {
            return $this->redirect();
        }

        $championRepository->delete($champion);


        return $this->redirect("?type=champion&action=index");

    }

    public function create(): Response
    {

        $name = null;
        $type = null;
        $difficulty = null;

        if (!empty($_POST['name']) && $_POST['name'] != "") {$name = $_POST['name'];}
        if (!empty($_POST['type']) && $_POST['type'] != "") {$type = $_POST['type'];}
        if (!empty($_POST['difficulty']) && $_POST['difficulty'] != "") {$difficulty = $_POST['difficulty'];}

        if ($name && $type && $difficulty)
        {
            $champion = new Champion();
            $champion->setName($name);
            $type->setType($type);
            $difficulty->setDifficulty($difficulty);

            $championRepository = new ChampionRepository();
            $championRepository->save($champion);

            return $this->redirect("?type=champion&action=index");
        }
        return $this->render("champion/create", [
            "pageTitle" => "nouveau champion",
        ]);
    }
}