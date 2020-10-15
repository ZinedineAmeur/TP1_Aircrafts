<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Engine $engine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Engine'), ['action' => 'edit', $engine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Engine'), ['action' => 'delete', $engine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $engine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Engines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Engine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aircrafts'), ['controller' => 'Aircrafts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aircraft'), ['controller' => 'Aircrafts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="engines view large-9 medium-8 columns content">
    <h3><?= h($engine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($engine->Title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Constructor') ?></th>
            <td><?= h($engine->Constructeur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($engine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number of cylinder') ?></th>
            <td><?= $this->Number->format($engine->NbCylindre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year of construction') ?></th>
            <td><?= $this->Number->format($engine->AnneeConstruction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($engine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($engine->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Aircrafts') ?></h4>
        <?php if (!empty($engine->aircrafts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Modele') ?></th>
                <th scope="col"><?= __('Moteur') ?></th>
                <th scope="col"><?= __('AnneeDev') ?></th>
                <th scope="col"><?= __('Armee') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($engine->aircrafts as $aircrafts): ?>
            <tr>
                <td><?= h($aircrafts->id) ?></td>
                <td><?= h($aircrafts->user_id) ?></td>
                <td><?= h($aircrafts->Modele) ?></td>
                <td><?= h($aircrafts->Moteur) ?></td>
                <td><?= h($aircrafts->AnneeDev) ?></td>
                <td><?= h($aircrafts->Armee) ?></td>
                <td><?= h($aircrafts->created) ?></td>
                <td><?= h($aircrafts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Aircrafts', 'action' => 'view', $aircrafts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Aircrafts', 'action' => 'edit', $aircrafts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aircrafts', 'action' => 'delete', $aircrafts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aircrafts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
