--
-- PostgreSQL database dump
--

-- Dumped from database version 14.1
-- Dumped by pg_dump version 14.1

-- Started on 2022-07-16 22:56:36

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE postgres;
--
-- TOC entry 3425 (class 1262 OID 13754)
-- Name: postgres; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_Indonesia.1252';


\connect postgres

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3426 (class 0 OID 0)
-- Dependencies: 3425
-- Name: DATABASE postgres; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- TOC entry 5 (class 2615 OID 40970)
-- Name: auth; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA auth;


--
-- TOC entry 4 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 3427 (class 0 OID 0)
-- Dependencies: 4
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 225 (class 1259 OID 41004)
-- Name: department_id_seq; Type: SEQUENCE; Schema: auth; Owner: -
--

CREATE SEQUENCE auth.department_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 226 (class 1259 OID 41035)
-- Name: department; Type: TABLE; Schema: auth; Owner: -
--

CREATE TABLE auth.department (
    department_id bigint DEFAULT nextval('auth.department_id_seq'::regclass) NOT NULL,
    nomenklatur character varying(200) NOT NULL,
    department_cd character varying(20) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(200),
    updated_by character varying(200),
    division_cd character varying(200)
);


--
-- TOC entry 224 (class 1259 OID 40977)
-- Name: division_id_seq; Type: SEQUENCE; Schema: auth; Owner: -
--

CREATE SEQUENCE auth.division_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 227 (class 1259 OID 41046)
-- Name: division; Type: TABLE; Schema: auth; Owner: -
--

CREATE TABLE auth.division (
    division_id bigint DEFAULT nextval('auth.division_id_seq'::regclass) NOT NULL,
    nomenklatur character varying(200) NOT NULL,
    division_cd character varying(20) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(200),
    updated_by character varying(200),
    directorate_cd character varying(200)
);


--
-- TOC entry 228 (class 1259 OID 41056)
-- Name: level_id_seq; Type: SEQUENCE; Schema: auth; Owner: -
--

CREATE SEQUENCE auth.level_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 229 (class 1259 OID 41093)
-- Name: jabatan; Type: TABLE; Schema: auth; Owner: -
--

CREATE TABLE auth.jabatan (
    level_id bigint DEFAULT nextval('auth.level_id_seq'::regclass) NOT NULL,
    level_cd character varying(200) NOT NULL,
    level_name character varying(20) NOT NULL,
    level_hierarchy character varying(20) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(200),
    updated_by character varying(200)
);


--
-- TOC entry 216 (class 1259 OID 33062)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- TOC entry 215 (class 1259 OID 33061)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3428 (class 0 OID 0)
-- Dependencies: 215
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 212 (class 1259 OID 33044)
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- TOC entry 211 (class 1259 OID 33043)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3429 (class 0 OID 0)
-- Dependencies: 211
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 221 (class 1259 OID 33093)
-- Name: model_has_permissions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);


--
-- TOC entry 222 (class 1259 OID 33104)
-- Name: model_has_roles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);


--
-- TOC entry 218 (class 1259 OID 33072)
-- Name: permissions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 217 (class 1259 OID 33071)
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3430 (class 0 OID 0)
-- Dependencies: 217
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- TOC entry 223 (class 1259 OID 33115)
-- Name: role_has_permissions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);


--
-- TOC entry 220 (class 1259 OID 33083)
-- Name: roles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 219 (class 1259 OID 33082)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3431 (class 0 OID 0)
-- Dependencies: 219
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- TOC entry 214 (class 1259 OID 33051)
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    username character varying(255) NOT NULL,
    level_cd character varying(20),
    users_cd character varying(20),
    department_cd character varying(20),
    division_cd character varying(20),
    directorate_cd character varying(20)
);


--
-- TOC entry 213 (class 1259 OID 33050)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3432 (class 0 OID 0)
-- Dependencies: 213
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3215 (class 2604 OID 33065)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 3213 (class 2604 OID 33047)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3217 (class 2604 OID 33075)
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- TOC entry 3218 (class 2604 OID 33086)
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- TOC entry 3214 (class 2604 OID 33054)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3416 (class 0 OID 41035)
-- Dependencies: 226
-- Data for Name: department; Type: TABLE DATA; Schema: auth; Owner: -
--

