<h1>Simple PHP MVC!</h1>

<ul>
    <?php foreach ($journals as $journal) : ?>
        <li><?= $journal->id ?>  <?= $journal->name ?> (<?= $journal->date ?>)</li>
    <?php endforeach; ?>


</ul>