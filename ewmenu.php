<?php
namespace PHPMaker2020\p_akuntansi_v1_0;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(5, "mi_c401_home", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "c401_home.php", -1, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}c401_home.php'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mci_Setup", $MenuLanguage->MenuPhrase("6", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(12, "mi_t005_periode", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "t005_periodelist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t005_periode'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(10, "mi_t003_matauang", $MenuLanguage->MenuPhrase("10", "MenuText"), $MenuRelativePath . "t003_matauanglist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t003_matauang'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(8, "mi_t001_grup", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "t001_gruplist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t001_grup'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(11, "mi_t004_akun", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "t004_akunlist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t004_akun'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(13, "mi_t006_saldoawal", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "t006_saldoawallist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t006_saldoawal'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(14, "mi_t007_tipejurnal", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "t007_tipejurnallist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t007_tipejurnal'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(31, "mci_Transaksi", $MenuLanguage->MenuPhrase("31", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(15, "mi_t101_jurnal", $MenuLanguage->MenuPhrase("15", "MenuText"), $MenuRelativePath . "t101_jurnallist.php", 31, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t101_jurnal'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mci_General", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t301_employees", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t301_employeeslist.php", 7, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t301_employees'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t302_userlevels", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t302_userlevelslist.php", 7, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t302_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t304_audittrail", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t304_audittraillist.php", 7, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t304_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(5, "mi_c401_home", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "c401_home.php", -1, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}c401_home.php'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mci_Setup", $MenuLanguage->MenuPhrase("6", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(12, "mi_t005_periode", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "t005_periodelist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t005_periode'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(10, "mi_t003_matauang", $MenuLanguage->MenuPhrase("10", "MenuText"), $MenuRelativePath . "t003_matauanglist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t003_matauang'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(8, "mi_t001_grup", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "t001_gruplist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t001_grup'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(11, "mi_t004_akun", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "t004_akunlist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t004_akun'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(13, "mi_t006_saldoawal", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "t006_saldoawallist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t006_saldoawal'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(14, "mi_t007_tipejurnal", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "t007_tipejurnallist.php", 6, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t007_tipejurnal'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(31, "mci_Transaksi", $MenuLanguage->MenuPhrase("31", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(15, "mi_t101_jurnal", $MenuLanguage->MenuPhrase("15", "MenuText"), $MenuRelativePath . "t101_jurnallist.php", 31, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t101_jurnal'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mci_General", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t301_employees", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t301_employeeslist.php", 7, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t301_employees'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t302_userlevels", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t302_userlevelslist.php", 7, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t302_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t304_audittrail", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t304_audittraillist.php", 7, "", AllowListMenu('{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t304_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>