INSERT INTO auth.department VALUES (1, 'Logistic Planning, Evaluation, and Import Department', 'CUGP', '2022-07-16 21:17:33', NULL, 'SYSADMIN', NULL, 'CUG');
INSERT INTO auth.department VALUES (2, 'Rolling Stock Procurement Department', 'CUGR', '2022-07-16 21:17:33', NULL, 'SYSADMIN', NULL, 'CUG');
INSERT INTO auth.department VALUES (3, 'Non Rolling Stock Procurement  Department', 'CUGN', '2022-07-16 21:17:33', NULL, 'SYSADMIN', NULL, 'CUG');
INSERT INTO auth.department VALUES (4, 'Warehouse and Distribution Department', 'CUGW', '2022-07-16 21:17:33', NULL, 'SYSADMIN', NULL, 'CUG');
INSERT INTO auth.department VALUES (5, 'Information System Planning and Development Department', 'CTIP', '2022-07-16 21:17:33', NULL, 'SYSADMIN', NULL, 'CTI');
INSERT INTO auth.department VALUES (6, 'Information System Operation Department', 'CTIO', '2022-07-16 21:17:33', NULL, 'SYSADMIN', NULL, 'CTI');
INSERT INTO auth.department VALUES (7, 'Finance Department', 'CFFF', '2022-07-16 21:25:03', NULL, 'SYSADMIN', NULL, 'CFF');
INSERT INTO auth.department VALUES (8, 'Revenue Verification Department', 'CFFR', '2022-07-16 21:25:03', NULL, 'SYSADMIN', NULL, 'CFF');
INSERT INTO auth.department VALUES (9, 'Budget Monitoring and Authorization Department', 'CFAA', '2022-07-16 21:25:03', NULL, 'SYSADMIN', NULL, 'CFA');
INSERT INTO auth.department VALUES (10, 'Budget Planning and Evaluation Department', 'CFAP', '2022-07-16 21:25:03', NULL, 'SYSADMIN', NULL, 'CFA');
INSERT INTO auth.department VALUES (11, 'General Accounting Department', 'CFAG', '2022-07-16 21:25:03', NULL, 'SYSADMIN', NULL, 'CFA');
INSERT INTO auth.department VALUES (12, 'Cost Accounting and Tax Department', 'CFAC', '2022-07-16 21:25:03', NULL, 'SYSADMIN', NULL, 'CFA');


--
-- TOC entry 3417 (class 0 OID 41046)
-- Dependencies: 227
-- Data for Name: division; Type: TABLE DATA; Schema: auth; Owner: -
--

INSERT INTO auth.division VALUES (17, 'PSO and TAC Division', 'CFP', '2022-07-16 15:09:31', NULL, 'SYSADMIN', NULL, 'CF');
INSERT INTO auth.division VALUES (1, 'Corporate Secretary Division', 'CUS', '2022-07-16 14:46:18', NULL, 'SYSADMIN', NULL, 'CU');
INSERT INTO auth.division VALUES (2, 'GRC and Legal  Division', 'CUL', '2022-07-16 14:48:19', NULL, 'SYSADMIN', NULL, 'CU');
INSERT INTO auth.division VALUES (3, 'Internal Audit Division', 'CUI', '2022-07-16 14:48:58', NULL, 'SYSADMIN', NULL, 'CU');
INSERT INTO auth.division VALUES (4, 'Logistic Division', 'CUG', '2022-07-16 14:50:00', NULL, 'SYSADMIN', NULL, 'CU');
INSERT INTO auth.division VALUES (5, 'Strategic Planning Division', 'CUP', '2022-07-16 14:50:29', NULL, 'SYSADMIN', NULL, 'CU');
INSERT INTO auth.division VALUES (10, 'Information Technology Division', 'CTI', '2022-07-16 14:46:18', NULL, 'SYSADMIN', NULL, 'CT');
INSERT INTO auth.division VALUES (11, 'Maintenance Planning and Evaluation Division', 'CTP', '2022-07-16 14:48:19', NULL, 'SYSADMIN', NULL, 'CT');
INSERT INTO auth.division VALUES (12, 'Rolling Stock Division', 'CTR', '2022-07-16 14:48:58', NULL, 'SYSADMIN', NULL, 'CT');
INSERT INTO auth.division VALUES (13, 'Infrastructure Division', 'CTS', '2022-07-16 14:50:00', NULL, 'SYSADMIN', NULL, 'CT');
INSERT INTO auth.division VALUES (6, 'HSE and Security Division', 'COS', '2022-07-16 14:46:18', NULL, 'SYSADMIN', NULL, 'CO');
INSERT INTO auth.division VALUES (7, 'Train Operation Division', 'COT', '2022-07-16 14:48:19', NULL, 'SYSADMIN', NULL, 'CO');
INSERT INTO auth.division VALUES (8, 'Commercial Division', 'COC', '2022-07-16 14:48:58', NULL, 'SYSADMIN', NULL, 'CO');
INSERT INTO auth.division VALUES (9, 'Train Services Facilities and Customer Care Division', 'COH', '2022-07-16 14:50:00', NULL, 'SYSADMIN', NULL, 'CO');
INSERT INTO auth.division VALUES (14, 'Finance Division', 'CFF', '2022-07-16 15:09:31', NULL, 'SYSADMIN', NULL, 'CF');
INSERT INTO auth.division VALUES (15, 'Budgeting and Accounting Division', 'CFA', '2022-07-16 15:09:31', NULL, 'SYSADMIN', NULL, 'CF');
INSERT INTO auth.division VALUES (16, 'Human Capital Division', 'CFH', '2022-07-16 15:09:31', NULL, 'SYSADMIN', NULL, 'CF');


