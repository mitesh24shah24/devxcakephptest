<div class="users form">
    <?php echo $this->Form->create('User', array('id' => 'editForm')); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php
        echo $this->Form->hidden('id', array('value' => $this->request->data['User']['id']));
        echo $this->Form->input('firstname', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('lastname', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('email', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('phone', array('required' => true, 'maxLength' => 10, 'label' => 'Contact Number', 'class' => 'form-control'));
        echo $this->Form->input('address', array('required' => true, 'class' => 'form-control'));
        echo $this->Form->input('state', array('options' => $statelist, 'class' => 'form-control'));
        echo $this->Form->input('is_admin', array('type' => 'checkbox', 'label' => 'Mark as Admin', 'value' => '1'));

        echo $this->Form->submit('Edit User', array('class' => 'form-submit', 'title' => 'Click here to edit the user'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>


<script>
    $(document).ready(function() {
        $('#editForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', $this->request->data['User']['id'])); ?>',
                data: formData,
                success: function(response) {
                    console.log(response);
                    response = JSON.parse(response);
                    if (response.success) {
                    	window.location.href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>';
                	}
                	else {
                        // Handle other scenarios, if necessary
                        alert(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    });
</script>
