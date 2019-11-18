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
$t003_matauang_list = new t003_matauang_list();

// Run the page
$t003_matauang_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_matauang_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t003_matauang_list->isExport()) { ?>
<script>
var ft003_matauanglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft003_matauanglist = currentForm = new ew.Form("ft003_matauanglist", "list");
	ft003_matauanglist.formKeyCountName = '<?php echo $t003_matauang_list->FormKeyCountName ?>';

	// Validate form
	ft003_matauanglist.validate = function() {
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
			<?php if ($t003_matauang_list->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_matauang_list->kode->caption(), $t003_matauang_list->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t003_matauang_list->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_matauang_list->nama->caption(), $t003_matauang_list->nama->RequiredErrorMessage)) ?>");
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
	ft003_matauanglist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "kode", false)) return false;
		if (ew.valueChanged(fobj, infix, "nama", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft003_matauanglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft003_matauanglist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft003_matauanglist");
});
var ft003_matauanglistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft003_matauanglistsrch = currentSearchForm = new ew.Form("ft003_matauanglistsrch");

	// Dynamic selection lists
	// Filters

	ft003_matauanglistsrch.filterList = <?php echo $t003_matauang_list->getFilterList() ?>;
	loadjs.done("ft003_matauanglistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t003_matauang_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t003_matauang_list->TotalRecords > 0 && $t003_matauang_list->ExportOptions->visible()) { ?>
<?php $t003_matauang_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_matauang_list->ImportOptions->visible()) { ?>
<?php $t003_matauang_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_matauang_list->SearchOptions->visible()) { ?>
<?php $t003_matauang_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t003_matauang_list->FilterOptions->visible()) { ?>
<?php $t003_matauang_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t003_matauang_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t003_matauang_list->isExport() && !$t003_matauang->CurrentAction) { ?>
<form name="ft003_matauanglistsrch" id="ft003_matauanglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft003_matauanglistsrch-search-panel" class="<?php echo $t003_matauang_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t003_matauang">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t003_matauang_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t003_matauang_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t003_matauang_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t003_matauang_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t003_matauang_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t003_matauang_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t003_matauang_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t003_matauang_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t003_matauang_list->showPageHeader(); ?>
<?php
$t003_matauang_list->showMessage();
?>
<?php if ($t003_matauang_list->TotalRecords > 0 || $t003_matauang->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t003_matauang_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t003_matauang">
<?php if (!$t003_matauang_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t003_matauang_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t003_matauang_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t003_matauang_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft003_matauanglist" id="ft003_matauanglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_matauang">
<div id="gmp_t003_matauang" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t003_matauang_list->TotalRecords > 0 || $t003_matauang_list->isGridEdit()) { ?>
<table id="tbl_t003_matauanglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t003_matauang->RowType = ROWTYPE_HEADER;

// Render list options
$t003_matauang_list->renderListOptions();

// Render list options (header, left)
$t003_matauang_list->ListOptions->render("header", "left");
?>
<?php if ($t003_matauang_list->kode->Visible) { // kode ?>
	<?php if ($t003_matauang_list->SortUrl($t003_matauang_list->kode) == "") { ?>
		<th data-name="kode" class="<?php echo $t003_matauang_list->kode->headerCellClass() ?>"><div id="elh_t003_matauang_kode" class="t003_matauang_kode"><div class="ew-table-header-caption"><?php echo $t003_matauang_list->kode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode" class="<?php echo $t003_matauang_list->kode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t003_matauang_list->SortUrl($t003_matauang_list->kode) ?>', 2);"><div id="elh_t003_matauang_kode" class="t003_matauang_kode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t003_matauang_list->kode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t003_matauang_list->kode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t003_matauang_list->kode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t003_matauang_list->nama->Visible) { // nama ?>
	<?php if ($t003_matauang_list->SortUrl($t003_matauang_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $t003_matauang_list->nama->headerCellClass() ?>"><div id="elh_t003_matauang_nama" class="t003_matauang_nama"><div class="ew-table-header-caption"><?php echo $t003_matauang_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $t003_matauang_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t003_matauang_list->SortUrl($t003_matauang_list->nama) ?>', 2);"><div id="elh_t003_matauang_nama" class="t003_matauang_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t003_matauang_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t003_matauang_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t003_matauang_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t003_matauang_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t003_matauang_list->ExportAll && $t003_matauang_list->isExport()) {
	$t003_matauang_list->StopRecord = $t003_matauang_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t003_matauang_list->TotalRecords > $t003_matauang_list->StartRecord + $t003_matauang_list->DisplayRecords - 1)
		$t003_matauang_list->StopRecord = $t003_matauang_list->StartRecord + $t003_matauang_list->DisplayRecords - 1;
	else
		$t003_matauang_list->StopRecord = $t003_matauang_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t003_matauang->isConfirm() || $t003_matauang_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t003_matauang_list->FormKeyCountName) && ($t003_matauang_list->isGridAdd() || $t003_matauang_list->isGridEdit() || $t003_matauang->isConfirm())) {
		$t003_matauang_list->KeyCount = $CurrentForm->getValue($t003_matauang_list->FormKeyCountName);
		$t003_matauang_list->StopRecord = $t003_matauang_list->StartRecord + $t003_matauang_list->KeyCount - 1;
	}
}
$t003_matauang_list->RecordCount = $t003_matauang_list->StartRecord - 1;
if ($t003_matauang_list->Recordset && !$t003_matauang_list->Recordset->EOF) {
	$t003_matauang_list->Recordset->moveFirst();
	$selectLimit = $t003_matauang_list->UseSelectLimit;
	if (!$selectLimit && $t003_matauang_list->StartRecord > 1)
		$t003_matauang_list->Recordset->move($t003_matauang_list->StartRecord - 1);
} elseif (!$t003_matauang->AllowAddDeleteRow && $t003_matauang_list->StopRecord == 0) {
	$t003_matauang_list->StopRecord = $t003_matauang->GridAddRowCount;
}

// Initialize aggregate
$t003_matauang->RowType = ROWTYPE_AGGREGATEINIT;
$t003_matauang->resetAttributes();
$t003_matauang_list->renderRow();
if ($t003_matauang_list->isGridAdd())
	$t003_matauang_list->RowIndex = 0;
if ($t003_matauang_list->isGridEdit())
	$t003_matauang_list->RowIndex = 0;
while ($t003_matauang_list->RecordCount < $t003_matauang_list->StopRecord) {
	$t003_matauang_list->RecordCount++;
	if ($t003_matauang_list->RecordCount >= $t003_matauang_list->StartRecord) {
		$t003_matauang_list->RowCount++;
		if ($t003_matauang_list->isGridAdd() || $t003_matauang_list->isGridEdit() || $t003_matauang->isConfirm()) {
			$t003_matauang_list->RowIndex++;
			$CurrentForm->Index = $t003_matauang_list->RowIndex;
			if ($CurrentForm->hasValue($t003_matauang_list->FormActionName) && ($t003_matauang->isConfirm() || $t003_matauang_list->EventCancelled))
				$t003_matauang_list->RowAction = strval($CurrentForm->getValue($t003_matauang_list->FormActionName));
			elseif ($t003_matauang_list->isGridAdd())
				$t003_matauang_list->RowAction = "insert";
			else
				$t003_matauang_list->RowAction = "";
		}

		// Set up key count
		$t003_matauang_list->KeyCount = $t003_matauang_list->RowIndex;

		// Init row class and style
		$t003_matauang->resetAttributes();
		$t003_matauang->CssClass = "";
		if ($t003_matauang_list->isGridAdd()) {
			$t003_matauang_list->loadRowValues(); // Load default values
		} else {
			$t003_matauang_list->loadRowValues($t003_matauang_list->Recordset); // Load row values
		}
		$t003_matauang->RowType = ROWTYPE_VIEW; // Render view
		if ($t003_matauang_list->isGridAdd()) // Grid add
			$t003_matauang->RowType = ROWTYPE_ADD; // Render add
		if ($t003_matauang_list->isGridAdd() && $t003_matauang->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t003_matauang_list->restoreCurrentRowFormValues($t003_matauang_list->RowIndex); // Restore form values
		if ($t003_matauang_list->isGridEdit()) { // Grid edit
			if ($t003_matauang->EventCancelled)
				$t003_matauang_list->restoreCurrentRowFormValues($t003_matauang_list->RowIndex); // Restore form values
			if ($t003_matauang_list->RowAction == "insert")
				$t003_matauang->RowType = ROWTYPE_ADD; // Render add
			else
				$t003_matauang->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t003_matauang_list->isGridEdit() && ($t003_matauang->RowType == ROWTYPE_EDIT || $t003_matauang->RowType == ROWTYPE_ADD) && $t003_matauang->EventCancelled) // Update failed
			$t003_matauang_list->restoreCurrentRowFormValues($t003_matauang_list->RowIndex); // Restore form values
		if ($t003_matauang->RowType == ROWTYPE_EDIT) // Edit row
			$t003_matauang_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t003_matauang->RowAttrs->merge(["data-rowindex" => $t003_matauang_list->RowCount, "id" => "r" . $t003_matauang_list->RowCount . "_t003_matauang", "data-rowtype" => $t003_matauang->RowType]);

		// Render row
		$t003_matauang_list->renderRow();

		// Render list options
		$t003_matauang_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t003_matauang_list->RowAction != "delete" && $t003_matauang_list->RowAction != "insertdelete" && !($t003_matauang_list->RowAction == "insert" && $t003_matauang->isConfirm() && $t003_matauang_list->emptyRow())) {
?>
	<tr <?php echo $t003_matauang->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t003_matauang_list->ListOptions->render("body", "left", $t003_matauang_list->RowCount);
?>
	<?php if ($t003_matauang_list->kode->Visible) { // kode ?>
		<td data-name="kode" <?php echo $t003_matauang_list->kode->cellAttributes() ?>>
<?php if ($t003_matauang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t003_matauang_list->RowCount ?>_t003_matauang_kode" class="form-group">
<input type="text" data-table="t003_matauang" data-field="x_kode" name="x<?php echo $t003_matauang_list->RowIndex ?>_kode" id="x<?php echo $t003_matauang_list->RowIndex ?>_kode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_list->kode->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_list->kode->EditValue ?>"<?php echo $t003_matauang_list->kode->editAttributes() ?>>
</span>
<input type="hidden" data-table="t003_matauang" data-field="x_kode" name="o<?php echo $t003_matauang_list->RowIndex ?>_kode" id="o<?php echo $t003_matauang_list->RowIndex ?>_kode" value="<?php echo HtmlEncode($t003_matauang_list->kode->OldValue) ?>">
<?php } ?>
<?php if ($t003_matauang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t003_matauang_list->RowCount ?>_t003_matauang_kode" class="form-group">
<input type="text" data-table="t003_matauang" data-field="x_kode" name="x<?php echo $t003_matauang_list->RowIndex ?>_kode" id="x<?php echo $t003_matauang_list->RowIndex ?>_kode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_list->kode->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_list->kode->EditValue ?>"<?php echo $t003_matauang_list->kode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t003_matauang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t003_matauang_list->RowCount ?>_t003_matauang_kode">
<span<?php echo $t003_matauang_list->kode->viewAttributes() ?>><?php echo $t003_matauang_list->kode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t003_matauang->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t003_matauang" data-field="x_id" name="x<?php echo $t003_matauang_list->RowIndex ?>_id" id="x<?php echo $t003_matauang_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t003_matauang_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t003_matauang" data-field="x_id" name="o<?php echo $t003_matauang_list->RowIndex ?>_id" id="o<?php echo $t003_matauang_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t003_matauang_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t003_matauang->RowType == ROWTYPE_EDIT || $t003_matauang->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t003_matauang" data-field="x_id" name="x<?php echo $t003_matauang_list->RowIndex ?>_id" id="x<?php echo $t003_matauang_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t003_matauang_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t003_matauang_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $t003_matauang_list->nama->cellAttributes() ?>>
<?php if ($t003_matauang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t003_matauang_list->RowCount ?>_t003_matauang_nama" class="form-group">
<input type="text" data-table="t003_matauang" data-field="x_nama" name="x<?php echo $t003_matauang_list->RowIndex ?>_nama" id="x<?php echo $t003_matauang_list->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_list->nama->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_list->nama->EditValue ?>"<?php echo $t003_matauang_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t003_matauang" data-field="x_nama" name="o<?php echo $t003_matauang_list->RowIndex ?>_nama" id="o<?php echo $t003_matauang_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($t003_matauang_list->nama->OldValue) ?>">
<?php } ?>
<?php if ($t003_matauang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t003_matauang_list->RowCount ?>_t003_matauang_nama" class="form-group">
<input type="text" data-table="t003_matauang" data-field="x_nama" name="x<?php echo $t003_matauang_list->RowIndex ?>_nama" id="x<?php echo $t003_matauang_list->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_list->nama->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_list->nama->EditValue ?>"<?php echo $t003_matauang_list->nama->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t003_matauang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t003_matauang_list->RowCount ?>_t003_matauang_nama">
<span<?php echo $t003_matauang_list->nama->viewAttributes() ?>><?php echo $t003_matauang_list->nama->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t003_matauang_list->ListOptions->render("body", "right", $t003_matauang_list->RowCount);
?>
	</tr>
<?php if ($t003_matauang->RowType == ROWTYPE_ADD || $t003_matauang->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft003_matauanglist", "load"], function() {
	ft003_matauanglist.updateLists(<?php echo $t003_matauang_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t003_matauang_list->isGridAdd())
		if (!$t003_matauang_list->Recordset->EOF)
			$t003_matauang_list->Recordset->moveNext();
}
?>
<?php
	if ($t003_matauang_list->isGridAdd() || $t003_matauang_list->isGridEdit()) {
		$t003_matauang_list->RowIndex = '$rowindex$';
		$t003_matauang_list->loadRowValues();

		// Set row properties
		$t003_matauang->resetAttributes();
		$t003_matauang->RowAttrs->merge(["data-rowindex" => $t003_matauang_list->RowIndex, "id" => "r0_t003_matauang", "data-rowtype" => ROWTYPE_ADD]);
		$t003_matauang->RowAttrs->appendClass("ew-template");
		$t003_matauang->RowType = ROWTYPE_ADD;

		// Render row
		$t003_matauang_list->renderRow();

		// Render list options
		$t003_matauang_list->renderListOptions();
		$t003_matauang_list->StartRowCount = 0;
?>
	<tr <?php echo $t003_matauang->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t003_matauang_list->ListOptions->render("body", "left", $t003_matauang_list->RowIndex);
?>
	<?php if ($t003_matauang_list->kode->Visible) { // kode ?>
		<td data-name="kode">
<span id="el$rowindex$_t003_matauang_kode" class="form-group t003_matauang_kode">
<input type="text" data-table="t003_matauang" data-field="x_kode" name="x<?php echo $t003_matauang_list->RowIndex ?>_kode" id="x<?php echo $t003_matauang_list->RowIndex ?>_kode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_list->kode->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_list->kode->EditValue ?>"<?php echo $t003_matauang_list->kode->editAttributes() ?>>
</span>
<input type="hidden" data-table="t003_matauang" data-field="x_kode" name="o<?php echo $t003_matauang_list->RowIndex ?>_kode" id="o<?php echo $t003_matauang_list->RowIndex ?>_kode" value="<?php echo HtmlEncode($t003_matauang_list->kode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t003_matauang_list->nama->Visible) { // nama ?>
		<td data-name="nama">
<span id="el$rowindex$_t003_matauang_nama" class="form-group t003_matauang_nama">
<input type="text" data-table="t003_matauang" data-field="x_nama" name="x<?php echo $t003_matauang_list->RowIndex ?>_nama" id="x<?php echo $t003_matauang_list->RowIndex ?>_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_list->nama->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_list->nama->EditValue ?>"<?php echo $t003_matauang_list->nama->editAttributes() ?>>
</span>
<input type="hidden" data-table="t003_matauang" data-field="x_nama" name="o<?php echo $t003_matauang_list->RowIndex ?>_nama" id="o<?php echo $t003_matauang_list->RowIndex ?>_nama" value="<?php echo HtmlEncode($t003_matauang_list->nama->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t003_matauang_list->ListOptions->render("body", "right", $t003_matauang_list->RowIndex);
?>
<script>
loadjs.ready(["ft003_matauanglist", "load"], function() {
	ft003_matauanglist.updateLists(<?php echo $t003_matauang_list->RowIndex ?>);
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
<?php if ($t003_matauang_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t003_matauang_list->FormKeyCountName ?>" id="<?php echo $t003_matauang_list->FormKeyCountName ?>" value="<?php echo $t003_matauang_list->KeyCount ?>">
<?php echo $t003_matauang_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t003_matauang_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t003_matauang_list->FormKeyCountName ?>" id="<?php echo $t003_matauang_list->FormKeyCountName ?>" value="<?php echo $t003_matauang_list->KeyCount ?>">
<?php echo $t003_matauang_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t003_matauang->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t003_matauang_list->Recordset)
	$t003_matauang_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t003_matauang_list->TotalRecords == 0 && !$t003_matauang->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t003_matauang_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t003_matauang_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t003_matauang_list->isExport()) { ?>
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
$t003_matauang_list->terminate();
?>