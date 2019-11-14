<?php
namespace PHPMaker2020\p_akuntansi_v1_0;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t102_jurnald_grid))
	$t102_jurnald_grid = new t102_jurnald_grid();

// Run the page
$t102_jurnald_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jurnald_grid->Page_Render();
?>
<?php if (!$t102_jurnald_grid->isExport()) { ?>
<script>
var ft102_jurnaldgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft102_jurnaldgrid = new ew.Form("ft102_jurnaldgrid", "grid");
	ft102_jurnaldgrid.formKeyCountName = '<?php echo $t102_jurnald_grid->FormKeyCountName ?>';

	// Validate form
	ft102_jurnaldgrid.validate = function() {
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
			<?php if ($t102_jurnald_grid->jurnal_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jurnal_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_grid->jurnal_id->caption(), $t102_jurnald_grid->jurnal_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jurnal_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_grid->jurnal_id->errorMessage()) ?>");
			<?php if ($t102_jurnald_grid->akun_id->Required) { ?>
				elm = this.getElements("x" + infix + "_akun_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_grid->akun_id->caption(), $t102_jurnald_grid->akun_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_jurnald_grid->debet->Required) { ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_grid->debet->caption(), $t102_jurnald_grid->debet->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_grid->debet->errorMessage()) ?>");
			<?php if ($t102_jurnald_grid->kredit->Required) { ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_grid->kredit->caption(), $t102_jurnald_grid->kredit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_grid->kredit->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft102_jurnaldgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "jurnal_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "akun_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "debet", false)) return false;
		if (ew.valueChanged(fobj, infix, "kredit", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft102_jurnaldgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_jurnaldgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_jurnaldgrid.lists["x_jurnal_id"] = <?php echo $t102_jurnald_grid->jurnal_id->Lookup->toClientList($t102_jurnald_grid) ?>;
	ft102_jurnaldgrid.lists["x_jurnal_id"].options = <?php echo JsonEncode($t102_jurnald_grid->jurnal_id->lookupOptions()) ?>;
	ft102_jurnaldgrid.autoSuggests["x_jurnal_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	ft102_jurnaldgrid.lists["x_akun_id"] = <?php echo $t102_jurnald_grid->akun_id->Lookup->toClientList($t102_jurnald_grid) ?>;
	ft102_jurnaldgrid.lists["x_akun_id"].options = <?php echo JsonEncode($t102_jurnald_grid->akun_id->lookupOptions()) ?>;
	loadjs.done("ft102_jurnaldgrid");
});
</script>
<?php } ?>
<?php
$t102_jurnald_grid->renderOtherOptions();
?>
<?php if ($t102_jurnald_grid->TotalRecords > 0 || $t102_jurnald->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_jurnald_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_jurnald">
<div id="ft102_jurnaldgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t102_jurnald" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t102_jurnaldgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_jurnald->RowType = ROWTYPE_HEADER;

// Render list options
$t102_jurnald_grid->renderListOptions();

// Render list options (header, left)
$t102_jurnald_grid->ListOptions->render("header", "left");
?>
<?php if ($t102_jurnald_grid->jurnal_id->Visible) { // jurnal_id ?>
	<?php if ($t102_jurnald_grid->SortUrl($t102_jurnald_grid->jurnal_id) == "") { ?>
		<th data-name="jurnal_id" class="<?php echo $t102_jurnald_grid->jurnal_id->headerCellClass() ?>"><div id="elh_t102_jurnald_jurnal_id" class="t102_jurnald_jurnal_id"><div class="ew-table-header-caption"><?php echo $t102_jurnald_grid->jurnal_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jurnal_id" class="<?php echo $t102_jurnald_grid->jurnal_id->headerCellClass() ?>"><div><div id="elh_t102_jurnald_jurnal_id" class="t102_jurnald_jurnal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_grid->jurnal_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_grid->jurnal_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_grid->jurnal_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_jurnald_grid->akun_id->Visible) { // akun_id ?>
	<?php if ($t102_jurnald_grid->SortUrl($t102_jurnald_grid->akun_id) == "") { ?>
		<th data-name="akun_id" class="<?php echo $t102_jurnald_grid->akun_id->headerCellClass() ?>"><div id="elh_t102_jurnald_akun_id" class="t102_jurnald_akun_id"><div class="ew-table-header-caption"><?php echo $t102_jurnald_grid->akun_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="akun_id" class="<?php echo $t102_jurnald_grid->akun_id->headerCellClass() ?>"><div><div id="elh_t102_jurnald_akun_id" class="t102_jurnald_akun_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_grid->akun_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_grid->akun_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_grid->akun_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_jurnald_grid->debet->Visible) { // debet ?>
	<?php if ($t102_jurnald_grid->SortUrl($t102_jurnald_grid->debet) == "") { ?>
		<th data-name="debet" class="<?php echo $t102_jurnald_grid->debet->headerCellClass() ?>"><div id="elh_t102_jurnald_debet" class="t102_jurnald_debet"><div class="ew-table-header-caption"><?php echo $t102_jurnald_grid->debet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="debet" class="<?php echo $t102_jurnald_grid->debet->headerCellClass() ?>"><div><div id="elh_t102_jurnald_debet" class="t102_jurnald_debet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_grid->debet->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_grid->debet->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_grid->debet->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_jurnald_grid->kredit->Visible) { // kredit ?>
	<?php if ($t102_jurnald_grid->SortUrl($t102_jurnald_grid->kredit) == "") { ?>
		<th data-name="kredit" class="<?php echo $t102_jurnald_grid->kredit->headerCellClass() ?>"><div id="elh_t102_jurnald_kredit" class="t102_jurnald_kredit"><div class="ew-table-header-caption"><?php echo $t102_jurnald_grid->kredit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kredit" class="<?php echo $t102_jurnald_grid->kredit->headerCellClass() ?>"><div><div id="elh_t102_jurnald_kredit" class="t102_jurnald_kredit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_grid->kredit->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_grid->kredit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_grid->kredit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_jurnald_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t102_jurnald_grid->StartRecord = 1;
$t102_jurnald_grid->StopRecord = $t102_jurnald_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t102_jurnald->isConfirm() || $t102_jurnald_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_jurnald_grid->FormKeyCountName) && ($t102_jurnald_grid->isGridAdd() || $t102_jurnald_grid->isGridEdit() || $t102_jurnald->isConfirm())) {
		$t102_jurnald_grid->KeyCount = $CurrentForm->getValue($t102_jurnald_grid->FormKeyCountName);
		$t102_jurnald_grid->StopRecord = $t102_jurnald_grid->StartRecord + $t102_jurnald_grid->KeyCount - 1;
	}
}
$t102_jurnald_grid->RecordCount = $t102_jurnald_grid->StartRecord - 1;
if ($t102_jurnald_grid->Recordset && !$t102_jurnald_grid->Recordset->EOF) {
	$t102_jurnald_grid->Recordset->moveFirst();
	$selectLimit = $t102_jurnald_grid->UseSelectLimit;
	if (!$selectLimit && $t102_jurnald_grid->StartRecord > 1)
		$t102_jurnald_grid->Recordset->move($t102_jurnald_grid->StartRecord - 1);
} elseif (!$t102_jurnald->AllowAddDeleteRow && $t102_jurnald_grid->StopRecord == 0) {
	$t102_jurnald_grid->StopRecord = $t102_jurnald->GridAddRowCount;
}

// Initialize aggregate
$t102_jurnald->RowType = ROWTYPE_AGGREGATEINIT;
$t102_jurnald->resetAttributes();
$t102_jurnald_grid->renderRow();
if ($t102_jurnald_grid->isGridAdd())
	$t102_jurnald_grid->RowIndex = 0;
if ($t102_jurnald_grid->isGridEdit())
	$t102_jurnald_grid->RowIndex = 0;
while ($t102_jurnald_grid->RecordCount < $t102_jurnald_grid->StopRecord) {
	$t102_jurnald_grid->RecordCount++;
	if ($t102_jurnald_grid->RecordCount >= $t102_jurnald_grid->StartRecord) {
		$t102_jurnald_grid->RowCount++;
		if ($t102_jurnald_grid->isGridAdd() || $t102_jurnald_grid->isGridEdit() || $t102_jurnald->isConfirm()) {
			$t102_jurnald_grid->RowIndex++;
			$CurrentForm->Index = $t102_jurnald_grid->RowIndex;
			if ($CurrentForm->hasValue($t102_jurnald_grid->FormActionName) && ($t102_jurnald->isConfirm() || $t102_jurnald_grid->EventCancelled))
				$t102_jurnald_grid->RowAction = strval($CurrentForm->getValue($t102_jurnald_grid->FormActionName));
			elseif ($t102_jurnald_grid->isGridAdd())
				$t102_jurnald_grid->RowAction = "insert";
			else
				$t102_jurnald_grid->RowAction = "";
		}

		// Set up key count
		$t102_jurnald_grid->KeyCount = $t102_jurnald_grid->RowIndex;

		// Init row class and style
		$t102_jurnald->resetAttributes();
		$t102_jurnald->CssClass = "";
		if ($t102_jurnald_grid->isGridAdd()) {
			if ($t102_jurnald->CurrentMode == "copy") {
				$t102_jurnald_grid->loadRowValues($t102_jurnald_grid->Recordset); // Load row values
				$t102_jurnald_grid->setRecordKey($t102_jurnald_grid->RowOldKey, $t102_jurnald_grid->Recordset); // Set old record key
			} else {
				$t102_jurnald_grid->loadRowValues(); // Load default values
				$t102_jurnald_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t102_jurnald_grid->loadRowValues($t102_jurnald_grid->Recordset); // Load row values
		}
		$t102_jurnald->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_jurnald_grid->isGridAdd()) // Grid add
			$t102_jurnald->RowType = ROWTYPE_ADD; // Render add
		if ($t102_jurnald_grid->isGridAdd() && $t102_jurnald->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_jurnald_grid->restoreCurrentRowFormValues($t102_jurnald_grid->RowIndex); // Restore form values
		if ($t102_jurnald_grid->isGridEdit()) { // Grid edit
			if ($t102_jurnald->EventCancelled)
				$t102_jurnald_grid->restoreCurrentRowFormValues($t102_jurnald_grid->RowIndex); // Restore form values
			if ($t102_jurnald_grid->RowAction == "insert")
				$t102_jurnald->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_jurnald->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_jurnald_grid->isGridEdit() && ($t102_jurnald->RowType == ROWTYPE_EDIT || $t102_jurnald->RowType == ROWTYPE_ADD) && $t102_jurnald->EventCancelled) // Update failed
			$t102_jurnald_grid->restoreCurrentRowFormValues($t102_jurnald_grid->RowIndex); // Restore form values
		if ($t102_jurnald->RowType == ROWTYPE_EDIT) // Edit row
			$t102_jurnald_grid->EditRowCount++;
		if ($t102_jurnald->isConfirm()) // Confirm row
			$t102_jurnald_grid->restoreCurrentRowFormValues($t102_jurnald_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t102_jurnald->RowAttrs->merge(["data-rowindex" => $t102_jurnald_grid->RowCount, "id" => "r" . $t102_jurnald_grid->RowCount . "_t102_jurnald", "data-rowtype" => $t102_jurnald->RowType]);

		// Render row
		$t102_jurnald_grid->renderRow();

		// Render list options
		$t102_jurnald_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_jurnald_grid->RowAction != "delete" && $t102_jurnald_grid->RowAction != "insertdelete" && !($t102_jurnald_grid->RowAction == "insert" && $t102_jurnald->isConfirm() && $t102_jurnald_grid->emptyRow())) {
?>
	<tr <?php echo $t102_jurnald->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_jurnald_grid->ListOptions->render("body", "left", $t102_jurnald_grid->RowCount);
?>
	<?php if ($t102_jurnald_grid->jurnal_id->Visible) { // jurnal_id ?>
		<td data-name="jurnal_id" <?php echo $t102_jurnald_grid->jurnal_id->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t102_jurnald_grid->jurnal_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<span<?php echo $t102_jurnald_grid->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_grid->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<?php
$onchange = $t102_jurnald_grid->jurnal_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t102_jurnald_grid->jurnal_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id">
	<input type="text" class="form-control" name="sv_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="sv_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo RemoveHtml($t102_jurnald_grid->jurnal_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->getPlaceHolder()) ?>"<?php echo $t102_jurnald_grid->jurnal_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" data-value-separator="<?php echo $t102_jurnald_grid->jurnal_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft102_jurnaldgrid"], function() {
	ft102_jurnaldgrid.createAutoSuggest({"id":"x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id","forceSelect":false});
});
</script>
<?php echo $t102_jurnald_grid->jurnal_id->Lookup->getParamTag($t102_jurnald_grid, "p_x" . $t102_jurnald_grid->RowIndex . "_jurnal_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t102_jurnald_grid->jurnal_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<span<?php echo $t102_jurnald_grid->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_grid->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<?php
$onchange = $t102_jurnald_grid->jurnal_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t102_jurnald_grid->jurnal_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id">
	<input type="text" class="form-control" name="sv_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="sv_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo RemoveHtml($t102_jurnald_grid->jurnal_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->getPlaceHolder()) ?>"<?php echo $t102_jurnald_grid->jurnal_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" data-value-separator="<?php echo $t102_jurnald_grid->jurnal_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft102_jurnaldgrid"], function() {
	ft102_jurnaldgrid.createAutoSuggest({"id":"x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id","forceSelect":false});
});
</script>
<?php echo $t102_jurnald_grid->jurnal_id->Lookup->getParamTag($t102_jurnald_grid, "p_x" . $t102_jurnald_grid->RowIndex . "_jurnal_id") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_jurnal_id">
<span<?php echo $t102_jurnald_grid->jurnal_id->viewAttributes() ?>><?php echo $t102_jurnald_grid->jurnal_id->getViewValue() ?></span>
</span>
<?php if (!$t102_jurnald->isConfirm()) { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_jurnald_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_id" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_id" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_jurnald_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT || $t102_jurnald->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_jurnald_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t102_jurnald_grid->akun_id->Visible) { // akun_id ?>
		<td data-name="akun_id" <?php echo $t102_jurnald_grid->akun_id->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_akun_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t102_jurnald_grid->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_jurnald_grid->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_jurnald_grid->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_jurnald_grid->akun_id->ReadOnly || $t102_jurnald_grid->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_jurnald_grid->akun_id->Lookup->getParamTag($t102_jurnald_grid, "p_x" . $t102_jurnald_grid->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_jurnald_grid->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo $t102_jurnald_grid->akun_id->CurrentValue ?>"<?php echo $t102_jurnald_grid->akun_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_grid->akun_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_akun_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t102_jurnald_grid->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_jurnald_grid->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_jurnald_grid->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_jurnald_grid->akun_id->ReadOnly || $t102_jurnald_grid->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_jurnald_grid->akun_id->Lookup->getParamTag($t102_jurnald_grid, "p_x" . $t102_jurnald_grid->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_jurnald_grid->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo $t102_jurnald_grid->akun_id->CurrentValue ?>"<?php echo $t102_jurnald_grid->akun_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_akun_id">
<span<?php echo $t102_jurnald_grid->akun_id->viewAttributes() ?>><?php echo $t102_jurnald_grid->akun_id->getViewValue() ?></span>
</span>
<?php if (!$t102_jurnald->isConfirm()) { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_grid->akun_id->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_grid->akun_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_grid->akun_id->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_grid->akun_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_jurnald_grid->debet->Visible) { // debet ?>
		<td data-name="debet" <?php echo $t102_jurnald_grid->debet->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_debet" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->debet->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_grid->debet->EditValue ?>"<?php echo $t102_jurnald_grid->debet->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_grid->debet->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_debet" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->debet->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_grid->debet->EditValue ?>"<?php echo $t102_jurnald_grid->debet->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_debet">
<span<?php echo $t102_jurnald_grid->debet->viewAttributes() ?>><?php echo $t102_jurnald_grid->debet->getViewValue() ?></span>
</span>
<?php if (!$t102_jurnald->isConfirm()) { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_grid->debet->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_grid->debet->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_grid->debet->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_grid->debet->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_jurnald_grid->kredit->Visible) { // kredit ?>
		<td data-name="kredit" <?php echo $t102_jurnald_grid->kredit->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_kredit" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->kredit->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_grid->kredit->EditValue ?>"<?php echo $t102_jurnald_grid->kredit->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_grid->kredit->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_kredit" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->kredit->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_grid->kredit->EditValue ?>"<?php echo $t102_jurnald_grid->kredit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_grid->RowCount ?>_t102_jurnald_kredit">
<span<?php echo $t102_jurnald_grid->kredit->viewAttributes() ?>><?php echo $t102_jurnald_grid->kredit->getViewValue() ?></span>
</span>
<?php if (!$t102_jurnald->isConfirm()) { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_grid->kredit->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_grid->kredit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="ft102_jurnaldgrid$x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_grid->kredit->FormValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="ft102_jurnaldgrid$o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_grid->kredit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_jurnald_grid->ListOptions->render("body", "right", $t102_jurnald_grid->RowCount);
?>
	</tr>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD || $t102_jurnald->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft102_jurnaldgrid", "load"], function() {
	ft102_jurnaldgrid.updateLists(<?php echo $t102_jurnald_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_jurnald_grid->isGridAdd() || $t102_jurnald->CurrentMode == "copy")
		if (!$t102_jurnald_grid->Recordset->EOF)
			$t102_jurnald_grid->Recordset->moveNext();
}
?>
<?php
	if ($t102_jurnald->CurrentMode == "add" || $t102_jurnald->CurrentMode == "copy" || $t102_jurnald->CurrentMode == "edit") {
		$t102_jurnald_grid->RowIndex = '$rowindex$';
		$t102_jurnald_grid->loadRowValues();

		// Set row properties
		$t102_jurnald->resetAttributes();
		$t102_jurnald->RowAttrs->merge(["data-rowindex" => $t102_jurnald_grid->RowIndex, "id" => "r0_t102_jurnald", "data-rowtype" => ROWTYPE_ADD]);
		$t102_jurnald->RowAttrs->appendClass("ew-template");
		$t102_jurnald->RowType = ROWTYPE_ADD;

		// Render row
		$t102_jurnald_grid->renderRow();

		// Render list options
		$t102_jurnald_grid->renderListOptions();
		$t102_jurnald_grid->StartRowCount = 0;
?>
	<tr <?php echo $t102_jurnald->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_jurnald_grid->ListOptions->render("body", "left", $t102_jurnald_grid->RowIndex);
?>
	<?php if ($t102_jurnald_grid->jurnal_id->Visible) { // jurnal_id ?>
		<td data-name="jurnal_id">
<?php if (!$t102_jurnald->isConfirm()) { ?>
<?php if ($t102_jurnald_grid->jurnal_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t102_jurnald_jurnal_id" class="form-group t102_jurnald_jurnal_id">
<span<?php echo $t102_jurnald_grid->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_grid->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t102_jurnald_jurnal_id" class="form-group t102_jurnald_jurnal_id">
<?php
$onchange = $t102_jurnald_grid->jurnal_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t102_jurnald_grid->jurnal_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id">
	<input type="text" class="form-control" name="sv_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="sv_x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo RemoveHtml($t102_jurnald_grid->jurnal_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->getPlaceHolder()) ?>"<?php echo $t102_jurnald_grid->jurnal_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" data-value-separator="<?php echo $t102_jurnald_grid->jurnal_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft102_jurnaldgrid"], function() {
	ft102_jurnaldgrid.createAutoSuggest({"id":"x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id","forceSelect":false});
});
</script>
<?php echo $t102_jurnald_grid->jurnal_id->Lookup->getParamTag($t102_jurnald_grid, "p_x" . $t102_jurnald_grid->RowIndex . "_jurnal_id") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t102_jurnald_jurnal_id" class="form-group t102_jurnald_jurnal_id">
<span<?php echo $t102_jurnald_grid->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_grid->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_grid->jurnal_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_jurnald_grid->akun_id->Visible) { // akun_id ?>
		<td data-name="akun_id">
<?php if (!$t102_jurnald->isConfirm()) { ?>
<span id="el$rowindex$_t102_jurnald_akun_id" class="form-group t102_jurnald_akun_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t102_jurnald_grid->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_jurnald_grid->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_jurnald_grid->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_jurnald_grid->akun_id->ReadOnly || $t102_jurnald_grid->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_jurnald_grid->akun_id->Lookup->getParamTag($t102_jurnald_grid, "p_x" . $t102_jurnald_grid->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_jurnald_grid->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo $t102_jurnald_grid->akun_id->CurrentValue ?>"<?php echo $t102_jurnald_grid->akun_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_jurnald_akun_id" class="form-group t102_jurnald_akun_id">
<span<?php echo $t102_jurnald_grid->akun_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_grid->akun_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_grid->akun_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_grid->akun_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_jurnald_grid->debet->Visible) { // debet ?>
		<td data-name="debet">
<?php if (!$t102_jurnald->isConfirm()) { ?>
<span id="el$rowindex$_t102_jurnald_debet" class="form-group t102_jurnald_debet">
<input type="text" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->debet->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_grid->debet->EditValue ?>"<?php echo $t102_jurnald_grid->debet->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_jurnald_debet" class="form-group t102_jurnald_debet">
<span<?php echo $t102_jurnald_grid->debet->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_grid->debet->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_grid->debet->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_grid->debet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_jurnald_grid->kredit->Visible) { // kredit ?>
		<td data-name="kredit">
<?php if (!$t102_jurnald->isConfirm()) { ?>
<span id="el$rowindex$_t102_jurnald_kredit" class="form-group t102_jurnald_kredit">
<input type="text" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_grid->kredit->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_grid->kredit->EditValue ?>"<?php echo $t102_jurnald_grid->kredit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t102_jurnald_kredit" class="form-group t102_jurnald_kredit">
<span<?php echo $t102_jurnald_grid->kredit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_grid->kredit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_grid->kredit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" id="o<?php echo $t102_jurnald_grid->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_grid->kredit->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_jurnald_grid->ListOptions->render("body", "right", $t102_jurnald_grid->RowIndex);
?>
<script>
loadjs.ready(["ft102_jurnaldgrid", "load"], function() {
	ft102_jurnaldgrid.updateLists(<?php echo $t102_jurnald_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t102_jurnald->CurrentMode == "add" || $t102_jurnald->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t102_jurnald_grid->FormKeyCountName ?>" id="<?php echo $t102_jurnald_grid->FormKeyCountName ?>" value="<?php echo $t102_jurnald_grid->KeyCount ?>">
<?php echo $t102_jurnald_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_jurnald->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t102_jurnald_grid->FormKeyCountName ?>" id="<?php echo $t102_jurnald_grid->FormKeyCountName ?>" value="<?php echo $t102_jurnald_grid->KeyCount ?>">
<?php echo $t102_jurnald_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_jurnald->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft102_jurnaldgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_jurnald_grid->Recordset)
	$t102_jurnald_grid->Recordset->Close();
?>
<?php if ($t102_jurnald_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t102_jurnald_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_jurnald_grid->TotalRecords == 0 && !$t102_jurnald->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_jurnald_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t102_jurnald_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t102_jurnald_grid->terminate();
?>