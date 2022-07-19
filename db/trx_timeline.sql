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

 Date: 19/07/2022 07:43:11
*/


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
INSERT INTO "public"."trx_timeline" VALUES (8, 'CT', 'CTI', 'CTIP', 'Pengadaan HPC (High Performance Compute)', 'OP/CT/2022/0001', 'RKAP 2022', 'SINGLE YEAR', 'OPEX', 'NON SARANA', 100000000, 1, 11000000, '2022-04-16 15:09:31', '2022-12-12 15:09:31', 'PROSES_DT', 1, 1, '2022-07-17 14:45:11', '2022-07-18 13:03:15');
INSERT INTO "public"."trx_timeline" VALUES (13, 'CT', 'CTI', 'CTIO', 'CONTOH PENGADAAN', 'CT/01/2011', '2022', 'single_year', 'Penunjukan Langsung', 'Sarana', 100000, 1, 1000, '2022-06-29 00:00:00', '2022-07-19 00:00:00', 'PROSES_AT', 7, NULL, '2022-07-18 12:51:58', '2022-07-18 15:21:39');
INSERT INTO "public"."trx_timeline" VALUES (15, 'CT', 'CTI', 'CTIO', 'PENGADAAN CONTOH 1', 'CT/02010/2013010', 'RKAP 2022', 'multi_year', 'Pelelangan Terbuka', 'Sarana', 123000, 3, 10, '2022-07-18 00:00:00', '2022-07-18 00:00:00', 'PROSES_DT', 7, NULL, '2022-07-18 15:23:36', '2022-07-18 15:23:36');

-- ----------------------------
-- Primary Key structure for table trx_timeline
-- ----------------------------
ALTER TABLE "public"."trx_timeline" ADD CONSTRAINT "trx_timeline_pkey" PRIMARY KEY ("timeline_id");
