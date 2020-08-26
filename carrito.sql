--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.18
-- Dumped by pg_dump version 12.3

-- Started on 2020-08-26 18:12:00

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
-- TOC entry 2178 (class 1262 OID 17489)
-- Name: carrocompras; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE carrocompras WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Colombia.1252' LC_CTYPE = 'Spanish_Colombia.1252';


ALTER DATABASE carrocompras OWNER TO postgres;

\connect carrocompras

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

SET default_tablespace = '';

--
-- TOC entry 185 (class 1259 OID 17490)
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    id integer NOT NULL,
    nombre character varying(100),
    descripcion character varying(200)
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 17493)
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_id_seq OWNER TO postgres;

--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 186
-- Name: categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categoria_id_seq OWNED BY public.categoria.id;


--
-- TOC entry 187 (class 1259 OID 17495)
-- Name: orden; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orden (
    id integer NOT NULL,
    id_producto integer,
    unidades integer,
    subtotal integer,
    id_orden_total integer,
    id_usuario integer
);


ALTER TABLE public.orden OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 17498)
-- Name: orden_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orden_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.orden_id_seq OWNER TO postgres;

--
-- TOC entry 2180 (class 0 OID 0)
-- Dependencies: 188
-- Name: orden_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orden_id_seq OWNED BY public.orden.id;


--
-- TOC entry 189 (class 1259 OID 17500)
-- Name: orden_total; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orden_total (
    id integer NOT NULL,
    total integer
);


ALTER TABLE public.orden_total OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 17503)
-- Name: orden_total_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orden_total_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.orden_total_id_seq OWNER TO postgres;

--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 190
-- Name: orden_total_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orden_total_id_seq OWNED BY public.orden_total.id;


--
-- TOC entry 191 (class 1259 OID 17505)
-- Name: producto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.producto (
    id integer NOT NULL,
    nombre character varying(100),
    descripcion character varying(500),
    categoria integer,
    "precioAnt" double precision,
    precio double precision,
    medida character varying(50),
    imagen character varying(500)
);


ALTER TABLE public.producto OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 17511)
-- Name: producto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.producto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.producto_id_seq OWNER TO postgres;

--
-- TOC entry 2182 (class 0 OID 0)
-- Dependencies: 192
-- Name: producto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.producto_id_seq OWNED BY public.producto.id;


--
-- TOC entry 193 (class 1259 OID 17513)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    nombre character varying(200),
    direccion character varying(200),
    telefono character varying(100)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 17519)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- TOC entry 2183 (class 0 OID 0)
-- Dependencies: 194
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 2027 (class 2604 OID 17521)
-- Name: categoria id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria ALTER COLUMN id SET DEFAULT nextval('public.categoria_id_seq'::regclass);


--
-- TOC entry 2028 (class 2604 OID 17522)
-- Name: orden id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orden ALTER COLUMN id SET DEFAULT nextval('public.orden_id_seq'::regclass);


--
-- TOC entry 2029 (class 2604 OID 17523)
-- Name: orden_total id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orden_total ALTER COLUMN id SET DEFAULT nextval('public.orden_total_id_seq'::regclass);


--
-- TOC entry 2030 (class 2604 OID 17524)
-- Name: producto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.producto ALTER COLUMN id SET DEFAULT nextval('public.producto_id_seq'::regclass);


--
-- TOC entry 2031 (class 2604 OID 17525)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- TOC entry 2163 (class 0 OID 17490)
-- Dependencies: 185
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.categoria (id, nombre, descripcion) VALUES (1, 'Cereales', 'Son plantas de la familia de las poáceas cultivadas por su grano (fruto de pared delgada adherida a la semilla, característico de la familia). Incluyen cereales mayores como el trigo, el arroz, el maí');
INSERT INTO public.categoria (id, nombre, descripcion) VALUES (2, 'Harinas', 'La harina es el polvo fino que se obtiene al moler cereales o legumbres. La harina más común es la harina de trigo. Pero también se elaboran harinas de muchos otros tipos de cereales, como de centeno,');
INSERT INTO public.categoria (id, nombre, descripcion) VALUES (3, 'Carnes', 'La carne es el tejido animal, principalmente muscular, que se consume como alimento.Se trata de una clasificación coloquial y comercial que solo se aplica a animales terrestres —normalmente vertebrado');


