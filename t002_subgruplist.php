<?php
namespace PHPMaker2020\p_akuntansi_v1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t002_subgrup_list = new t002_subgrup_list();

// Run the page
$t002_subgrup_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_subgrup_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_subgrup_list->isExport()) { ?>
<script>
var ft002_subgruplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft002_subgruplist = currentForm = new ew.Form("ft002_subgruplist", "list");
	ft002_subgruplist.formKeyCountName = '<?php echo $t002_subgrup_list->FormKeyCountName ?>';

	// Validate form
	ft002_subgruplist.validate = function() {
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
			<?php if ($t002_subgrup_list->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_subgrup_list->kode->caption(), $t002_subgrup_list->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_subgrup_list->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_subgrup_list->nama->caption(), $t002_subgrup_list->nama->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	ft002_subgruplist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "kode", false)) return false;
		if (ew.valueChanged(fobj, infix, "nama", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft002_subgruplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_subgruplist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_subgruplist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_subgrup_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_subgrup_list->TotalRecords > 0 && $t002_subgrup_list->ExportOptions->visible()) { ?>
<?php $t002_subgrup_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_subgrup_list->ImportOptions->visible()) { ?>
<?php $t002_subgrup_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t002_subgrup_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t002_subgrup_list->isExport("print")) { ?>
<?php
if ($t002_subgrup_list->DbMasterFilter != "" && $t002_subgrup->getCurrentMasterTable() == "t001_grup") {
	if ($t002_subgrup_list->MasterRecordExists) {
		include_once "t001_grupmaster.php";
	}
}
?>
<?php } ?>
<?php
$t002_subgrup_list->renderOtherOptions();
?>
<?php $t002_subgrup_list->showPageHeader(); ?>
<?php
$t002_subgrup_list->showMessage();
?>
<?php if ($t002_subgrup_list->TotalRecords > 0 || $t002_subgrup->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_subgrup_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_subgrup">
<?php if (!$t002_subgrup_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t002_subgrup_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_subgrup_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_subgrup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft002_subgruplist" id="ft002_subgruplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_subgrup">
<?php if ($t002_subgrup->getCurrentMasterTable() == "t001_grup" && $t002_subgrup->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t001_grup">
<input type="hidden" name="fk_id" value="<?php echo $t002_subgrup_list->grup_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t002_subgrup" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t002_subgrup_list->TotalRecords > 0 || $t002_subgrup_list->isGridEdit()) { ?>
<table id="tbl_t002_subgruplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_subgrup->RowType = ROWTYPE_HEADER;

// Render list options
$t002_subgrup_list->renderListOptions();

// Render list options (header, left)
$t002_subgrup_list->ListOptions->render("header", "left");
?>
<?php if ($t002_subgrup_list->kode->Visible) { // kode ?>
	<?php if ($t002_subgrup_list->SortUrl($t002_subgrup_list->kode) == "") { ?>
		<th data-name="kode" class="<?php echo $t002_subgrup_list->kode->headerCellClass() ?>"><div id="elh_t002_subgrup_kode" class="t002_subgrup_kode"><div class="ew-table-header-caption"><?php echo $t002_subgrup_list->kode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode" class="<?php echo $t002_subgrup_list->kode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_subgrup_list->SortUrl($t002_subgrup_list->kode) ?>', 2);"><div id="elh_t002_subgrup_kode" class="t002_subgrup_kode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_subgrup_list->kode->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_subgrup_list->kode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_subgrup_list->kode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_subgrup_list->nama->Visible) { // nama ?>
	<?php if ($t002_subgrup_list->SortUrl($t002_subgrup_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $t002_subgrup_list->nama->headerCellClass() ?>"><div id="elh_t002_subgrup_nama" class="t002_subgrup_nama"><div class="ew-table-header-caption"><?php echo $t002_subgrup_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $t002_subgrup_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_subgrup_list->SortUrl($t002_subgrup_list->nama) ?>', 2);"><div id="elh_t002_subgrup_nama" class="t002_subgrup_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_subgrup_list->nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_subgrup_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_subgrup_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_subgrup_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_subgrup_list->ExportAll && $t002_subgrup_list->isExport()) {
	$t002_subgrup_list->StopRecord = $t002_subgrup_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t002_subgrup_list->TotalRecords > $t002_subgrup_list->StartRecord + $t002_subgrup_list->DisplayRecords - 1)
		$t002_subgrup_list->StopRecord = $t002_subgrup_list->StartRecord + $t002_subgrup_list->DisplayRecords - 1;
	else
		$t002_subgrup_list->StopRecord = $t002_subgrup_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t002_subgrup->isConfirm() || $t002_subgrup_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t002_subgrup_list->FormKeyCountName) && ($t002_subgrup_list->isGridAdd() || $t002_subgrup_list->isGridEdit() || $t002_subgrup->isConfirm())) {
		$t002_subgrup_list->KeyCount = $CurrentForm->getValue($t002_subgrup_list->FormKeyCountName);
		$t002_subgrup_list->StopRecord = $t002_subgrup_list->StartRecord + $t002_subgrup_list->KeyCount - 1;
	}
}
$t002_subgrup_list->RecordCount = $t002_subgrup_list->StartRecord - 1;
if ($t002_subgrup_list->Recordset && !$t002_subgrup_list->Recordset->EOF) {
	$t002_subgrup_list->Recordset->moveFirst();
	$selectLimit = $t002_subgrup_list->UseSelectLimit;
	if (!$selectLimit && $t002_subgrup_list->StartRecord > 1)
		$t002_subgrup_list->Recordset->move($t002_subgrup_list->StartRecord - 1);
} elseif (!$t002_subgrup->AllowAddDeleteRow && $t002_subgrup_list->StopRecord == 0) {
	$t002_subgrup_list->StopRecord = $t002_subgrup->GridAddRowCount;
}

// Initialize aggregate
$t002_subgrup->RowType = ROWTYPE_AGGREGATEINIT;
$t002_subgrup->resetAttributes();
$t002_subgrup_list->renderRow();
if ($t002_subgrup_list->isGridAdd())
	$t002_subgrup_list->RowIndex = 0;
if ($t002_subgrup_list->isGridEdit())
	$t002_subgrup_list->RowIndex = 0;
while ($t002_subgrup_list->RecordCount < $t002_subgrup_list->StopRecord) {
	$t002_subgrup_list->RecordCount++;
	if ($t002_subgrup_list->RecordCount >= $t002_subgrup_list->StartRecord) {
		$t002_subgrup_list->RowCount++;
		if ($t002_subgrup_list->isGridAdd() || $t002_subgrup_list->isGridEdit() || $t002_subgrup->isConfirm()) {
			$t002_subgrup_list->RowIndex++;
			$CurrentForm->Index = $t002_subgrup_list->RowIndex;
			if ($CurrentForm->hasValue($t002_subgrup_list->FormActionName) && ($t002_subgrup->isConfirm() || $t002_subgrup_list->EventCancelled))
				$t002_subgrup_list->RowAction = strval($CurrentForm->getValue($t002_subgrup_list->FormActionName));
			elseif ($t002_subgrup_list->isGridAdd())
				$t002_subgrup_list->RowAction = "insert";
			else
				$t002_subgrup_list->RowAction = "";
		}

		// Set up key count
		$t002_subgrup_list->KeyCount = $t002_subgrup_list->RowIndex;

		// Init row class and style
		$t002_subgrup->resetAttributes();
		$t002_subgrup->CssClass = "";
		if ($t002_subgrup_list->isGridAdd()) {
			$t002_subgrup_list->loadRowValues(); // Load default values
		} else {
			$t002_subgrup_list->loadRowValues($t002_subgrup_list->Recordset); // Load row values
		}
		$t002_subgrup->RowType = ROWTYPE_VIEW; // Render view
		if ($t002_subgrup_list->isGridAdd()) // Grid add
			$t002_subgrup->RowType = ROWTYPE_ADD; // Render add
		if ($t002_subgrup_list->isGridAdd() && $t002_subgrup->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t002_subgrup_list->restoreCurrentRowFormValues($t002_subgrup_list->RowIndex); // Restore form values
		if ($t002_subgrup_list->isGridEdit()) { // Grid edit
			if ($t002_subgrup->EventCancelled)
				$t002_subgrup_list->restoreCurrentRowFormValues($t002_subgrup_list->RowIndex); // Restore form values
			if ($t002_subgrup_list->RowAction == "insert")
				$t002_subgrup->RowType = ROWTYPE_ADD; // Render add
			else
				$t002_subgrup->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t002_subgrup_list->isGridEdit() && ($t002_subgrup->RowType == ROWTYPE_EDIT || $t002_subgrup->RowType == ROWTYPE_ADD) && $t002_subgrup->EventCancelled) // Update failed
			$t002_subgrup_list->restoreCurrentRowFormValues($t002_subgrup_list->RowIndex); // Restore form values
		if ($t002_subgrup->RowType == ROWTYPE_EDIT) // Edit row
			$t002_subgrup_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t002_subgrup->RowAttrs->merge(["data-rowindex" => $t002_subgrup_list->RowCount, "id" => "r" . $t002_subgrup_list->RowCount . "_t002_subgrup", "data-rowtype" => $t002_subgrup->RowType]);

		// Render row
		$t002_subgrup_list->renderRow();

		// Render list options
		$t002_subgrup_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t002_subgrup_list->RowAction != "delete" && $t002_subgrup_list->RowAction != "insertdelete" && !($t002_subgrup_list->RowAction == "insert" && $t002_subgrup->isConfirm() && $t002_subgrup_list->emptyRow())) {
?>
	<tr <?php echo $t002_subgrup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_subgrup_list->ListOptions->render("body", "left", $t002_subgrup_list->RowCount);
?>
	<?php if ($t002_subgrup_list->kode->Visible) { // kode ?>
		<td data-name="kode" <?php echo $t002_subgrup_list->kode->cellAttributes() ?>>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_subgrup_list->RowCount ?>_t002_subgrup_kode" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_list->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_list->RowIndex ?>_kode" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_list->kode->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_list->kode->EditValue ?>"<?php echo $t002_subgrup_list->kode->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="o<?php echo $t002_subgrup_list->RowIndex ?>_kode" id="o<?php echo $t002_subgrup_list->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_list->kode->OldValue) ?>">
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_subgrup_list->RowCount ?>_t002_subgrup_kode" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_list->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_list->RowIndex ?>_kode" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_list->kode->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_list->kode->EditValue ?>"<?php echo $t002_subgrup_list->kode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_subgrup_list->RowCount ?>_t002_subgrup_kode">
<span<?php echo $t002_subgrup_list->kode->viewAttributes() ?>><?php echo $t002_subgrup_list->kode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_id" name="x<?php echo $t002_subgrup_list->RowIndex ?>_id" id="x<?php echo $t002_subgrup_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_subgrup_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t002_subgrup" data-field="x_id" name="o<?php echo $t002_subgrup_list->RowIndex ?>_id" id="o<?php echo $t002_subgrup_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_subgrup_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_EDIT || $t002_subgrup->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_id" name="x<?php echo $t002_subgrup_list->RowIndex ?>_id" id="x<?php echo $t002_subgrup_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_subgrup_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t002_subgrup_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $t002_subgrup_list->nama->cellAttributes() ?>>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_subgrup_list->RowCount ?>_t002_subgrup_nama" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_list->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_list->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_list->nama->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_list->nama->EditValue ?>"<?php echo $t002_subgrup_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="o<?php echo $t002_subgrup_list->RowIndex ?>_nama" id="o<?php echo $t002_subgrup_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_list->nama->OldValue) ?>">
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_subgrup_list->RowCount ?>_t002_subgrup_nama" class="form-group">
<input type="text" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_list->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_list->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_list->nama->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_list->nama->EditValue ?>"<?php echo $t002_subgrup_list->nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_subgrup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_subgrup_list->RowCount ?>_t002_subgrup_nama">
<span<?php echo $t002_subgrup_list->nama->viewAttributes() ?>><?php echo $t002_subgrup_list->nama->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_subgrup_list->ListOptions->render("body", "right", $t002_subgrup_list->RowCount);
?>
	</tr>
<?php if ($t002_subgrup->RowType == ROWTYPE_ADD || $t002_subgrup->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft002_subgruplist", "load"], function() {
	ft002_subgruplist.updateLists(<?php echo $t002_subgrup_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t002_subgrup_list->isGridAdd())
		if (!$t002_subgrup_list->Recordset->EOF)
			$t002_subgrup_list->Recordset->moveNext();
}
?>
<?php
	if ($t002_subgrup_list->isGridAdd() || $t002_subgrup_list->isGridEdit()) {
		$t002_subgrup_list->RowIndex = '$rowindex$';
		$t002_subgrup_list->loadRowValues();

		// Set row properties
		$t002_subgrup->resetAttributes();
		$t002_subgrup->RowAttrs->merge(["data-rowindex" => $t002_subgrup_list->RowIndex, "id" => "r0_t002_subgrup", "data-rowtype" => ROWTYPE_ADD]);
		$t002_subgrup->RowAttrs->appendClass("ew-template");
		$t002_subgrup->RowType = ROWTYPE_ADD;

		// Render row
		$t002_subgrup_list->renderRow();

		// Render list options
		$t002_subgrup_list->renderListOptions();
		$t002_subgrup_list->StartRowCount = 0;
?>
	<tr <?php echo $t002_subgrup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_subgrup_list->ListOptions->render("body", "left", $t002_subgrup_list->RowIndex);
?>
	<?php if ($t002_subgrup_list->kode->Visible) { // kode ?>
		<td data-name="kode">
<span id="el$rowindex$_t002_subgrup_kode" class="form-group t002_subgrup_kode">
<input type="text" data-table="t002_subgrup" data-field="x_kode" name="x<?php echo $t002_subgrup_list->RowIndex ?>_kode" id="x<?php echo $t002_subgrup_list->RowIndex ?>_kode" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_list->kode->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_list->kode->EditValue ?>"<?php echo $t002_subgrup_list->kode->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_kode" name="o<?php echo $t002_subgrup_list->RowIndex ?>_kode" id="o<?php echo $t002_subgrup_list->RowIndex ?>_kode" value="<?php echo HtmlEncode($t002_subgrup_list->kode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t002_subgrup_list->nama->Visible) { // nama ?>
		<td data-name="nama">
<span id="el$rowindex$_t002_subgrup_nama" class="form-group t002_subgrup_nama">
<input type="text" data-table="t002_subgrup" data-field="x_nama" name="x<?php echo $t002_subgrup_list->RowIndex ?>_nama" id="x<?php echo $t002_subgrup_list->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_list->nama->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_list->nama->EditValue ?>"<?php echo $t002_subgrup_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_subgrup" data-field="x_nama" name="o<?php echo $t002_subgrup_list->RowIndex ?>_nama" id="o<?php echo $t002_subgrup_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($t002_subgrup_list->nama->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_subgrup_list->ListOptions->render("body", "right", $t002_subgrup_list->RowIndex);
?>
<script>
loadjs.ready(["ft002_subgruplist", "load"], function() {
	ft002_subgruplist.updateLists(<?php echo $t002_subgrup_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t002_subgrup_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t002_subgrup_list->FormKeyCountName ?>" id="<?php echo $t002_subgrup_list->FormKeyCountName ?>" value="<?php echo $t002_subgrup_list->KeyCount ?>">
<?php echo $t002_subgrup_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_subgrup_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t002_subgrup_list->FormKeyCountName ?>" id="<?php echo $t002_subgrup_list->FormKeyCountName ?>" value="<?php echo $t002_subgrup_list->KeyCount ?>">
<?php echo $t002_subgrup_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t002_subgrup->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_subgrup_list->Recordset)
	$t002_subgrup_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_subgrup_list->TotalRecords == 0 && !$t002_subgrup->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_subgrup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_subgrup_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_subgrup_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t002_subgrup_list->terminate();
?>