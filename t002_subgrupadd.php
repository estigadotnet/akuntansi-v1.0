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
$t002_subgrup_add = new t002_subgrup_add();

// Run the page
$t002_subgrup_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_subgrup_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_subgrupadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft002_subgrupadd = currentForm = new ew.Form("ft002_subgrupadd", "add");

	// Validate form
	ft002_subgrupadd.validate = function() {
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
			<?php if ($t002_subgrup_add->grup_id->Required) { ?>
				elm = this.getElements("x" + infix + "_grup_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_subgrup_add->grup_id->caption(), $t002_subgrup_add->grup_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_subgrup_add->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_subgrup_add->kode->caption(), $t002_subgrup_add->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_subgrup_add->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_subgrup_add->nama->caption(), $t002_subgrup_add->nama->RequiredErrorMessage)) ?>");
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
	ft002_subgrupadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_subgrupadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft002_subgrupadd.lists["x_grup_id"] = <?php echo $t002_subgrup_add->grup_id->Lookup->toClientList($t002_subgrup_add) ?>;
	ft002_subgrupadd.lists["x_grup_id"].options = <?php echo JsonEncode($t002_subgrup_add->grup_id->lookupOptions()) ?>;
	loadjs.done("ft002_subgrupadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_subgrup_add->showPageHeader(); ?>
<?php
$t002_subgrup_add->showMessage();
?>
<form name="ft002_subgrupadd" id="ft002_subgrupadd" class="<?php echo $t002_subgrup_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_subgrup">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t002_subgrup_add->IsModal ?>">
<?php if ($t002_subgrup->getCurrentMasterTable() == "t001_grup") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t001_grup">
<input type="hidden" name="fk_id" value="<?php echo $t002_subgrup_add->grup_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t002_subgrup_add->grup_id->Visible) { // grup_id ?>
	<div id="r_grup_id" class="form-group row">
		<label id="elh_t002_subgrup_grup_id" for="x_grup_id" class="<?php echo $t002_subgrup_add->LeftColumnClass ?>"><?php echo $t002_subgrup_add->grup_id->caption() ?><?php echo $t002_subgrup_add->grup_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_subgrup_add->RightColumnClass ?>"><div <?php echo $t002_subgrup_add->grup_id->cellAttributes() ?>>
<?php if ($t002_subgrup_add->grup_id->getSessionValue() != "") { ?>
<span id="el_t002_subgrup_grup_id">
<span<?php echo $t002_subgrup_add->grup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t002_subgrup_add->grup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_grup_id" name="x_grup_id" value="<?php echo HtmlEncode($t002_subgrup_add->grup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t002_subgrup_grup_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_grup_id"><?php echo EmptyValue(strval($t002_subgrup_add->grup_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t002_subgrup_add->grup_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t002_subgrup_add->grup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t002_subgrup_add->grup_id->ReadOnly || $t002_subgrup_add->grup_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_grup_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t002_subgrup_add->grup_id->Lookup->getParamTag($t002_subgrup_add, "p_x_grup_id") ?>
<input type="hidden" data-table="t002_subgrup" data-field="x_grup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t002_subgrup_add->grup_id->displayValueSeparatorAttribute() ?>" name="x_grup_id" id="x_grup_id" value="<?php echo $t002_subgrup_add->grup_id->CurrentValue ?>"<?php echo $t002_subgrup_add->grup_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $t002_subgrup_add->grup_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_subgrup_add->kode->Visible) { // kode ?>
	<div id="r_kode" class="form-group row">
		<label id="elh_t002_subgrup_kode" for="x_kode" class="<?php echo $t002_subgrup_add->LeftColumnClass ?>"><?php echo $t002_subgrup_add->kode->caption() ?><?php echo $t002_subgrup_add->kode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_subgrup_add->RightColumnClass ?>"><div <?php echo $t002_subgrup_add->kode->cellAttributes() ?>>
<span id="el_t002_subgrup_kode">
<input type="text" data-table="t002_subgrup" data-field="x_kode" name="x_kode" id="x_kode" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_add->kode->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_add->kode->EditValue ?>"<?php echo $t002_subgrup_add->kode->editAttributes() ?>>
</span>
<?php echo $t002_subgrup_add->kode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_subgrup_add->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_t002_subgrup_nama" for="x_nama" class="<?php echo $t002_subgrup_add->LeftColumnClass ?>"><?php echo $t002_subgrup_add->nama->caption() ?><?php echo $t002_subgrup_add->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_subgrup_add->RightColumnClass ?>"><div <?php echo $t002_subgrup_add->nama->cellAttributes() ?>>
<span id="el_t002_subgrup_nama">
<input type="text" data-table="t002_subgrup" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t002_subgrup_add->nama->getPlaceHolder()) ?>" value="<?php echo $t002_subgrup_add->nama->EditValue ?>"<?php echo $t002_subgrup_add->nama->editAttributes() ?>>
</span>
<?php echo $t002_subgrup_add->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t002_subgrup_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t002_subgrup_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_subgrup_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t002_subgrup_add->showPageFooter();
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
$t002_subgrup_add->terminate();
?>