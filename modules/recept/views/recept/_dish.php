<?php ?>
<div class="col-md-4">
    <h2><?= $model->title ?></h2>
    <ul class="list-group">
    <?php foreach ($model->ingredients as $ingredient){ ?>
        <li class="list-group-item"><?= $ingredient->name ?></li>
    <?php } ?>
    </ul>
    <p><?= $model->content ?></p>
</div>