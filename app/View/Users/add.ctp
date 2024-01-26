<!-- app/View/Users/add.ctp -->
<div class="users form">

<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('User Signup'); ?></legend>
        <?php //echo $this->Form->input('username');
        echo $this->Form->input('firstname');
        echo $this->Form->input('lastname',array('required'=>true));
		echo $this->Form->input('email');
        echo $this->Form->input('password');
		echo $this->Form->input('password_confirm', array('label' => 'Confirm Password', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
        echo $this->Form->input('phone',array('required'=>true,'maxLength'=>10,'label' => 'Contact Number'));
        echo $this->Form->input('address');
        echo $this->Form->input('state',array('options'=>$statelist));
        /*echo $this->Form->input('role', array(
            'options' => array( '0' => 'User', '1' => 'Admin')
        ));*/
		
		echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php 
/*if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
}*/
?>