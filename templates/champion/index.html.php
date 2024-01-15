<h1>Les Champions</h1>

<?php foreach ($champions as $champion) :?>
<div class="border border-primary">
    <h2>Name : <?=$champion->getName() ?></h2>
    <p>Type : <?=$champion->getType() ?></p>
    <p>Difficulty : <?=$champion->getDifficulty() ?></p>
    <a href="?type=champion&action=show&id=<?= $champions->getId() ?>" class="btn btn-primary">voir</a>
</div>


<?php endforeach; ?>