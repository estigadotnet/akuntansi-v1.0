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
$t302_userlevels_list = new t302_userlevels_list();

// Run the page
$t302_userlevels_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t302_userlevels_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t302_userlevels_list->isExport()) { ?>
<script>
var ft302_userlevelslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft302_userlevelslist = currentForm = new ew.Form("ft302_userlevelslist", "list");
	ft302_userlevelslist.formKeyCountName = '<?php echo $t302_userlevels_list->FormKeyCountName ?>';
	loadjs.done("ft302_userlevelslist");
});
var ft302_userlevelslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft302_userlevelslistsrch = currentSearchForm = new ew.Form("ft302_userlevelslistsrch");

	// Dynamic selection lists
	// Filters

	ft302_userlevelslistsrch.filterList = <?php echo $t302_userlevels_list->getFilterList() ?>;
	loadjs.done("ft302_userlevelslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t302_userlevels_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t302_userlevels_list->TotalRecords > 0 && $t302_userlevels_list->ExportOptions->visible()) { ?>
<?php $t302_userlevels_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t302_userlevels_list->ImportOptions->visible()) { ?>
<?php $t302_userlevels_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t302_userlevels_list->SearchOptions->visible()) { ?>
<?php $t302_userlevels_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t302_userlevels_list->FilterOptions->visible()) { ?>
<?php $t302_userlevels_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t302_userlevels_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t302_userlevels_list->isExport() && !$t302_userlevels->CurrentAction) { ?>
<form name="ft302_userlevelslistsrch" id="ft302_userlevelslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft302_userlevelslistsrch-search-panel" class="<?php echo $t302_userlevels_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t302_userlevels">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t302_userlevels_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t302_userlevels_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t302_userlevels_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t302_userlevels_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t302_userlevels_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t302_userlevels_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t302_userlevels_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t302_userlevels_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t302_userlevels_list->showPageHeader(); ?>
<?php
$t302_userlevels_list->showMessage();
?>
<?php if ($t302_userlevels_list->TotalRecords > 0 || $t302_userlevels->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t302_userlevels_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t302_userlevels">
<form name="ft302_userlevelslist" id="ft302_userlevelslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t302_userlevels">
<div id="gmp_t302_userlevels" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t302_userlevels_list->TotalRecords > 0 || $t302_userlevels_list->isGridEdit()) { ?>
<table id="tbl_t302_userlevelslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t302_userlevels->RowType = ROWTYPE_HEADER;

// Render list options
$t302_userlevels_list->renderListOptions();

// Render list options (header, left)
$t302_userlevels_list->ListOptions->render("header", "left");
?>
<?php if ($t302_userlevels_list->userlevelid->Visible) { // userlevelid ?>
	<?php if ($t302_userlevels_list->SortUrl($t302_userlevels_list->userlevelid) == "") { ?>
		<th data-name="userlevelid" class="<?php echo $t302_userlevels_list->userlevelid->headerCellClass() ?>"><div id="elh_t302_userlevels_userlevelid" class="t302_userlevels_userlevelid"><div class="ew-table-header-caption"><?php echo $t302_userlevels_list->userlevelid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelid" class="<?php echo $t302_userlevels_list->userlevelid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t302_userlevels_list->SortUrl($t302_userlevels_list->userlevelid) ?>', 2);"><div id="elh_t302_userlevels_userlevelid" class="t302_userlevels_userlevelid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t302_userlevels_list->userlevelid->caption() ?></span><span class="ew-table-header-sort"><?php if ($t302_userlevels_list->userlevelid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t302_userlevels_list->userlevelid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t302_userlevels_list->userlevelname->Visible) { // userlevelname ?>
	<?php if ($t302_userlevels_list->SortUrl($t302_userlevels_list->userlevelname) == "") { ?>
		<th data-name="userlevelname" class="<?php echo $t302_userlevels_list->userlevelname->headerCellClass() ?>"><div id="elh_t302_userlevels_userlevelname" class="t302_userlevels_userlevelname"><div class="ew-table-header-caption"><?php echo $t302_userlevels_list->userlevelname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelname" class="<?php echo $t302_userlevels_list->userlevelname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t302_userlevels_list->SortUrl($t302_userlevels_list->userlevelname) ?>', 2);"><div id="elh_t302_userlevels_userlevelname" class="t302_userlevels_userlevelname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t302_userlevels_list->userlevelname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t302_userlevels_list->userlevelname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t302_userlevels_list->userlevelname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t302_userlevels_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t302_userlevels_list->ExportAll && $t302_userlevels_list->isExport()) {
	$t302_userlevels_list->StopRecord = $t302_userlevels_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t302_userlevels_list->TotalRecords > $t302_userlevels_list->StartRecord + $t302_userlevels_list->DisplayRecords - 1)
		$t302_userlevels_list->StopRecord = $t302_userlevels_list->StartRecord + $t302_userlevels_list->DisplayRecords - 1;
	else
		$t302_userlevels_list->StopRecord = $t302_userlevels_list->TotalRecords;
}
$t302_userlevels_list->RecordCount = $t302_userlevels_list->StartRecord - 1;
if ($t302_userlevels_list->Recordset && !$t302_userlevels_list->Recordset->EOF) {
	$t302_userlevels_list->Recordset->moveFirst();
	$selectLimit = $t302_userlevels_list->UseSelectLimit;
	if (!$selectLimit && $t302_userlevels_list->StartRecord > 1)
		$t302_userlevels_list->Recordset->move($t302_userlevels_list->StartRecord - 1);
} elseif (!$t302_userlevels->AllowAddDeleteRow && $t302_userlevels_list->StopRecord == 0) {
	$t302_userlevels_list->StopRecord = $t302_userlevels->GridAddRowCount;
}

// Initialize aggregate
$t302_userlevels->RowType = ROWTYPE_AGGREGATEINIT;
$t302_userlevels->resetAttributes();
$t302_userlevels_list->renderRow();
while ($t302_userlevels_list->RecordCount < $t302_userlevels_list->StopRecord) {
	$t302_userlevels_list->RecordCount++;
	if ($t302_userlevels_list->RecordCount >= $t302_userlevels_list->StartRecord) {
		$t302_userlevels_list->RowCount++;

		// Set up key count
		$t302_userlevels_list->KeyCount = $t302_userlevels_list->RowIndex;

		// Init row class and style
		$t302_userlevels->resetAttributes();
		$t302_userlevels->CssClass = "";
		if ($t302_userlevels_list->isGridAdd()) {
		} else {
			$t302_userlevels_list->loadRowValues($t302_userlevels_list->Recordset); // Load row values
		}
		$t302_userlevels->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t302_userlevels->RowAttrs->merge(["data-rowindex" => $t302_userlevels_list->RowCount, "id" => "r" . $t302_userlevels_list->RowCount . "_t302_userlevels", "data-rowtype" => $t302_userlevels->RowType]);

		// Render row
		$t302_userlevels_list->renderRow();

		// Render list options
		$t302_userlevels_list->renderListOptions();
?>
	<tr <?php echo $t302_userlevels->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t302_userlevels_list->ListOptions->render("body", "left", $t302_userlevels_list->RowCount);
?>
	<?php if ($t302_userlevels_list->userlevelid->Visible) { // userlevelid ?>
		<td data-name="userlevelid" <?php echo $t302_userlevels_list->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t302_userlevels_list->RowCount ?>_t302_userlevels_userlevelid">
<span<?php echo $t302_userlevels_list->userlevelid->viewAttributes() ?>><?php echo $t302_userlevels_list->userlevelid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t302_userlevels_list->userlevelname->Visible) { // userlevelname ?>
		<td data-name="userlevelname" <?php echo $t302_userlevels_list->userlevelname->cellAttributes() ?>>
<span id="el<?php echo $t302_userlevels_list->RowCount ?>_t302_userlevels_userlevelname">
<span<?php echo $t302_userlevels_list->userlevelname->viewAttributes() ?>><?php echo $t302_userlevels_list->userlevelname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t302_userlevels_list->ListOptions->render("body", "right", $t302_userlevels_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t302_userlevels_list->isGridAdd())
		$t302_userlevels_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t302_userlevels->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t302_userlevels_list->Recordset)
	$t302_userlevels_list->Recordset->Close();
?>
<?php if (!$t302_userlevels_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t302_userlevels_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t302_userlevels_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t302_userlevels_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t302_userlevels_list->TotalRecords == 0 && !$t302_userlevels->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t302_userlevels_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t302_userlevels_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t302_userlevels_list->isExport()) { ?>
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
$t302_userlevels_list->terminate();
?>