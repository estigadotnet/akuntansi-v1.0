<?php
namespace PHPMaker2020\p_akuntansi_v1_0;
?>
<?php if ($t101_jurnal->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t101_jurnalmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t101_jurnal->tipejurnal_id->Visible) { // tipejurnal_id ?>
		<tr id="r_tipejurnal_id">
			<td class="<?php echo $t101_jurnal->TableLeftColumnClass ?>"><?php echo $t101_jurnal->tipejurnal_id->caption() ?></td>
			<td <?php echo $t101_jurnal->tipejurnal_id->cellAttributes() ?>>
<span id="el_t101_jurnal_tipejurnal_id">
<span<?php echo $t101_jurnal->tipejurnal_id->viewAttributes() ?>><?php echo $t101_jurnal->tipejurnal_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jurnal->nomer->Visible) { // nomer ?>
		<tr id="r_nomer">
			<td class="<?php echo $t101_jurnal->TableLeftColumnClass ?>"><?php echo $t101_jurnal->nomer->caption() ?></td>
			<td <?php echo $t101_jurnal->nomer->cellAttributes() ?>>
<span id="el_t101_jurnal_nomer">
<span<?php echo $t101_jurnal->nomer->viewAttributes() ?>><?php echo $t101_jurnal->nomer->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t101_jurnal->keterangan->Visible) { // keterangan ?>
		<tr id="r_keterangan">
			<td class="<?php echo $t101_jurnal->TableLeftColumnClass ?>"><?php echo $t101_jurnal->keterangan->caption() ?></td>
			<td <?php echo $t101_jurnal->keterangan->cellAttributes() ?>>
<span id="el_t101_jurnal_keterangan">
<span<?php echo $t101_jurnal->keterangan->viewAttributes() ?>><?php echo $t101_jurnal->keterangan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>