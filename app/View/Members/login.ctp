

<div class="members form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Member'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
<script type='text/javascript'>document.getElementById('MemberUsername').focus();</script>