--
-- TOC entry 3419 (class 0 OID 41093)
-- Dependencies: 229
-- Data for Name: jabatan; Type: TABLE DATA; Schema: auth; Owner: -
--

INSERT INTO auth.jabatan VALUES (1, 'DIR', 'Director', '110', '1', '1', '2022-07-16 22:28:09' NULL);
INSERT INTO auth.jabatan VALUES (2, 'VP', 'Vice President', '100', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (3, 'SMGR', 'Senior Manager', '90','1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (4, 'MGR', 'Manager', '80', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (5, 'JMGR', 'Junior Manager', '70', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (6, 'AMGR', 'Assistant Manager', '60', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (7, 'LEV1', 'Level 1', '50', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (8, 'LEV2', 'Level 2', '40', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (9, 'LEV3', 'Level 3', '30', '1', '1', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (10, 'LEV4', 'Level 4', '1', '1', '20', '2022-07-16 22:28:09', NULL);
INSERT INTO auth.jabatan VALUES (11, 'LEV5', 'Level 5', '10', '1', '1', '2022-07-16 22:28:09', NULL);


--
-- TOC entry 3406 (class 0 OID 33062)
-- Dependencies: 216
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3402 (class 0 OID 33044)
-- Dependencies: 212
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.migrations VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations VALUES (3, '2022_07_11_055153_create_permission_tables', 1);
INSERT INTO public.migrations VALUES (4, '2022_07_11_060512_add_username_column', 1);


--
-- TOC entry 3411 (class 0 OID 33093)
-- Dependencies: 221
-- Data for Name: model_has_permissions; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3412 (class 0 OID 33104)
-- Dependencies: 222
-- Data for Name: model_has_roles; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3408 (class 0 OID 33072)
-- Dependencies: 218
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3413 (class 0 OID 33115)
-- Dependencies: 223
-- Data for Name: role_has_permissions; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3410 (class 0 OID 33083)
-- Dependencies: 220
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3404 (class 0 OID 33051)
-- Dependencies: 214
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.users VALUES (1, 'administrator', 'admin@gmail.com', '2022-07-12 21:48:00', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-12 21:48:00', '2022-07-12 21:48:00', 'admin', NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.users VALUES (2, 'presdir', 'presdir@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'presdir', 'DIR', NULL, NULL, NULL, 'CU');
INSERT INTO public.users VALUES (3, 'vp_logistic', 'vp.logistic@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'vp_logistic', 'VP', NULL, NULL, 'CUG', 'CU');
INSERT INTO public.users VALUES (4, 'mgr_logistic', 'mgr.logistic@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'mgr_logistic', 'MGR', NULL, 'CUGP', 'CUG', 'CU');
INSERT INTO public.users VALUES (5, 'eval_logistic', 'eval.logistic@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'eval_logistic', 'LEV7', 'CUGP.7', 'CUGP', 'CUG', 'CU');
INSERT INTO public.users VALUES (6, 'mgr_it', 'mgr.it@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'mgr_it', 'MGR', NULL, 'CTIO', 'CTI', 'CT');
INSERT INTO public.users VALUES (7, 'asman_it', 'asman.it@gmail.com', '2022-07-16 22:49:34', '$2y$10$UMQxG.pVvKJ92TbL4FnuIu3kLR1InUgsLlC6kPVSp.gxvOwbFqQFy', '', '2022-07-16 22:49:34', NULL, 'asman_it', 'AMGR', 'CTIO.1', 'CTIO', 'CTI', 'CT');


--
-- TOC entry 3433 (class 0 OID 0)
-- Dependencies: 225
-- Name: department_id_seq; Type: SEQUENCE SET; Schema: auth; Owner: -
--

SELECT pg_catalog.setval('auth.department_id_seq', 1, false);


--
-- TOC entry 3434 (class 0 OID 0)
-- Dependencies: 224
-- Name: division_id_seq; Type: SEQUENCE SET; Schema: auth; Owner: -
--

SELECT pg_catalog.setval('auth.division_id_seq', 1, false);


--
-- TOC entry 3435 (class 0 OID 0)
-- Dependencies: 228
-- Name: level_id_seq; Type: SEQUENCE SET; Schema: auth; Owner: -
--

SELECT pg_catalog.setval('auth.level_id_seq', 1, false);


--
-- TOC entry 3436 (class 0 OID 0)
-- Dependencies: 215
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3437 (class 0 OID 0)
-- Dependencies: 211
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);


--
-- TOC entry 3438 (class 0 OID 0)
-- Dependencies: 217
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);


--
-- TOC entry 3439 (class 0 OID 0)
-- Dependencies: 219
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);


--
-- TOC entry 3440 (class 0 OID 0)
-- Dependencies: 213
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- TOC entry 3247 (class 2606 OID 41044)
-- Name: department department_code; Type: CONSTRAINT; Schema: auth; Owner: -
--

ALTER TABLE ONLY auth.department
    ADD CONSTRAINT department_code UNIQUE (department_cd);


--
-- TOC entry 3249 (class 2606 OID 41042)
-- Name: department department_pkey; Type: CONSTRAINT; Schema: auth; Owner: -
--

ALTER TABLE ONLY auth.department
    ADD CONSTRAINT department_pkey PRIMARY KEY (department_id);


--
-- TOC entry 3251 (class 2606 OID 41055)
-- Name: division division_code; Type: CONSTRAINT; Schema: auth; Owner: -
--

ALTER TABLE ONLY auth.division
    ADD CONSTRAINT division_code UNIQUE (division_cd);


--
-- TOC entry 3253 (class 2606 OID 41053)
-- Name: division division_pkey; Type: CONSTRAINT; Schema: auth; Owner: -
--

ALTER TABLE ONLY auth.division
    ADD CONSTRAINT division_pkey PRIMARY KEY (division_id);


--
-- TOC entry 3255 (class 2606 OID 41102)
-- Name: jabatan level_code; Type: CONSTRAINT; Schema: auth; Owner: -
--

ALTER TABLE ONLY auth.jabatan
    ADD CONSTRAINT level_code UNIQUE (level_cd);


--
-- TOC entry 3257 (class 2606 OID 41100)
-- Name: jabatan level_pkey; Type: CONSTRAINT; Schema: auth; Owner: -
--

ALTER TABLE ONLY auth.jabatan
    ADD CONSTRAINT level_pkey PRIMARY KEY (level_id);


--
-- TOC entry 3229 (class 2606 OID 33070)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3223 (class 2606 OID 33049)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3240 (class 2606 OID 33103)
-- Name: model_has_permissions model_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);


--
-- TOC entry 3243 (class 2606 OID 33114)
-- Name: model_has_roles model_has_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);


--
-- TOC entry 3231 (class 2606 OID 33081)
-- Name: permissions permissions_name_guard_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_guard_name_unique UNIQUE (name, guard_name);


--
-- TOC entry 3233 (class 2606 OID 33079)
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 3245 (class 2606 OID 33129)
-- Name: role_has_permissions role_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);


--
-- TOC entry 3235 (class 2606 OID 33092)
-- Name: roles roles_name_guard_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_guard_name_unique UNIQUE (name, guard_name);


--
-- TOC entry 3237 (class 2606 OID 33090)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 3225 (class 2606 OID 33060)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 3227 (class 2606 OID 33058)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3238 (class 1259 OID 33096)
-- Name: model_has_permissions_model_id_model_type_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);


--
-- TOC entry 3241 (class 1259 OID 33107)
-- Name: model_has_roles_model_id_model_type_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);


--
-- TOC entry 3258 (class 2606 OID 33097)
-- Name: model_has_permissions model_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 3259 (class 2606 OID 33108)
-- Name: model_has_roles model_has_roles_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- TOC entry 3260 (class 2606 OID 33118)
-- Name: role_has_permissions role_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- TOC entry 3261 (class 2606 OID 33123)
-- Name: role_has_permissions role_has_permissions_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


-- Completed on 2022-07-16 22:56:36

--
-- PostgreSQL database dump complete
--

