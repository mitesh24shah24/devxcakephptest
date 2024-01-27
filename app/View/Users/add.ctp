<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User', array('id' => 'signupForm')); ?>
    <fieldset>
        <legend><?php echo __('User Signup'); ?></legend>
        <?php
        echo $this->Form->input('firstname', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('lastname', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('email', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('password', array('class' => 'form-control', 'minLength' => 6));
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password', 'maxLength' => 35, 'title' => 'Confirm password', 'type' => 'password', 'class' => 'form-control'));
        echo $this->Form->input('phone', array('required' => true, 'maxLength' => 10, 'label' => 'Contact Number', 'class' => 'form-control'));
        echo $this->Form->input('address', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('state', array('options' => $statelist, 'class' => 'form-control'));
        echo $this->Form->submit('Add User', array('class' => 'form-submit', 'title' => 'Click here to add the user'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>

<script>
    $(document).ready(function() {
        $('#signupForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add')); ?>',
                data: formData,
                success: function(response) {
                    console.log(response);
                    response = JSON.parse(response);
                    if (response.success) {
                        window.location.href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>';
                    }else {
                        // Handle other scenarios, if necessary
                        alert('signup was not successful:');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    });
</script>
