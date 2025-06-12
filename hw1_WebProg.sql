create database Hmw1_WebProg;
use Hmw1_WebProg;

create table Profilo(
  nome varchar(20) not null,
  cognome varchar(30) not null,
  genere varchar(20) not null,
  email varchar(25) PRIMARY KEY,
  password varchar(20) not null
);

create table Prodotti(
  nome varchar(150) not null PRIMARY KEY,          
  prezzo_intero integer not null,
  prezzo_decimale integer not null,
  tipo varchar(30) not null,         /*Manga, Figure, Card game, Jap-News, Preordine*/
  immagine varchar(200) not null
);

create table Carrello(
  utente varchar(25) not null,
  nome_prod varchar(150) not null,
  prezzo varchar(10) not null,
  img varchar(200) not null,
  copie integer,
  FOREIGN KEY (utente) REFERENCES Profilo(email),
  FOREIGN KEY (nome_prod) REFERENCES Prodotti(nome)
);

insert into PROFILO values('Mario', 'Blu', 'Uomo', 'marioblu@gmail.com', 'password');
insert into PROFILO values('Anna', 'Rossi', 'Donna', 'annaRossi98@gmail.com', 'mirtillo');
insert into PROFILO values('Giacomo', 'Arena', 'Non-binario', 'GiacAren578@gmail.com', 'Lobster560');
insert into PROFILO values('Marta', 'Comi', 'Non-Specificato', 'martyComes@gmail.com', 'marta2407comi2007');

/*Prodotti Ultime Uscite, cioè i nuovi manga in italiano */
insert into Prodotti values('Four Knights of Apocalypse 19', 5, 20, 'Manga', 'https://mangayo.it/47280-home_default/four-knights-of-the-apocalypse-19.jpg');
insert into Prodotti values('X6 - Crucisix 9', 6, 50, 'Manga', 'https://mangayo.it/47286-large_default/x6-crucisix-9.jpg');
insert into Prodotti values('Fall In Love, You False Angels 2', 6, 50, 'Manga', 'https://mangayo.it/47266-large_default/fall-in-love-you-false-angels-2.jpg');
insert into Prodotti values('Il Nostro Eden Senza Dio 1', 7, 50, 'Manga', 'https://mangayo.it/47390-large_default/il-nostro-eden-senza-dio-1.jpg');
insert into Prodotti values('Shadows House 18', 6, 50, 'Manga', 'https://mangayo.it/47260-large_default/shadows-house-18.jpg');
insert into Prodotti values('Blue Box 13', 5, 90, 'Manga', 'https://mangayo.it/47272-large_default/blue-box-13.jpg');
insert into Prodotti values('A Sign Of Affection 11', 5, 90, 'Manga', 'https://mangayo.it/47270-large_default/a-sign-of-affection-11.jpg');
insert into Prodotti values('Rurouni Kenshin Perfect Edition 20', 9, 00, 'Manga', 'https://mangayo.it/47282-large_default/rurouni-kenshin-perfect-edition-20.jpg');
insert into Prodotti values("La Mia Senpai E' Un Ragazzo 3", 12, 00, 'Manga', 'https://mangayo.it/47262-large_default/la-mia-senpai-e-un-ragazzo-3.jpg');
insert into Prodotti values('Uterus Of The Blackgoat 1', 7, 90, 'Manga', 'https://mangayo.it/47321-large_default/uterus-of-the-blackgoat-1.jpg');
insert into Prodotti values('Edens Zero 27', 5, 50, 'Manga', 'https://mangayo.it/47276-large_default/edens-zero-27.jpg');
insert into Prodotti values("Super String - Marco Polo's Travel To The Multiverse 2", 6, 50, 'Manga', 'https://mangayo.it/47284-large_default/super-string-marco-polo-s-travel-to-the-multiverse-2.jpg');

