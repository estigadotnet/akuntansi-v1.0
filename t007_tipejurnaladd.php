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
$t007_tipejurnal_add = new t007_tipejurnal_add();

// Run the page
$t007_tipejurnal_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_tipejurnal_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_tipejurnaladd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft007_tipejurnaladd = currentForm = new ew.Form("ft007_tipejurnaladd", "add");

	// Validate form
	ft007_tipejurnaladd.validate = function() {
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
			<?php if ($t007_tipejurnal_add->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_tipejurnal_add->kode->caption(), $t007_tipejurnal_add->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t007_tipejurnal_add->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_tipejurnal_add->nama->caption(), $t007_tipejurnal_add->nama->RequiredErrorMessage)) ?>");
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
	ft007_tipejurnaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_tipejurnaladd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft007_tipejurnaladd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_tipejurnal_add->showPageHeader(); ?>
<?php
$t007_tipejurnal_add->showMessage();
?>
<form name="ft007_tipejurnaladd" id="ft007_tipejurnaladd" class="<?php echo $t007_tipejurnal_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_tipejurnal">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t007_tipejurnal_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t007_tipejurnal_add->kode->Visible) { // kode ?>
	<div id="r_kode" class="form-group row">
		<label id="elh_t007_tipejurnal_kode" for="x_kode" class="<?php echo $t007_tipejurnal_add->LeftColumnClass ?>"><?php echo $t007_tipejurnal_add->kode->caption() ?><?php echo $t007_tipejurnal_add->kode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_tipejurnal_add->RightColumnClass ?>"><div <?php echo $t007_tipejurnal_add->kode->cellAttributes() ?>>
<span id="el_t007_tipejurnal_kode">
<input type="text" data-table="t007_tipejurnal" data-field="x_kode" name="x_kode" id="x_kode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_tipejurnal_add->kode->getPlaceHolder()) ?>" value="<?php echo $t007_tipejurnal_add->kode->EditValue ?>"<?php echo $t007_tipejurnal_add->kode->editAttributes() ?>>
</span>
<?php echo $t007_tipejurnal_add->kode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_tipejurnal_add->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_t007_tipejurnal_nama" for="x_nama" class="<?php echo $t007_tipejurnal_add->LeftColumnClass ?>"><?php echo $t007_tipejurnal_add->nama->caption() ?><?php echo $t007_tipejurnal_add->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_tipejurnal_add->RightColumnClass ?>"><div <?php echo $t007_tipejurnal_add->nama->cellAttributes() ?>>
<span id="el_t007_tipejurnal_nama">
<input type="text" data-table="t007_tipejurnal" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_tipejurnal_add->nama->getPlaceHolder()) ?>" value="<?php echo $t007_tipejurnal_add->nama->EditValue ?>"<?php echo $t007_tipejurnal_add->nama->editAttributes() ?>>
</span>
<?php echo $t007_tipejurnal_add->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t007_tipejurnal_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t007_tipejurnal_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t007_tipejurnal_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t007_tipejurnal_add->showPageFooter();
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
$t007_tipejurnal_add->terminate();
?>