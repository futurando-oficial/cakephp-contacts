<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $contact
 */
?>
<div class="contacts form large-9 medium-8 columns content">
    <?= $this->Form->create($contact) ?>
    <fieldset>
        <legend><?= __('Add Contact') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('company');
            echo $this->Form->control('phone');
            echo $this->Form->control('subject');
            echo $this->Form->control('mensage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