/*Prodotti Jap_news */
insert into Prodotti values('Wind Breaker Official Anime Season 1 Postcard Book - Edizione Giapponese', 29, 90, 'Jap-News', 'https://mangayo.it/47241-large_default/wind-breaker-official-anime-season-1-postcard-book-edizione-giapponese.jpg');
insert into Prodotti values('My Hero Academia Ultra Age The Final Fan Book - Edizione Giapponese', 19, 90, 'Jap-News', 'https://mangayo.it/46785-large_default/my-hero-academia-ultra-age-the-final-fan-book-edizione-giapponese.jpg');
insert into Prodotti values('Piano Solo TV Anime Dandadan - Edizione Giapponese', 24, 90, 'Jap-News', 'https://mangayo.it/46358-large_default/piano-solo-tv-anime-dandadan-edizione-giapponese.jpg');
insert into Prodotti values('The Quintessential Quintuplets Anime Visual Book: Itsuki', 34, 90, 'Jap-News', 'https://mangayo.it/46368-large_default/the-quintessential-quintuplets-anime-visual-book-itsuki.jpg');
insert into Prodotti values('Weekly Famitsu 10 2022 - Genshin Impact', 29, 90, 'Jap-News','https://mangayo.it/46315-large_default/weekly-famitsu-10-2022-genshin-impact.jpg');
insert into Prodotti values('Saikyo Jump 5 2025 - Card One Piece TCG + Card Super Dragon Ball Heroes + Card Yu-Gi-Oh! Rush Duel', 29, 90, 'Jap-News', 'https://mangayo.it/46402-large_default/saikyo-jump-5-2025-card-one-piece-tcg-card-super-dragon-ball-heroes-card-yu-gi-oh-rush-duel.jpg');
insert into Prodotti values('Deleter B4 Comic Book Paper - Edizione Giapponese', 24, 90, 'Jap-News', 'https://mangayo.it/46300-large_default/deleter-b4-comic-book-paper-edizione-giapponese.jpg');
insert into Prodotti values('Blue Lock Character Book Egoist Bible Vol.2 - Edizione Giapponese', 24, 90, 'Jap-News', 'https://mangayo.it/46360-large_default/blue-lock-character-book-egoist-bible-vol2-edizione-giapponese.jpg');
insert into Prodotti values('Art Of Battle Koichi Ohata Robot Chronicle - Edizione Giapponese', 64, 90, 'Jap-News', 'https://mangayo.it/46574-large_default/art-of-battle-koichi-ohata-robot-chronicle-edizione-giapponese.jpg');
insert into Prodotti values('Ultra Jump 5 2025 - Jack Jeanne Duckweed', 29, 90, 'Jap-News', 'https://mangayo.it/46572-large_default/ultra-jump-5-2025-jack-jeanne-duckweed.jpg');
insert into Prodotti values('BUNDLE: One Piece Jump Remix Edition 1-10', 299, 90, 'Jap-News', 'https://mangayo.it/46606-large_default/bundle-one-piece-jump-remix-edition-1-10.jpg');
insert into Prodotti values('Saikyo Jump 6 2025 - Card Yu-Gi-Oh! Rush Duel + ...', 29, 90, 'Jap-News', 'https://mangayo.it/46786-large_default/saikyo-jump-6-2025-card-yu-gi-oh-rush-duel-card-kinnikuman-union-arena-stickers-jujutsu-kaisen-posters-my-hero-academia.jpg');

/*Prodotti Figure */
insert into Prodotti values('Monkey D. Luffy Gear 5 Grandista - One Piece - Banpresto Figure', 49, 90, 'Figure', 'https://mangayo.it/47315-large_default/monkey-d-luffy-gear-5-grandista-one-piece-banpresto-figure.jpg');
insert into Prodotti values('Pochita Big Sofvimates - Chainsaw Man - Banpresto Figure', 39, 90, 'Figure', 'https://mangayo.it/47298-large_default/pochita-big-sofvimates-chainsaw-man-banpresto-figure.jpg');
insert into Prodotti values('Mikasa Ackerman - Attack On Titan - Good Smile Company Figure', 199, 90, 'Figure', 'https://mangayo.it/45663-large_default/mikasa-ackerman-attack-on-titan-good-smile-company-figure.jpg');
insert into Prodotti values('Albero Bonsai - Botanicals - Lego Figure', 49, 90, 'Figure', 'https://mangayo.it/46514-large_default/albero-bonsai-botanicals-lego-figure.jpg');
insert into Prodotti values('Super Saiyan Son Gohan Match Makers - Dragon Ball Z - Banpresto Figure', 39, 90, 'Figure', 'https://mangayo.it/47303-large_default/super-saiyan-son-gohan-match-makers-dragon-ball-z-banpresto-figure.jpg');
insert into Prodotti values('Muichiro Tokito Last One Guance Marchiate Demon Slayer Breached Swordsmith Village Ichiban Kuji - Bandai Figure', 129, 90, 'Figure', 'https://mangayo.it/44979-large_default/muichiro-tokito-last-one-guance-marchiate-demon-slayer-breached-swordsmith-village-ichiban-kuji-bandai-figure.jpg');
insert into Prodotti values('Funko Pop! Animation 99 - Hello Kitty Hello Kitty And Friends', 15, 90, 'Figure', 'https://mangayo.it/45929-large_default/funko-pop-animation-99-hello-kitty-hello-kitty-and-friends.jpg');
insert into Prodotti values('Fiori Di Ciliegio - Botanicals - Lego Figure', 14, 99, 'Figure', 'https://mangayo.it/47005-large_default/fiori-di-ciliegio-botanicals-lego-figure.jpg');
insert into Prodotti values('Monkey D. Luffy Gear 5 - One Piece - Banpresto Figure', 39, 90, 'Figure', 'https://mangayo.it/47313-large_default/monkey-d-luffy-gear-5-one-piece-banpresto-figure.jpg');
insert into Prodotti values('Ufo - Astro Boy - Pantasy Figure', 14, 90, 'Figure', 'https://mangayo.it/46759-large_default/ufo-astro-boy-pantasy-figure.jpg');
insert into Prodotti values('Albicocco Giapponese - Botanicals - Lego Figure', 29, 99, 'Figure', 'https://mangayo.it/46508-large_default/albicocco-giapponese-botanicals-lego-figure.jpg');
insert into Prodotti values('Vintage Car - Astro Boy - Pantasy Figure', 14, 90, 'Figure', 'https://mangayo.it/46768-large_default/vintage-car-astro-boy-pantasy-figure.jpg');

