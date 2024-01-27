<?php $this->layout = 'default'; ?>
<div class="container-fluid">
<h1>Users</h1>
<table class="table">
    <thead>
		<tr>
			<!--<th><?php //echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>-->
			<th><?php echo $this->Paginator->sort('firstname', 'First Name');?>  </th>
			<th><?php echo $this->Paginator->sort('lastname', 'Last Name');?>  </th>
			<th><?php echo $this->Paginator->sort('phone', 'Contact No.');?>  </th>
			
			<th><?php echo $this->Paginator->sort('email', 'E-Mail');?></th>
			<th><?php echo $this->Paginator->sort('address', 'Address');?>  </th>
			<th><?php echo $this->Paginator->sort('state', 'State');?>  </th>
			<th><?php echo $this->Paginator->sort('created', 'Created');?></th>
			<th><?php echo $this->Paginator->sort('status','Status');?></th>
			<?php
			if( $this->Session->read('userdata')['is_admin'] == 1){ 
				echo '<th>Actions</th>';
			}
			?>
		</tr>
	</thead>
	<tbody>						
		<?php $count=0; ?>
		<?php foreach($users as $user): ?>				
		<?php $count ++;?>
		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
		<?php endif; ?>
			<!--<td><?php echo $this->Form->checkbox('User.id.'.$user['User']['id']); ?></td>
			<td><?php //echo $this->Html->link( $user['User']['username']  ,   array('action'=>'edit', $user['User']['id']),array('escape' => false) );?></td>-->
			<td style="text-align: center;"><?php echo $user['User']['firstname']; ?></td>
			<td style="text-align: center;"><?php echo $user['User']['lastname']; ?></td>
			<td style="text-align: center;"><?php echo $user['User']['phone']; ?></td>
			<td style="text-align: center;"><?php echo $user['User']['email']; ?></td>
			<td style="text-align: center;"><?php echo $user['User']['address']; ?></td>
			<td style="text-align: center;"><?php echo $statelist[$user['User']['state']]; ?></td>
			<td style="text-align: center;"><?php echo $this->Time->niceShort($user['User']['created']); ?></td>
			<td style="text-align: center;">
				<?php echo ($user['User']['status'] == 1 )?'Active':'Deleted'; ?>
			</td>
			<td>
			
			<?php
			if( $this->Session->read('userdata')['is_admin'] == 1){ 
				if( $user['User']['status'] != 0){ 
					//echo $this->Html->link(    "Edit",   array('action'=>'edit', $user['User']['id']) ); 
					echo $this->Form->button('Edit', array(
					    'type' => 'button','class'=>'col-sm-2 btn btn-primary',
					    'onclick' => "window.location='" . $this->Html->url(array('action' => 'edit', $user['User']['id'])) . "'"
					));
					/*echo $this->Form->button('Delete', array(
					    'type' => 'button','class'=>'col-sm-2 btn btn-cancel',
					    'onclick' => "window.location='" . $this->Html->url(array('action' => 'delete', $user['User']['id'])) . "'"
					));*/
					echo $this->Form->button('Delete', array(
					    'type' => 'button',
					    'class' => 'col-sm-2 btn btn-cancel deleteButton',
					    'data-id' => $user['User']['id'] // Add data-id attribute with user ID
					));

				}
			}
			?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($user); ?>
	</tbody>
</table>
<?php /*echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));
echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));
 echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));*/?>

<div class="pagination pagination-large">
    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>


</div>		


<script type="text/javascript">
	$(document).ready(function() {
    $('.deleteButton').click(function() {
        var userId = $(this).data('id'); // Get user ID from data-id attribute

        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'delete')); ?>',
                data: { id: userId },
                success: function(response) {
                	console.log(response);
                    response = JSON.parse(response);
                    if (response.success) {
                        alert('User deleted successfully');
                        window.location.href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>';
                    } else {
                        alert(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        }
    });
});

</script>