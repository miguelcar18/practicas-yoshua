<div class="col s12 m8 l9">
<div class="container">
		<table  class="responsive-table display datatable"  data-table-source="<?php echo e($table['source']); ?>" data-table-title="<?php echo e($table['title']); ?>" id="<?php echo e($table['id']); ?>" <?php echo array_key_exists('form',$table) ? 'data-form="'.$table['form'].'"' : ''; ?> <?php echo array_key_exists('disable-sorting',$table) ? 'data-disable-sorting="'.$table['disable-sorting'].'"' : ''; ?>>

			<thead>
				<tr>
					<?php $__currentLoopData = $table['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($col_head == 'Option'): ?>
					<th style="min-width:20%;"><?php echo $col_head; ?></th>
					<?php else: ?>
					<th><?php echo e($col_head); ?></th>
					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
			</tfoot>
		</table>
</div>
</div>

