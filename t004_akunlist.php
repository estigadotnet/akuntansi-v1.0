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
$t004_akun_list = new t004_akun_list();

// Run the page
$t004_akun_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_akun_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_akun_list->isExport()) { ?>
<script>
var ft004_akunlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft004_akunlist = currentForm = new ew.Form("ft004_akunlist", "list");
	ft004_akunlist.formKeyCountName = '<?php echo $t004_akun_list->FormKeyCountName ?>';
	loadjs.done("ft004_akunlist");
});
var ft004_akunlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft004_akunlistsrch = currentSearchForm = new ew.Form("ft004_akunlistsrch");

	// Dynamic selection lists
	// Filters

	ft004_akunlistsrch.filterList = <?php echo $t004_akun_list->getFilterList() ?>;
	loadjs.done("ft004_akunlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_akun_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t004_akun_list->TotalRecords > 0 && $t004_akun_list->ExportOptions->visible()) { ?>
<?php $t004_akun_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_akun_list->ImportOptions->visible()) { ?>
<?php $t004_akun_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_akun_list->SearchOptions->visible()) { ?>
<?php $t004_akun_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t004_akun_list->FilterOptions->visible()) { ?>
<?php $t004_akun_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t004_akun_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t004_akun_list->isExport() && !$t004_akun->CurrentAction) { ?>
<form name="ft004_akunlistsrch" id="ft004_akunlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft004_akunlistsrch-search-panel" class="<?php echo $t004_akun_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t004_akun">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t004_akun_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t004_akun_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t004_akun_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t004_akun_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t004_akun_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t004_akun_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t004_akun_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t004_akun_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t004_akun_list->showPageHeader(); ?>
<?php
$t004_akun_list->showMessage();
?>
<?php if ($t004_akun_list->TotalRecords > 0 || $t004_akun->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t004_akun_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t004_akun">
<form name="ft004_akunlist" id="ft004_akunlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_akun">
<div id="gmp_t004_akun" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t004_akun_list->TotalRecords > 0 || $t004_akun_list->isGridEdit()) { ?>
<table id="tbl_t004_akunlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t004_akun->RowType = ROWTYPE_HEADER;

// Render list options
$t004_akun_list->renderListOptions();

// Render list options (header, left)
$t004_akun_list->ListOptions->render("header", "left");
?>
<?php if ($t004_akun_list->subgrup_id->Visible) { // subgrup_id ?>
	<?php if ($t004_akun_list->SortUrl($t004_akun_list->subgrup_id) == "") { ?>
		<th data-name="subgrup_id" class="<?php echo $t004_akun_list->subgrup_id->headerCellClass() ?>"><div id="elh_t004_akun_subgrup_id" class="t004_akun_subgrup_id"><div class="ew-table-header-caption"><?php echo $t004_akun_list->subgrup_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="subgrup_id" class="<?php echo $t004_akun_list->subgrup_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_akun_list->SortUrl($t004_akun_list->subgrup_id) ?>', 2);"><div id="elh_t004_akun_subgrup_id" class="t004_akun_subgrup_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_akun_list->subgrup_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_akun_list->subgrup_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_akun_list->subgrup_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_akun_list->kode->Visible) { // kode ?>
	<?php if ($t004_akun_list->SortUrl($t004_akun_list->kode) == "") { ?>
		<th data-name="kode" class="<?php echo $t004_akun_list->kode->headerCellClass() ?>"><div id="elh_t004_akun_kode" class="t004_akun_kode"><div class="ew-table-header-caption"><?php echo $t004_akun_list->kode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode" class="<?php echo $t004_akun_list->kode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_akun_list->SortUrl($t004_akun_list->kode) ?>', 2);"><div id="elh_t004_akun_kode" class="t004_akun_kode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_akun_list->kode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t004_akun_list->kode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_akun_list->kode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_akun_list->nama->Visible) { // nama ?>
	<?php if ($t004_akun_list->SortUrl($t004_akun_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $t004_akun_list->nama->headerCellClass() ?>"><div id="elh_t004_akun_nama" class="t004_akun_nama"><div class="ew-table-header-caption"><?php echo $t004_akun_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $t004_akun_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_akun_list->SortUrl($t004_akun_list->nama) ?>', 2);"><div id="elh_t004_akun_nama" class="t004_akun_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_akun_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t004_akun_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_akun_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_akun_list->matauang_id->Visible) { // matauang_id ?>
	<?php if ($t004_akun_list->SortUrl($t004_akun_list->matauang_id) == "") { ?>
		<th data-name="matauang_id" class="<?php echo $t004_akun_list->matauang_id->headerCellClass() ?>"><div id="elh_t004_akun_matauang_id" class="t004_akun_matauang_id"><div class="ew-table-header-caption"><?php echo $t004_akun_list->matauang_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="matauang_id" class="<?php echo $t004_akun_list->matauang_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_akun_list->SortUrl($t004_akun_list->matauang_id) ?>', 2);"><div id="elh_t004_akun_matauang_id" class="t004_akun_matauang_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_akun_list->matauang_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_akun_list->matauang_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_akun_list->matauang_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t004_akun_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t004_akun_list->ExportAll && $t004_akun_list->isExport()) {
	$t004_akun_list->StopRecord = $t004_akun_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t004_akun_list->TotalRecords > $t004_akun_list->StartRecord + $t004_akun_list->DisplayRecords - 1)
		$t004_akun_list->StopRecord = $t004_akun_list->StartRecord + $t004_akun_list->DisplayRecords - 1;
	else
		$t004_akun_list->StopRecord = $t004_akun_list->TotalRecords;
}
$t004_akun_list->RecordCount = $t004_akun_list->StartRecord - 1;
if ($t004_akun_list->Recordset && !$t004_akun_list->Recordset->EOF) {
	$t004_akun_list->Recordset->moveFirst();
	$selectLimit = $t004_akun_list->UseSelectLimit;
	if (!$selectLimit && $t004_akun_list->StartRecord > 1)
		$t004_akun_list->Recordset->move($t004_akun_list->StartRecord - 1);
} elseif (!$t004_akun->AllowAddDeleteRow && $t004_akun_list->StopRecord == 0) {
	$t004_akun_list->StopRecord = $t004_akun->GridAddRowCount;
}

// Initialize aggregate
$t004_akun->RowType = ROWTYPE_AGGREGATEINIT;
$t004_akun->resetAttributes();
$t004_akun_list->renderRow();
while ($t004_akun_list->RecordCount < $t004_akun_list->StopRecord) {
	$t004_akun_list->RecordCount++;
	if ($t004_akun_list->RecordCount >= $t004_akun_list->StartRecord) {
		$t004_akun_list->RowCount++;

		// Set up key count
		$t004_akun_list->KeyCount = $t004_akun_list->RowIndex;

		// Init row class and style
		$t004_akun->resetAttributes();
		$t004_akun->CssClass = "";
		if ($t004_akun_list->isGridAdd()) {
		} else {
			$t004_akun_list->loadRowValues($t004_akun_list->Recordset); // Load row values
		}
		$t004_akun->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t004_akun->RowAttrs->merge(["data-rowindex" => $t004_akun_list->RowCount, "id" => "r" . $t004_akun_list->RowCount . "_t004_akun", "data-rowtype" => $t004_akun->RowType]);

		// Render row
		$t004_akun_list->renderRow();

		// Render list options
		$t004_akun_list->renderListOptions();
?>
	<tr <?php echo $t004_akun->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_akun_list->ListOptions->render("body", "left", $t004_akun_list->RowCount);
?>
	<?php if ($t004_akun_list->subgrup_id->Visible) { // subgrup_id ?>
		<td data-name="subgrup_id" <?php echo $t004_akun_list->subgrup_id->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_list->RowCount ?>_t004_akun_subgrup_id">
<span<?php echo $t004_akun_list->subgrup_id->viewAttributes() ?>><?php echo $t004_akun_list->subgrup_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_akun_list->kode->Visible) { // kode ?>
		<td data-name="kode" <?php echo $t004_akun_list->kode->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_list->RowCount ?>_t004_akun_kode">
<span<?php echo $t004_akun_list->kode->viewAttributes() ?>><?php echo $t004_akun_list->kode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_akun_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $t004_akun_list->nama->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_list->RowCount ?>_t004_akun_nama">
<span<?php echo $t004_akun_list->nama->viewAttributes() ?>><?php echo $t004_akun_list->nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_akun_list->matauang_id->Visible) { // matauang_id ?>
		<td data-name="matauang_id" <?php echo $t004_akun_list->matauang_id->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_list->RowCount ?>_t004_akun_matauang_id">
<span<?php echo $t004_akun_list->matauang_id->viewAttributes() ?>><?php echo $t004_akun_list->matauang_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_akun_list->ListOptions->render("body", "right", $t004_akun_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t004_akun_list->isGridAdd())
		$t004_akun_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t004_akun->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t004_akun_list->Recordset)
	$t004_akun_list->Recordset->Close();
?>
<?php if (!$t004_akun_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t004_akun_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t004_akun_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t004_akun_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t004_akun_list->TotalRecords == 0 && !$t004_akun->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t004_akun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t004_akun_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_akun_list->isExport()) { ?>
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
$t004_akun_list->terminate();
?>