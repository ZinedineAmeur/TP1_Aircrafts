<h1><?= h($aircraft->Modele) ?></h1>
<p>Créer le: <?= h($aircraft->AnneeDev) ?></p>
<p>Armée: <?= h($aircraft->Armee) ?></p>
<p>Moteur: <?= h($aircraft->Moteur) ?></p>
<p><small>Created: <?= $aircraft->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $aircraft->slug]) ?></p>