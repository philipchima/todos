PGDMP     ,    :                z            tododb    15.1    15.0                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    24576    tododb    DATABASE     {   CREATE DATABASE tododb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Nigeria.1252';
    DROP DATABASE tododb;
                postgres    false            N           1247    49153    status    TYPE     X   CREATE TYPE public.status AS ENUM (
    'Notstarted',
    'Ongoing',
    'Completed'
);
    DROP TYPE public.status;
       public          postgres    false            ?            1259    32778    todo    TABLE     ?   CREATE TABLE public.todo (
    tid integer NOT NULL,
    name character varying NOT NULL,
    description character varying,
    user_id integer,
    created_at date,
    updated_at date,
    status public.status NOT NULL
);
    DROP TABLE public.todo;
       public         heap    postgres    false    846            ?            1259    49159    todo_tid_seq    SEQUENCE     ?   ALTER TABLE public.todo ALTER COLUMN tid ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.todo_tid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    214            ?            1259    32785    user    TABLE     ?   CREATE TABLE public."user" (
    email character varying,
    password character varying,
    created_at date,
    updated_at date,
    id integer NOT NULL
);
    DROP TABLE public."user";
       public         heap    postgres    false            ?            1259    40960    user_id_seq    SEQUENCE     ?   ALTER TABLE public."user" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    215            ?          0    32778    todo 
   TABLE DATA           _   COPY public.todo (tid, name, description, user_id, created_at, updated_at, status) FROM stdin;
    public          postgres    false    214   ?       ?          0    32785    user 
   TABLE DATA           M   COPY public."user" (email, password, created_at, updated_at, id) FROM stdin;
    public          postgres    false    215   >                  0    0    todo_tid_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.todo_tid_seq', 2, true);
          public          postgres    false    217                       0    0    user_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.user_id_seq', 2, true);
          public          postgres    false    216            n           2606    32784    todo todos_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.todo
    ADD CONSTRAINT todos_pkey PRIMARY KEY (tid);
 9   ALTER TABLE ONLY public.todo DROP CONSTRAINT todos_pkey;
       public            postgres    false    214            ?   5   x?3?????,??TH?UH??O?4?4202?54?5Fa????g??s??qqq ??Q      ?   ?   x?e???0 Eg??b[Dq?D?1?B??@mh?????e2?3???K????[?+?n??J'??ix????8v???.?*??K'UT??4?lݱ>?^??ى*?H?0?x?&??"?Ҳ??O??6?-;?VR-?$???M??Kl|??C??SfĨ??`?>???Qp? o?sA?     