--
-- TOC entry 2165 (class 0 OID 17495)
-- Dependencies: 187
-- Data for Name: orden; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2167 (class 0 OID 17500)
-- Dependencies: 189
-- Data for Name: orden_total; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2169 (class 0 OID 17505)
-- Dependencies: 191
-- Data for Name: producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.producto (id, nombre, descripcion, categoria, "precioAnt", precio, medida, imagen) VALUES (2, 'Arroz', 'Arroz marca Rinde Màx', 1, 2300, 2200, '1 lb', 'arroz.png');
INSERT INTO public.producto (id, nombre, descripcion, categoria, "precioAnt", precio, medida, imagen) VALUES (3, 'Pan', 'Pan de la abuela ', 2, 3100, 2400, '6 und', 'pan.png');
INSERT INTO public.producto (id, nombre, descripcion, categoria, "precioAnt", precio, medida, imagen) VALUES (4, 'Pasta', 'Pasta el caribe', 2, 2500, 2300, '250 gr', 'pasta.png');
INSERT INTO public.producto (id, nombre, descripcion, categoria, "precioAnt", precio, medida, imagen) VALUES (5, 'Pollo', 'Piezas de pollo ', 3, 5300, 5000, '1 lb', 'pollo.png');
INSERT INTO public.producto (id, nombre, descripcion, categoria, "precioAnt", precio, medida, imagen) VALUES (6, 'Carne de res', 'Carne roja', 3, 5800, 5400, '1 lb', 'carneres.png');
INSERT INTO public.producto (id, nombre, descripcion, categoria, "precioAnt", precio, medida, imagen) VALUES (1, 'Avena', 'Avena en polvo, lista para preparar', 1, 2100, 2000, '500 gr', 'avena.png');


--
-- TOC entry 2171 (class 0 OID 17513)
-- Dependencies: 193
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2184 (class 0 OID 0)
-- Dependencies: 186
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categoria_id_seq', 1, false);


--
-- TOC entry 2185 (class 0 OID 0)
-- Dependencies: 188
-- Name: orden_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orden_id_seq', 1, false);


--
-- TOC entry 2186 (class 0 OID 0)
-- Dependencies: 190
-- Name: orden_total_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orden_total_id_seq', 1, false);


--
-- TOC entry 2187 (class 0 OID 0)
-- Dependencies: 192
-- Name: producto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.producto_id_seq', 1, false);


--
-- TOC entry 2188 (class 0 OID 0)
-- Dependencies: 194
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 1, false);


--
-- TOC entry 2033 (class 2606 OID 17527)
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 2035 (class 2606 OID 17529)
-- Name: orden orden_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orden
    ADD CONSTRAINT orden_pkey PRIMARY KEY (id);


--
-- TOC entry 2037 (class 2606 OID 17531)
-- Name: orden_total orden_total_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orden_total
    ADD CONSTRAINT orden_total_pkey PRIMARY KEY (id);


--
-- TOC entry 2039 (class 2606 OID 17533)
-- Name: producto producto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id);


--
-- TOC entry 2041 (class 2606 OID 17535)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- TOC entry 2042 (class 2606 OID 17536)
-- Name: orden orden_id_orden_total_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orden
    ADD CONSTRAINT orden_id_orden_total_fkey FOREIGN KEY (id_orden_total) REFERENCES public.orden_total(id);


--
-- TOC entry 2043 (class 2606 OID 17541)
-- Name: orden orden_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orden
    ADD CONSTRAINT orden_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES public.producto(id);


--
-- TOC entry 2044 (class 2606 OID 17546)
-- Name: orden orden_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orden
    ADD CONSTRAINT orden_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id);


--
-- TOC entry 2045 (class 2606 OID 17551)
-- Name: producto producto_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.producto
    ADD CONSTRAINT producto_categoria_fkey FOREIGN KEY (categoria) REFERENCES public.categoria(id);


-- Completed on 2020-08-26 18:12:00

--
-- PostgreSQL database dump complete
--

