<?php
namespace PHPMaker2020\p_akuntansi_v1_0;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t002_subgrup_grid))
	$t002_subgrup_grid = new t002_subgrup_grid();

// Run the page
$t002_subgrup_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_subgrup_grid->Page_Render();
?>
<?php if (!$t002_subgrup_grid->isExport()) { ?>
<script>
var ft002_subgrupgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft002_subgrupgrid = new ew.Form("ft002_subgrupgrid", "grid");
	ft002_subgrupgrid.formKeyCountName = '<?php echo $t002_subgrup_grid->FormKeyCountName ?>';

	// Validate form
	ft002_subgrupgrid.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "F")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($t002_subgrup_grid->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_subgrup_grid->kode->caption(), $t002_subgrup_grid->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_subgrup_grid->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_subgrup_grid->nama->caption(), $t002_subgrup_grid->nama->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft002_subgrupgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "kode", false)) return false;
		if (ew.valueChanged(fobj, infix, "nama", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft002_subgrupgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_subgrupgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_subgrupgrid");
});
</script>
<?php } ?>
<?php
$t002_subgrup_grid->renderOtherOptions();
?>
<?php if ($t002_subgrup_grid->TotalRecords > 0 || $t002_subgrup->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_subgrup_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_subgrup">
<?php if ($t002_subgrup_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $t002_subgrup_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="ft002_subgrupgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t002_subgrup" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t002_subgrupgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_subgrup->RowType = ROWTYPE_HEADER;

// Render list options
$t002_subgrup_grid->renderListOptions();

// Render list options (header, left)
$t002_subgrup_grid->ListOptions->render("header", "left");
?>
<?php if ($t002_subgrup_grid->kode->Visible) { // kode ?>
	<?php if ($t002_subgrup_grid->SortUrl($t002_subgrup_grid->kode) == "") { ?>
		<th data-name="kode" class="<?php echo $t002_subgrup_grid->kode->headerCellClass() ?>"><div id="elh_t002_subgrup_kode" class="t002_subgrup_kode"><div class="ew-table-header-caption"><?php echo $t002_subgrup_grid->kode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode" class="<?php echo $t002_subgrup_grid->kode->headerCellClass() ?>"><div><div id="elh_t002_subgrup_kode" class="t002_subgrup_kode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_subgrup_grid->kode->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_subgrup_grid->kode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_subgrup_grid->kode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_subgrup_grid->nama->Visible) { // nama ?>
	<?php if ($t002_subgrup_grid->SortUrl($t002_subgrup_grid->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $t002_subgrup_grid->nama->headerCellClass() ?>"><div id="elh_t002_subgrup_nama" class="t002_subgrup_nama"><div class="ew-table-header-caption"><?php echo $t002_subgrup_grid->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $t002_subgrup_grid->nama->headerCellClass() ?>"><div><div id="elh_t002_subgrup_nama" class="t002_subgrup_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_subgrup_grid->nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_subgrup_grid->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_subgrup_grid->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_subgrup_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t002_subgrup_grid->StartRecord = 1;
$t002_subgrup_grid->StopRecord = $t002_subgrup_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t002_subgrup->isConfirm() || $t002_subgrup_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t002_subgrup_grid->FormKeyCountName) && ($t002_subgrup_grid->isGridAdd() || $t002_subgrup_grid->isGridEdit() || $t002_subgrup->isConfirm())) {
		$t002_subgrup_grid->KeyCount = $CurrentForm->getValue($t002_subgrup_grid->FormKeyCountName);
		$t002_subgrup_grid->StopRecord = $t002_subgrup_grid->StartRecord + $t002_subgrup_grid->KeyCount - 1;
	}
}
$t002_subgrup_grid->RecordCount = $t002_subgrup_grid->StartRecord - 1;
if ($t002_subgrup_grid->Recordset && !$t002_subgrup_grid->Recordset->EOF) {
	$t002_subgrup_grid->Recordset->moveFirst();
	$selectLimit = $t002_subgrup_grid->UseSelectLimit;
	if (!$selectLimit && $t002_subgrup_grid->StartRecord > 1)
		$t002_subgrup_grid->Recordset->move($t002_subgrup_grid->StartRecord - 1);
} elseif (!$t002_subgrup->AllowAddDeleteRow && $t002_subgrup_grid->StopRecord == 0) {
	$t002_subgrup_grid->StopRecord = $t002_subgrup->GridAddRowCount;
}

// Initialize aggregate
$t002_subgrup->RowType = ROWTYPE_AGGREGATEINIT;
$t002_subgrup->resetAttributes();
$t002_subgrup_grid->renderRow();
if ($t002_subgrup_grid->isGridAdd())
	$t002_subgrup_grid->RowIndex = 0;
if ($t002_subgrup_grid->isGridEdit())
	$t002_subgrup_grid->RowIndex = 0;
while ($t002_subgrup_grid->RecordCount < $t002_subgrup_grid->StopRecord) {
	$t002_subgrup_grid->RecordCount++;
	if ($t002_subgrup_grid->RecordCount >= $t002_subgrup_grid->StartRecord) {
		$t002_subgrup_grid->RowCount++;
		if ($t002_subgrup_grid->isGridAdd() || $t002_subgrup_grid->isGridEdit() || $t002_subgrup->isConfirm()) {
			$t002_subgrup_grid->RowIndex++;
			$CurrentForm->Index = $t002_subgrup_grid->RowIndex;
			if ($CurrentForm->hasValue($t002_subgrup_grid->FormActionName) && ($t002_subgrup->isConfirm() || $t002_subgrup_grid->EventCancelled))
				$t002_subgrup_grid->RowAction = strval($CurrentForm->getValue($t002_subgrup_grid->FormActionName));
			elseif ($t002_subgrup_grid->isGridAdd())
				$t002_subgrup_grid->RowAction = "insert";
			else
				$t002_subgrup_grid->RowAction = "";
		}

		// Set up key count
		$t002_subgrup_grid->KeyCount = $t002_subgrup_grid->RowIndex;

		// Init row class and style
		$t002_subgrup->resetAttributes();
		$t002_subgrup->CssClass = "";
		if ($t002_subgrup_grid->isGridAdd()) {
			if ($t002_subgrup->CurrentMode == "copy") {
				$t002_subgrup_grid->loadRowValues($t002_subgrup_grid->Recordset); // Load row values
				$t002_subgrup_grid->setRecordKey($t002_subgrup_grid->RowOldKey, $t002_subgrup_grid->Recordset); // Set old record key
			} else {
				$t002_subgrup_grid->loadRowValues(); // Load default values
				$t002_subgrup_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t002_subgrup_grid->loadRowValues($t002_subgrup_grid->Recordset); // Load row values
		}
		$t002_subgrup->RowType = ROWTYPE_VIEW; // Render view
		if ($t002_subgrup_grid->isGridAdd()) // Grid add
			$t002_subgrup->RowType = ROWTYPE_ADD; // Render add
		if ($t002_subgrup_grid->isGridAdd() && $t002_subgrup->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t002_subgrup_grid->restoreCurrentRowFormValues($t002_subgrup_grid->RowIndex); // Restore form values
		if ($t002_subgrup_grid->isGridEdit()) { // Grid edit
			if ($t002_subgrup->EventCancelled)
				$t002_subgrup_grid->restoreCurrentRowFormValues($t002_subgrup_grid->RowIndex); // Restore form values
			if ($t002_subgrup_grid->RowAction == "insert")
				$t002_subgrup->RowType = ROWTYPE_ADD; // Render add
			else
				$t002_subgrup->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t002_subgrup_grid->isGridEdit() && ($t002_subgrup->RowType == ROWTYPE_EDIT || $t002_subgrup->RowType == ROWTYPE_ADD) && $t002_subgrup->EventCancelled) // Update failed
			$t002_subgrup_grid->restoreCurrentRowFormValues($t002_subgrup_grid->RowIndex); // Restore form values
		if ($t002_subgrup->RowType == ROWTYPE_EDIT) // Edit row
			$t002_subgrup_grid->EditRowCount++;
		if ($t002_subgrup->isConfirm()) // Confirm row
			$t002_subgrup_grid->restoreCurrentRowFormValues($t002_subgrup_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t002_subgrup->RowAttrs->merge(["data-rowindex" => $t002_subgrup_grid->RowCount, "id" => "r" . $t002_subgrup_grid->RowCount . "_t002_subgrup", "data-rowtype" => $t002_subgrup->RowType]);

		// Render row
		$t002_subgrup_grid->renderRow();

		// Render list options
		$t002_subgrup_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t002_subgrup_grid->RowAction != "delete" && $t002_subgrup_grid->RowAction != "insertdelete" && !($t002_subgrup_grid->RowAction == "insert" && $t002_subgrup->isConfirm() && $t002_subgrup_grid->emptyRow())) {
?>
	<tr <?php echo $t002_subgrup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_subgrup_grid->ListOptions->render("body", "left", $t002_subgrup_grid->RowCount);
?>
	<?php if ($t002_subgrup_grid->kode->Visible) { // kode ?>
		<td data-name="kode" <?php echo $t002_subgrup_grid->kode->cellAttributes() ?>>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_subgrup_grid->RowCount ?>_t002_subgrup_kode" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_grid->kode->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_grid->kode->EditValue ?>"<?php echo $t002_subgrup_grid->kode->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_grid->kode->OldValue) ?>">
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_subgrup_grid->RowCount ?>_t002_subgrup_kode" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_grid->kode->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_grid->kode->EditValue ?>"<?php echo $t002_subgrup_grid->kode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_subgrup_grid->RowCount ?>_t002_subgrup_kode">
<span<?php echo $t002_subgrup_grid->kode->viewAttributes() ?>><?php echo $t002_subgrup_grid->kode->getViewValue() ?></span>
</span>
<?php if (!$t002_subgrup->isConfirm()) { ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_grid->kode->FormValue) ?>">
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_grid->kode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="ft002_subgrupgrid$x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="ft002_subgrupgrid$x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_grid->kode->FormValue) ?>">
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="ft002_subgrupgrid$o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="ft002_subgrupgrid$o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_grid->kode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_id" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_id" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_subgrup_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t002_subgrup" data-field="x_id" name="o<?php echo $t002_subgrup_grid->RowIndex ?>_id" id="o<?php echo $t002_subgrup_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_subgrup_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_EDIT || $t002_subgrup->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_id" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_id" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_subgrup_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t002_subgrup_grid->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $t002_subgrup_grid->nama->cellAttributes() ?>>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_subgrup_grid->RowCount ?>_t002_subgrup_nama" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_grid->nama->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_grid->nama->EditValue ?>"<?php echo $t002_subgrup_grid->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_grid->nama->OldValue) ?>">
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_subgrup_grid->RowCount ?>_t002_subgrup_nama" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_grid->nama->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_grid->nama->EditValue ?>"<?php echo $t002_subgrup_grid->nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_subgrup_grid->RowCount ?>_t002_subgrup_nama">
<span<?php echo $t002_subgrup_grid->nama->viewAttributes() ?>><?php echo $t002_subgrup_grid->nama->getViewValue() ?></span>
</span>
<?php if (!$t002_subgrup->isConfirm()) { ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_grid->nama->FormValue) ?>">
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_grid->nama->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="ft002_subgrupgrid$x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="ft002_subgrupgrid$x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_grid->nama->FormValue) ?>">
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="ft002_subgrupgrid$o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="ft002_subgrupgrid$o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_grid->nama->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_subgrup_grid->ListOptions->render("body", "right", $t002_subgrup_grid->RowCount);
?>
	</tr>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD || $t002_subgrup->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft002_subgrupgrid", "load"], function() {
	ft002_subgrupgrid.updateLists(<?php echo $t002_subgrup_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t002_subgrup_grid->isGridAdd() || $t002_subgrup->CurrentMode == "copy")
		if (!$t002_subgrup_grid->Recordset->EOF)
			$t002_subgrup_grid->Recordset->moveNext();
}
?>
<?php
	if ($t002_subgrup->CurrentMode == "add" || $t002_subgrup->CurrentMode == "copy" || $t002_subgrup->CurrentMode == "edit") {
		$t002_subgrup_grid->RowIndex = '$rowindex$';
		$t002_subgrup_grid->loadRowValues();

		// Set row properties
		$t002_subgrup->resetAttributes();
		$t002_subgrup->RowAttrs->merge(["data-rowindex" => $t002_subgrup_grid->RowIndex, "id" => "r0_t002_subgrup", "data-rowtype" => ROWTYPE_ADD]);
		$t002_subgrup->RowAttrs->appendClass("ew-template");
		$t002_subgrup->RowType = ROWTYPE_ADD;

		// Render row
		$t002_subgrup_grid->renderRow();

		// Render list options
		$t002_subgrup_grid->renderListOptions();
		$t002_subgrup_grid->StartRowCount = 0;
?>
	<tr <?php echo $t002_subgrup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_subgrup_grid->ListOptions->render("body", "left", $t002_subgrup_grid->RowIndex);
?>
	<?php if ($t002_subgrup_grid->kode->Visible) { // kode ?>
		<td data-name="kode">
<?php if (!$t002_subgrup->isConfirm()) { ?>
<span id="el$rowindex$_t002_subgrup_kode" class="form-group t002_subgrup_kode">
<input type="text" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_grid->kode->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_grid->kode->EditValue ?>"<?php echo $t002_subgrup_grid->kode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_subgrup_kode" class="form-group t002_subgrup_kode">
<span<?php echo $t002_subgrup_grid->kode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_subgrup_grid->kode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_grid->kode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" id="o<?php echo $t002_subgrup_grid->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_grid->kode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_subgrup_grid->nama->Visible) { // nama ?>
		<td data-name="nama">
<?php if (!$t002_subgrup->isConfirm()) { ?>
<span id="el$rowindex$_t002_subgrup_nama" class="form-group t002_subgrup_nama">
<input type="text" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_grid->nama->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_grid->nama->EditValue ?>"<?php echo $t002_subgrup_grid->nama->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t002_subgrup_nama" class="form-group t002_subgrup_nama">
<span<?php echo $t002_subgrup_grid->nama->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_subgrup_grid->nama->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_grid->nama->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" id="o<?php echo $t002_subgrup_grid->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_grid->nama->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_subgrup_grid->ListOptions->render("body", "right", $t002_subgrup_grid->RowIndex);
?>
<script>
loadjs.ready(["ft002_subgrupgrid", "load"], function() {
	ft002_subgrupgrid.updateLists(<?php echo $t002_subgrup_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t002_subgrup->CurrentMode == "add" || $t002_subgrup->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t002_subgrup_grid->FormKeyCountName ?>" id="<?php echo $t002_subgrup_grid->FormKeyCountName ?>" value="<?php echo $t002_subgrup_grid->KeyCount ?>">
<?php echo $t002_subgrup_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_subgrup->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t002_subgrup_grid->FormKeyCountName ?>" id="<?php echo $t002_subgrup_grid->FormKeyCountName ?>" value="<?php echo $t002_subgrup_grid->KeyCount ?>">
<?php echo $t002_subgrup_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_subgrup->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft002_subgrupgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_subgrup_grid->Recordset)
	$t002_subgrup_grid->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_subgrup_grid->TotalRecords == 0 && !$t002_subgrup->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_subgrup_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t002_subgrup_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t002_subgrup_grid->terminate();
?>