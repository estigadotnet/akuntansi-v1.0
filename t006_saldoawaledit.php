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
$t006_saldoawal_edit = new t006_saldoawal_edit();

// Run the page
$t006_saldoawal_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_saldoawal_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft006_saldoawaledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft006_saldoawaledit = currentForm = new ew.Form("ft006_saldoawaledit", "edit");

	// Validate form
	ft006_saldoawaledit.validate = function() {
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
			<?php if ($t006_saldoawal_edit->periode_id->Required) { ?>
				elm = this.getElements("x" + infix + "_periode_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_edit->periode_id->caption(), $t006_saldoawal_edit->periode_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_saldoawal_edit->akun_id->Required) { ?>
				elm = this.getElements("x" + infix + "_akun_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_edit->akun_id->caption(), $t006_saldoawal_edit->akun_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t006_saldoawal_edit->debet->Required) { ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_edit->debet->caption(), $t006_saldoawal_edit->debet->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_saldoawal_edit->debet->errorMessage()) ?>");
			<?php if ($t006_saldoawal_edit->kredit->Required) { ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_edit->kredit->caption(), $t006_saldoawal_edit->kredit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_saldoawal_edit->kredit->errorMessage()) ?>");
			<?php if ($t006_saldoawal_edit->saldo->Required) { ?>
				elm = this.getElements("x" + infix + "_saldo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_edit->saldo->caption(), $t006_saldoawal_edit->saldo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_saldo");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_saldoawal_edit->saldo->errorMessage()) ?>");
			<?php if ($t006_saldoawal_edit->user_id->Required) { ?>
				elm = this.getElements("x" + infix + "_user_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_saldoawal_edit->user_id->caption(), $t006_saldoawal_edit->user_id->RequiredErrorMessage)) ?>");
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
	ft006_saldoawaledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft006_saldoawaledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft006_saldoawaledit.lists["x_periode_id"] = <?php echo $t006_saldoawal_edit->periode_id->Lookup->toClientList($t006_saldoawal_edit) ?>;
	ft006_saldoawaledit.lists["x_periode_id"].options = <?php echo JsonEncode($t006_saldoawal_edit->periode_id->lookupOptions()) ?>;
	ft006_saldoawaledit.lists["x_akun_id"] = <?php echo $t006_saldoawal_edit->akun_id->Lookup->toClientList($t006_saldoawal_edit) ?>;
	ft006_saldoawaledit.lists["x_akun_id"].options = <?php echo JsonEncode($t006_saldoawal_edit->akun_id->lookupOptions()) ?>;
	loadjs.done("ft006_saldoawaledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t006_saldoawal_edit->showPageHeader(); ?>
<?php
$t006_saldoawal_edit->showMessage();
?>
<form name="ft006_saldoawaledit" id="ft006_saldoawaledit" class="<?php echo $t006_saldoawal_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_saldoawal">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t006_saldoawal_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t006_saldoawal_edit->periode_id->Visible) { // periode_id ?>
	<div id="r_periode_id" class="form-group row">
		<label id="elh_t006_saldoawal_periode_id" for="x_periode_id" class="<?php echo $t006_saldoawal_edit->LeftColumnClass ?>"><?php echo $t006_saldoawal_edit->periode_id->caption() ?><?php echo $t006_saldoawal_edit->periode_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_saldoawal_edit->RightColumnClass ?>"><div <?php echo $t006_saldoawal_edit->periode_id->cellAttributes() ?>>
<span id="el_t006_saldoawal_periode_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_periode_id"><?php echo EmptyValue(strval($t006_saldoawal_edit->periode_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_edit->periode_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_edit->periode_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_edit->periode_id->ReadOnly || $t006_saldoawal_edit->periode_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_periode_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_edit->periode_id->Lookup->getParamTag($t006_saldoawal_edit, "p_x_periode_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_periode_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_edit->periode_id->displayValueSeparatorAttribute() ?>" name="x_periode_id" id="x_periode_id" value="<?php echo $t006_saldoawal_edit->periode_id->CurrentValue ?>"<?php echo $t006_saldoawal_edit->periode_id->editAttributes() ?>>
</span>
<?php echo $t006_saldoawal_edit->periode_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_saldoawal_edit->akun_id->Visible) { // akun_id ?>
	<div id="r_akun_id" class="form-group row">
		<label id="elh_t006_saldoawal_akun_id" for="x_akun_id" class="<?php echo $t006_saldoawal_edit->LeftColumnClass ?>"><?php echo $t006_saldoawal_edit->akun_id->caption() ?><?php echo $t006_saldoawal_edit->akun_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_saldoawal_edit->RightColumnClass ?>"><div <?php echo $t006_saldoawal_edit->akun_id->cellAttributes() ?>>
<span id="el_t006_saldoawal_akun_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_akun_id"><?php echo EmptyValue(strval($t006_saldoawal_edit->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t006_saldoawal_edit->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t006_saldoawal_edit->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t006_saldoawal_edit->akun_id->ReadOnly || $t006_saldoawal_edit->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t006_saldoawal_edit->akun_id->Lookup->getParamTag($t006_saldoawal_edit, "p_x_akun_id") ?>
<input type="hidden" data-table="t006_saldoawal" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t006_saldoawal_edit->akun_id->displayValueSeparatorAttribute() ?>" name="x_akun_id" id="x_akun_id" value="<?php echo $t006_saldoawal_edit->akun_id->CurrentValue ?>"<?php echo $t006_saldoawal_edit->akun_id->editAttributes() ?>>
</span>
<?php echo $t006_saldoawal_edit->akun_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_saldoawal_edit->debet->Visible) { // debet ?>
	<div id="r_debet" class="form-group row">
		<label id="elh_t006_saldoawal_debet" for="x_debet" class="<?php echo $t006_saldoawal_edit->LeftColumnClass ?>"><?php echo $t006_saldoawal_edit->debet->caption() ?><?php echo $t006_saldoawal_edit->debet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_saldoawal_edit->RightColumnClass ?>"><div <?php echo $t006_saldoawal_edit->debet->cellAttributes() ?>>
<span id="el_t006_saldoawal_debet">
<input type="text" data-table="t006_saldoawal" data-field="x_debet" name="x_debet" id="x_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_edit->debet->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_edit->debet->EditValue ?>"<?php echo $t006_saldoawal_edit->debet->editAttributes() ?>>
</span>
<?php echo $t006_saldoawal_edit->debet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_saldoawal_edit->kredit->Visible) { // kredit ?>
	<div id="r_kredit" class="form-group row">
		<label id="elh_t006_saldoawal_kredit" for="x_kredit" class="<?php echo $t006_saldoawal_edit->LeftColumnClass ?>"><?php echo $t006_saldoawal_edit->kredit->caption() ?><?php echo $t006_saldoawal_edit->kredit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_saldoawal_edit->RightColumnClass ?>"><div <?php echo $t006_saldoawal_edit->kredit->cellAttributes() ?>>
<span id="el_t006_saldoawal_kredit">
<input type="text" data-table="t006_saldoawal" data-field="x_kredit" name="x_kredit" id="x_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_edit->kredit->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_edit->kredit->EditValue ?>"<?php echo $t006_saldoawal_edit->kredit->editAttributes() ?>>
</span>
<?php echo $t006_saldoawal_edit->kredit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_saldoawal_edit->saldo->Visible) { // saldo ?>
	<div id="r_saldo" class="form-group row">
		<label id="elh_t006_saldoawal_saldo" for="x_saldo" class="<?php echo $t006_saldoawal_edit->LeftColumnClass ?>"><?php echo $t006_saldoawal_edit->saldo->caption() ?><?php echo $t006_saldoawal_edit->saldo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_saldoawal_edit->RightColumnClass ?>"><div <?php echo $t006_saldoawal_edit->saldo->cellAttributes() ?>>
<span id="el_t006_saldoawal_saldo">
<input type="text" data-table="t006_saldoawal" data-field="x_saldo" name="x_saldo" id="x_saldo" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t006_saldoawal_edit->saldo->getPlaceHolder()) ?>" value="<?php echo $t006_saldoawal_edit->saldo->EditValue ?>"<?php echo $t006_saldoawal_edit->saldo->editAttributes() ?>>
</span>
<?php echo $t006_saldoawal_edit->saldo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t006_saldoawal" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t006_saldoawal_edit->id->CurrentValue) ?>">
<?php if (!$t006_saldoawal_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t006_saldoawal_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_saldoawal_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t006_saldoawal_edit->showPageFooter();
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
$t006_saldoawal_edit->terminate();
?>