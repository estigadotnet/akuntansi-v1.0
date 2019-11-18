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
$t101_jurnal_list = new t101_jurnal_list();

// Run the page
$t101_jurnal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jurnal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_jurnal_list->isExport()) { ?>
<script>
var ft101_jurnallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft101_jurnallist = currentForm = new ew.Form("ft101_jurnallist", "list");
	ft101_jurnallist.formKeyCountName = '<?php echo $t101_jurnal_list->FormKeyCountName ?>';
	loadjs.done("ft101_jurnallist");
});
var ft101_jurnallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft101_jurnallistsrch = currentSearchForm = new ew.Form("ft101_jurnallistsrch");

	// Dynamic selection lists
	// Filters

	ft101_jurnallistsrch.filterList = <?php echo $t101_jurnal_list->getFilterList() ?>;
	loadjs.done("ft101_jurnallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_jurnal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_jurnal_list->TotalRecords > 0 && $t101_jurnal_list->ExportOptions->visible()) { ?>
<?php $t101_jurnal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jurnal_list->ImportOptions->visible()) { ?>
<?php $t101_jurnal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jurnal_list->SearchOptions->visible()) { ?>
<?php $t101_jurnal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t101_jurnal_list->FilterOptions->visible()) { ?>
<?php $t101_jurnal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_jurnal_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t101_jurnal_list->isExport() && !$t101_jurnal->CurrentAction) { ?>
<form name="ft101_jurnallistsrch" id="ft101_jurnallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft101_jurnallistsrch-search-panel" class="<?php echo $t101_jurnal_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t101_jurnal">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t101_jurnal_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t101_jurnal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t101_jurnal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t101_jurnal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t101_jurnal_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t101_jurnal_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t101_jurnal_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t101_jurnal_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t101_jurnal_list->showPageHeader(); ?>
<?php
$t101_jurnal_list->showMessage();
?>
<?php if ($t101_jurnal_list->TotalRecords > 0 || $t101_jurnal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_jurnal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_jurnal">
<?php if (!$t101_jurnal_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t101_jurnal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_jurnal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_jurnal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft101_jurnallist" id="ft101_jurnallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jurnal">
<div id="gmp_t101_jurnal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t101_jurnal_list->TotalRecords > 0 || $t101_jurnal_list->isGridEdit()) { ?>
<table id="tbl_t101_jurnallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_jurnal->RowType = ROWTYPE_HEADER;

// Render list options
$t101_jurnal_list->renderListOptions();

// Render list options (header, left)
$t101_jurnal_list->ListOptions->render("header", "left");
?>
<?php if ($t101_jurnal_list->tipejurnal_id->Visible) { // tipejurnal_id ?>
	<?php if ($t101_jurnal_list->SortUrl($t101_jurnal_list->tipejurnal_id) == "") { ?>
		<th data-name="tipejurnal_id" class="<?php echo $t101_jurnal_list->tipejurnal_id->headerCellClass() ?>"><div id="elh_t101_jurnal_tipejurnal_id" class="t101_jurnal_tipejurnal_id"><div class="ew-table-header-caption"><?php echo $t101_jurnal_list->tipejurnal_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tipejurnal_id" class="<?php echo $t101_jurnal_list->tipejurnal_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_jurnal_list->SortUrl($t101_jurnal_list->tipejurnal_id) ?>', 2);"><div id="elh_t101_jurnal_tipejurnal_id" class="t101_jurnal_tipejurnal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jurnal_list->tipejurnal_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_jurnal_list->tipejurnal_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_jurnal_list->tipejurnal_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jurnal_list->nomer->Visible) { // nomer ?>
	<?php if ($t101_jurnal_list->SortUrl($t101_jurnal_list->nomer) == "") { ?>
		<th data-name="nomer" class="<?php echo $t101_jurnal_list->nomer->headerCellClass() ?>"><div id="elh_t101_jurnal_nomer" class="t101_jurnal_nomer"><div class="ew-table-header-caption"><?php echo $t101_jurnal_list->nomer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nomer" class="<?php echo $t101_jurnal_list->nomer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_jurnal_list->SortUrl($t101_jurnal_list->nomer) ?>', 2);"><div id="elh_t101_jurnal_nomer" class="t101_jurnal_nomer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jurnal_list->nomer->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jurnal_list->nomer->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_jurnal_list->nomer->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_jurnal_list->keterangan->Visible) { // keterangan ?>
	<?php if ($t101_jurnal_list->SortUrl($t101_jurnal_list->keterangan) == "") { ?>
		<th data-name="keterangan" class="<?php echo $t101_jurnal_list->keterangan->headerCellClass() ?>"><div id="elh_t101_jurnal_keterangan" class="t101_jurnal_keterangan"><div class="ew-table-header-caption"><?php echo $t101_jurnal_list->keterangan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="keterangan" class="<?php echo $t101_jurnal_list->keterangan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_jurnal_list->SortUrl($t101_jurnal_list->keterangan) ?>', 2);"><div id="elh_t101_jurnal_keterangan" class="t101_jurnal_keterangan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_jurnal_list->keterangan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_jurnal_list->keterangan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_jurnal_list->keterangan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_jurnal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t101_jurnal_list->ExportAll && $t101_jurnal_list->isExport()) {
	$t101_jurnal_list->StopRecord = $t101_jurnal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t101_jurnal_list->TotalRecords > $t101_jurnal_list->StartRecord + $t101_jurnal_list->DisplayRecords - 1)
		$t101_jurnal_list->StopRecord = $t101_jurnal_list->StartRecord + $t101_jurnal_list->DisplayRecords - 1;
	else
		$t101_jurnal_list->StopRecord = $t101_jurnal_list->TotalRecords;
}
$t101_jurnal_list->RecordCount = $t101_jurnal_list->StartRecord - 1;
if ($t101_jurnal_list->Recordset && !$t101_jurnal_list->Recordset->EOF) {
	$t101_jurnal_list->Recordset->moveFirst();
	$selectLimit = $t101_jurnal_list->UseSelectLimit;
	if (!$selectLimit && $t101_jurnal_list->StartRecord > 1)
		$t101_jurnal_list->Recordset->move($t101_jurnal_list->StartRecord - 1);
} elseif (!$t101_jurnal->AllowAddDeleteRow && $t101_jurnal_list->StopRecord == 0) {
	$t101_jurnal_list->StopRecord = $t101_jurnal->GridAddRowCount;
}

// Initialize aggregate
$t101_jurnal->RowType = ROWTYPE_AGGREGATEINIT;
$t101_jurnal->resetAttributes();
$t101_jurnal_list->renderRow();
while ($t101_jurnal_list->RecordCount < $t101_jurnal_list->StopRecord) {
	$t101_jurnal_list->RecordCount++;
	if ($t101_jurnal_list->RecordCount >= $t101_jurnal_list->StartRecord) {
		$t101_jurnal_list->RowCount++;

		// Set up key count
		$t101_jurnal_list->KeyCount = $t101_jurnal_list->RowIndex;

		// Init row class and style
		$t101_jurnal->resetAttributes();
		$t101_jurnal->CssClass = "";
		if ($t101_jurnal_list->isGridAdd()) {
		} else {
			$t101_jurnal_list->loadRowValues($t101_jurnal_list->Recordset); // Load row values
		}
		$t101_jurnal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t101_jurnal->RowAttrs->merge(["data-rowindex" => $t101_jurnal_list->RowCount, "id" => "r" . $t101_jurnal_list->RowCount . "_t101_jurnal", "data-rowtype" => $t101_jurnal->RowType]);

		// Render row
		$t101_jurnal_list->renderRow();

		// Render list options
		$t101_jurnal_list->renderListOptions();
?>
	<tr <?php echo $t101_jurnal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_jurnal_list->ListOptions->render("body", "left", $t101_jurnal_list->RowCount);
?>
	<?php if ($t101_jurnal_list->tipejurnal_id->Visible) { // tipejurnal_id ?>
		<td data-name="tipejurnal_id" <?php echo $t101_jurnal_list->tipejurnal_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jurnal_list->RowCount ?>_t101_jurnal_tipejurnal_id">
<span<?php echo $t101_jurnal_list->tipejurnal_id->viewAttributes() ?>><?php echo $t101_jurnal_list->tipejurnal_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jurnal_list->nomer->Visible) { // nomer ?>
		<td data-name="nomer" <?php echo $t101_jurnal_list->nomer->cellAttributes() ?>>
<span id="el<?php echo $t101_jurnal_list->RowCount ?>_t101_jurnal_nomer">
<span<?php echo $t101_jurnal_list->nomer->viewAttributes() ?>><?php echo $t101_jurnal_list->nomer->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_jurnal_list->keterangan->Visible) { // keterangan ?>
		<td data-name="keterangan" <?php echo $t101_jurnal_list->keterangan->cellAttributes() ?>>
<span id="el<?php echo $t101_jurnal_list->RowCount ?>_t101_jurnal_keterangan">
<span<?php echo $t101_jurnal_list->keterangan->viewAttributes() ?>><?php echo $t101_jurnal_list->keterangan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_jurnal_list->ListOptions->render("body", "right", $t101_jurnal_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t101_jurnal_list->isGridAdd())
		$t101_jurnal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t101_jurnal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_jurnal_list->Recordset)
	$t101_jurnal_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_jurnal_list->TotalRecords == 0 && !$t101_jurnal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_jurnal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_jurnal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_jurnal_list->isExport()) { ?>
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
$t101_jurnal_list->terminate();
?>