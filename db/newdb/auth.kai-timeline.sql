/*
 Navicat Premium Data Transfer

 Source Server         : postgre-local
 Source Server Type    : PostgreSQL
 Source Server Version : 140004
 Source Host           : 127.0.0.1:5432
 Source Catalog        : kai-timeline
 Source Schema         : auth

 Target Server Type    : PostgreSQL
 Target Server Version : 140004
 File Encoding         : 65001

 Date: 20/07/2022 08:10:32
*/


-- ----------------------------
-- Sequence structure for department_department_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."department_department_id_seq";
CREATE SEQUENCE "auth"."department_department_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for division_division_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."division_division_id_seq";
CREATE SEQUENCE "auth"."division_division_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jabatan_level_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."jabatan_level_id_seq";
CREATE SEQUENCE "auth"."jabatan_level_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for mapping_type_mapping_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."mapping_type_mapping_id_seq";
CREATE SEQUENCE "auth"."mapping_type_mapping_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS "auth"."department";
CREATE TABLE "auth"."department" (
  "department_id" int8 NOT NULL DEFAULT nextval('"auth".department_department_id_seq'::regclass),
  "nomenklatur" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "department_cd" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "division_cd" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_by" int4 NOT NULL,
  "updated_by" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO "auth"."department" VALUES (2, 'Rolling Stock Procurement Department', 'CUGR', 'CUG', 1, 1, '2022-07-16 21:17:33', NULL);
INSERT INTO "auth"."department" VALUES (3, 'Non Rolling Stock Procurement  Department', 'CUGN', 'CUG', 1, 1, '2022-07-16 21:17:33', NULL);
INSERT INTO "auth"."department" VALUES (4, 'Warehouse and Distribution Department', 'CUGW', 'CUG', 1, 1, '2022-07-16 21:17:33', NULL);
INSERT INTO "auth"."department" VALUES (5, 'Information System Planning and Development Department', 'CTIP', 'CTI', 1, 1, '2022-07-16 21:17:33', NULL);
INSERT INTO "auth"."department" VALUES (6, 'Information System Operation Department', 'CTIO', 'CTI', 1, 1, '2022-07-16 21:17:33', NULL);
INSERT INTO "auth"."department" VALUES (7, 'Finance Department', 'CFFF', 'CFF', 1, 1, '2022-07-16 21:25:03', NULL);
INSERT INTO "auth"."department" VALUES (8, 'Revenue Verification Department', 'CFFR', 'CFF', 1, 1, '2022-07-16 21:25:03', NULL);
INSERT INTO "auth"."department" VALUES (9, 'Budget Monitoring and Authorization Department', 'CFAA', 'CFA', 1, 1, '2022-07-16 21:25:03', NULL);
INSERT INTO "auth"."department" VALUES (10, 'Budget Planning and Evaluation Department', 'CFAP', 'CFA', 1, 1, '2022-07-16 21:25:03', NULL);
INSERT INTO "auth"."department" VALUES (11, 'General Accounting Department', 'CFAG', 'CFA', 1, 1, '12022-07-16 21:25:03', NULL);
INSERT INTO "auth"."department" VALUES (12, 'Cost Accounting and Tax Department', 'CFAC', 'CFA', 1, 1, '2022-07-16 21:25:03', NULL);
INSERT INTO "auth"."department" VALUES (13, 'External Relations and Corporate Image Care Department', 'CUSE', 'CUS', 1, 1, '2022-07-17 00:25:42', NULL);
INSERT INTO "auth"."department" VALUES (14, 'Internal Relations and Multimedia Department', 'CUSI', 'CUS', 1, 1, '2022-07-17 00:25:42', NULL);
INSERT INTO "auth"."department" VALUES (15, 'General Affair Department', 'CUSG', 'CUS', 1, 1, '2022-07-17 00:25:42', NULL);
INSERT INTO "auth"."department" VALUES (16, 'Protocol and Documentation Department ', 'CUSP', 'CUS', 1, 1, '2022-07-17 00:25:42', NULL);
INSERT INTO "auth"."department" VALUES (1, 'Logistic Planning, Evaluation, and Import Department', 'CUGP', 'CUG', 1, 1, '2022-07-17 20:52:45', NULL);

-- ----------------------------
-- Table structure for division
-- ----------------------------
DROP TABLE IF EXISTS "auth"."division";
CREATE TABLE "auth"."division" (
  "division_id" int8 NOT NULL DEFAULT nextval('"auth".division_division_id_seq'::regclass),
  "nomenklatur" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "division_cd" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "directorate_cd" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_by" int2 NOT NULL,
  "updated_by" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of division
-- ----------------------------
INSERT INTO "auth"."division" VALUES (17, 'PSO and TAC Division', 'CFP', 'CF', 1, 1, '2022-07-16 15:09:31', NULL);
INSERT INTO "auth"."division" VALUES (1, 'Corporate Secretary Division', 'CUS', 'CU', 1, 1, '2022-07-16 14:46:18', NULL);
INSERT INTO "auth"."division" VALUES (2, 'GRC and Legal  Division', 'CUL', 'CU', 1, 1, '2022-07-16 14:48:19', NULL);
INSERT INTO "auth"."division" VALUES (3, 'Internal Audit Division', 'CUI', 'CU', 1, 1, '2022-07-16 14:48:58', NULL);
INSERT INTO "auth"."division" VALUES (4, 'Logistic Division', 'CUG', 'CU', 1, 1, '2022-07-16 14:50:00', NULL);
INSERT INTO "auth"."division" VALUES (5, 'Strategic Planning Division', 'CUP', 'CU', 1, 1, '2022-07-16 14:50:29', NULL);
INSERT INTO "auth"."division" VALUES (10, 'Information Technology Division', 'CTI', 'CT', 1, 1, '2022-07-16 14:46:18', NULL);
INSERT INTO "auth"."division" VALUES (12, 'Rolling Stock Division', 'CTR', 'CT', 1, 1, '2022-07-16 14:48:58', NULL);
INSERT INTO "auth"."division" VALUES (13, 'Infrastructure Division', 'CTS', 'CT', 1, 1, '2022-07-17 21:11:19', NULL);
INSERT INTO "auth"."division" VALUES (6, 'HSE and Security Division', 'COS', 'CO', 1, 1, '2022-07-17 21:11:22', NULL);
INSERT INTO "auth"."division" VALUES (7, 'Train Operation Division', 'COT', 'CO', 1, 1, '2022-07-16 14:48:19', NULL);
INSERT INTO "auth"."division" VALUES (8, 'Commercial Division', 'COC', 'CO', 1, 1, '2022-07-16 14:48:58', NULL);
INSERT INTO "auth"."division" VALUES (9, 'Train Services Facilities and Customer Care Division', 'COH', 'CO', 1, 1, '2022-07-16 14:50:00', NULL);
INSERT INTO "auth"."division" VALUES (14, 'Finance Division', 'CFF', 'CF', 1, 1, '2022-07-16 15:09:31', NULL);
INSERT INTO "auth"."division" VALUES (15, 'Budgeting and Accounting Division', 'CFA', 'CF', 1, 1, '2022-07-16 15:09:31', NULL);
INSERT INTO "auth"."division" VALUES (16, 'Human Capital Division', 'CFH', 'CF', 1, 1, '2022-07-24 21:11:26', NULL);

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS "auth"."jabatan";
CREATE TABLE "auth"."jabatan" (
  "level_id" int8 NOT NULL DEFAULT nextval('"auth".jabatan_level_id_seq'::regclass),
  "level_cd" varchar(200) COLLATE "pg_catalog"."default",
  "level_name" varchar(20) COLLATE "pg_catalog"."default",
  "level_hierarchy" varchar(20) COLLATE "pg_catalog"."default",
  "created_by" varchar(200) COLLATE "pg_catalog"."default",
  "updated_by" varchar(200) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO "auth"."jabatan" VALUES (1, 'DIR', 'Director', '110', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (2, 'VP', 'Vice President', '100', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (3, 'SMGR', 'Senior Manager', '90', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (4, 'MGR', 'Manager', '80', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (5, 'JMGR', 'Junior Manager', '70', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (6, 'AMGR', 'Assistant Manager', '60', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (7, 'LEV1', 'Level 1', '50', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (8, 'LEV2', 'Level 2', '40', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (9, 'LEV3', 'Level 3', '30', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (10, 'LEV4', 'Level 4', '1', '1', '20', '2022-07-16 22:28:09', NULL);
INSERT INTO "auth"."jabatan" VALUES (11, 'LEV5', 'Level 5', '10', '1', '1', '2022-07-16 22:28:09', NULL);

-- ----------------------------
-- Table structure for mapping_type
-- ----------------------------
DROP TABLE IF EXISTS "auth"."mapping_type";
CREATE TABLE "auth"."mapping_type" (
  "mapping_id" int8 NOT NULL DEFAULT nextval('"auth".mapping_type_mapping_id_seq'::regclass),
  "mapping_cd" int4 NOT NULL,
  "type_column" varchar(200) COLLATE "pg_catalog"."default",
  "mapping_desc" varchar(200) COLLATE "pg_catalog"."default",
  "keterangan" text COLLATE "pg_catalog"."default" NOT NULL,
  "created_by" int4 NOT NULL,
  "updated_by" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of mapping_type
-- ----------------------------
INSERT INTO "auth"."mapping_type" VALUES (1, 1, 'public.trx_timeline.type_tax', 'Pajak Tidak Dipungut', 'keterangan', 1, 1, '2022-07-17 15:30:49', NULL);
INSERT INTO "auth"."mapping_type" VALUES (2, 2, 'public.trx_timeline.type_tax', 'Pajak Dipungut (11%)', 'Keterangan', 1, 1, '2022-07-17 15:31:39', NULL);
INSERT INTO "auth"."mapping_type" VALUES (3, 3, 'public.trx_timeline.type_tax', 'Pajak Dipungut Sebagian', 'Keterangan', 1, 1, '2022-07-17 15:31:39', NULL);
INSERT INTO "auth"."mapping_type" VALUES (4, 1, 'public.trx_sp3.type_metode', 'Penunjukan Langsung', 'Keterangan', 1, 1, '2022-07-17 15:31:39', NULL);
INSERT INTO "auth"."mapping_type" VALUES (5, 2, 'public.trx_sp3.type_metode', 'Pemilihan Langsung', 'Keterangan', 1, 1, '2022-07-17 15:31:39', NULL);
INSERT INTO "auth"."mapping_type" VALUES (6, 3, 'public.trx_sp3.type_metode', 'Pelelangan Terbuka', 'Keterangan', 1, 1, '2022-07-17 15:31:39', NULL);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "auth"."department_department_id_seq"
OWNED BY "auth"."department"."department_id";
SELECT setval('"auth"."department_department_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "auth"."division_division_id_seq"
OWNED BY "auth"."division"."division_id";
SELECT setval('"auth"."division_division_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "auth"."jabatan_level_id_seq"
OWNED BY "auth"."jabatan"."level_id";
SELECT setval('"auth"."jabatan_level_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "auth"."mapping_type_mapping_id_seq"
OWNED BY "auth"."mapping_type"."mapping_id";
SELECT setval('"auth"."mapping_type_mapping_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table department
-- ----------------------------
ALTER TABLE "auth"."department" ADD CONSTRAINT "department_pkey" PRIMARY KEY ("department_id");

-- ----------------------------
-- Primary Key structure for table division
-- ----------------------------
ALTER TABLE "auth"."division" ADD CONSTRAINT "division_pkey" PRIMARY KEY ("division_id");

-- ----------------------------
-- Primary Key structure for table jabatan
-- ----------------------------
ALTER TABLE "auth"."jabatan" ADD CONSTRAINT "jabatan_pkey" PRIMARY KEY ("level_id");

-- ----------------------------
-- Primary Key structure for table mapping_type
-- ----------------------------
ALTER TABLE "auth"."mapping_type" ADD CONSTRAINT "mapping_type_pkey" PRIMARY KEY ("mapping_id");
