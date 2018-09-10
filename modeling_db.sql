-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: ModelingTemplate
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dietary_ingredients`
--

DROP TABLE IF EXISTS `dietary_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dietary_ingredients` (
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DataSet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PubID` int(11) NOT NULL,
  `TrialID` int(11) NOT NULL,
  `TrtID` int(11) NOT NULL,
  `IFN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Varvalue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `N` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dietary_ingredients`
--

LOCK TABLES `dietary_ingredients` WRITE;
/*!40000 ALTER TABLE `dietary_ingredients` DISABLE KEYS */;
INSERT INTO `dietary_ingredients` VALUES ('NRC2001131','NRC2001',13,1,1,'2-04-086','Dietary_inclusion ','100','% DM','','',''),('NRC2001131','NRC2001',13,1,2,'2-04-086','Dietary_inclusion ','80.99','% DM','','',''),('NRC2001131','NRC2001',13,1,2,'4-00-672','Dietary_inclusion ','19.01','% DM','','',''),('NRC2001131','NRC2001',13,1,1,'2-04-088','DM','15.7','%','','',''),('NRC2001451','NRC2001',45,1,45,'1-05-175','Dietary_inclusion ','25','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'1-00-071','Dietary_inclusion ','10','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'4-04-383','Dietary_inclusion ','10','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'4-26-023','Dietary_inclusion ','32.75','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'5-09-340','Dietary_inclusion ','10','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'5-02-009','Dietary_inclusion ','5','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'5-05-070','Dietary_inclusion ','0.5','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'4-04-695','Dietary_inclusion ','5','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'6-02-632','Dietary_inclusion ','1','% DM','','',''),('NRC2001451','NRC2001',45,1,45,'6-04-152','Dietary_inclusion ','0.5','% DM','','','');
/*!40000 ALTER TABLE `dietary_ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dietary_nutrients`
--

DROP TABLE IF EXISTS `dietary_nutrients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dietary_nutrients` (
  `DataSet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `PubID` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `TrialID` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `TrtID` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `SubjectID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Varvalue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `N` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `SE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `SD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dietary_nutrients`
--

LOCK TABLES `dietary_nutrients` WRITE;
/*!40000 ALTER TABLE `dietary_nutrients` DISABLE KEYS */;
INSERT INTO `dietary_nutrients` VALUES ('NRC2001','13','1','1','_','DM','15.7','%','','',''),('NRC2001','13','1','1','_','CP','29.7','% DM','','',''),('NRC2001','28','1','11','_','DM','58.1','%','','',''),('NRC2001','28','1','11','_','CP','18.3','% DM','','',''),('NRC2002','28','1','12','_','DM','57.2','%','','',''),('NRC2003','28','1','12','_','CP','17.9','% DM','','',''),('Beltsville','12','1','43','191','DM','92.9','%','','',''),('Beltsville','12','2','43','191','DM','92.9','%','','',''),('Beltsville','12','3','41','191','DM','','%','','',''),('Beltsville','12','4','44','191','DM','97.9','%','','',''),('Beltsville','12','5','43','191','CP','13.6','% DM','','',''),('Beltsville','12','6','43','191','CP','13.6','% DM','','','');
/*!40000 ALTER TABLE `dietary_nutrients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_vitro_datas`
--

DROP TABLE IF EXISTS `in_vitro_datas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_vitro_datas` (
  `DataSet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `PubID` int(11) DEFAULT NULL,
  `TrialID` int(11) DEFAULT NULL,
  `TrtID` int(11) DEFAULT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `PlateID` int(11) DEFAULT NULL,
  `WellID` int(11) DEFAULT NULL,
  `SubTrtID` int(11) DEFAULT NULL,
  `Site_sample` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Cell_Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Day_Sample` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Time_Sample` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarValue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `N` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_vitro_datas`
--

LOCK TABLES `in_vitro_datas` WRITE;
/*!40000 ALTER TABLE `in_vitro_datas` DISABLE KEYS */;
INSERT INTO `in_vitro_datas` VALUES ('VT',1,NULL,1,1,1,1,1,'mammary','epithelial','','','cell_weight','1.0507','g','','','0.05','Cell_viability'),('VT',1,NULL,2,2,2,2,1,'mammary','epithelial','20','','ACC','0.11','log','','','','Genes_expression'),('TX',NULL,1,1,NULL,1,1,101,'muscle','myoblasts','20','','DNA','0.6','g','','','','DNA_concentration '),('TX',NULL,1,1,NULL,2,2,102,'liver','hepatocyte','60','','cell_weight','1.5713','g','','','','Cell_viability'),('TX',NULL,1,1,NULL,3,3,103,'muscle','myoblasts','60','','DNA','2.12','g','','','','DNA_concentration '),('FL',1,NULL,1,NULL,1,1,1,'liver','hepatocyte','20','','ACC','0.06','log mean','',' 0·07','','Genes_expression'),('FL',1,NULL,2,NULL,2,2,2,'mammary','epithelial','40','','FAS','0.18','Log10','',' 0·34','','Enzyme_activity '),('MO',NULL,5,1,NULL,1,1,1,'small intestine','Lactobacillus_reuteri','60','','Xylanase_secretion','2·78 ',' U/m','',' 0·25 ','','Enzyme_activity '),('MO',NULL,5,2,NULL,2,2,2,'small intestine','Lactobacillus_reuteri','60','','Coliforms_growth','7·91','log cfu/g','',' 0·29','','Growth_microflora '),('CA',6,NULL,1,NULL,1,1,1,'rumen','Ruminococcus _flavefaciens','60','0','growth_rate','0.08','','','','','Growth_bacteria'),('CA',6,NULL,1,NULL,2,2,1,'rumen','Ruminococcus _flavefaciens','60','2','growth_rate','0.1','','','','','Growth_bacteria'),('CA',6,NULL,1,NULL,3,3,1,'rumen','Ruminococcus _flavefaciens','60','4','growth_rate','0.07','','','','','Growth_bacteria'),('CA',6,NULL,1,NULL,4,4,1,'rumen','Ruminococcus _flavefaciens','60','6','growth_rate','0.04','','','','','Growth_bacteria');
/*!40000 ALTER TABLE `in_vitro_datas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infusions`
--

DROP TABLE IF EXISTS `infusions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infusions` (
  `DataSet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PubID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrialID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrtID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SubjectID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InfusionLocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarValue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DayofPeriodStart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DayofPeriodStop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TimeofDayStart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TimeofDayStop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infusions`
--

LOCK TABLES `infusions` WRITE;
/*!40000 ALTER TABLE `infusions` DISABLE KEYS */;
INSERT INTO `infusions` VALUES ('VT','1','','1','1','Abomasum','Glucose','500','g/d','10','14','7:00','14:00'),('VT','1','','1','1','Abomasum','Glucose','500','g/d','10','14','7:00','14:00'),('VT','1','','1','1','Abomasum','Glucose','500','g/d','10','14','7:00','14:00');
/*!40000 ALTER TABLE `infusions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labels` (
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PotentialTable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labels`
--

LOCK TABLES `labels` WRITE;
/*!40000 ALTER TABLE `labels` DISABLE KEYS */;
INSERT INTO `labels` VALUES ('DataSetName','','1'),('Availability','','1'),('Reference','','1'),('Year','','1'),('DataType','','1'),('Location ','','1'),('Dietary_inclusion ','% DM','2'),('IngredientName','','2'),('DM','%','2 and 3'),('OM','% DM ','2 and 3'),('CP','% DM ','2 and 3'),('RUP','% CP','2 and 3'),('RDP','% CP','2 and 3'),('SolN','% DM ','2 and 3'),('N','% DM ','2 and 3'),('C','% DM ','2 and 3'),('EE','% DM ','2 and 3'),('FA ','% DM ','2 and 3'),('CFiber','% DM ','2 and 3'),('NDF','% DM ','2 and 3'),('ADF','% DM ','2 and 3'),('HC','% DM ','2 and 3'),('Cel','% DM ','2 and 3'),('Lignin','% DM ','2 and 3'),('Starch','% DM ','2 and 3'),('NFC','% DM ','2 and 3'),('SolRes','% DM ','2 and 3'),('NFE','% DM ','2 and 3'),('NDSA','% DM ','2 and 3'),('GE','Mcal/kg','2 and 3'),('TDN','% DM ','2 and 3'),('DE','Mcal/kg DM','2 and 3'),('ME','Mcal/kg DM','2 and 3'),('NEm','Mcal/kg DM','2 and 3'),('NEg','Mcal/kg DM','2 and 3'),('NEl','Mcal/kg DM','2 and 3'),('Ash','% DM ','2 and 3'),('Ca','% DM ','2 and 3'),('P','% DM ','2 and 3'),('Mg','% DM ','2 and 3'),('K','% DM ','2 and 3'),('Na','% DM ','2 and 3'),('Cl','% DM ','2 and 3'),('S','% DM ','2 and 3'),('Lys ','% DM, %MP, % CP','2 and 3'),('Arg  ','% DM, %MP, % CP','2 and 3'),('His  ','% DM, %MP, % CP','2 and 3'),('Ile  ','% DM, %MP, % CP','2 and 3'),('Leu  ','% DM, %MP, % CP','2 and 3'),('Met  ','% DM, %MP, % CP','2 and 3'),('CyS ','% DM, %MP, % CP','2 and 3'),('Phe','% DM, %MP, % CP','2 and 3'),('Tyr','% DM, %MP, % CP','2 and 3'),('Thr  ','% DM, %MP, % CP','2 and 3'),('Trp','% DM, %MP, % CP','2 and 3'),('Val  ','% DM, %MP, % CP','2 and 3'),('C12:0','% FA, % EE, % DM','2 and 3'),('C14:0','% FA, % EE, % DM','2 and 3'),('C16:0','% FA, % EE, % DM','2 and 3'),('C16:1','% FA, % EE, % DM','2 and 3'),('C18:0','% FA, % EE, % DM','2 and 3'),('C18:1trans','% FA, % EE, % DM','2 and 3'),('C18:1cis','% FA, % EE, % DM','2 and 3'),('C18:2c','% FA, % EE, % DM','2 and 3'),('C18:3','% FA, % EE, % DM','2 and 3'),('C20:0','% FA, % EE, % DM','2 and 3'),('OthersFA','% FA, % EE, % DM','2 and 3'),('Species','','4'),('Breed','','4'),('Age','','4'),('GeneticID','','4'),('Sex','','4'),('DateBirth','mmddyyyy','4'),('DateDeath','mmddyyyy','4'),('AgeWeaning','m','4'),('PhysiologicStage','','4'),('LactationNumber','','4'),('DaysInMilk','d','4'),('DaysInGestation','d','4'),('TrtName','','5'),('TrtDescription','','5'),('TrtQuantLevel','','5'),('TrtStart','','5'),('TrtStop','','5'),('Design','','5'),('N_Treatments','','5'),('N_Period','','5'),('LenghtPeriod','','5'),('DaysonFeed','d','5'),('DMI','kg/d','5'),('OMI','kg/d','5'),('DMIPast','kg/d','5'),('WI','kg/d','5'),('rAcet','molar % of VFA','5'),('rButr','molar % of VFA','5'),('riButr','molar % of VFA','5'),('riVal','molar % of VFA','5'),('rNH3','mmol/L','5'),('rpH','log','5'),('rProp','molar % of VFA','5'),('rVFA','mmol/L','5'),('rMass_Liq','kg','5'),('rMass_Sol','kg','5'),('rMass','kg','5'),('rMass_Sol','kg','5'),('rMass','kg','5'),('rDM','kg','5'),('rOM_Liq','kg','5'),('rOM_Sol','kg','5'),('rOM','kg','5'),('rOM_Mic','kg','5'),('rNDF','kg','5'),('riNDF','kg','5'),('rADF','kg','5'),('rLg','kg','5'),('rSt','kg','5'),('rNSC_Liq','kg','5'),('rNSC_Sol','kg','5'),('rNg_Liq','g','5'),('rNg_Sol','g','5'),('rNg','g','5'),('rNANg_Liq','g','5'),('rNANg_Sol','g','5'),('rNANg','g','5'),('rMiNg_Liq','g','5'),('rMiNg_Sol','g','5'),('rMiNg','g','5'),('LiqMarker','--','5'),('SolMarker','--','5'),('MicrMarker','--','5'),('FlowDM','kg/d','5'),('FlowOM','kg/d','5'),('FlowADF','kg/d','5'),('FlowNDF','kg/d','5'),('FlowStar','kg/d','5'),('FlowCrudeFat','kg/d','5'),('FlowFA','kg/d','5'),('FlowN','kg/d','5'),('FlowMicN','kg/d','5'),('FlowNaN','kg/d','5'),('FlowNH3','kg/d','5'),('FlowNaNmN','kg/d','5'),('FecN','kg/d','5'),('N_Exc','kg/d','5'),('N_Ret','kg/d','5'),('FecProd','kg/d','5'),('FecDM','kg/d','5'),('FecGE','kg/d','5'),('FecC','kg/d','5'),('FecEE','kg/d','5'),('FecFA','kg/d','5'),('FecCF','kg/d','5'),('FecAsh','kg/d','5'),('FecOM','kg/d','5'),('FecNDF','kg/d','5'),('FecNDSA','kg/d','5'),('FecADF','kg/d','5'),('FecHC','kg/d','5'),('FecCel','kg/d','5'),('FecLig','kg/d','5'),('FecSil','kg/d','5'),('FecSta','kg/d','5'),('FecSR','kg/d','5'),('FecNFE','kg/d','5'),('GastUrea','kg/d','5'),('FreqMilking','times/d','5'),('Milk','kg/d','5'),('Milk3.5FCM','kg/d','5'),('Milk4FCM','kg/d','5'),('MilkFat','%','5'),('MilkPrt','%','5'),('MilkLac','%','5'),('MilkSolids','%','5'),('MilkSNF','%','5'),('MilkNEL','Mcal/kg of milk','5'),('MilkGE','mcal/d','5'),('MilkN','g/d','5'),('MilkMUN','mg/dl','5'),('MilkSCC','cells/mL','5'),('MilkC','g/d','5'),('InitialBW','kg','5'),('BW','kg','5'),('SBW','kg','5'),('EBW','kg','5'),('MEBW','kg','5'),('HCW','kg','5'),('BCS9','--','5'),('BCS5','--','5'),('TempBody','°F','5'),('HeartRate','Beats/m','5'),('HeightWither','cm','5'),('HeightHip  ','cm','5'),('WidthHip ','cm','5'),('Bodylength ','cm','5'),('HeartGirth ','cm','5'),('ADGPeriod','d','5'),('ADG','kg/d','5'),('EBG','kg/d','5'),('SBG','kg/d','5'),('DOF','d','5'),('CompProt','kg','5'),('CompFat','kg','5'),('CompAsh','kg','5'),('CompWater','kg','5'),('Energy','Mcal/kg DM','5'),('UrineProd','kg/d','5'),('UrineN','kg/d','5'),('UGE','kg/d','5'),('UC','kg/d','5'),('BUN','mg/dl','5'),('NEFA','mEq/L ','5'),('Cholesterol','--','5'),('MME_D','mcal/d','5'),('CBAL_D','g/d','5'),('TPC','g/d','5'),('TFC','g/d','5'),('TFatGE','mcal/d','5'),('TPBGE','mcal/d','5'),('TEBCN','g/d','5'),('HPCN','mcal/d','5'),('EBCN','mcal/d','5'),('TECP_TEP','%','5'),('TEFT_TEP','%','5'),('HPRQ','mcal/d','5'),('EBRQ','mcal/d','5'),('TEBRQ','mcal/d','5'),('HPRQ_CN','mcal/d','5'),('TERQ_CN','mcal/d','5'),('MEBRQ','mcal/d','5'),('MTEBRQ','mcal/d','5'),('MEGTMNT','mcal/d','5'),('TERQ_MEG','mcal/d','5'),('TISN','mcal/d','5'),('TISP','mcal/d','5'),('MTEBN','mcal/d','5'),('MTEBP','mcal/d','5'),('NE85NC','mcal/d','5'),('NECT','mcal/d','5'),('NEMILK','mcal/d','5'),('DE_GEP','%','5'),('ME_GEP','%','5'),('CH4E_GEP','%','5'),('UGE_GEP','%','5'),('FGE_GEP','%','5'),('HPRQ_GEP','%','5'),('TERQ_GEP','%','5'),('NE_GEP','%','5'),('ME_DEP','%','5'),('NE_DEP','%','5'),('CH4E_DEP','%','5'),('UGE_DEP','%','5'),('HPRQ_DEP','%','5'),('NE_MEP','%','5'),('UGE_MEP','%','5'),('CH4E_MEP','%','5'),('HPRQ_MEP','%','5'),('GE_KGDM','Mcal/kg','5'),('DE_KGDM','Mcal/kg','5'),('ME_KGDM','Mcal/kg','5'),('NE_KGDM','Mcal/kg','5'),('ENE_KGDM','Mcal/kg','5'),('NEF_KGDM','mcal/kg','5'),('NE85N_DM','Mcal/d','5'),('RNE73_DM','mcal/d','5'),('RNE85_DM','mcal/d','5'),('LCO2COR','L/d','5'),('LCH4COR','L/d','5'),('LO2COR','L/d','5'),('BWTRES','kg','5'),('GASC','g/d','5'),('CH4GE','Mcal/d','5'),('RQUN','Mcal/d','5'),('CO2C','g/d','5'),('CH4C','g/d','5'),('HPUN','g/d','5'),('WeatherDate','mmddyyyy','5'),('WeatherAverage','d, m, y','5'),('LowT','°C','5'),('HighT','°C','5'),('RH','%','5'),('THI','','5'),('Lat','degrees','5'),('Season','','5'),('LengthDay','h','5'),('GeneName','','6'),('GeneBankNumber','','6'),('PrimerSequence','','6'),('Orientation','','6'),('Ampliconlength','bp','6'),('Primer concentration','nM','6'),('Germination ','log10 cfu/g','6'),('GerminationTime','s, m, h','6'),('GrowthRate','','6'),('MeanAbundance','%','6'),('InfusionStart','hh/mm','6'),('InfusionStop','hh/mm','6'),('PeriodInfusion','h','6'),('PumpNumber','--','6'),('Dose','mol/h , mL/h, g/h','6'),('Volume','L/h, mL/h','6'),('ArterialConc','μmol, mol','6'),('VenousConc','μmol, mol','6'),('BoodFlow','L/h','6'),('KClearance','μmol/h','6');
/*!40000 ALTER TABLE `labels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(6,'2018_04_09_185349_create_study_descriptors_table',2),(7,'2018_04_09_192908_create_dietary_ingredients_table',2),(8,'2018_04_09_193229_create_dietary_nutrients_table',2),(10,'2018_04_09_193629_create_in_vitro_datas_table',2),(11,'2018_04_09_194138_create_labels_table',2),(12,'2018_04_09_194532_create_subjects_table',3),(13,'2018_04_12_214950_create_infusions_table',4),(14,'2018_04_09_193419_create_performance_datas_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performance_datas`
--

DROP TABLE IF EXISTS `performance_datas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `performance_datas` (
  `DataSet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PubID` int(11) NOT NULL,
  `TrialID` int(11) NOT NULL,
  `TrtID` int(11) NOT NULL,
  `SubjectID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Site_Sample` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Day_Sample` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Time_Sample` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarValue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `N` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performance_datas`
--

LOCK TABLES `performance_datas` WRITE;
/*!40000 ALTER TABLE `performance_datas` DISABLE KEYS */;
INSERT INTO `performance_datas` VALUES ('NRC2001',13,1,1,'_','Rumen','_','_','dOMRumA','51.2','kg/d','','','','Digestibility'),('NRC2001',13,1,1,'_','Rumen','_','_','dOMRumA','6.4','%','','','','Digestibility'),('NRC2001',13,1,1,'_','Milk','_','_','MilkPrt','3.1','%','','','','Composition'),('Lofgreen',95,1,1,'191','Emptybody','_','_','HPRQ_DEP','46.062','%','','','','Composition'),('Lofgreen',95,1,2,'191','Emptybody','_','_','iEBProt','46.384','%','','','','Composition'),('Lofgreen',95,1,3,'191','Emptybody','_','_','CompProt','45.659','%','','','','Composition'),('Lofgreen',95,1,4,'192','Emptybody','_','_','iEBProt','46.44','%','','','','Composition'),('Lofgreen',95,1,5,'192','Emptybody','_','_','iEBProt','45.184','%','','','','Composition'),('NRC2001',44,1,1,'_','Rumen','_','_','dOMRumA','65.2','kg/d','','','','Digestibility'),('NRC2001',44,1,1,'_','Rumen','_','_','MilkFat','7.6','%','','','','Digestibility'),('NRC2001',44,1,1,'_','Milk','_','_','DMI','2.8','%','','','','Composition'),('Lofgreen',55,1,1,'191','Emptybody','_','_','iEBProt','47.65','%','','','','Composition'),('Lofgreen',55,1,2,'191','Emptybody','_','_','MilkPrt','45.76','%','','','','Composition'),('Lofgreen',55,1,3,'191','Emptybody','_','_','iEBProt','56.76','%','','','','Composition'),('Lofgreen',55,1,4,'192','Emptybody','_','_','MilkPrt','47.85','%','','','','Composition'),('Lofgreen',66,1,5,'192','Emptybody','_','_','iEBProt','39.765','%','','','','Composition'),('NRC2001',66,1,1,'_','Rumen','_','_','dOMRumA','54.6','kg/d','','','','Digestibility'),('NRC2001',66,1,1,'_','Rumen','_','_','MilkFat','8.5','%','','','','Digestibility'),('NRC2001',66,1,1,'_','Milk','_','_','DMI','2.6','%','','','','Composition'),('Lofgreen',77,1,1,'191','Emptybody','_','_','iEBProt','46.87','%','','','','Composition'),('Lofgreen',77,1,2,'191','Emptybody','_','_','CompProt','41','%','','','','Composition'),('Lofgreen',77,1,3,'191','Emptybody','_','_','MilkPrt','12','%','','','','Composition'),('Lofgreen',77,1,4,'192','Emptybody','_','_','iEBProt','23','%','','','','Composition'),('Lofgreen',77,1,5,'192','Emptybody','_','_','iEBProt','34','%','','','','Composition'),('NRC2001',88,1,1,'_','Rumen','_','_','dOMRumA','54','kg/d','','','','Digestibility'),('NRC2001',88,1,1,'_','Rumen','_','_','MilkFat','4.3','%','','','','Digestibility'),('NRC2001',88,1,1,'_','Milk','_','_','DMI','45','%','','','','Composition'),('Lofgreen',88,1,1,'191','Emptybody','_','_','iEBProt','45.67','%','','','','Composition'),('Lofgreen',99,1,2,'191','Emptybody','_','_','HPRQ_DEP','64.6','%','','','','Composition'),('Lofgreen',99,1,3,'191','Emptybody','_','_','MilkPrt','43.456','%','','','','Composition'),('Lofgreen',99,1,4,'192','Emptybody','_','_','iEBProt','54.1','%','','','','Composition'),('Lofgreen',99,1,5,'192','Emptybody','_','_','CompProt','37.98','%','','','','Composition');
/*!40000 ALTER TABLE `performance_datas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_descriptors`
--

DROP TABLE IF EXISTS `study_descriptors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `study_descriptors` (
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DataSet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `PubID` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrialID` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `VarValue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_descriptors`
--

LOCK TABLES `study_descriptors` WRITE;
/*!40000 ALTER TABLE `study_descriptors` DISABLE KEYS */;
INSERT INTO `study_descriptors` VALUES ('NRC200111','NRC2001','1','1','Acknowledgement','Committee NRC 2001, Mark Hanigan VT','_'),('NRC200111','NRC2001','1','1','Reference','Omara et al., 1997.  JDS 80:  2466-2474','_'),('NRC200111','NRC2001','1','1','Year','1997','year'),('NRC200111','NRC2001','1','1','Location ','Ireland','_'),('NRC2001241','NRC2001','24','1','Acknowledgement','Committee NRC 2001, Mark Hanigan VT','_'),('NRC2001241','NRC2001','24','1','Reference','Mabjeesh et al., 1996.  JDS 79:  1792-1801','_'),('NRC2001241','NRC2001','24','1','Year','1996','year'),('NRC2001241','NRC2001','24','1','Location ','Hebrew','_'),('NRC2001131','NRC2001','13','1','Acknowledgement','Committee NRC 2001, Mark Hanigan VT','_'),('NRC2001131','NRC2001','13','1','Reference','Hobbiton et al., 1998.  JDS 80:  2466-2474','_'),('NRC2001131','NRC2001','13','1','Year','1998','year'),('NRC2001131','NRC2001','13','1','Location ','Ireland','_'),('NRC2001451','NRC2001','45','1','Acknowledgement','Committee NRC 2001, Mark Hanigan VT','_'),('NRC2001451','NRC2001','45','1','Reference','Clifford et al., 2001.  JDS 79:  1792-1801','_'),('NRC2001451','NRC2001','45','1','Year','2001','year'),('NRC2001451','NRC2001','45','1','Location ','Hebrew','_'),('NRC2001951','NRC2001','95','1','Acknowledgement','Committee NRC 2001, Lyndsay Krites IL','_'),('NRC2001951','NRC2001','95','1','Reference','Gerald et al., 1997.  JDS 80:  2466-2474','_'),('NRC2001951','NRC2001','95','1','Year','1997','year'),('NRC2001951','NRC2001','95','1','Location ','Philo','_'),('NRC2001121','NRC2001','12','1','Acknowledgement','Committee NRC 2001, Connor McManus IL','_'),('NRC2001121','NRC2001','12','1','Reference','Urukai et al., 1996.  JDS 79:  1792-1801','_'),('NRC2001121','NRC2001','12','1','Year','1996','year'),('NRC2001121','NRC2001','12','1','Location ','Urbana','_'),('NRC20011777','NRC2001','17','77','Acknowledgement','Committee NRC 2001, Stacey Poole TN','-'),('NRC20011777','NRC2001','17','77','Reference','CC et al., 1999.  JDS 80:  2466-2474','-'),('NRC20011777','NRC2001','17','77','Year','1999','year'),('NRC20011777','NRC2001','17','77','Location','Europe','-'),('NRC20073398','NRC2007','33','98','Acknowledgement','Committee NRC 2001, Joey Fisher LA','-'),('NRC20073398','NRC2007','33','98','Reference','Tuscaloosa et al., 1995.  JDS 80:  2466-2474','-'),('NRC20073398','NRC2007','33','98','Year','1995','year'),('NRC20073398','NRC2007','33','98','Location','Oakland','-'),('NRC20031937','NRC2003','19','37','Acknowledgement','Committee NRC 2001, Melissa Debbing FL','-'),('NRC20031937','NRC2003','19','37','Reference','Boise et al., 1993.  JDS 80:  2466-2474','-'),('NRC20031937','NRC2003','19','37','Year','1993','year'),('NRC20031937','NRC2003','19','37','Location','Idaho','-');
/*!40000 ALTER TABLE `study_descriptors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `DataSet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PubID` int(11) NOT NULL,
  `TrialID` int(11) NOT NULL,
  `TrtID` int(11) NOT NULL,
  `SubjectID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Varvalue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VarUnits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `N` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES ('NRC2001',13,1,1,'_','Species','Bovine','_','','',''),('NRC2001',13,1,1,'_','GeneticID','00X11','_','','',''),('NRC2001',13,1,1,'_','Breed','Holstein','_','','',''),('NRC2001',13,1,1,'_','Sex','female','_','','',''),('NRC2002',13,1,1,'_','LactationNumber','3','_','','',''),('NRC2003',13,1,1,'_','DaysInMilk','68','days','','',''),('Beltsville',12,1,43,'191','Species','Bovine','_','','',''),('Beltsville',12,1,43,'191','GeneticID','00X12','_','','',''),('Beltsville',12,1,43,'191','Breed','Holstein','_','','',''),('Beltsville',12,1,43,'191','Sex','female','_','','',''),('Beltsville',12,1,43,'191','LactationNumber','6','_','','',''),('Beltsville',12,1,43,'191','DaysInMilk','120','days','','','');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jonathan Bowman','jonathan@surface51.com','$2y$10$4J3ST2muDsX.A4pZdJQKNek7dR7JFEkyWQq19FIjsLE4zr488aZP.','cZ2oavttXXKxDkHUz2xRnaZuofvc50GVQdPF7YA46sWTFJGD3N1eqdm92MJr','2018-04-23 19:30:34','2018-04-23 19:30:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-02 14:07:51
