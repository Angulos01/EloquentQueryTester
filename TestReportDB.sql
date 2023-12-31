PGDMP  4    *        
    	    {        
   TestReport    16.0    16.0 P    J           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            K           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            L           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            M           1262    16397 
   TestReport    DATABASE     �   CREATE DATABASE "TestReport" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE "TestReport";
                postgres    false            �            1259    16398 	   companies    TABLE     �   CREATE TABLE public.companies (
    id bigint NOT NULL,
    name character varying(50) NOT NULL,
    address character varying(100) NOT NULL
);
    DROP TABLE public.companies;
       public         heap    postgres    false            �            1259    16401    companies_id_seq    SEQUENCE     y   CREATE SEQUENCE public.companies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.companies_id_seq;
       public          postgres    false    215            N           0    0    companies_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.companies_id_seq OWNED BY public.companies.id;
          public          postgres    false    216            �            1259    16402    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    16408    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    217            O           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    218            �            1259    16409 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16412    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    219            P           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    220            �            1259    16413    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    16418    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    16423    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    222            Q           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    223            �            1259    16424    reports    TABLE       CREATE TABLE public.reports (
    id bigint NOT NULL,
    company_id integer NOT NULL,
    title character varying(60) NOT NULL,
    data json NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id integer
);
    DROP TABLE public.reports;
       public         heap    postgres    false            �            1259    16429    reports_id_seq    SEQUENCE     w   CREATE SEQUENCE public.reports_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.reports_id_seq;
       public          postgres    false    224            R           0    0    reports_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.reports_id_seq OWNED BY public.reports.id;
          public          postgres    false    225            �            1259    16430    roles    TABLE     _   CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(20) NOT NULL
);
    DROP TABLE public.roles;
       public         heap    postgres    false            �            1259    16433    roles_id_seq    SEQUENCE     u   CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public          postgres    false    226            S           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public          postgres    false    227            �            1259    16434    user_companies    TABLE     |   CREATE TABLE public.user_companies (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    company_id bigint NOT NULL
);
 "   DROP TABLE public.user_companies;
       public         heap    postgres    false            �            1259    16437    user_companies_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.user_companies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.user_companies_id_seq;
       public          postgres    false    228            T           0    0    user_companies_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.user_companies_id_seq OWNED BY public.user_companies.id;
          public          postgres    false    229            �            1259    16438    user_reports    TABLE     y   CREATE TABLE public.user_reports (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    report_id bigint NOT NULL
);
     DROP TABLE public.user_reports;
       public         heap    postgres    false            �            1259    16441    user_reports_id_seq    SEQUENCE     |   CREATE SEQUENCE public.user_reports_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.user_reports_id_seq;
       public          postgres    false    230            U           0    0    user_reports_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.user_reports_id_seq OWNED BY public.user_reports.id;
          public          postgres    false    231            �            1259    16442    users    TABLE     	  CREATE TABLE public.users (
    id bigint NOT NULL,
    fullname character varying(60) NOT NULL,
    role_id integer NOT NULL,
    phone_number character varying(20) NOT NULL,
    email character varying(50) NOT NULL,
    password character varying(25) NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16445    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    232            V           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    233            |           2604    16446    companies id    DEFAULT     l   ALTER TABLE ONLY public.companies ALTER COLUMN id SET DEFAULT nextval('public.companies_id_seq'::regclass);
 ;   ALTER TABLE public.companies ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215            }           2604    16447    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217                       2604    16448    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    219            �           2604    16449    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222            �           2604    16450 
   reports id    DEFAULT     h   ALTER TABLE ONLY public.reports ALTER COLUMN id SET DEFAULT nextval('public.reports_id_seq'::regclass);
 9   ALTER TABLE public.reports ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224            �           2604    16451    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226            �           2604    16452    user_companies id    DEFAULT     v   ALTER TABLE ONLY public.user_companies ALTER COLUMN id SET DEFAULT nextval('public.user_companies_id_seq'::regclass);
 @   ALTER TABLE public.user_companies ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228            �           2604    16453    user_reports id    DEFAULT     r   ALTER TABLE ONLY public.user_reports ALTER COLUMN id SET DEFAULT nextval('public.user_reports_id_seq'::regclass);
 >   ALTER TABLE public.user_reports ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    231    230            �           2604    16454    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    233    232            5          0    16398 	   companies 
   TABLE DATA           6   COPY public.companies (id, name, address) FROM stdin;
    public          postgres    false    215   �]       7          0    16402    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    217   Ka       9          0    16409 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    219   ha       ;          0    16413    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    221   *b       <          0    16418    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    222   Gb       >          0    16424    reports 
   TABLE DATA           _   COPY public.reports (id, company_id, title, data, created_at, updated_at, user_id) FROM stdin;
    public          postgres    false    224   db       @          0    16430    roles 
   TABLE DATA           )   COPY public.roles (id, name) FROM stdin;
    public          postgres    false    226   +i       B          0    16434    user_companies 
   TABLE DATA           A   COPY public.user_companies (id, user_id, company_id) FROM stdin;
    public          postgres    false    228   ki       D          0    16438    user_reports 
   TABLE DATA           >   COPY public.user_reports (id, user_id, report_id) FROM stdin;
    public          postgres    false    230   �i       F          0    16442    users 
   TABLE DATA           U   COPY public.users (id, fullname, role_id, phone_number, email, password) FROM stdin;
    public          postgres    false    232   �i       W           0    0    companies_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.companies_id_seq', 20, true);
          public          postgres    false    216            X           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    218            Y           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);
          public          postgres    false    220            Z           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    223            [           0    0    reports_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.reports_id_seq', 45, true);
          public          postgres    false    225            \           0    0    roles_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.roles_id_seq', 4, true);
          public          postgres    false    227            ]           0    0    user_companies_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.user_companies_id_seq', 1, false);
          public          postgres    false    229            ^           0    0    user_reports_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.user_reports_id_seq', 1, false);
          public          postgres    false    231            _           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 20, true);
          public          postgres    false    233            �           2606    16456    companies companies_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.companies
    ADD CONSTRAINT companies_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.companies DROP CONSTRAINT companies_pkey;
       public            postgres    false    215            �           2606    16458    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    217            �           2606    16460 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    217            �           2606    16462    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    219            �           2606    16464 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    221            �           2606    16466 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    222            �           2606    16468 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    222            �           2606    16470    reports reports_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.reports
    ADD CONSTRAINT reports_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.reports DROP CONSTRAINT reports_pkey;
       public            postgres    false    224            �           2606    16472    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public            postgres    false    226            �           2606    16474 "   user_companies user_companies_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.user_companies
    ADD CONSTRAINT user_companies_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.user_companies DROP CONSTRAINT user_companies_pkey;
       public            postgres    false    228            �           2606    16476    user_reports user_reports_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.user_reports
    ADD CONSTRAINT user_reports_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.user_reports DROP CONSTRAINT user_reports_pkey;
       public            postgres    false    230            �           2606    16478    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    232            �           1259    16479 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    222    222            �           2606    16480 "   reports reports_company_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.reports
    ADD CONSTRAINT reports_company_id_foreign FOREIGN KEY (company_id) REFERENCES public.companies(id) ON DELETE CASCADE;
 L   ALTER TABLE ONLY public.reports DROP CONSTRAINT reports_company_id_foreign;
       public          postgres    false    4743    215    224            �           2606    16485    reports reports_user_id_foreign    FK CONSTRAINT     ~   ALTER TABLE ONLY public.reports
    ADD CONSTRAINT reports_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 I   ALTER TABLE ONLY public.reports DROP CONSTRAINT reports_user_id_foreign;
       public          postgres    false    224    4766    232            �           2606    16490 0   user_companies user_companies_company_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.user_companies
    ADD CONSTRAINT user_companies_company_id_foreign FOREIGN KEY (company_id) REFERENCES public.companies(id) ON DELETE CASCADE;
 Z   ALTER TABLE ONLY public.user_companies DROP CONSTRAINT user_companies_company_id_foreign;
       public          postgres    false    4743    215    228            �           2606    16495 -   user_companies user_companies_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.user_companies
    ADD CONSTRAINT user_companies_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 W   ALTER TABLE ONLY public.user_companies DROP CONSTRAINT user_companies_user_id_foreign;
       public          postgres    false    232    228    4766            �           2606    16500 +   user_reports user_reports_report_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.user_reports
    ADD CONSTRAINT user_reports_report_id_foreign FOREIGN KEY (report_id) REFERENCES public.reports(id) ON DELETE CASCADE;
 U   ALTER TABLE ONLY public.user_reports DROP CONSTRAINT user_reports_report_id_foreign;
       public          postgres    false    230    224    4758            �           2606    16505 )   user_reports user_reports_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.user_reports
    ADD CONSTRAINT user_reports_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 S   ALTER TABLE ONLY public.user_reports DROP CONSTRAINT user_reports_user_id_foreign;
       public          postgres    false    230    4766    232            �           2606    16510    users users_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 E   ALTER TABLE ONLY public.users DROP CONSTRAINT users_role_id_foreign;
       public          postgres    false    232    226    4760            5   �  x�]��r�8E����S�m��cB�!2�@��*^h�!e$9��m�[�/��ݺ:�^q��~����&eUJ�U��v�^]qm����'z������ ��੤�$g�=�`�ޟ�yS�w���Lf9���i4[��y�,]�V{��o(+^�i����>D�0�[Vf�0��h���x
