<?php

/**
 * PHPMaker 2020 user level settings
 */
namespace PHPMaker2020\p_akuntansi_v1_0;

// User level info
$USER_LEVELS = [["-2","Anonymous"],
	["0","Default"]];

// User level priv info
$USER_LEVEL_PRIVS = [["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}c401_home.php","-2","72"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}c401_home.php","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t001_grup","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t001_grup","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t002_subgrup","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t002_subgrup","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t003_matauang","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t003_matauang","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t004_akun","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t004_akun","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t005_periode","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t005_periode","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t006_saldoawal","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t006_saldoawal","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t007_tipejurnal","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t007_tipejurnal","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t101_jurnal","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t101_jurnal","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t102_jurnald","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t102_jurnald","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t301_employees","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t301_employees","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t302_userlevels","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t302_userlevels","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t303_userlevelpermissions","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t303_userlevelpermissions","0","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t304_audittrail","-2","0"],
	["{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}t304_audittrail","0","0"]];

// User level table info
$USER_LEVEL_TABLES = [["c401_home.php","c401_home","Home",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t001_grup","t001_grup","Grup",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t002_subgrup","t002_subgrup","Sub-Grup",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t003_matauang","t003_matauang","Mata Uang",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t004_akun","t004_akun","Akun",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t005_periode","t005_periode","Periode",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t006_saldoawal","t006_saldoawal","Saldo Awal",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t007_tipejurnal","t007_tipejurnal","Tipe Jurnal",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t101_jurnal","t101_jurnal","Jurnal",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t102_jurnald","t102_jurnald","Detail",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t301_employees","t301_employees","User",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t302_userlevels","t302_userlevels","Hak Akses",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t303_userlevelpermissions","t303_userlevelpermissions","Hak Akses - Detail",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"],
	["t304_audittrail","t304_audittrail","Log Aktifitas",true,"{B40DFC22-3B8C-4962-9E6E-E81BB1DAB0F7}"]];