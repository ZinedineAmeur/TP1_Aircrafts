<h1><?= __('Edit an aircraft') ?></h1>
<?php
    echo $this->Form->create($aircraft);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('Modele');
	echo $this->Form->control('AnneeDev');
    echo $this->Form->control('Armee');
    echo $this->Form->button(__('Save the aircraft'));
    echo $this->Form->end();
?>