/*Prodotti Card Game */
insert into Prodotti values('One Piece Card Game: A Fist Of Divine Speed - Booster Display Box (24 buste) OP-11 [ENG]', 115, 20, 'Card Game', 'https://mangayo.it/45326-large_default/one-piece-card-game-a-fist-of-divine-speed-booster-display-box-24-buste-op-11-eng-.jpg');
insert into Prodotti values('One Piece Card Game Starter Deck - ST-23 [ENG]', 17, 90, 'Card Game', 'https://mangayo.it/46190-large_default/one-piece-card-game-starter-deck-st-23-eng-.jpg');
insert into Prodotti values('One Piece Card Game Starter Deck - ST-24 [ENG]', 17, 90, 'Card Game', 'https://mangayo.it/46191-large_default/one-piece-card-game-starter-deck-st-24-eng-.jpg');
insert into Prodotti values('One Piece Card Game Starter Deck: The Three Captains Ultra Deck - ST-10 [ENG]', 49, 90, 'Card Game', 'https://mangayo.it/31348-large_default/one-piece-card-game-starter-deck-the-three-captains-ultra-deck-st-10-eng.jpg');
insert into Prodotti values('One Piece Card Game Starter Deck: The Seven Warlords of the sea BLUE - ST-03 [ENG]', 24, 90, 'Card Game', 'https://mangayo.it/11859-large_default/one-piece-card-game-starter-deck-the-seven-warlords-of-the-sea-blue-st-03-eng.jpg');
insert into Prodotti values('One Piece Card Game: Marshall D. Teach Sleeve Limited Edition Vol.3 (Standard Size)', 9, 90, 'Card Game', 'https://mangayo.it/47386-large_default/one-piece-card-game-marshall-d-teach-sleeve-limited-edition-vol3-standard-size.jpg');
insert into Prodotti values('One Piece Card Game: Premium Card Collection Best Selection Vol.3 - [ENG]', 44, 90, 'Card Game', 'https://mangayo.it/43205-large_default/one-piece-card-game-premium-card-collection-best-selection-vol3-eng-.jpg'); /*ripartire da qui*/
insert into Prodotti values('One Piece Card Game Starter Deck: Animal Kingdom Pirates PURPLE - ST-04 [ENG]', 24, 90, 'Card Game', 'https://mangayo.it/11862-large_default/one-piece-card-game-starter-deck-animal-kingdom-pirates-purple-st-04-eng.jpg');
insert into Prodotti values('One Piece Card Game: Mugiwara Dreams Sleeve Limited Edition Vol.3 (Standard Size)', 9, 90, 'Card Game', 'https://mangayo.it/47387-large_default/one-piece-card-game-mugiwara-dreams-sleeve-limited-edition-vol3-standard-size.jpg');
insert into Prodotti values('One Piece Card Game Starter Deck - ST-28 [ENG]', 17, 90, 'Card Game', 'https://mangayo.it/46195-large_default/one-piece-card-game-starter-deck-st-28-eng-.jpg');
insert into Prodotti values('One Piece Card Game Starter Deck - ST-25 [ENG]', 17, 90, 'Card Game', 'https://mangayo.it/46192-large_default/one-piece-card-game-starter-deck-st-25-eng-.jpg');
insert into Prodotti values('One Piece Card Game Starter Deck: Worst Generation GREEN - ST-02 [ENG]', 24, 90, 'Card Game', 'https://mangayo.it/11856-large_default/one-piece-card-game-starter-deck-worst-generation-green-st-02-eng.jpg');