k;U��K�v��4c���2-y^&%+�1#��m�Ld��1Z��L6"���-��E�O�7������:ܴ"�̗ ���D���A}����و*�_���m���{"���0��(dQ7iQ�2���w�5�.aJ�a�Y�fm�:�zƄ��#X��,D��l�^����'�V�ȤE����7d;%o^�g2��H��ň�Tu�t�Z��Q[�`�]�)���A4�ڮh�=�?��λ�9�QI���R&i�Ś��YAF�����D�:���w�^զUh��L�3^�Uë�gl�Q�����L;bA1T۫�묎#�2+���H8g/;��t�Ԟ	Q�-Q��-^��o~)]����M�svO�b:��G{fR��U����>ƍ6}Z���4��2�{��a���6��ȳ�_�\d�5�ӆ�&KiZԸţ��j�#�M�^�;�mTH�5Zwb����#ٵ���{�핐W&�Ai�����B#^'\��Ɩ8�*�}qj�h����B6�����G�O�k9Q���D�b+�����gY���m��2�p�M�4֗�.Ƅ8����+�>-?)N�)��/��p�S]WƪOz�d��DG�iGl�xPk8��[Q�(Q~{Q@�\�<���"����(x�+Ox��ʱ�A��������H�XY5T��:o������y���\��x<�E�WI����:������>�>���'�R9�� П�z�v����BJ�ے\���G�$� Q#��      7      x������ � �      9   �   x�]��� �kyC�q�]L�j2ű ����,2G/z����IpPA���H6.6�w�#FJ�1��	�<���4�{,����ӈ�0�\n����C����l=Z�(��H�I!����N�0�d�v�(d�.<;O��b]�y���
�J.k=-!��-������m��~����1��z��      ;      x������ � �      <      x������ � �      >   �  x��X�r�F<_��3��b��MVT�*�䲔\�����^�C�ĕO^ă�E�*��E�LO�,lnp�����3��瘱�ϲ�{��Ŏ-d�2-�Ų��[���@�u��(ɗ�!	˴����j<G$����\�ŒI�de�d��V���Y�E��@�:��ᰜ}+5+�@->���e���l�q{爝�����0�]ޞ__^� %��-�7;�S;��	װM�1��������qwǭ�G�lk�laڮ�Bt�ޝ�wy���i���(�O��j���D*Uu_�y��\0����şW�F�,�q􍵳�!�Q^�I����_N����k��q>����d��v�ޢi�|�-����J�@�8�j�~��Z��ŲeCP�ˢ� �@`�I=�X+<�D�I^�	=��_�*J�,�U�k��	b��,
�C{X.�=��Y�FP�:*�C�Q��вOؿ�L�A�,��@��Q�ZxN�����.3�t�˨.S]5��oW�|u~y}uR>�8;>��:gF� �P�AI:J����M�,? r(ɓ^^nb�_ʯZ+����@L��%�f�V�~�˸Є����j�P�I�˜�e\0?�2��30�&|V��u$W��ne��9ur^Fh9B�fɃ��䣎:�&�.#���QA�lL%� ��~�(�
|k�?W�@.U�K:~�2	�)R�L07�a�,��4}���|9t�t,(����ˢ9S�׍�͉Z�,.YI�C�+9�^j�G$P<D湦k�	�*&�~@
ȑGRI�����&�C�s���<M��P��@�����e�e�J�g赹!�W��(��pP�xh&4�*<Ԟՙ�OQ���
}l�m��J�+�AI1���30ǖ�i��d����P*��2O�������B9gpؚq��T$55���q�K��rx���$!��%"���7�B�+��+�ӆ�ǛV�>�8�W�X��^�y��WJ���z2�Ԧá��T!1L��}
��z�؜�c�H/��W|���Ȳ�Sm��ִ����HtoH������f�C�nԜ|<3ǣ�j�Q8�.K�A���V�I��S�1k��&\�1����N�)��r�gZW:�V��J�<=͵�["�Q���A�uʡ=N��.R��v�B��Жm���EL���h��{"�V�s�;&���s&�n�D�M|���AͰ��%Sw�5�0�%^�Sy��4yfYǵumx6�	�ަ:H���Hm�ㄷv�4��S,�h{�.U�W���ظ�m86�l2k�@���h���C	"JV8!�c�`���!\�����03pnLތ�#����tSmW��0��\oi���3rd�|�ݙ�ؚ��>�(�M�����ߜ.P2,_,E�.b��ske����?/�b�xx�y4��/9���."F��v������!�}�x����E�! N�F ��0�7 �)��Q|猹t1�t�n�rߊKq��;�dO���\S�N*J�l� QbR��X}���Q*�c�z�6ߏ�#��M�1����k�L�dЬ+4{.@�oНb����F��]�R�#�w��g;�c�7̏��/{�?ų��?���,��V�nR�oR�2�t��u����\�N���f�I��;��/�M�Ƅ��iם+��ý��[�&�|��=Ӂ[X�Y~?�d���dMUlk:.}�}�i��6�P����W��W��O�i��2W�      @   0   x�3���LI-�2�t����9�RKR���L8}3Ss���b���� "z�      B      x������ � �      D      x������ � �      F     x�U�m_�H�_O>E\ti���SD��n�"�K��4��C��2I�(���6�ۥ���sϹ�\�>�
�g����F�x$b^�![Q(�����T�P����ɕ�`���O��Y�+���^:��w{"u.�}YUJO�Ea/�b/��Ę!D?���r��n}=����fǡh7W��s%������v#�=%�"���Kn�����<)ʙv�c*�:��{b�1��S��P4�~R`�C)mg�g3���q;�/V�q8:�DZ��23y�)�g��R�E���e)� ��3VTٵG��n�}4�\��s������cI�a�ФFR���b*���ӟ{�w�py~U::�f��rߛ��n���',�)!�*��J��`���`�Y�w�~-X3�N���s�fJ>�IA'�!I"p�D-�`x	w�����n_:	���J�*㞨T6�	L�0�C�)*Rk�Z�v�s�����J�m��� �Z-�q���Dh�x��
i�E$�d�];Z�b84U��Y٠:��^���o}�`�v5�T)�cs���������]αS��JQUugb��c���mP7�ǳ��:kwi���������H��|�!݋����9g(�V��ZL�iHý�����Nvp�s�ho9x�oy/��,����*��а�2B�(�8�T�E� ���V��ok���=x+��+�來��j�$^���(F��I�"U�S��/�_泭��o�㞃9�Ti����Q�I�G�@S@Za���C���P��XZV��Yr�zL��l�w	M�v�ч9E�5VE�y���1FƊ<���ʆ��/���-5�����*qp����5�Jh3����S��}��0O�N�Jļc�z�\@2��ӛ����ʬ]����c�3�1���	�M��H�M��#�Y/��-�����>���U(���C����r*���&,�XD�@�dV6��������������CP)�tո�b8�Sǉ��,��i.��ʎ�`�J�zy3�=3����������ͽ'     