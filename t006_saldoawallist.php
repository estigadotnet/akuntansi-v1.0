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
$t006_saldoawal_list = new t006_saldoawal_list();

// Run the page
$t006_saldoawal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_saldoawal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t006_saldoawal_list->isExport()) { ?>
<script>
var ft006_saldoawallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft006_saldoawallist = currentForm = new ew.Form("ft006_saldoawallist", "list");
	ft006_saldoawallist.formKeyCountName = '<?php echo $t006_saldoawal_list->FormKeyCountName ?>';

	// Validate form
	ft006_saldoawallist.validate = function() {
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
			<?php if ($t006_saldoawal_list->periode_id->Required) { ?>
				elm = this.getElements("x" + infix + "_periode_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_list->periode_id->caption(), $t006_saldoawal_list->periode_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_saldoawal_list->akun_id->Required) { ?>
				elm = this.getElements("x" + infix + "_akun_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_list->akun_id->caption(), $t006_saldoawal_list->akun_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_saldoawal_list->debet->Required) { ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_list->debet->caption(), $t006_saldoawal_list->debet->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_saldoawal_list->debet->errorMessage()) ?>");
			<?php if ($t006_saldoawal_list->kredit->Required) { ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_list->kredit->caption(), $t006_saldoawal_list->kredit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_saldoawal_list->kredit->errorMessage()) ?>");
			<?php if ($t006_saldoawal_list->saldo->Required) { ?>
				elm = this.getElements("x" + infix + "_saldo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_list->saldo->caption(), $t006_saldoawal_list->saldo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_saldo");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_saldoawal_list->saldo->errorMessage()) ?>");

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
	ft006_saldoawallist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "periode_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "akun_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "debet", false)) return false;
		if (ew.valueChanged(fobj, infix, "kredit", false)) return false;
		if (ew.valueChanged(fobj, infix, "saldo", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft006_saldoawallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft006_saldoawallist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft006_saldoawallist.lists["x_periode_id"] = <?php echo $t006_saldoawal_list->periode_id->Lookup->toClientList($t006_saldoawal_list) ?>;
	ft006_saldoawallist.lists["x_periode_id"].options = <?php echo JsonEncode($t006_saldoawal_list->periode_id->lookupOptions()) ?>;
	ft006_saldoawallist.lists["x_akun_id"] = <?php echo $t006_saldoawal_list->akun_id->Lookup->toClientList($t006_saldoawal_list) ?>;
	ft006_saldoawallist.lists["x_akun_id"].options = <?php echo JsonEncode($t006_saldoawal_list->akun_id->lookupOptions()) ?>;
	loadjs.done("ft006_saldoawallist");
});
var ft006_saldoawallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft006_saldoawallistsrch = currentSearchForm = new ew.Form("ft006_saldoawallistsrch");

	// Dynamic selection lists
	// Filters

	ft006_saldoawallistsrch.filterList = <?php echo $t006_saldoawal_list->getFilterList() ?>;
	loadjs.done("ft006_saldoawallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t006_saldoawal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t006_saldoawal_list->TotalRecords > 0 && $t006_saldoawal_list->ExportOptions->visible()) { ?>
<?php $t006_saldoawal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t006_saldoawal_list->ImportOptions->visible()) { ?>
<?php $t006_saldoawal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t006_saldoawal_list->SearchOptions->visible()) { ?>
<?php $t006_saldoawal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t006_saldoawal_list->FilterOptions->visible()) { ?>
<?php $t006_saldoawal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t006_saldoawal_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t006_saldoawal_list->isExport() && !$t006_saldoawal->CurrentAction) { ?>
<form name="ft006_saldoawallistsrch" id="ft006_saldoawallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft006_saldoawallistsrch-search-panel" class="<?php echo $t006_saldoawal_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t006_saldoawal">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t006_saldoawal_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t006_saldoawal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t006_saldoawal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t006_saldoawal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t006_saldoawal_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t006_saldoawal_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t006_saldoawal_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t006_saldoawal_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t006_saldoawal_list->showPageHeader(); ?>
<?php
$t006_saldoawal_list->showMessage();
?>
<?php if ($t006_saldoawal_list->TotalRecords > 0 || $t006_saldoawal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t006_saldoawal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t006_saldoawal">
<form name="ft006_saldoawallist" id="ft006_saldoawallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_saldoawal">
<div id="gmp_t006_saldoawal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t006_saldoawal_list->TotalRecords > 0 || $t006_saldoawal_list->isGridEdit()) { ?>
<table id="tbl_t006_saldoawallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t006_saldoawal->RowType = ROWTYPE_HEADER;

// Render list options
$t006_saldoawal_list->renderListOptions();

// Render list options (header, left)
$t006_saldoawal_list->ListOptions->render("header", "left");
?>
<?php if ($t006_saldoawal_list->periode_id->Visible) { // periode_id ?>
	<?php if ($t006_saldoawal_list->SortUrl($t006_saldoawal_list->periode_id) == "") { ?>
		<th data-name="periode_id" class="<?php echo $t006_saldoawal_list->periode_id->headerCellClass() ?>"><div id="elh_t006_saldoawal_periode_id" class="t006_saldoawal_periode_id"><div class="ew-table-header-caption"><?php echo $t006_saldoawal_list->periode_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="periode_id" class="<?php echo $t006_saldoawal_list->periode_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_saldoawal_list->SortUrl($t006_saldoawal_list->periode_id) ?>', 2);"><div id="elh_t006_saldoawal_periode_id" class="t006_saldoawal_periode_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_saldoawal_list->periode_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_saldoawal_list->periode_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_saldoawal_list->periode_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_saldoawal_list->akun_id->Visible) { // akun_id ?>
	<?php if ($t006_saldoawal_list->SortUrl($t006_saldoawal_list->akun_id) == "") { ?>
		<th data-name="akun_id" class="<?php echo $t006_saldoawal_list->akun_id->headerCellClass() ?>"><div id="elh_t006_saldoawal_akun_id" class="t006_saldoawal_akun_id"><div class="ew-table-header-caption"><?php echo $t006_saldoawal_list->akun_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="akun_id" class="<?php echo $t006_saldoawal_list->akun_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_saldoawal_list->SortUrl($t006_saldoawal_list->akun_id) ?>', 2);"><div id="elh_t006_saldoawal_akun_id" class="t006_saldoawal_akun_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_saldoawal_list->akun_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_saldoawal_list->akun_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_saldoawal_list->akun_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_saldoawal_list->debet->Visible) { // debet ?>
	<?php if ($t006_saldoawal_list->SortUrl($t006_saldoawal_list->debet) == "") { ?>
		<th data-name="debet" class="<?php echo $t006_saldoawal_list->debet->headerCellClass() ?>"><div id="elh_t006_saldoawal_debet" class="t006_saldoawal_debet"><div class="ew-table-header-caption"><?php echo $t006_saldoawal_list->debet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="debet" class="<?php echo $t006_saldoawal_list->debet->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_saldoawal_list->SortUrl($t006_saldoawal_list->debet) ?>', 2);"><div id="elh_t006_saldoawal_debet" class="t006_saldoawal_debet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_saldoawal_list->debet->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_saldoawal_list->debet->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_saldoawal_list->debet->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_saldoawal_list->kredit->Visible) { // kredit ?>
	<?php if ($t006_saldoawal_list->SortUrl($t006_saldoawal_list->kredit) == "") { ?>
		<th data-name="kredit" class="<?php echo $t006_saldoawal_list->kredit->headerCellClass() ?>"><div id="elh_t006_saldoawal_kredit" class="t006_saldoawal_kredit"><div class="ew-table-header-caption"><?php echo $t006_saldoawal_list->kredit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kredit" class="<?php echo $t006_saldoawal_list->kredit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_saldoawal_list->SortUrl($t006_saldoawal_list->kredit) ?>', 2);"><div id="elh_t006_saldoawal_kredit" class="t006_saldoawal_kredit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_saldoawal_list->kredit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t006_saldoawal_list->kredit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_saldoawal_list->kredit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_saldoawal_list->saldo->Visible) { // saldo ?>
	<?php if ($t006_saldoawal_list->SortUrl($t006_saldoawal_list->saldo) == "") { ?>
		<th data-name="saldo" class="<?php echo $t006_saldoawal_list->saldo->headerCellClass() ?>"><div id="elh_t006_saldoawal_saldo" class="t006_saldoawal_saldo"><div class="ew-table-header-caption"><?php echo $t006_saldoawal_list->saldo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="saldo" class="<?php echo $t006_saldoawal_list->saldo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_saldoawal_list->SortUrl($t006_saldoawal_list->saldo) ?>', 2);"><div id="elh_t006_saldoawal_saldo" class="t006_saldoawal_saldo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_saldoawal_list->saldo->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_saldoawal_list->saldo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_saldoawal_list->saldo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t006_saldoawal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t006_saldoawal_list->ExportAll && $t006_saldoawal_list->isExport()) {
	$t006_saldoawal_list->StopRecord = $t006_saldoawal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t006_saldoawal_list->TotalRecords > $t006_saldoawal_list->StartRecord + $t006_saldoawal_list->DisplayRecords - 1)
		$t006_saldoawal_list->StopRecord = $t006_saldoawal_list->StartRecord + $t006_saldoawal_list->DisplayRecords - 1;
	else
		$t006_saldoawal_list->StopRecord = $t006_saldoawal_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t006_saldoawal->isConfirm() || $t006_saldoawal_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t006_saldoawal_list->FormKeyCountName) && ($t006_saldoawal_list->isGridAdd() || $t006_saldoawal_list->isGridEdit() || $t006_saldoawal->isConfirm())) {
		$t006_saldoawal_list->KeyCount = $CurrentForm->getValue($t006_saldoawal_list->FormKeyCountName);
		$t006_saldoawal_list->StopRecord = $t006_saldoawal_list->StartRecord + $t006_saldoawal_list->KeyCount - 1;
	}
}
$t006_saldoawal_list->RecordCount = $t006_saldoawal_list->StartRecord - 1;
if ($t006_saldoawal_list->Recordset && !$t006_saldoawal_list->Recordset->EOF) {
	$t006_saldoawal_list->Recordset->moveFirst();
	$selectLimit = $t006_saldoawal_list->UseSelectLimit;
	if (!$selectLimit && $t006_saldoawal_list->StartRecord > 1)
		$t006_saldoawal_list->Recordset->move($t006_saldoawal_list->StartRecord - 1);
} elseif (!$t006_saldoawal->AllowAddDeleteRow && $t006_saldoawal_list->StopRecord == 0) {
	$t006_saldoawal_list->StopRecord = $t006_saldoawal->GridAddRowCount;
}

// Initialize aggregate
$t006_saldoawal->RowType = ROWTYPE_AGGREGATEINIT;
$t006_saldoawal->resetAttributes();
$t006_saldoawal_list->renderRow();
if ($t006_saldoawal_list->isGridAdd())
	$t006_saldoawal_list->RowIndex = 0;
if ($t006_saldoawal_list->isGridEdit())
	$t006_saldoawal_list->RowIndex = 0;
while ($t006_saldoawal_list->RecordCount < $t006_saldoawal_list->StopRecord) {
	$t006_saldoawal_list->RecordCount++;
	if ($t006_saldoawal_list->RecordCount >= $t006_saldoawal_list->StartRecord) {
		$t006_saldoawal_list->RowCount++;
		if ($t006_saldoawal_list->isGridAdd() || $t006_saldoawal_list->isGridEdit() || $t006_saldoawal->isConfirm()) {
			$t006_saldoawal_list->RowIndex++;
			$CurrentForm->Index = $t006_saldoawal_list->RowIndex;
			if ($CurrentForm->hasValue($t006_saldoawal_list->FormActionName) && ($t006_saldoawal->isConfirm() || $t006_saldoawal_list->EventCancelled))
				$t006_saldoawal_list->RowAction = strval($CurrentForm->getValue($t006_saldoawal_list->FormActionName));
			elseif ($t006_saldoawal_list->isGridAdd())
				$t006_saldoawal_list->RowAction = "insert";
			else
				$t006_saldoawal_list->RowAction = "";
		}

		// Set up key count
		$t006_saldoawal_list->KeyCount = $t006_saldoawal_list->RowIndex;

		// Init row class and style
		$t006_saldoawal->resetAttributes();
		$t006_saldoawal->CssClass = "";
		if ($t006_saldoawal_list->isGridAdd()) {
			$t006_saldoawal_list->loadRowValues(); // Load default values
		} else {
			$t006_saldoawal_list->loadRowValues($t006_saldoawal_list->Recordset); // Load row values
		}
		$t006_saldoawal->RowType = ROWTYPE_VIEW; // Render view
		if ($t006_saldoawal_list->isGridAdd()) // Grid add
			$t006_saldoawal->RowType = ROWTYPE_ADD; // Render add
		if ($t006_saldoawal_list->isGridAdd() && $t006_saldoawal->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t006_saldoawal_list->restoreCurrentRowFormValues($t006_saldoawal_list->RowIndex); // Restore form values
		if ($t006_saldoawal_list->isGridEdit()) { // Grid edit
			if ($t006_saldoawal->EventCancelled)
				$t006_saldoawal_list->restoreCurrentRowFormValues($t006_saldoawal_list->RowIndex); // Restore form values
			if ($t006_saldoawal_list->RowAction == "insert")
				$t006_saldoawal->RowType = ROWTYPE_ADD; // Render add
			else
				$t006_saldoawal->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t006_saldoawal_list->isGridEdit() && ($t006_saldoawal->RowType == ROWTYPE_EDIT || $t006_saldoawal->RowType == ROWTYPE_ADD) && $t006_saldoawal->EventCancelled) // Update failed
			$t006_saldoawal_list->restoreCurrentRowFormValues($t006_saldoawal_list->RowIndex); // Restore form values
		if ($t006_saldoawal->RowType == ROWTYPE_EDIT) // Edit row
			$t006_saldoawal_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t006_saldoawal->RowAttrs->merge(["data-rowindex" => $t006_saldoawal_list->RowCount, "id" => "r" . $t006_saldoawal_list->RowCount . "_t006_saldoawal", "data-rowtype" => $t006_saldoawal->RowType]);

		// Render row
		$t006_saldoawal_list->renderRow();

		// Render list options
		$t006_saldoawal_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t006_saldoawal_list->RowAction != "delete" && $t006_saldoawal_list->RowAction != "insertdelete" && !($t006_saldoawal_list->RowAction == "insert" && $t006_saldoawal->isConfirm() && $t006_saldoawal_list->emptyRow())) {
?>
	<tr <?php echo $t006_saldoawal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_saldoawal_list->ListOptions->render("body", "left", $t006_saldoawal_list->RowCount);
?>
	<?php if ($t006_saldoawal_list->periode_id->Visible) { // periode_id ?>
		<td data-name="periode_id" <?php echo $t006_saldoawal_list->periode_id->cellAttributes() ?>>
<?php if ($t006_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_periode_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id"><?php echo EmptyValue(strval($t006_saldoawal_list->periode_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_list->periode_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_list->periode_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_list->periode_id->ReadOnly || $t006_saldoawal_list->periode_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_list->periode_id->Lookup->getParamTag($t006_saldoawal_list, "p_x" . $t006_saldoawal_list->RowIndex . "_periode_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_periode_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_list->periode_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" value="<?php echo $t006_saldoawal_list->periode_id->CurrentValue ?>"<?php echo $t006_saldoawal_list->periode_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_periode_id" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" value="<?php echo HtmlEncode($t006_saldoawal_list->periode_id->OldValue) ?>">
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_periode_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id"><?php echo EmptyValue(strval($t006_saldoawal_list->periode_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_list->periode_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_list->periode_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_list->periode_id->ReadOnly || $t006_saldoawal_list->periode_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_list->periode_id->Lookup->getParamTag($t006_saldoawal_list, "p_x" . $t006_saldoawal_list->RowIndex . "_periode_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_periode_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_list->periode_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" value="<?php echo $t006_saldoawal_list->periode_id->CurrentValue ?>"<?php echo $t006_saldoawal_list->periode_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_periode_id">
<span<?php echo $t006_saldoawal_list->periode_id->viewAttributes() ?>><?php echo $t006_saldoawal_list->periode_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_id" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_saldoawal_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t006_saldoawal" data-field="x_id" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_id" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_saldoawal_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_EDIT || $t006_saldoawal->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_id" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_saldoawal_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t006_saldoawal_list->akun_id->Visible) { // akun_id ?>
		<td data-name="akun_id" <?php echo $t006_saldoawal_list->akun_id->cellAttributes() ?>>
<?php if ($t006_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_akun_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t006_saldoawal_list->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_list->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_list->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_list->akun_id->ReadOnly || $t006_saldoawal_list->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_list->akun_id->Lookup->getParamTag($t006_saldoawal_list, "p_x" . $t006_saldoawal_list->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_list->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" value="<?php echo $t006_saldoawal_list->akun_id->CurrentValue ?>"<?php echo $t006_saldoawal_list->akun_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_akun_id" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t006_saldoawal_list->akun_id->OldValue) ?>">
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_akun_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t006_saldoawal_list->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_list->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_list->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_list->akun_id->ReadOnly || $t006_saldoawal_list->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_list->akun_id->Lookup->getParamTag($t006_saldoawal_list, "p_x" . $t006_saldoawal_list->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_list->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" value="<?php echo $t006_saldoawal_list->akun_id->CurrentValue ?>"<?php echo $t006_saldoawal_list->akun_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_akun_id">
<span<?php echo $t006_saldoawal_list->akun_id->viewAttributes() ?>><?php echo $t006_saldoawal_list->akun_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_saldoawal_list->debet->Visible) { // debet ?>
		<td data-name="debet" <?php echo $t006_saldoawal_list->debet->cellAttributes() ?>>
<?php if ($t006_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_debet" class="form-group">
<input type="text" data-table="t006_saldoawal" data-field="x_debet" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_debet" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->debet->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->debet->EditValue ?>"<?php echo $t006_saldoawal_list->debet->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_debet" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_debet" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_debet" value="<?php echo HtmlEncode($t006_saldoawal_list->debet->OldValue) ?>">
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_debet" class="form-group">
<input type="text" data-table="t006_saldoawal" data-field="x_debet" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_debet" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->debet->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->debet->EditValue ?>"<?php echo $t006_saldoawal_list->debet->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_debet">
<span<?php echo $t006_saldoawal_list->debet->viewAttributes() ?>><?php echo $t006_saldoawal_list->debet->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_saldoawal_list->kredit->Visible) { // kredit ?>
		<td data-name="kredit" <?php echo $t006_saldoawal_list->kredit->cellAttributes() ?>>
<?php if ($t006_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_kredit" class="form-group">
<input type="text" data-table="t006_saldoawal" data-field="x_kredit" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->kredit->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->kredit->EditValue ?>"<?php echo $t006_saldoawal_list->kredit->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_kredit" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t006_saldoawal_list->kredit->OldValue) ?>">
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_kredit" class="form-group">
<input type="text" data-table="t006_saldoawal" data-field="x_kredit" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->kredit->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->kredit->EditValue ?>"<?php echo $t006_saldoawal_list->kredit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_kredit">
<span<?php echo $t006_saldoawal_list->kredit->viewAttributes() ?>><?php echo $t006_saldoawal_list->kredit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_saldoawal_list->saldo->Visible) { // saldo ?>
		<td data-name="saldo" <?php echo $t006_saldoawal_list->saldo->cellAttributes() ?>>
<?php if ($t006_saldoawal->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_saldo" class="form-group">
<input type="text" data-table="t006_saldoawal" data-field="x_saldo" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->saldo->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->saldo->EditValue ?>"<?php echo $t006_saldoawal_list->saldo->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_saldo" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" value="<?php echo HtmlEncode($t006_saldoawal_list->saldo->OldValue) ?>">
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_saldo" class="form-group">
<input type="text" data-table="t006_saldoawal" data-field="x_saldo" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->saldo->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->saldo->EditValue ?>"<?php echo $t006_saldoawal_list->saldo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_saldoawal->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_saldoawal_list->RowCount ?>_t006_saldoawal_saldo">
<span<?php echo $t006_saldoawal_list->saldo->viewAttributes() ?>><?php echo $t006_saldoawal_list->saldo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_saldoawal_list->ListOptions->render("body", "right", $t006_saldoawal_list->RowCount);
?>
	</tr>
<?php if ($t006_saldoawal->RowType == ROWTYPE_ADD || $t006_saldoawal->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft006_saldoawallist", "load"], function() {
	ft006_saldoawallist.updateLists(<?php echo $t006_saldoawal_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t006_saldoawal_list->isGridAdd())
		if (!$t006_saldoawal_list->Recordset->EOF)
			$t006_saldoawal_list->Recordset->moveNext();
}
?>
<?php
	if ($t006_saldoawal_list->isGridAdd() || $t006_saldoawal_list->isGridEdit()) {
		$t006_saldoawal_list->RowIndex = '$rowindex$';
		$t006_saldoawal_list->loadRowValues();

		// Set row properties
		$t006_saldoawal->resetAttributes();
		$t006_saldoawal->RowAttrs->merge(["data-rowindex" => $t006_saldoawal_list->RowIndex, "id" => "r0_t006_saldoawal", "data-rowtype" => ROWTYPE_ADD]);
		$t006_saldoawal->RowAttrs->appendClass("ew-template");
		$t006_saldoawal->RowType = ROWTYPE_ADD;

		// Render row
		$t006_saldoawal_list->renderRow();

		// Render list options
		$t006_saldoawal_list->renderListOptions();
		$t006_saldoawal_list->StartRowCount = 0;
?>
	<tr <?php echo $t006_saldoawal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_saldoawal_list->ListOptions->render("body", "left", $t006_saldoawal_list->RowIndex);
?>
	<?php if ($t006_saldoawal_list->periode_id->Visible) { // periode_id ?>
		<td data-name="periode_id">
<span id="el$rowindex$_t006_saldoawal_periode_id" class="form-group t006_saldoawal_periode_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id"><?php echo EmptyValue(strval($t006_saldoawal_list->periode_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_list->periode_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_list->periode_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_list->periode_id->ReadOnly || $t006_saldoawal_list->periode_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_list->periode_id->Lookup->getParamTag($t006_saldoawal_list, "p_x" . $t006_saldoawal_list->RowIndex . "_periode_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_periode_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_list->periode_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" value="<?php echo $t006_saldoawal_list->periode_id->CurrentValue ?>"<?php echo $t006_saldoawal_list->periode_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_periode_id" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_periode_id" value="<?php echo HtmlEncode($t006_saldoawal_list->periode_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_saldoawal_list->akun_id->Visible) { // akun_id ?>
		<td data-name="akun_id">
<span id="el$rowindex$_t006_saldoawal_akun_id" class="form-group t006_saldoawal_akun_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id"><?php echo EmptyValue(strval($t006_saldoawal_list->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_list->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_list->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_list->akun_id->ReadOnly || $t006_saldoawal_list->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_list->akun_id->Lookup->getParamTag($t006_saldoawal_list, "p_x" . $t006_saldoawal_list->RowIndex . "_akun_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_list->akun_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" value="<?php echo $t006_saldoawal_list->akun_id->CurrentValue ?>"<?php echo $t006_saldoawal_list->akun_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_akun_id" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_akun_id" value="<?php echo HtmlEncode($t006_saldoawal_list->akun_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_saldoawal_list->debet->Visible) { // debet ?>
		<td data-name="debet">
<span id="el$rowindex$_t006_saldoawal_debet" class="form-group t006_saldoawal_debet">
<input type="text" data-table="t006_saldoawal" data-field="x_debet" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_debet" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->debet->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->debet->EditValue ?>"<?php echo $t006_saldoawal_list->debet->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_debet" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_debet" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_debet" value="<?php echo HtmlEncode($t006_saldoawal_list->debet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_saldoawal_list->kredit->Visible) { // kredit ?>
		<td data-name="kredit">
<span id="el$rowindex$_t006_saldoawal_kredit" class="form-group t006_saldoawal_kredit">
<input type="text" data-table="t006_saldoawal" data-field="x_kredit" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->kredit->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->kredit->EditValue ?>"<?php echo $t006_saldoawal_list->kredit->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_kredit" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_kredit" value="<?php echo HtmlEncode($t006_saldoawal_list->kredit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_saldoawal_list->saldo->Visible) { // saldo ?>
		<td data-name="saldo">
<span id="el$rowindex$_t006_saldoawal_saldo" class="form-group t006_saldoawal_saldo">
<input type="text" data-table="t006_saldoawal" data-field="x_saldo" name="x<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" id="x<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_list->saldo->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_list->saldo->EditValue ?>"<?php echo $t006_saldoawal_list->saldo->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_saldoawal" data-field="x_saldo" name="o<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" id="o<?php echo $t006_saldoawal_list->RowIndex ?>_saldo" value="<?php echo HtmlEncode($t006_saldoawal_list->saldo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_saldoawal_list->ListOptions->render("body", "right", $t006_saldoawal_list->RowIndex);
?>
<script>
loadjs.ready(["ft006_saldoawallist", "load"], function() {
	ft006_saldoawallist.updateLists(<?php echo $t006_saldoawal_list->RowIndex ?>);
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
<?php if ($t006_saldoawal_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t006_saldoawal_list->FormKeyCountName ?>" id="<?php echo $t006_saldoawal_list->FormKeyCountName ?>" value="<?php echo $t006_saldoawal_list->KeyCount ?>">
<?php echo $t006_saldoawal_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t006_saldoawal_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t006_saldoawal_list->FormKeyCountName ?>" id="<?php echo $t006_saldoawal_list->FormKeyCountName ?>" value="<?php echo $t006_saldoawal_list->KeyCount ?>">
<?php echo $t006_saldoawal_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t006_saldoawal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t006_saldoawal_list->Recordset)
	$t006_saldoawal_list->Recordset->Close();
?>
<?php if (!$t006_saldoawal_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t006_saldoawal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t006_saldoawal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t006_saldoawal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t006_saldoawal_list->TotalRecords == 0 && !$t006_saldoawal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t006_saldoawal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t006_saldoawal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t006_saldoawal_list->isExport()) { ?>
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
$t006_saldoawal_list->terminate();
?>