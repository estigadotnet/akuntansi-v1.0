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
$t303_userlevelpermissions_list = new t303_userlevelpermissions_list();

// Run the page
$t303_userlevelpermissions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t303_userlevelpermissions_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t303_userlevelpermissions_list->isExport()) { ?>
<script>
var ft303_userlevelpermissionslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft303_userlevelpermissionslist = currentForm = new ew.Form("ft303_userlevelpermissionslist", "list");
	ft303_userlevelpermissionslist.formKeyCountName = '<?php echo $t303_userlevelpermissions_list->FormKeyCountName ?>';
	loadjs.done("ft303_userlevelpermissionslist");
});
var ft303_userlevelpermissionslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft303_userlevelpermissionslistsrch = currentSearchForm = new ew.Form("ft303_userlevelpermissionslistsrch");

	// Dynamic selection lists
	// Filters

	ft303_userlevelpermissionslistsrch.filterList = <?php echo $t303_userlevelpermissions_list->getFilterList() ?>;
	loadjs.done("ft303_userlevelpermissionslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t303_userlevelpermissions_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t303_userlevelpermissions_list->TotalRecords > 0 && $t303_userlevelpermissions_list->ExportOptions->visible()) { ?>
<?php $t303_userlevelpermissions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t303_userlevelpermissions_list->ImportOptions->visible()) { ?>
<?php $t303_userlevelpermissions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t303_userlevelpermissions_list->SearchOptions->visible()) { ?>
<?php $t303_userlevelpermissions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t303_userlevelpermissions_list->FilterOptions->visible()) { ?>
<?php $t303_userlevelpermissions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t303_userlevelpermissions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t303_userlevelpermissions_list->isExport() && !$t303_userlevelpermissions->CurrentAction) { ?>
<form name="ft303_userlevelpermissionslistsrch" id="ft303_userlevelpermissionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft303_userlevelpermissionslistsrch-search-panel" class="<?php echo $t303_userlevelpermissions_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t303_userlevelpermissions">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t303_userlevelpermissions_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t303_userlevelpermissions_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t303_userlevelpermissions_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t303_userlevelpermissions_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t303_userlevelpermissions_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t303_userlevelpermissions_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t303_userlevelpermissions_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t303_userlevelpermissions_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t303_userlevelpermissions_list->showPageHeader(); ?>
<?php
$t303_userlevelpermissions_list->showMessage();
?>
<?php if ($t303_userlevelpermissions_list->TotalRecords > 0 || $t303_userlevelpermissions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t303_userlevelpermissions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t303_userlevelpermissions">
<form name="ft303_userlevelpermissionslist" id="ft303_userlevelpermissionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t303_userlevelpermissions">
<div id="gmp_t303_userlevelpermissions" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t303_userlevelpermissions_list->TotalRecords > 0 || $t303_userlevelpermissions_list->isGridEdit()) { ?>
<table id="tbl_t303_userlevelpermissionslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t303_userlevelpermissions->RowType = ROWTYPE_HEADER;

// Render list options
$t303_userlevelpermissions_list->renderListOptions();

// Render list options (header, left)
$t303_userlevelpermissions_list->ListOptions->render("header", "left");
?>
<?php if ($t303_userlevelpermissions_list->userlevelid->Visible) { // userlevelid ?>
	<?php if ($t303_userlevelpermissions_list->SortUrl($t303_userlevelpermissions_list->userlevelid) == "") { ?>
		<th data-name="userlevelid" class="<?php echo $t303_userlevelpermissions_list->userlevelid->headerCellClass() ?>"><div id="elh_t303_userlevelpermissions_userlevelid" class="t303_userlevelpermissions_userlevelid"><div class="ew-table-header-caption"><?php echo $t303_userlevelpermissions_list->userlevelid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelid" class="<?php echo $t303_userlevelpermissions_list->userlevelid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t303_userlevelpermissions_list->SortUrl($t303_userlevelpermissions_list->userlevelid) ?>', 2);"><div id="elh_t303_userlevelpermissions_userlevelid" class="t303_userlevelpermissions_userlevelid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t303_userlevelpermissions_list->userlevelid->caption() ?></span><span class="ew-table-header-sort"><?php if ($t303_userlevelpermissions_list->userlevelid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t303_userlevelpermissions_list->userlevelid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t303_userlevelpermissions_list->_tablename->Visible) { // tablename ?>
	<?php if ($t303_userlevelpermissions_list->SortUrl($t303_userlevelpermissions_list->_tablename) == "") { ?>
		<th data-name="_tablename" class="<?php echo $t303_userlevelpermissions_list->_tablename->headerCellClass() ?>"><div id="elh_t303_userlevelpermissions__tablename" class="t303_userlevelpermissions__tablename"><div class="ew-table-header-caption"><?php echo $t303_userlevelpermissions_list->_tablename->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_tablename" class="<?php echo $t303_userlevelpermissions_list->_tablename->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t303_userlevelpermissions_list->SortUrl($t303_userlevelpermissions_list->_tablename) ?>', 2);"><div id="elh_t303_userlevelpermissions__tablename" class="t303_userlevelpermissions__tablename">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t303_userlevelpermissions_list->_tablename->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t303_userlevelpermissions_list->_tablename->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t303_userlevelpermissions_list->_tablename->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t303_userlevelpermissions_list->permission->Visible) { // permission ?>
	<?php if ($t303_userlevelpermissions_list->SortUrl($t303_userlevelpermissions_list->permission) == "") { ?>
		<th data-name="permission" class="<?php echo $t303_userlevelpermissions_list->permission->headerCellClass() ?>"><div id="elh_t303_userlevelpermissions_permission" class="t303_userlevelpermissions_permission"><div class="ew-table-header-caption"><?php echo $t303_userlevelpermissions_list->permission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="permission" class="<?php echo $t303_userlevelpermissions_list->permission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t303_userlevelpermissions_list->SortUrl($t303_userlevelpermissions_list->permission) ?>', 2);"><div id="elh_t303_userlevelpermissions_permission" class="t303_userlevelpermissions_permission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t303_userlevelpermissions_list->permission->caption() ?></span><span class="ew-table-header-sort"><?php if ($t303_userlevelpermissions_list->permission->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t303_userlevelpermissions_list->permission->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t303_userlevelpermissions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t303_userlevelpermissions_list->ExportAll && $t303_userlevelpermissions_list->isExport()) {
	$t303_userlevelpermissions_list->StopRecord = $t303_userlevelpermissions_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t303_userlevelpermissions_list->TotalRecords > $t303_userlevelpermissions_list->StartRecord + $t303_userlevelpermissions_list->DisplayRecords - 1)
		$t303_userlevelpermissions_list->StopRecord = $t303_userlevelpermissions_list->StartRecord + $t303_userlevelpermissions_list->DisplayRecords - 1;
	else
		$t303_userlevelpermissions_list->StopRecord = $t303_userlevelpermissions_list->TotalRecords;
}
$t303_userlevelpermissions_list->RecordCount = $t303_userlevelpermissions_list->StartRecord - 1;
if ($t303_userlevelpermissions_list->Recordset && !$t303_userlevelpermissions_list->Recordset->EOF) {
	$t303_userlevelpermissions_list->Recordset->moveFirst();
	$selectLimit = $t303_userlevelpermissions_list->UseSelectLimit;
	if (!$selectLimit && $t303_userlevelpermissions_list->StartRecord > 1)
		$t303_userlevelpermissions_list->Recordset->move($t303_userlevelpermissions_list->StartRecord - 1);
} elseif (!$t303_userlevelpermissions->AllowAddDeleteRow && $t303_userlevelpermissions_list->StopRecord == 0) {
	$t303_userlevelpermissions_list->StopRecord = $t303_userlevelpermissions->GridAddRowCount;
}

// Initialize aggregate
$t303_userlevelpermissions->RowType = ROWTYPE_AGGREGATEINIT;
$t303_userlevelpermissions->resetAttributes();
$t303_userlevelpermissions_list->renderRow();
while ($t303_userlevelpermissions_list->RecordCount < $t303_userlevelpermissions_list->StopRecord) {
	$t303_userlevelpermissions_list->RecordCount++;
	if ($t303_userlevelpermissions_list->RecordCount >= $t303_userlevelpermissions_list->StartRecord) {
		$t303_userlevelpermissions_list->RowCount++;

		// Set up key count
		$t303_userlevelpermissions_list->KeyCount = $t303_userlevelpermissions_list->RowIndex;

		// Init row class and style
		$t303_userlevelpermissions->resetAttributes();
		$t303_userlevelpermissions->CssClass = "";
		if ($t303_userlevelpermissions_list->isGridAdd()) {
		} else {
			$t303_userlevelpermissions_list->loadRowValues($t303_userlevelpermissions_list->Recordset); // Load row values
		}
		$t303_userlevelpermissions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t303_userlevelpermissions->RowAttrs->merge(["data-rowindex" => $t303_userlevelpermissions_list->RowCount, "id" => "r" . $t303_userlevelpermissions_list->RowCount . "_t303_userlevelpermissions", "data-rowtype" => $t303_userlevelpermissions->RowType]);

		// Render row
		$t303_userlevelpermissions_list->renderRow();

		// Render list options
		$t303_userlevelpermissions_list->renderListOptions();
?>
	<tr <?php echo $t303_userlevelpermissions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t303_userlevelpermissions_list->ListOptions->render("body", "left", $t303_userlevelpermissions_list->RowCount);
?>
	<?php if ($t303_userlevelpermissions_list->userlevelid->Visible) { // userlevelid ?>
		<td data-name="userlevelid" <?php echo $t303_userlevelpermissions_list->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t303_userlevelpermissions_list->RowCount ?>_t303_userlevelpermissions_userlevelid">
<span<?php echo $t303_userlevelpermissions_list->userlevelid->viewAttributes() ?>><?php echo $t303_userlevelpermissions_list->userlevelid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t303_userlevelpermissions_list->_tablename->Visible) { // tablename ?>
		<td data-name="_tablename" <?php echo $t303_userlevelpermissions_list->_tablename->cellAttributes() ?>>
<span id="el<?php echo $t303_userlevelpermissions_list->RowCount ?>_t303_userlevelpermissions__tablename">
<span<?php echo $t303_userlevelpermissions_list->_tablename->viewAttributes() ?>><?php echo $t303_userlevelpermissions_list->_tablename->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t303_userlevelpermissions_list->permission->Visible) { // permission ?>
		<td data-name="permission" <?php echo $t303_userlevelpermissions_list->permission->cellAttributes() ?>>
<span id="el<?php echo $t303_userlevelpermissions_list->RowCount ?>_t303_userlevelpermissions_permission">
<span<?php echo $t303_userlevelpermissions_list->permission->viewAttributes() ?>><?php echo $t303_userlevelpermissions_list->permission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t303_userlevelpermissions_list->ListOptions->render("body", "right", $t303_userlevelpermissions_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t303_userlevelpermissions_list->isGridAdd())
		$t303_userlevelpermissions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t303_userlevelpermissions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t303_userlevelpermissions_list->Recordset)
	$t303_userlevelpermissions_list->Recordset->Close();
?>
<?php if (!$t303_userlevelpermissions_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t303_userlevelpermissions_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t303_userlevelpermissions_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t303_userlevelpermissions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t303_userlevelpermissions_list->TotalRecords == 0 && !$t303_userlevelpermissions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t303_userlevelpermissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t303_userlevelpermissions_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t303_userlevelpermissions_list->isExport()) { ?>
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
$t303_userlevelpermissions_list->terminate();
?>