


<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User', array('id' => 'loginForm')); ?>
        <fieldset>
            <legend><?php echo __('Please enter your username and password'); ?></legend>
            <?php echo $this->Form->input('email',array('required'=>true));
            echo $this->Form->input('password',array('required'=>true));
            ?>
        </fieldset>
        <?php echo $this->Form->button(__('Login'), array('class' => 'btn btn-primary','id' => 'loginButton')); ?>
    <?php echo $this->Form->end(); ?>
</div>

<script>
    $(document).ready(function() {
        $('#loginButton').click(function(event) {
            event.preventDefault(); // Prevent normal form submission

            // Serialize form data
            var formData = $('#loginForm').serialize();
            var email = $('#UserEmail').val();
            var password = $('#UserPassword').val();

            if (!email || !password) {
                alert('Please fill in all fields.');
                event.preventDefault(); // Prevent form submission
                return false;
            }
            // Submit form via Ajax
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>',
                data: formData,
                success: function(response) {
                    console.log(response);
                    response = JSON.parse(response);
                    // Check if the login was successful
                    if (response.success) {
                        // Redirect the user to the index action of the user controller
                        window.location.href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>';
                    } else {
                        // Handle other scenarios, if necessary
                        console.error('Login was not successful: ' + response.message);
                    }
                },

                error: function(xhr, status, error) {
                    // Handle login failure
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
