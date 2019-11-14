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
$t004_akun_edit = new t004_akun_edit();

// Run the page
$t004_akun_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_akun_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_akunedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft004_akunedit = currentForm = new ew.Form("ft004_akunedit", "edit");

	// Validate form
	ft004_akunedit.validate = function() {
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
			<?php if ($t004_akun_edit->subgrup_id->Required) { ?>
				elm = this.getElements("x" + infix + "_subgrup_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_akun_edit->subgrup_id->caption(), $t004_akun_edit->subgrup_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_akun_edit->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_akun_edit->kode->caption(), $t004_akun_edit->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_akun_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_akun_edit->nama->caption(), $t004_akun_edit->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_akun_edit->matauang_id->Required) { ?>
				elm = this.getElements("x" + infix + "_matauang_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_akun_edit->matauang_id->caption(), $t004_akun_edit->matauang_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_akun_edit->user_id->Required) { ?>
				elm = this.getElements("x" + infix + "_user_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_akun_edit->user_id->caption(), $t004_akun_edit->user_id->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft004_akunedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft004_akunedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft004_akunedit.lists["x_subgrup_id"] = <?php echo $t004_akun_edit->subgrup_id->Lookup->toClientList($t004_akun_edit) ?>;
	ft004_akunedit.lists["x_subgrup_id"].options = <?php echo JsonEncode($t004_akun_edit->subgrup_id->lookupOptions()) ?>;
	ft004_akunedit.lists["x_matauang_id"] = <?php echo $t004_akun_edit->matauang_id->Lookup->toClientList($t004_akun_edit) ?>;
	ft004_akunedit.lists["x_matauang_id"].options = <?php echo JsonEncode($t004_akun_edit->matauang_id->lookupOptions()) ?>;
	loadjs.done("ft004_akunedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_akun_edit->showPageHeader(); ?>
<?php
$t004_akun_edit->showMessage();
?>
<form name="ft004_akunedit" id="ft004_akunedit" class="<?php echo $t004_akun_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_akun">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t004_akun_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t004_akun_edit->subgrup_id->Visible) { // subgrup_id ?>
	<div id="r_subgrup_id" class="form-group row">
		<label id="elh_t004_akun_subgrup_id" for="x_subgrup_id" class="<?php echo $t004_akun_edit->LeftColumnClass ?>"><?php echo $t004_akun_edit->subgrup_id->caption() ?><?php echo $t004_akun_edit->subgrup_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_akun_edit->RightColumnClass ?>"><div <?php echo $t004_akun_edit->subgrup_id->cellAttributes() ?>>
<span id="el_t004_akun_subgrup_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_subgrup_id"><?php echo EmptyValue(strval($t004_akun_edit->subgrup_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_akun_edit->subgrup_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_akun_edit->subgrup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_akun_edit->subgrup_id->ReadOnly || $t004_akun_edit->subgrup_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_subgrup_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_akun_edit->subgrup_id->Lookup->getParamTag($t004_akun_edit, "p_x_subgrup_id") ?>
<input type="hidden" data-table="t004_akun" data-field="x_subgrup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_akun_edit->subgrup_id->displayValueSeparatorAttribute() ?>" name="x_subgrup_id" id="x_subgrup_id" value="<?php echo $t004_akun_edit->subgrup_id->CurrentValue ?>"<?php echo $t004_akun_edit->subgrup_id->editAttributes() ?>>
</span>
<?php echo $t004_akun_edit->subgrup_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_akun_edit->kode->Visible) { // kode ?>
	<div id="r_kode" class="form-group row">
		<label id="elh_t004_akun_kode" for="x_kode" class="<?php echo $t004_akun_edit->LeftColumnClass ?>"><?php echo $t004_akun_edit->kode->caption() ?><?php echo $t004_akun_edit->kode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_akun_edit->RightColumnClass ?>"><div <?php echo $t004_akun_edit->kode->cellAttributes() ?>>
<span id="el_t004_akun_kode">
<input type="text" data-table="t004_akun" data-field="x_kode" name="x_kode" id="x_kode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t004_akun_edit->kode->getPlaceHolder()) ?>" value="<?php echo $t004_akun_edit->kode->EditValue ?>"<?php echo $t004_akun_edit->kode->editAttributes() ?>>
</span>
<?php echo $t004_akun_edit->kode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_akun_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_t004_akun_nama" for="x_nama" class="<?php echo $t004_akun_edit->LeftColumnClass ?>"><?php echo $t004_akun_edit->nama->caption() ?><?php echo $t004_akun_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_akun_edit->RightColumnClass ?>"><div <?php echo $t004_akun_edit->nama->cellAttributes() ?>>
<span id="el_t004_akun_nama">
<input type="text" data-table="t004_akun" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t004_akun_edit->nama->getPlaceHolder()) ?>" value="<?php echo $t004_akun_edit->nama->EditValue ?>"<?php echo $t004_akun_edit->nama->editAttributes() ?>>
</span>
<?php echo $t004_akun_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_akun_edit->matauang_id->Visible) { // matauang_id ?>
	<div id="r_matauang_id" class="form-group row">
		<label id="elh_t004_akun_matauang_id" for="x_matauang_id" class="<?php echo $t004_akun_edit->LeftColumnClass ?>"><?php echo $t004_akun_edit->matauang_id->caption() ?><?php echo $t004_akun_edit->matauang_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_akun_edit->RightColumnClass ?>"><div <?php echo $t004_akun_edit->matauang_id->cellAttributes() ?>>
<span id="el_t004_akun_matauang_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_matauang_id"><?php echo EmptyValue(strval($t004_akun_edit->matauang_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_akun_edit->matauang_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_akun_edit->matauang_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_akun_edit->matauang_id->ReadOnly || $t004_akun_edit->matauang_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_matauang_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_akun_edit->matauang_id->Lookup->getParamTag($t004_akun_edit, "p_x_matauang_id") ?>
<input type="hidden" data-table="t004_akun" data-field="x_matauang_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_akun_edit->matauang_id->displayValueSeparatorAttribute() ?>" name="x_matauang_id" id="x_matauang_id" value="<?php echo $t004_akun_edit->matauang_id->CurrentValue ?>"<?php echo $t004_akun_edit->matauang_id->editAttributes() ?>>
</span>
<?php echo $t004_akun_edit->matauang_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t004_akun" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t004_akun_edit->id->CurrentValue) ?>">
<?php if (!$t004_akun_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t004_akun_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_akun_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t004_akun_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t004_akun_edit->terminate();
?>