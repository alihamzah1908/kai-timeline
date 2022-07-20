/*
 Navicat Premium Data Transfer

 Source Server         : postgre-local
 Source Server Type    : PostgreSQL
 Source Server Version : 140004
 Source Host           : 127.0.0.1:5432
 Source Catalog        : kai-timeline
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 140004
 File Encoding         : 65001

 Date: 20/07/2022 08:10:19
*/


-- ----------------------------
-- Sequence structure for failed_jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
CREATE SEQUENCE "public"."failed_jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for permissions_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."permissions_id_seq";
CREATE SEQUENCE "public"."permissions_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for roles_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."roles_id_seq";
CREATE SEQUENCE "public"."roles_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for sp3_file_sp3_file_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sp3_file_sp3_file_id_seq";
CREATE SEQUENCE "public"."sp3_file_sp3_file_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for trx_eval_sp3_eval_sp3_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."trx_eval_sp3_eval_sp3_id_seq";
CREATE SEQUENCE "public"."trx_eval_sp3_eval_sp3_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for trx_sp3_sp3_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."trx_sp3_sp3_id_seq";
CREATE SEQUENCE "public"."trx_sp3_sp3_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for trx_timeline_timeline_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."trx_timeline_timeline_id_seq";
CREATE SEQUENCE "public"."trx_timeline_timeline_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."failed_jobs";
CREATE TABLE "public"."failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (3, '2022_07_11_055153_create_permission_tables', 2);
INSERT INTO "public"."migrations" VALUES (4, '2022_07_11_060512_add_username_column', 3);
INSERT INTO "public"."migrations" VALUES (5, '2022_07_11_080740_add_roles_column', 4);
INSERT INTO "public"."migrations" VALUES (6, '2022_07_17_074917_create_auth_departement', 5);
INSERT INTO "public"."migrations" VALUES (7, '2022_07_17_075129_create_auth_departement', 6);
INSERT INTO "public"."migrations" VALUES (8, '2022_07_17_075515_create_auth_departement', 7);
INSERT INTO "public"."migrations" VALUES (9, '2022_07_17_075859_create_auth_division', 8);
INSERT INTO "public"."migrations" VALUES (10, '2022_07_17_075956_create_auth_departement', 8);
INSERT INTO "public"."migrations" VALUES (11, '2022_07_17_080500_create_auth_jabatan', 9);
INSERT INTO "public"."migrations" VALUES (12, '2022_07_17_081233_create_auth_departement', 10);
INSERT INTO "public"."migrations" VALUES (13, '2022_07_17_081319_create_auth_division', 10);
INSERT INTO "public"."migrations" VALUES (14, '2022_07_17_085825_add_column_users', 11);
INSERT INTO "public"."migrations" VALUES (15, '2022_07_17_090422_create_auth_department', 12);
INSERT INTO "public"."migrations" VALUES (16, '2022_07_17_090620_create_trx_timeline', 13);
INSERT INTO "public"."migrations" VALUES (17, '2022_07_17_091313_create_trx_timeline', 14);
INSERT INTO "public"."migrations" VALUES (18, '2022_07_17_091512_create_trx_sp3', 15);
INSERT INTO "public"."migrations" VALUES (19, '2022_07_17_141553_create_auth_jabatan', 16);
INSERT INTO "public"."migrations" VALUES (20, '2022_07_17_141918_create_auth_jabatan', 17);
INSERT INTO "public"."migrations" VALUES (21, '2022_07_18_103544_create_mapping_type', 18);
INSERT INTO "public"."migrations" VALUES (22, '2022_07_18_104142_create_mapping_type', 19);
INSERT INTO "public"."migrations" VALUES (23, '2022_07_19_124251_create_sp3_file', 20);
INSERT INTO "public"."migrations" VALUES (24, '2022_07_19_141432_create_evaluasi_sp3', 21);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."model_has_permissions";
CREATE TABLE "public"."model_has_permissions" (
  "permission_id" int8 NOT NULL,
  "model_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "model_id" int8 NOT NULL
)
;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."model_has_roles";
CREATE TABLE "public"."model_has_roles" (
  "role_id" int8 NOT NULL,
  "model_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "model_id" int8 NOT NULL
)
;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO "public"."model_has_roles" VALUES (8, 'App\Models\User', 16);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."permissions";
CREATE TABLE "public"."permissions" (
  "id" int8 NOT NULL DEFAULT nextval('permissions_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "guard_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO "public"."permissions" VALUES (26, 'role-list', 'web', '2022-07-12 04:10:54', '2022-07-12 04:10:54');
INSERT INTO "public"."permissions" VALUES (27, 'role-create', 'web', '2022-07-12 04:10:54', '2022-07-12 04:10:54');
INSERT INTO "public"."permissions" VALUES (28, 'role-edit', 'web', '2022-07-12 04:10:54', '2022-07-12 04:10:54');
INSERT INTO "public"."permissions" VALUES (29, 'role-delete', 'web', '2022-07-12 04:10:54', '2022-07-12 04:10:54');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."role_has_permissions";
CREATE TABLE "public"."role_has_permissions" (
  "permission_id" int8 NOT NULL,
  "role_id" int8 NOT NULL
)
;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO "public"."role_has_permissions" VALUES (26, 8);
INSERT INTO "public"."role_has_permissions" VALUES (27, 8);
INSERT INTO "public"."role_has_permissions" VALUES (28, 8);
INSERT INTO "public"."role_has_permissions" VALUES (29, 8);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id" int8 NOT NULL DEFAULT nextval('roles_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "guard_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO "public"."roles" VALUES (8, 'admin', 'web', '2022-07-12 04:02:35', '2022-07-12 04:02:35');

-- ----------------------------
-- Table structure for sp3_file
-- ----------------------------
DROP TABLE IF EXISTS "public"."sp3_file";
CREATE TABLE "public"."sp3_file" (
  "sp3_file_id" int8 NOT NULL DEFAULT nextval('sp3_file_sp3_file_id_seq'::regclass),
  "sp3_id" int4,
  "file" varchar(255) COLLATE "pg_catalog"."default",
  "created_by" int4,
  "updated_by" int4,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of sp3_file
-- ----------------------------
INSERT INTO "public"."sp3_file" VALUES (3, 17, 'SP3-2022-07-19-13-25-38.png', NULL, NULL, '2022-07-19 13:25:38', '2022-07-19 13:25:38');
INSERT INTO "public"."sp3_file" VALUES (4, 17, 'SP3-2022-07-19-13-25-38.png', NULL, NULL, '2022-07-19 13:25:38', '2022-07-19 13:25:38');
INSERT INTO "public"."sp3_file" VALUES (5, 18, 'SP3-2022-07-19-13-34-21.png', NULL, NULL, '2022-07-19 13:34:21', '2022-07-19 13:34:21');
INSERT INTO "public"."sp3_file" VALUES (6, 20, 'SP3-2022-07-19-13-59-43.png', NULL, NULL, '2022-07-19 13:59:43', '2022-07-19 13:59:43');

-- ----------------------------
-- Table structure for trx_eval_sp3
-- ----------------------------
DROP TABLE IF EXISTS "public"."trx_eval_sp3";
CREATE TABLE "public"."trx_eval_sp3" (
  "eval_sp3_id" int8 NOT NULL DEFAULT nextval('trx_eval_sp3_eval_sp3_id_seq'::regclass),
  "sp3_id" int4,
  "item_cd" int4,
  "item_value" varchar(200) COLLATE "pg_catalog"."default",
  "keterangan" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "created_by" int4,
  "updated_by" int4
)
;

-- ----------------------------
-- Records of trx_eval_sp3
-- ----------------------------
INSERT INTO "public"."trx_eval_sp3" VALUES (5, 19, 1, 'Uraian 1', 'Lanjutkan 1', '2022-07-19 15:05:12', '2022-07-19 15:05:12', 7, NULL);
INSERT INTO "public"."trx_eval_sp3" VALUES (6, 19, 2, 'Uraian 2', 'Lanjutkan 2', '2022-07-19 15:05:12', '2022-07-19 15:05:12', 7, NULL);

-- ----------------------------
-- Table structure for trx_sp3
-- ----------------------------
DROP TABLE IF EXISTS "public"."trx_sp3";
CREATE TABLE "public"."trx_sp3" (
  "sp3_id" int8 NOT NULL DEFAULT nextval('trx_sp3_sp3_id_seq'::regclass),
  "timeline_id" int4,
  "directorate_cd" varchar(20) COLLATE "pg_catalog"."default",
  "division_cd" varchar(20) COLLATE "pg_catalog"."default",
  "department_cd" varchar(20) COLLATE "pg_catalog"."default",
  "judul_pengadaan" varchar(200) COLLATE "pg_catalog"."default",
  "no_sp3" varchar(20) COLLATE "pg_catalog"."default",
  "no_pr" varchar(20) COLLATE "pg_catalog"."default",
  "tanggal_pr" timestamp(0) NOT NULL,
  "pr_sign_by" varchar(20) COLLATE "pg_catalog"."default",
  "nilai_pr" int4 NOT NULL,
  "type_tax" int4 NOT NULL,
  "nilai_tax" int4 NOT NULL,
  "no_mi" varchar(20) COLLATE "pg_catalog"."default",
  "tanggal_justifikasi" timestamp(0) NOT NULL,
  "no_rab" varchar(20) COLLATE "pg_catalog"."default",
  "tanggal_rab" timestamp(0) NOT NULL,
  "no_kak" varchar(20) COLLATE "pg_catalog"."default",
  "tanggal_kak" timestamp(0) NOT NULL,
  "proses_st" varchar(50) COLLATE "pg_catalog"."default",
  "type_metode" int4 NOT NULL,
  "nama_vendor" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "keterangan" text COLLATE "pg_catalog"."default" NOT NULL,
  "created_by" int4 NOT NULL,
  "updated_by" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "no_justifikasi" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of trx_sp3
-- ----------------------------
INSERT INTO "public"."trx_sp3" VALUES (19, 27, 'CT', 'CTI', 'CTIO', 'Pengadaaan 2', NULL, '2345', '2022-07-19 13:59:02', NULL, 200000, 1, 0, '123', '2022-07-19 13:59:02', '123', '2022-07-19 13:59:02', '31313', '2022-07-19 13:59:02', 'PROSES_ST', 2, 'PT. ABC', 'KETERANGAN', 7, 7, '2022-07-19 13:59:02', '2022-07-19 13:59:02', '123131');
INSERT INTO "public"."trx_sp3" VALUES (20, 27, 'CT', 'CTI', 'CTIO', 'Pengadaaan 2', NULL, '1121', '2022-07-19 13:59:43', NULL, 200000, 1, 0, '12131', '2022-07-19 13:59:43', '12131', '2022-07-19 13:59:43', '3131', '2022-07-19 13:59:43', 'PROSES_ST', 1, 'PT CFD', 'KETERANGAN', 7, 7, '2022-07-19 13:59:43', '2022-07-19 13:59:43', '3131');
INSERT INTO "public"."trx_sp3" VALUES (21, 27, 'CT', 'CTI', 'CTIO', 'Pengadaaan 2', NULL, '2132312', '2022-07-19 14:20:23', NULL, 200000, 1, 0, '12131241', '2022-07-19 14:20:23', '12131241', '2022-07-19 14:20:23', '3213', '2022-07-19 14:20:23', 'PROSES_DT', 1, 'Vendor AB', 'KETERANGAN', 7, 7, '2022-07-19 14:20:23', '2022-07-19 14:20:23', '32131');

-- ----------------------------
-- Table structure for trx_timeline
-- ----------------------------
DROP TABLE IF EXISTS "public"."trx_timeline";
CREATE TABLE "public"."trx_timeline" (
  "timeline_id" int8 NOT NULL DEFAULT nextval('trx_timeline_timeline_id_seq'::regclass),
  "directorate_cd" varchar(20) COLLATE "pg_catalog"."default",
  "division_cd" varchar(20) COLLATE "pg_catalog"."default",
  "department_cd" varchar(20) COLLATE "pg_catalog"."default",
  "judul_pengadaan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "no_pengadaan" varchar(20) COLLATE "pg_catalog"."default",
  "sumber_dana" varchar(20) COLLATE "pg_catalog"."default",
  "jenis_kontrak" varchar(20) COLLATE "pg_catalog"."default",
  "beban_biaya" varchar(20) COLLATE "pg_catalog"."default",
  "pbj" varchar(20) COLLATE "pg_catalog"."default",
  "nilai_pr" int4 NOT NULL,
  "type_tax" int4 NOT NULL,
  "nilai_tax" int4 NOT NULL,
  "start_date_pengadaan" timestamp(0),
  "end_date_pengadaan" timestamp(0),
  "proses_st" varchar(50) COLLATE "pg_catalog"."default",
  "created_by" int4 NOT NULL,
  "updated_by" int4,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of trx_timeline
-- ----------------------------
INSERT INTO "public"."trx_timeline" VALUES (28, 'CT', 'CTI', 'CTIO', 'Pengadaan 3', 'OP/CTI/2022/28', 'RKAP 2022', 'multi_year', 'CAPEX', 'Sarana', 200000, 1, 0, '2022-07-19 00:00:00', '2022-07-19 00:00:00', 'PROSES_DT', 7, NULL, '2022-07-19 13:56:39', '2022-07-19 13:56:39');
INSERT INTO "public"."trx_timeline" VALUES (27, 'CT', 'CTI', 'CTIO', 'Pengadaaan 2', 'OP/CTI/2022/27', 'RKAP 2022', 'single_year', 'CAPEX', 'Sarana', 200000, 1, 0, '2022-07-19 00:00:00', '2022-07-19 00:00:00', 'PROSES_AT', 7, NULL, '2022-07-19 13:56:16', '2022-07-19 13:57:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "username" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "level_cd" varchar(20) COLLATE "pg_catalog"."default",
  "users_cd" varchar(20) COLLATE "pg_catalog"."default",
  "department_cd" varchar(20) COLLATE "pg_catalog"."default",
  "division_cd" varchar(20) COLLATE "pg_catalog"."default",
  "directorate_cd" varchar(20) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (14, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', NULL, '2022-07-12 04:11:20', '2022-07-12 04:11:20', 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."users" VALUES (16, 'USERS X', 'userx@mail.com', NULL, '$2y$10$.wpFRn/kW846dI58eUVbBufkgXKgYWtrndBBv1ODiJYCvUxF9XGEO', NULL, '2022-07-12 04:14:54', '2022-07-12 04:14:54', 'userx', NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."users" VALUES (2, 'presdir', 'presdir@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'presdir', 'DIR', NULL, NULL, NULL, 'CU');
INSERT INTO "public"."users" VALUES (3, 'vp_logistic', 'vp.logistic@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'vp_logistic', 'VP', NULL, NULL, 'CUG', 'CU');
INSERT INTO "public"."users" VALUES (4, 'mgr_logistic', 'mgr.logistic@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'mgr_logistic', 'MGR', NULL, 'CUGP', 'CUG', 'CU');
INSERT INTO "public"."users" VALUES (5, 'eval_logistic', 'eval.logistic@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'eval_logistic', 'LEV7', 'CUGP.7', 'CUGP', 'CUG', 'CU');
INSERT INTO "public"."users" VALUES (6, 'mgr_it', 'mgr.it@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'mgr_it', 'MGR', NULL, 'CTIO', 'CTI', 'CT');
INSERT INTO "public"."users" VALUES (7, 'asman_it', 'asman.it@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'asman_it', 'AMGR', 'CTIO.1', 'CTIO', 'CTI', 'CT');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 24, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."permissions_id_seq"
OWNED BY "public"."permissions"."id";
SELECT setval('"public"."permissions_id_seq"', 29, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."roles_id_seq"
OWNED BY "public"."roles"."id";
SELECT setval('"public"."roles_id_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sp3_file_sp3_file_id_seq"
OWNED BY "public"."sp3_file"."sp3_file_id";
SELECT setval('"public"."sp3_file_sp3_file_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."trx_eval_sp3_eval_sp3_id_seq"
OWNED BY "public"."trx_eval_sp3"."eval_sp3_id";
SELECT setval('"public"."trx_eval_sp3_eval_sp3_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."trx_sp3_sp3_id_seq"
OWNED BY "public"."trx_sp3"."sp3_id";
SELECT setval('"public"."trx_sp3_sp3_id_seq"', 21, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."trx_timeline_timeline_id_seq"
OWNED BY "public"."trx_timeline"."timeline_id";
SELECT setval('"public"."trx_timeline_timeline_id_seq"', 28, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 16, true);

-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table model_has_permissions
-- ----------------------------
CREATE INDEX "model_has_permissions_model_id_model_type_index" ON "public"."model_has_permissions" USING btree (
  "model_id" "pg_catalog"."int8_ops" ASC NULLS LAST,
  "model_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table model_has_permissions
-- ----------------------------
ALTER TABLE "public"."model_has_permissions" ADD CONSTRAINT "model_has_permissions_pkey" PRIMARY KEY ("permission_id", "model_id", "model_type");

-- ----------------------------
-- Indexes structure for table model_has_roles
-- ----------------------------
CREATE INDEX "model_has_roles_model_id_model_type_index" ON "public"."model_has_roles" USING btree (
  "model_id" "pg_catalog"."int8_ops" ASC NULLS LAST,
  "model_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table model_has_roles
-- ----------------------------
ALTER TABLE "public"."model_has_roles" ADD CONSTRAINT "model_has_roles_pkey" PRIMARY KEY ("role_id", "model_id", "model_type");

-- ----------------------------
-- Uniques structure for table permissions
-- ----------------------------
ALTER TABLE "public"."permissions" ADD CONSTRAINT "permissions_name_guard_name_unique" UNIQUE ("name", "guard_name");

-- ----------------------------
-- Primary Key structure for table permissions
-- ----------------------------
ALTER TABLE "public"."permissions" ADD CONSTRAINT "permissions_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table role_has_permissions
-- ----------------------------
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_pkey" PRIMARY KEY ("permission_id", "role_id");

-- ----------------------------
-- Uniques structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_name_guard_name_unique" UNIQUE ("name", "guard_name");

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table sp3_file
-- ----------------------------
ALTER TABLE "public"."sp3_file" ADD CONSTRAINT "sp3_file_pkey" PRIMARY KEY ("sp3_file_id");

-- ----------------------------
-- Primary Key structure for table trx_eval_sp3
-- ----------------------------
ALTER TABLE "public"."trx_eval_sp3" ADD CONSTRAINT "trx_eval_sp3_pkey" PRIMARY KEY ("eval_sp3_id");

-- ----------------------------
-- Primary Key structure for table trx_sp3
-- ----------------------------
ALTER TABLE "public"."trx_sp3" ADD CONSTRAINT "trx_sp3_pkey" PRIMARY KEY ("sp3_id");

-- ----------------------------
-- Primary Key structure for table trx_timeline
-- ----------------------------
ALTER TABLE "public"."trx_timeline" ADD CONSTRAINT "trx_timeline_pkey" PRIMARY KEY ("timeline_id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table model_has_permissions
-- ----------------------------
ALTER TABLE "public"."model_has_permissions" ADD CONSTRAINT "model_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "public"."permissions" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table model_has_roles
-- ----------------------------
ALTER TABLE "public"."model_has_roles" ADD CONSTRAINT "model_has_roles_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table role_has_permissions
-- ----------------------------
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "public"."permissions" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
