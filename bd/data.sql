INSERT INTO `pays`( pays_code, nom, nationalite) VALUES ('ZA', 'Afrique du Sud' , 'Sud-Africain' ) ,
('AL', 'Albanie' , 'Albanais' ) ,
('DZ', 'Algérie' , 'Algérien' ) ,
('DE', 'Allemagne' , 'Allemand' ) ,
('AR', 'Argentine' , 'Argentin' ) ,
('AU', 'Australie' , 'Australien' ) ,
('AT', 'Autriche' , 'Autrichien' ) ,
('BJ', 'Bénin' , 'Benin' ) ,
('BE', 'Belgique' , 'Belge' ) ,
('BT', 'Bhoutan' , 'Bouthan' ) ,
('BW', 'Botswana' , 'Botswanais' ) ,
('BR', 'Brésil' , 'Brésilien' ) ,
('BG', 'Bulgarie' , 'Bulgare' ) ,
('BF', 'Burkina Faso' , 'Burkina Faso' ) ,
('CI', 'Côte d\'Ivoire' , 'Ivoirien' ) ,
('KH', 'Cambodge' , 'Cambodgien' ) ,
('CM', 'Cameroun' , 'Camerounais' ) ,
('CA', 'Canada' , 'Canadien' ) ,
('CL', 'Chili' , 'Chilien' ) ,
('CN', 'Chine' , 'Chinois' ) ,
('CO', 'Colombie' , 'Colombien' ) ,
('KR', 'Corée du Sud' , 'Coréen' ) ,
('CR', 'Costa Rica' , 'Costaricien' ) ,
('HR', 'Croatie' , 'Croate' ) ,
('CU', 'Cuba' , 'Cubain' ) ,
('DK', 'Danemark' , 'Danois' ) ,
('EG', 'Égypte' , 'Egyptien' ) ,
('EC', 'Équateur' , 'Equatorien' ) ,
('ES', 'Espagne' , 'Espagnol' ) ,
('EE', 'Estonie' , 'Estonien' ) ,
('US', 'États-Unis' , 'Américain' ) ,
('FI', 'Finlande' , 'Finlandais' ) ,
('FR', 'France' , 'Français' ) ,
('GE', 'Géorgie' , 'Georgien' ) ,
('GA', 'Gabon' , 'Gabonais' ) ,
('GR', 'Grèce' , 'Grec' ) ,
('HT', 'Haïti' , 'Haïtien' ) ,
('HK', 'Hong Kong' , 'Hong-Kong' ) ,
('HU', 'Hongrie' , 'Hongrois' ) ,
('IN', 'Inde' , 'Indien' ) ,
('IR', 'Iran' , 'Iranien' ) ,
('IE', 'Irlande' , 'Irlandais' ) ,
('IS', 'Islande' , 'Islandais' ) ,
('IL', 'Israël' , 'Israélien' ) ,
('IT', 'Italie' , 'Italien' ) ,
('JM', 'Jamaïque' , 'Jamaïcain' ) ,
('JP', 'Japon' , 'Japonais' ) ,
('KZ', 'Kazakhstan' , 'Kazakh' ) ,
('LV', 'Lettonie' , 'Lettonien' ) ,
('LB', 'Liban' , 'Libanais' ) ,
('LT', 'Lituanie' , 'Lituanien' ) ,
('LU', 'Luxembourg' , 'Luxembourgeois' ) ,
('MG', 'Madagascar' , 'Malgache' ) ,
('ML', 'Mali' , 'Malien' ) ,
('MA', 'Maroc' , 'Marocain' ) ,
('MX', 'Mexique' , 'Mexicain' ) ,
('NO', 'Norvège' , 'Norvégien' ) ,
('NZ', 'Nouvelle-Zélande' , 'Néo-Zélandais' ) ,
('PE', 'Pérou' , 'Péruvien' ) ,
('NL', 'Pays-Bas' , 'Néerlandais' ) ,
('PL', 'Pologne' , 'Polonais' ) ,
('PT', 'Portugal' , 'Portugais' ) ,
('CZ', 'République tchèque' , 'Tchèque' ) ,
('RO', 'Roumanie' , 'Roumain' ) ,
('GB', 'Royaume-Uni' , 'Britannique' ) ,
('RU', 'Russie' , 'Russe' ) ,
('SN', 'Sénégal' , 'Sénégalais' ) ,
('SG', 'Singapour' , 'Singapourien' ) ,
('SI', 'Slovénie' , 'Slovaque' ) ,
('SE', 'Suède' , 'Suédois' ) ,
('CH', 'Suisse' , 'Suisse' ) ,
('TW', 'Taïwan' , 'Taïwanais' ) ,
('TN', 'Tunisie' , 'Tunisien' ) ,
('TR', 'Turquie' , 'Turc' ) ,
('UA', 'Ukraine' , 'Ukrainien' ) ,
('UY', 'Uruguay' , 'Uruguayen' ) ,
('VE', 'Venezuela' , 'Vénézuélien' );


INSERT INTO `client` (`client_id`, `num_passport`, `nom`, `prenom`, `date_naissance`, `email`, `password`, `phone`, `nationalite`, `date_emission_passport`, `date_expiration_passport`) VALUES
(1, '321521', 'mehal', 'anis', '1999-05-29', 'mehalanis29@gmail.com', '38a1ffb5ccad9612d3d28d99488ca94b', '01264521', 3, '2018-05-19', '2022-06-19');


INSERT INTO `ville` (`ville_id`, `nom`, `pays_id`) VALUES
(1, 'ROMA', 45);

INSERT INTO `endroit` (`endroit_id`, `endroit_nom`, `ville_id`, `description`) VALUES
(1, 'Alger - Rome', 1, 'Départ de Alger à destination de ROME sur vol Air-algerie. Arrivé assistance et départ vers Rome , arriver à Hôtel, répartition des chambres et soirée libre '),
(2, 'Big Bus Rome Hop-on Hop-off', 1, 'Asseyez-vous et profitez de la balade à bord d\'un bus à toit ouvert et découvrez l\'histoire unique et ancienne de Rome. ');

INSERT INTO `hotel` (`hotel_id`, `ville_id`, `nom`, `telephone`, `address`, `class`, `img`) VALUES
(1, 1, 'Novotel Paris Centre Gare Mont', '+3345123326', '17 rue du Cotentin, 75015 Paris France', 4, 'test');



INSERT INTO `voyage` (`voyage_id`, `nom`, `ville_id`, `guide_id`, `nbr_jour`, `hotel_id`, `cover`, `description`) VALUES
(1, 'ROMA 2019', 1, NULL, 7, 1, 'test.jpg', 'Roma la ville la plus belle'),
(2, 'test_nom', 1, NULL, 7, 1, 'test.jpg', 'test');


INSERT INTO `voyage_date` (`voyage_date_id`, `voyage_id`, `date_depart`, `date_retour`, `capacite`, `prix_A_S`, `prix_A_D`, `prix_A_T`, `prix_E`, `prix_B`) VALUES
(1, 2, '2019-05-29', '2019-05-07', 251, 11, 12, 13, 14, 15),
(2, 2, '2020-05-18', '2020-05-23', 101, 6, 7, 8, 9, 10),
(3, 1, '2019-01-05', '2019-01-15', 100, 1, 2, 3, 4, 5);

INSERT INTO `voyage_jour` (`voyage_jour_id`, `voyage_id`, `nbr_jour`, `endroit_id`) VALUES
(2, 1, 1, 1),
(3, 1, 2, 2);