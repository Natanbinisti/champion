<h1>Les Champions</h1>

<?php foreach ($champions as $champion) :?>
<div class="border border-primary p-3 mb-3">
    <h2>Name : <?=$champion->getName() ?></h2>
    <p>Type : <?=$champion->getType() ?></p>
    <p>Difficulty : <?=$champion->getDifficulty() ?></p>
    <a href="?type=champion&action=show&id=<?= $champion->getId() ?>" class="btn btn-primary">voir</a>
    <a href="?type=champion&action=remove&id=<?= $champion->getId() ?>" class="btn btn-danger">Delete</a>
</div>


<?php endforeach; ?>