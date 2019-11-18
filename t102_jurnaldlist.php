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
$t102_jurnald_list = new t102_jurnald_list();

// Run the page
$t102_jurnald_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jurnald_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t102_jurnald_list->isExport()) { ?>
<script>
var ft102_jurnaldlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft102_jurnaldlist = currentForm = new ew.Form("ft102_jurnaldlist", "list");
	ft102_jurnaldlist.formKeyCountName = '<?php echo $t102_jurnald_list->FormKeyCountName ?>';

	// Validate form
	ft102_jurnaldlist.validate = function() {
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
			<?php if ($t102_jurnald_list->jurnal_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jurnal_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_list->jurnal_id->caption(), $t102_jurnald_list->jurnal_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jurnal_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_list->jurnal_id->errorMessage()) ?>");
			<?php if ($t102_jurnald_list->akun_id->Required) { ?>
				elm = this.getElements("x" + infix + "_akun_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_list->akun_id->caption(), $t102_jurnald_list->akun_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_jurnald_list->debet->Required) { ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_list->debet->caption(), $t102_jurnald_list->debet->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_list->debet->errorMessage()) ?>");
			<?php if ($t102_jurnald_list->kredit->Required) { ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_list->kredit->caption(), $t102_jurnald_list->kredit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_list->kredit->errorMessage()) ?>");

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
	ft102_jurnaldlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "jurnal_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "akun_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "debet", false)) return false;
		if (ew.valueChanged(fobj, infix, "kredit", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft102_jurnaldlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_jurnaldlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_jurnaldlist.lists["x_jurnal_id"] = <?php echo $t102_jurnald_list->jurnal_id->Lookup->toClientList($t102_jurnald_list) ?>;
	ft102_jurnaldlist.lists["x_jurnal_id"].options = <?php echo JsonEncode($t102_jurnald_list->jurnal_id->lookupOptions()) ?>;
	ft102_jurnaldlist.autoSuggests["x_jurnal_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	ft102_jurnaldlist.lists["x_akun_id"] = <?php echo $t102_jurnald_list->akun_id->Lookup->toClientList($t102_jurnald_list) ?>;
	ft102_jurnaldlist.lists["x_akun_id"].options = <?php echo JsonEncode($t102_jurnald_list->akun_id->lookupOptions()) ?>;
	loadjs.done("ft102_jurnaldlist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t102_jurnald_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t102_jurnald_list->TotalRecords > 0 && $t102_jurnald_list->ExportOptions->visible()) { ?>
<?php $t102_jurnald_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_jurnald_list->ImportOptions->visible()) { ?>
<?php $t102_jurnald_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t102_jurnald_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t102_jurnald_list->isExport("print")) { ?>
<?php
if ($t102_jurnald_list->DbMasterFilter != "" && $t102_jurnald->getCurrentMasterTable() == "t101_jurnal") {
	if ($t102_jurnald_list->MasterRecordExists) {
		include_once "t101_jurnalmaster.php";
	}
}
?>
<?php } ?>
<?php
$t102_jurnald_list->renderOtherOptions();
?>
<?php $t102_jurnald_list->showPageHeader(); ?>
<?php
$t102_jurnald_list->showMessage();
?>
<?php if ($t102_jurnald_list->TotalRecords > 0 || $t102_jurnald->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_jurnald_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_jurnald">
<?php if (!$t102_jurnald_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t102_jurnald_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t102_jurnald_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t102_jurnald_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft102_jurnaldlist" id="ft102_jurnaldlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_jurnald">
<?php if ($t102_jurnald->getCurrentMasterTable() == "t101_jurnal" && $t102_jurnald->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t101_jurnal">
<input type="hidden" name="fk_id" value="<?php echo $t102_jurnald_list->jurnal_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t102_jurnald" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t102_jurnald_list->TotalRecords > 0 || $t102_jurnald_list->isGridEdit()) { ?>
<table id="tbl_t102_jurnaldlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_jurnald->RowType = ROWTYPE_HEADER;

// Render list options
$t102_jurnald_list->renderListOptions();

// Render list options (header, left)
$t102_jurnald_list->ListOptions->render("header", "left");
?>
<?php if ($t102_jurnald_list->jurnal_id->Visible) { // jurnal_id ?>
	<?php if ($t102_jurnald_list->SortUrl($t102_jurnald_list->jurnal_id) == "") { ?>
		<th data-name="jurnal_id" class="<?php echo $t102_jurnald_list->jurnal_id->headerCellClass() ?>"><div id="elh_t102_jurnald_jurnal_id" class="t102_jurnald_jurnal_id"><div class="ew-table-header-caption"><?php echo $t102_jurnald_list->jurnal_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jurnal_id" class="<?php echo $t102_jurnald_list->jurnal_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_jurnald_list->SortUrl($t102_jurnald_list->jurnal_id) ?>', 2);"><div id="elh_t102_jurnald_jurnal_id" class="t102_jurnald_jurnal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_list->jurnal_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_list->jurnal_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_list->jurnal_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_jurnald_list->akun_id->Visible) { // akun_id ?>
	<?php if ($t102_jurnald_list->SortUrl($t102_jurnald_list->akun_id) == "") { ?>
		<th data-name="akun_id" class="<?php echo $t102_jurnald_list->akun_id->headerCellClass() ?>"><div id="elh_t102_jurnald_akun_id" class="t102_jurnald_akun_id"><div class="ew-table-header-caption"><?php echo $t102_jurnald_list->akun_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="akun_id" class="<?php echo $t102_jurnald_list->akun_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_jurnald_list->SortUrl($t102_jurnald_list->akun_id) ?>', 2);"><div id="elh_t102_jurnald_akun_id" class="t102_jurnald_akun_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_list->akun_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_list->akun_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_list->akun_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_jurnald_list->debet->Visible) { // debet ?>
	<?php if ($t102_jurnald_list->SortUrl($t102_jurnald_list->debet) == "") { ?>
		<th data-name="debet" class="<?php echo $t102_jurnald_list->debet->headerCellClass() ?>"><div id="elh_t102_jurnald_debet" class="t102_jurnald_debet"><div class="ew-table-header-caption"><?php echo $t102_jurnald_list->debet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="debet" class="<?php echo $t102_jurnald_list->debet->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_jurnald_list->SortUrl($t102_jurnald_list->debet) ?>', 2);"><div id="elh_t102_jurnald_debet" class="t102_jurnald_debet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_list->debet->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_list->debet->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_list->debet->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t102_jurnald_list->kredit->Visible) { // kredit ?>
	<?php if ($t102_jurnald_list->SortUrl($t102_jurnald_list->kredit) == "") { ?>
		<th data-name="kredit" class="<?php echo $t102_jurnald_list->kredit->headerCellClass() ?>"><div id="elh_t102_jurnald_kredit" class="t102_jurnald_kredit"><div class="ew-table-header-caption"><?php echo $t102_jurnald_list->kredit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kredit" class="<?php echo $t102_jurnald_list->kredit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_jurnald_list->SortUrl($t102_jurnald_list->kredit) ?>', 2);"><div id="elh_t102_jurnald_kredit" class="t102_jurnald_kredit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_jurnald_list->kredit->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_jurnald_list->kredit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_jurnald_list->kredit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_jurnald_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t102_jurnald_list->ExportAll && $t102_jurnald_list->isExport()) {
	$t102_jurnald_list->StopRecord = $t102_jurnald_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t102_jurnald_list->TotalRecords > $t102_jurnald_list->StartRecord + $t102_jurnald_list->DisplayRecords - 1)
		$t102_jurnald_list->StopRecord = $t102_jurnald_list->StartRecord + $t102_jurnald_list->DisplayRecords - 1;
	else
		$t102_jurnald_list->StopRecord = $t102_jurnald_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t102_jurnald->isConfirm() || $t102_jurnald_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_jurnald_list->FormKeyCountName) && ($t102_jurnald_list->isGridAdd() || $t102_jurnald_list->isGridEdit() || $t102_jurnald->isConfirm())) {
		$t102_jurnald_list->KeyCount = $CurrentForm->getValue($t102_jurnald_list->FormKeyCountName);
		$t102_jurnald_list->StopRecord = $t102_jurnald_list->StartRecord + $t102_jurnald_list->KeyCount - 1;
	}
}
$t102_jurnald_list->RecordCount = $t102_jurnald_list->StartRecord - 1;
if ($t102_jurnald_list->Recordset && !$t102_jurnald_list->Recordset->EOF) {
	$t102_jurnald_list->Recordset->moveFirst();
	$selectLimit = $t102_jurnald_list->UseSelectLimit;
	if (!$selectLimit && $t102_jurnald_list->StartRecord > 1)
		$t102_jurnald_list->Recordset->move($t102_jurnald_list->StartRecord - 1);
} elseif (!$t102_jurnald->AllowAddDeleteRow && $t102_jurnald_list->StopRecord == 0) {
	$t102_jurnald_list->StopRecord = $t102_jurnald->GridAddRowCount;
}

// Initialize aggregate
$t102_jurnald->RowType = ROWTYPE_AGGREGATEINIT;
$t102_jurnald->resetAttributes();
$t102_jurnald_list->renderRow();
if ($t102_jurnald_list->isGridAdd())
	$t102_jurnald_list->RowIndex = 0;
if ($t102_jurnald_list->isGridEdit())
	$t102_jurnald_list->RowIndex = 0;
while ($t102_jurnald_list->RecordCount < $t102_jurnald_list->StopRecord) {
	$t102_jurnald_list->RecordCount++;
	if ($t102_jurnald_list->RecordCount >= $t102_jurnald_list->StartRecord) {
		$t102_jurnald_list->RowCount++;
		if ($t102_jurnald_list->isGridAdd() || $t102_jurnald_list->isGridEdit() || $t102_jurnald->isConfirm()) {
			$t102_jurnald_list->RowIndex++;
			$CurrentForm->Index = $t102_jurnald_list->RowIndex;
			if ($CurrentForm->hasValue($t102_jurnald_list->FormActionName) && ($t102_jurnald->isConfirm() || $t102_jurnald_list->EventCancelled))
				$t102_jurnald_list->RowAction = strval($CurrentForm->getValue($t102_jurnald_list->FormActionName));
			elseif ($t102_jurnald_list->isGridAdd())
				$t102_jurnald_list->RowAction = "insert";
			else
				$t102_jurnald_list->RowAction = "";
		}

		// Set up key count
		$t102_jurnald_list->KeyCount = $t102_jurnald_list->RowIndex;

		// Init row class and style
		$t102_jurnald->resetAttributes();
		$t102_jurnald->CssClass = "";
		if ($t102_jurnald_list->isGridAdd()) {
			$t102_jurnald_list->loadRowValues(); // Load default values
		} else {
			$t102_jurnald_list->loadRowValues($t102_jurnald_list->Recordset); // Load row values
		}
		$t102_jurnald->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_jurnald_list->isGridAdd()) // Grid add
			$t102_jurnald->RowType = ROWTYPE_ADD; // Render add
		if ($t102_jurnald_list->isGridAdd() && $t102_jurnald->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_jurnald_list->restoreCurrentRowFormValues($t102_jurnald_list->RowIndex); // Restore form values
		if ($t102_jurnald_list->isGridEdit()) { // Grid edit
			if ($t102_jurnald->EventCancelled)
				$t102_jurnald_list->restoreCurrentRowFormValues($t102_jurnald_list->RowIndex); // Restore form values
			if ($t102_jurnald_list->RowAction == "insert")
				$t102_jurnald->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_jurnald->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_jurnald_list->isGridEdit() && ($t102_jurnald->RowType == ROWTYPE_EDIT || $t102_jurnald->RowType == ROWTYPE_ADD) && $t102_jurnald->EventCancelled) // Update failed
			$t102_jurnald_list->restoreCurrentRowFormValues($t102_jurnald_list->RowIndex); // Restore form values
		if ($t102_jurnald->RowType == ROWTYPE_EDIT) // Edit row
			$t102_jurnald_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t102_jurnald->RowAttrs->merge(["data-rowindex" => $t102_jurnald_list->RowCount, "id" => "r" . $t102_jurnald_list->RowCount . "_t102_jurnald", "data-rowtype" => $t102_jurnald->RowType]);

		// Render row
		$t102_jurnald_list->renderRow();

		// Render list options
		$t102_jurnald_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_jurnald_list->RowAction != "delete" && $t102_jurnald_list->RowAction != "insertdelete" && !($t102_jurnald_list->RowAction == "insert" && $t102_jurnald->isConfirm() && $t102_jurnald_list->emptyRow())) {
?>
	<tr <?php echo $t102_jurnald->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_jurnald_list->ListOptions->render("body", "left", $t102_jurnald_list->RowCount);
?>
	<?php if ($t102_jurnald_list->jurnal_id->Visible) { // jurnal_id ?>
		<td data-name="jurnal_id" <?php echo $t102_jurnald_list->jurnal_id->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t102_jurnald_list->jurnal_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<span<?php echo $t102_jurnald_list->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_list->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" name="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<?php
$onchange = $t102_jurnald_list->jurnal_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t102_jurnald_list->jurnal_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id">
	<input type="text" class="form-control" name="sv_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="sv_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo RemoveHtml($t102_jurnald_list->jurnal_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->getPlaceHolder()) ?>"<?php echo $t102_jurnald_list->jurnal_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" data-value-separator="<?php echo $t102_jurnald_list->jurnal_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft102_jurnaldlist"], function() {
	ft102_jurnaldlist.createAutoSuggest({"id":"x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id","forceSelect":false});
});
</script>
<?php echo $t102_jurnald_list->jurnal_id->Lookup->getParamTag($t102_jurnald_list, "p_x" . $t102_jurnald_list->RowIndex . "_jurnal_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="o<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="o<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t102_jurnald_list->jurnal_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<span<?php echo $t102_jurnald_list->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_list->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" name="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_jurnal_id" class="form-group">
<?php
$onchange = $t102_jurnald_list->jurnal_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t102_jurnald_list->jurnal_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id">
	<input type="text" class="form-control" name="sv_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="sv_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo RemoveHtml($t102_jurnald_list->jurnal_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->getPlaceHolder()) ?>"<?php echo $t102_jurnald_list->jurnal_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" data-value-separator="<?php echo $t102_jurnald_list->jurnal_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft102_jurnaldlist"], function() {
	ft102_jurnaldlist.createAutoSuggest({"id":"x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id","forceSelect":false});
});
</script>
<?php echo $t102_jurnald_list->jurnal_id->Lookup->getParamTag($t102_jurnald_list, "p_x" . $t102_jurnald_list->RowIndex . "_jurnal_id") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_jurnal_id">
<span<?php echo $t102_jurnald_list->jurnal_id->viewAttributes() ?>><?php echo $t102_jurnald_list->jurnal_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_id" name="x<?php echo $t102_jurnald_list->RowIndex ?>_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_jurnald_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_jurnald" data-field="x_id" name="o<?php echo $t102_jurnald_list->RowIndex ?>_id" id="o<?php echo $t102_jurnald_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_jurnald_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT || $t102_jurnald->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_id" name="x<?php echo $t102_jurnald_list->RowIndex ?>_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_jurnald_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t102_jurnald_list->akun_id->Visible) { // akun_id ?>
		<td data-name="akun_id" <?php echo $t102_jurnald_list->akun_id->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_akun_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t102_jurnald_list->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_jurnald_list->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_jurnald_list->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_jurnald_list->akun_id->ReadOnly || $t102_jurnald_list->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_jurnald_list->akun_id->Lookup->getParamTag($t102_jurnald_list, "p_x" . $t102_jurnald_list->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_jurnald_list->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" value="<?php echo $t102_jurnald_list->akun_id->CurrentValue ?>"<?php echo $t102_jurnald_list->akun_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="o<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" id="o<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_list->akun_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_akun_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t102_jurnald_list->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_jurnald_list->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_jurnald_list->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_jurnald_list->akun_id->ReadOnly || $t102_jurnald_list->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_jurnald_list->akun_id->Lookup->getParamTag($t102_jurnald_list, "p_x" . $t102_jurnald_list->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_jurnald_list->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" value="<?php echo $t102_jurnald_list->akun_id->CurrentValue ?>"<?php echo $t102_jurnald_list->akun_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_akun_id">
<span<?php echo $t102_jurnald_list->akun_id->viewAttributes() ?>><?php echo $t102_jurnald_list->akun_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_jurnald_list->debet->Visible) { // debet ?>
		<td data-name="debet" <?php echo $t102_jurnald_list->debet->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_debet" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_list->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_list->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_list->debet->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_list->debet->EditValue ?>"<?php echo $t102_jurnald_list->debet->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="o<?php echo $t102_jurnald_list->RowIndex ?>_debet" id="o<?php echo $t102_jurnald_list->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_list->debet->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_debet" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_list->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_list->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_list->debet->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_list->debet->EditValue ?>"<?php echo $t102_jurnald_list->debet->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_debet">
<span<?php echo $t102_jurnald_list->debet->viewAttributes() ?>><?php echo $t102_jurnald_list->debet->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t102_jurnald_list->kredit->Visible) { // kredit ?>
		<td data-name="kredit" <?php echo $t102_jurnald_list->kredit->cellAttributes() ?>>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_kredit" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_list->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_list->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_list->kredit->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_list->kredit->EditValue ?>"<?php echo $t102_jurnald_list->kredit->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="o<?php echo $t102_jurnald_list->RowIndex ?>_kredit" id="o<?php echo $t102_jurnald_list->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_list->kredit->OldValue) ?>">
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_kredit" class="form-group">
<input type="text" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_list->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_list->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_list->kredit->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_list->kredit->EditValue ?>"<?php echo $t102_jurnald_list->kredit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_jurnald->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_jurnald_list->RowCount ?>_t102_jurnald_kredit">
<span<?php echo $t102_jurnald_list->kredit->viewAttributes() ?>><?php echo $t102_jurnald_list->kredit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_jurnald_list->ListOptions->render("body", "right", $t102_jurnald_list->RowCount);
?>
	</tr>
<?php if ($t102_jurnald->RowType == ROWTYPE_ADD || $t102_jurnald->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft102_jurnaldlist", "load"], function() {
	ft102_jurnaldlist.updateLists(<?php echo $t102_jurnald_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_jurnald_list->isGridAdd())
		if (!$t102_jurnald_list->Recordset->EOF)
			$t102_jurnald_list->Recordset->moveNext();
}
?>
<?php
	if ($t102_jurnald_list->isGridAdd() || $t102_jurnald_list->isGridEdit()) {
		$t102_jurnald_list->RowIndex = '$rowindex$';
		$t102_jurnald_list->loadRowValues();

		// Set row properties
		$t102_jurnald->resetAttributes();
		$t102_jurnald->RowAttrs->merge(["data-rowindex" => $t102_jurnald_list->RowIndex, "id" => "r0_t102_jurnald", "data-rowtype" => ROWTYPE_ADD]);
		$t102_jurnald->RowAttrs->appendClass("ew-template");
		$t102_jurnald->RowType = ROWTYPE_ADD;

		// Render row
		$t102_jurnald_list->renderRow();

		// Render list options
		$t102_jurnald_list->renderListOptions();
		$t102_jurnald_list->StartRowCount = 0;
?>
	<tr <?php echo $t102_jurnald->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_jurnald_list->ListOptions->render("body", "left", $t102_jurnald_list->RowIndex);
?>
	<?php if ($t102_jurnald_list->jurnal_id->Visible) { // jurnal_id ?>
		<td data-name="jurnal_id">
<?php if ($t102_jurnald_list->jurnal_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t102_jurnald_jurnal_id" class="form-group t102_jurnald_jurnal_id">
<span<?php echo $t102_jurnald_list->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_list->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" name="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t102_jurnald_jurnal_id" class="form-group t102_jurnald_jurnal_id">
<?php
$onchange = $t102_jurnald_list->jurnal_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t102_jurnald_list->jurnal_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id">
	<input type="text" class="form-control" name="sv_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="sv_x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo RemoveHtml($t102_jurnald_list->jurnal_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->getPlaceHolder()) ?>"<?php echo $t102_jurnald_list->jurnal_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" data-value-separator="<?php echo $t102_jurnald_list->jurnal_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft102_jurnaldlist"], function() {
	ft102_jurnaldlist.createAutoSuggest({"id":"x<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id","forceSelect":false});
});
</script>
<?php echo $t102_jurnald_list->jurnal_id->Lookup->getParamTag($t102_jurnald_list, "p_x" . $t102_jurnald_list->RowIndex . "_jurnal_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" name="o<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" id="o<?php echo $t102_jurnald_list->RowIndex ?>_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_list->jurnal_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_jurnald_list->akun_id->Visible) { // akun_id ?>
		<td data-name="akun_id">
<span id="el$rowindex$_t102_jurnald_akun_id" class="form-group t102_jurnald_akun_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t102_jurnald_list->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_jurnald_list->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_jurnald_list->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_jurnald_list->akun_id->ReadOnly || $t102_jurnald_list->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_jurnald_list->akun_id->Lookup->getParamTag($t102_jurnald_list, "p_x" . $t102_jurnald_list->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_jurnald_list->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" id="x<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" value="<?php echo $t102_jurnald_list->akun_id->CurrentValue ?>"<?php echo $t102_jurnald_list->akun_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" name="o<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" id="o<?php echo $t102_jurnald_list->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t102_jurnald_list->akun_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_jurnald_list->debet->Visible) { // debet ?>
		<td data-name="debet">
<span id="el$rowindex$_t102_jurnald_debet" class="form-group t102_jurnald_debet">
<input type="text" data-table="t102_jurnald" data-field="x_debet" name="x<?php echo $t102_jurnald_list->RowIndex ?>_debet" id="x<?php echo $t102_jurnald_list->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_list->debet->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_list->debet->EditValue ?>"<?php echo $t102_jurnald_list->debet->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_debet" name="o<?php echo $t102_jurnald_list->RowIndex ?>_debet" id="o<?php echo $t102_jurnald_list->RowIndex ?>_debet" value="<?php echo HtmlEncode($t102_jurnald_list->debet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t102_jurnald_list->kredit->Visible) { // kredit ?>
		<td data-name="kredit">
<span id="el$rowindex$_t102_jurnald_kredit" class="form-group t102_jurnald_kredit">
<input type="text" data-table="t102_jurnald" data-field="x_kredit" name="x<?php echo $t102_jurnald_list->RowIndex ?>_kredit" id="x<?php echo $t102_jurnald_list->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_list->kredit->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_list->kredit->EditValue ?>"<?php echo $t102_jurnald_list->kredit->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_kredit" name="o<?php echo $t102_jurnald_list->RowIndex ?>_kredit" id="o<?php echo $t102_jurnald_list->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t102_jurnald_list->kredit->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_jurnald_list->ListOptions->render("body", "right", $t102_jurnald_list->RowIndex);
?>
<script>
loadjs.ready(["ft102_jurnaldlist", "load"], function() {
	ft102_jurnaldlist.updateLists(<?php echo $t102_jurnald_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$t102_jurnald->RowType = ROWTYPE_AGGREGATE;
$t102_jurnald->resetAttributes();
$t102_jurnald_list->renderRow();
?>
<?php if ($t102_jurnald_list->TotalRecords > 0 && !$t102_jurnald_list->isGridAdd() && !$t102_jurnald_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$t102_jurnald_list->renderListOptions();

// Render list options (footer, left)
$t102_jurnald_list->ListOptions->render("footer", "left");
?>
	<?php if ($t102_jurnald_list->jurnal_id->Visible) { // jurnal_id ?>
		<td data-name="jurnal_id" class="<?php echo $t102_jurnald_list->jurnal_id->footerCellClass() ?>"><span id="elf_t102_jurnald_jurnal_id" class="t102_jurnald_jurnal_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_jurnald_list->akun_id->Visible) { // akun_id ?>
		<td data-name="akun_id" class="<?php echo $t102_jurnald_list->akun_id->footerCellClass() ?>"><span id="elf_t102_jurnald_akun_id" class="t102_jurnald_akun_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($t102_jurnald_list->debet->Visible) { // debet ?>
		<td data-name="debet" class="<?php echo $t102_jurnald_list->debet->footerCellClass() ?>"><span id="elf_t102_jurnald_debet" class="t102_jurnald_debet">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $t102_jurnald_list->debet->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($t102_jurnald_list->kredit->Visible) { // kredit ?>
		<td data-name="kredit" class="<?php echo $t102_jurnald_list->kredit->footerCellClass() ?>"><span id="elf_t102_jurnald_kredit" class="t102_jurnald_kredit">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $t102_jurnald_list->kredit->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$t102_jurnald_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t102_jurnald_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t102_jurnald_list->FormKeyCountName ?>" id="<?php echo $t102_jurnald_list->FormKeyCountName ?>" value="<?php echo $t102_jurnald_list->KeyCount ?>">
<?php echo $t102_jurnald_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_jurnald_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t102_jurnald_list->FormKeyCountName ?>" id="<?php echo $t102_jurnald_list->FormKeyCountName ?>" value="<?php echo $t102_jurnald_list->KeyCount ?>">
<?php echo $t102_jurnald_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t102_jurnald->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_jurnald_list->Recordset)
	$t102_jurnald_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_jurnald_list->TotalRecords == 0 && !$t102_jurnald->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_jurnald_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t102_jurnald_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t102_jurnald_list->isExport()) { ?>
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
$t102_jurnald_list->terminate();
?>