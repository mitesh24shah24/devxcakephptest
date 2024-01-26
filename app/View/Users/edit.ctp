<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php 
		echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
		echo $this->Form->input('firstname');
        echo $this->Form->input('lastname',array('required'=>true));
		echo $this->Form->input('email', array( 'readonly' => 'readonly', 'label' => 'Usernames cannot be changed!'));
		echo $this->Form->input('phone');
        echo $this->Form->input('password_update', array( 'label' => 'New Password (leave empty if you do not want to change)', 'maxLength' => 255, 'type'=>'password','required' => 0));
		echo $this->Form->input('password_confirm_update', array('label' => 'Confirm New Password', 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
		
		echo $this->Form->input('address');
		echo $this->Form->input('state', array(
            'options' => $statelist
        ));
        echo $this->Form->input('is_admin', array('type' => 'checkbox', 'label' => 'Mark as Admin', 'value' => '1'));

		echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php 
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
?>
<br/>
<?php 
//echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>