<?php $this->layout = 'default'; ?>
<div class="users form">
<h1>Users</h1>
<table>
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
			<td >
			
			<?php
			if( $this->Session->read('userdata')['is_admin'] == 1){ 
				if( $user['User']['status'] != 0){ 
					echo $this->Html->link(    "Edit",   array('action'=>'edit', $user['User']['id']) ); 
					echo ' | ';
					echo $this->Html->link( "Delete", array('action'=>'delete', $user['User']['id']));
				}
			}
			?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($user); ?>
	</tbody>
</table>
<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>				
<?php //echo $this->Html->link( "Add A New User.",   array('action'=>'add'),array('escape' => false) ); ?>
<br/>
<?php 
//echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>