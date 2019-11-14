<?php
namespace PHPMaker2020\p_akuntansi_v1_0;
?>
<?php if ($t001_grup->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t001_grupmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t001_grup->name->Visible) { // name ?>
		<tr id="r_name">
			<td class="<?php echo $t001_grup->TableLeftColumnClass ?>"><?php echo $t001_grup->name->caption() ?></td>
			<td <?php echo $t001_grup->name->cellAttributes() ?>>
<span id="el_t001_grup_name">
<span<?php echo $t001_grup->name->viewAttributes() ?>><?php echo $t001_grup->name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>