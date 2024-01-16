<h1>Le Champion</h1>

<div class="border border-secondary p-3 ">
    <h2>Name : <?=$champion->getName() ?></h2>
    <p>Type : <?=$champion->getType() ?></p>
    <p>Difficulty : <?=$champion->getDifficulty() ?></p>
    <a href="?type=champion&action=index" class="btn btn-secondary">retour</a>
</div>