/*Prerdini */
insert into Prodotti values('[PREORDINE] La Nave Pirata Going Merry - One Piece Netflix - Lego Figure', 129, 99, 'Preordine', 'https://mangayo.it/47403-large_default/-preordine-la-nave-pirata-going-merry-one-piece-netflix-lego-figure.jpg');
insert into Prodotti values('[PREORDINE] Baratie, Il Ristorante Galleggiante - One Piece Netflix - Lego Figure', 299, 99, 'Preordine', 'https://mangayo.it/47412-large_default/-preordine-baratie-il-ristorante-galleggiante-one-piece-netflix-lego-figure.jpg');
insert into Prodotti values('[PREORDINE] La Capanna Del Villaggio Foosha - One Piece Netflix - Lego Figure', 29, 99, 'Preordine', 'https://mangayo.it/47423-large_default/-preordine-la-capanna-del-villaggio-foosha-one-piece-netflix-lego-figure.jpg');
insert into Prodotti values('[PREORDINE] Battaglia Ad Arlong Park - One Piece Netflix - Lego Figure', 79, 99, 'Preordine', 'https://mangayo.it/47431-large_default/-preordine-battaglia-ad-arlong-park-one-piece-netflix-lego-figure.jpg');
insert into Prodotti values('[PREORDINE] La Tenda Del Circo Di Bagy Il Clown - One Piece Netflix - Lego Figure', 49, 99, 'Preordine', 'https://mangayo.it/47443-large_default/-preordine-la-tenda-del-circo-di-bagy-il-clown-one-piece-netflix-lego-figure.jpg');
insert into Prodotti values('[PREORDINE] One Piece Card Game: Carrying On His Will - Booster Display Box (24 buste) OP-13 [ENG]', 129, 60, 'Preordine', 'https://mangayo.it/47395-large_default/-preordine-one-piece-card-game-carrying-on-his-will-booster-display-box-24-buste-op-13-eng-.jpg');
insert into Prodotti values('[PREORDINE] One Piece Card Game Learn Together Deck Set - LT-01 [ENG]', 39, 90, 'Preordine', 'https://mangayo.it/47393-large_default/-preordine-one-piece-card-game-learn-together-deck-set-lt-01-eng-.jpg');
insert into Prodotti values('[PREORDINE] Hunter X Hunter 38 Instant Variant', 7, 9, 'Preordine', 'https://mangayo.it/47025-large_default/-preordine-hunter-x-hunter-38-instant-variant.jpg');
insert into Prodotti values('[PREORDINE] Dragon Ball Double Cover Box - Edizione Giapponese', 389, 90, 'Preordine', 'https://mangayo.it/46773-large_default/-preordine-dragon-ball-double-cover-box-edizione-giapponese.jpg');
insert into Prodotti values('[PREORDINE] One Piece Card Game: Official Playmat Bandai Card Games Fest 24-25 Edition', 59, 90, 'Preordine', 'https://mangayo.it/46609-large_default/-preordine-one-piece-card-game-official-playmat-bandai-card-games-fest-24-25-edition.jpg');
insert into Prodotti values('[PREORDINE] One Piece Card Game: Legacy Of The Master - Booster Display Box (24 buste) OP-12 [ENG]', 115, 20, 'Preordine', 'https://mangayo.it/46623-large_default/-preordine-one-piece-card-game-legacy-of-the-master-booster-display-box-24-buste-op-12-eng-.jpg');
insert into Prodotti values('[PREORDINE] One Piece Card Game: Double Pack DP-08 (2 buste + 1 carta don) OP-12 [ENG]', 16, 90, 'Preordine', 'https://mangayo.it/46640-large_default/-preordine-one-piece-card-game-double-pack-dp-08-2-buste-1-carta-don-op-12-eng-.jpg');
