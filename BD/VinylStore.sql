-- CARON ANTOINE et CHAUSSENDE ADRIEN

CREATE DATABASE IF NOT EXISTS VINYLSTORE;

DROP TABLE IF EXISTS VINYLSTORE.T_VINYLE;
DROP TABLE IF EXISTS VINYLSTORE.T_FORMAT;
DROP TABLE IF EXISTS VINYLSTORE.T_PRESSEUR;
DROP TABLE IF EXISTS VINYLSTORE.T_CLIENT;
DROP TABLE IF EXISTS VINYLSTORE.T_ARTICLE_PANIER;


CREATE TABLE IF NOT EXISTS VINYLSTORE.T_FORMAT(
        F_ID MEDIUMINT NOT NULL,
	F_NOM VARCHAR(50) NOT NULL,
	F_VITESSE TINYINT NOT NULL,
	F_DIAMETRE DECIMAL(3,1) NOT NULL,
	
	PRIMARY KEY (F_ID)
)ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS VINYLSTORE.T_PRESSEUR(
        P_ID MEDIUMINT NOT NULL,
	P_NOM VARCHAR(50) NOT NULL,
	P_PAYS VARCHAR(50) NOT NULL,
	P_VILLE VARCHAR(50) NOT NULL,
	
	PRIMARY KEY(P_ID)
)ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;


CREATE TABLE IF NOT EXISTS VINYLSTORE.T_VINYLE(
	V_ID MEDIUMINT NOT NULL AUTO_INCREMENT,
	F_ID MEDIUMINT NOT NULL,
	P_ID MEDIUMINT NOT NULL,

	V_ARTISTE VARCHAR(50) NOT NULL,
	V_NOM VARCHAR(50) NOT NULL,
	V_DATEAJOUT DATETIME NOT NULL,
	V_PRIX DECIMAL(5,2) NOT NULL,
	V_IMAGE VARCHAR(200) NOT NULL,
	
	PRIMARY KEY(V_ID),
	FOREIGN KEY (F_ID) REFERENCES T_FORMAT(F_ID)
		ON DELETE CASCADE,
	FOREIGN KEY (P_ID) REFERENCES T_PRESSEUR(P_ID)
		ON DELETE CASCADE
)ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS VINYLSTORE.T_CLIENT(
        C_ID MEDIUMINT NOT NULL AUTO_INCREMENT,
	C_NOM VARCHAR(50) NOT NULL,
        C_PRENOM VARCHAR(50) NOT NULL,
	C_ADRESSE VARCHAR(200) NOT NULL,
	C_CODE_POSTAL MEDIUMINT NOT NULL,
        C_VILLE VARCHAR(50) NOT NULL,
	C_COURRIEL VARCHAR(200) NOT NULL UNIQUE,
        C_MOT_DE_PASSE VARCHAR(50) NOT NULL,
	PRIMARY KEY (C_ID)
)ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS VINYLSTORE.T_ARTICLE_PANIER(
        ARTPAN_ID MEDIUMINT NOT NULL AUTO_INCREMENT,
	C_ID MEDIUMINT NOT NULL,
        V_ID MEDIUMINT NOT NULL,
	ARTPAN_QUANTITE MEDIUMINT NOT NULL,
	ARTPAN_DATEAJOUT DATETIME NOT NULL,
	PRIMARY KEY (ARTPAN_ID),
        FOREIGN KEY (C_ID) REFERENCES T_CLIENT(C_ID)
        ON DELETE CASCADE,
        FOREIGN KEY (V_ID) REFERENCES T_VINYLE(V_ID)
        ON DELETE CASCADE
)ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;


INSERT INTO VINYLSTORE.T_FORMAT VALUES(1,"Single",45,17);
INSERT INTO VINYLSTORE.T_FORMAT VALUES(2,"Long Plate",33,30);
INSERT INTO VINYLSTORE.T_FORMAT VALUES(3,"Extended Play",45,17);
INSERT INTO VINYLSTORE.T_FORMAT VALUES(4,"Maxis",45,30);
INSERT INTO VINYLSTORE.T_FORMAT VALUES(5,"25 centimètres",33,25);


INSERT INTO VINYLSTORE.T_PRESSEUR VALUES(1,"Vinylium","BELGIQUE","ESTAIMPUIS");
INSERT INTO VINYLSTORE.T_PRESSEUR VALUES(2,"Reverberation","FRANCE","BORDEAUX");
INSERT INTO VINYLSTORE.T_PRESSEUR VALUES(3,"MPO","FRANCE","AVERTON");
INSERT INTO VINYLSTORE.T_CLIENT(C_NOM,C_PRENOM,C_ADRESSE,C_CODE_POSTAL,C_VILLE,C_COURRIEL,C_MOT_DE_PASSE) VALUES
("root","root","root",69100,"Villeurbanne","root@root.root","root");

INSERT INTO VINYLSTORE.T_VINYLE (F_ID, P_ID, V_ARTISTE, V_NOM, V_DATEAJOUT, V_PRIX, V_IMAGE) 
	VALUES(4,2,"Daft Punk","Random Access Memories",NOW(),35.00,"http://www.konbini.com/fr/files/2013/04/Random-Access-Memories-Daft-Punk-88883716862.png"),
	(2,3,"C2C","Tetr4",NOW(),18.00,"http://www.buzzwebzine.fr/wp-content/uploads/2012/09/c2c-tetra-album-pochette-cover-hd.jpg"),
	(3,1,"Kavinsky","Outrun",NOW(),35.00,"http://www.kdbuzz.com/images/kavinsky-outrun.jpg"),
	(5,1,"Kavinsky","Nightcall",NOW(),20.00,"http://mybandmarket.com/blog/wp-content/uploads/2012/06/2615337131-1.jpg"),
	(4,3,"Vivaldi","Les Quatre Saisons",NOW(),15.00,"http://img.cdandlp.com/2012/07/imgL/115482769.jpg"),
	(4,3,"Pharell Williams","Happy",NOW(),6.99,"http://www.sevenradio.fr/images/pochette%20pharrel.jpg"),
	(4,3,"Stromae","Racine carrée",NOW(),27.99,"http://media.melty.fr/article-1702556-ajust_930/racine-carree-la-pochette-de-l-album.jpg"),
	(4,3,"Woodkid","The golden age",NOW(),30.00,"http://news.jukebo.fr/files/2012/12/woodkid.jpg"),
	(4,1,"Imagine Dragons","Night Dragons",NOW(),17.99,"http://store-cult.com/wp-content/uploads/2013/02/Night-Visions.jpg"),
	(1,3,"FAUVE","Blizzard",NOW(),11.99,"http://lamaisonmusee.files.wordpress.com/2013/07/pochette-album-blizzard-fauve1.jpg?w=560&h=560"),
	(2,2,"Skip The Use","Little Armageddon",NOW(),18.99,"http://media.melty.fr/article-2003928-ajust_930-f1389803788/little-armageddon-pochette.jpg"),
	(3,2,"Pink Floyd","The Dark Side of the Moon",NOW(),34.99,"http://media.rtl2.fr/online/image/2013/0422/7760680340_pink-floyd-dark-side-of-the-moon.jpg"),
	(4,3,"Avicii","True",NOW(),17.99,"http://media.melty.fr/article-1870697-ajust_930/true-deja-disponible.jpg"),
	(4,3,"Justice","Justice",NOW(),15.99,"http://static1.ozap.com/people/8/14/08/@/938784-pochette-justice-diapo-1.jpg"),
	(1,3,"ACDC","Highway To Hell",NOW(),10.80,"http://images.myplaydirect.com/autoimage/display/zoom/media.myplaydirect.com/dda/27442553/2a969b4469fe9d58426dbaaded396770.jpg/2a969b4469fe9d58426dbaaded396770"),
        (2,3,"Daft Punk","Discovery",NOW(),28.80,"http://www.doohan-covers.com/Audio/Daft%20punk_discovery_front.jpg"),
        (1,3,"Led Zepplin","Mothership",NOW(),20.80,"http://www.norwalkrecords.com/images/LedZeppelinMothership.jpg"),
        (3,3,"The Rolling Stones","Let it Bleed",NOW(),9.70,"//eu.rymimg.com/lk/f/l/27adc8cb604c42322cefaac1775e2a0a/1369028.jpg"),
        (4,3,"The Who","Who's next",NOW(),18.80,"http://images.amazon.com/images/P/B000002OX7.01.LZZZZZZZ.jpg"),
        (1,3,"Macklemore & Ryan Lewis","The Heist",NOW(),12.80,"http://frequencesledisquaire.com/image/247806"),
        (1,3,"Cats on Trees","Cats on Trees",NOW(),16.90,"http://www.zupmage.eu/i/Qxs0fLMYCm.jpg"),
        (2,3,"One Republic","Native",NOW(),20.80,"http://www.josepvinaixa.com/blog/wp-content/uploads/2013/02/OneRepublic-Native-Deluxe-Version-2013-1200x1200.png"),
        (2,3,"M83.","Hurry Up We're Dreaming",NOW(),10.80,"http://www.the-parody.com/wp-content/uploads/2012/10/IMG_0834.jpg"),
        (1,3,"Madeon","The City",NOW(),7.80,"http://www.wkldesign.com/img/port/madeon.jpg"),
        (1,3,"Daft Punk","Get Lucky",NOW(),14.80,"http://musique.jeuxactu.com/datas/groupe/d/a/daft-punk/n/pochette-album-daft-punk-get-lucky-le-single-officiel-5170ec6fc9de3.jpg"),
        (5,2,"London Philarmonic Orchestra","The Greatest Video Game Music",NOW(),17.60,"http://upload.wikimedia.org/wikipedia/en/c/c2/TheGreatestVideoGameMusic.jpg"),
        (2,2,"Michael Jackson","Thriller",NOW(),12.80,"http://mes-montages-photos.m.e.pic.centerblog.net/o/0d56e033.jpg"),
        (3,2,"London Grammar","If you wait",NOW(),18.80,"http://music.airfrance.com/wp-content/uploads/2014/01/london_grammar_if_you_wait-fr.jpg"),
        (1,2,"Era","The Mass",NOW(),18.80,"http://cdn2.greatsong.net/album/extra/era-the-mass-100207824.jpg"),
        (1,2,"Aloe Black","Good Things",NOW(),18.80,"http://www.stonesthrow.com/uploads/images/product/detail/aloe-blacc-good-things.jpg"),
        (3,3,"Julien Doré","Love",NOW(),18.80,"http://www.juliendoreofficiel.com/wp-content/uploads/2013/09/LOVE_pochette-550x547.jpg"),
        (1,3,"Cocoon","My friends all died in a plane crash",NOW(),18.80,"http://userserve-ak.last.fm/serve/_/33819701/My+Friends+All+Died+In+A+Plane+Crash++livret+numri+planecrash.jpg"),
        (2,3,"The Beatles","Abbey Road",NOW(),18.80,"http://upload.wikimedia.org/wikipedia/en/4/42/Beatles_-_Abbey_Road.jpg"),
        (3,3,"Adele","21",NOW(),18.80,"http://www.soundofviolence.net/Reviews/originals/Adele%20-%2021.jpg"),
        (4,3,"RadioHead","The Best Of",NOW(),18.80,"http://www.soundofviolence.net/Reviews/originals/Radiohead%20-%20The%20Best%20Of.jpg"),
        (4,3,"Louise Attaque","Louise Attaque",NOW(),18.80,"http://1.bp.blogspot.com/-zpmQ-U37yZE/UJrQypyMuWI/AAAAAAAAFe4/uFPIMCNrr7Y/s1600/louise+louise.jpg"),
        (5,3,"Muse","The Resistance",NOW(),18.80,"http://muse-france.fr/wp-content/uploads/2013/05/muse-the-resistance-front.jpg"),
        (1,3,"Muse","Absolution",NOW(),18.80,"http://sara.arapao.com/wp-content/uploads/2010/12/absolution.jpg"),
        (1,3,"Muse","The 2nd Law",NOW(),18.80,"http://www.tuxboard.com/photos/2012/09/Album-Muse-The-2nd-Law-MP3.jpeg"),
        (1,3,"One Republic","Waking Up",NOW(),18.80,"http://upload.wikimedia.org/wikipedia/en/7/78/Wakingupone.jpg"),
        (1,3,"Five Finger Death Punch","The Way of the Fist",NOW(),18.80,"http://userserve-ak.last.fm/serve/_/61431829/The+Way+Of+The+Fist+UK+Edition.jpg"),
        (1,3,"Five Finger Death Punch","War is the answer!",NOW(),18.80,"http://userserve-ak.last.fm/serve/500/91065481/War+Is+The+Answer+Clean+Cover+1000x1000+png.png"),
        (1,3,"Two Doors Cinema Club","Beacon",NOW(),18.80,"http://emarquesandmode.fr/wp-content/uploads/2013/03/Two-Door-Cinema-Club-_Beacon_.jpg"),
        (1,3,"Daft Punk","Tron OST",NOW(),18.80,"http://img2.wikia.nocookie.net/__cb20110216233703/tron/fr/images/e/e1/Daft-Punk-Tron-Legacy-Original-Motion-Picture-Soundtrack-Official-Album-Cover.jpg"),
        (1,3,"Daft Punk","Alive",NOW(),18.80,"http://www.ireport.cz/images/ireport/clanky/old_web/image/marek/Daft%20Punk%20Alive%202007_cover.jpg"),
        (1,3,"Daft Punk","Interstella 5555",NOW(),18.80,"http://www.omg-squee.com/wp-content/uploads/2010/09/interstella-5555-cd.jpg"),
        (1,3,"Nirvana","Nevermind",NOW(),13.60,"http://www.deep-music.net/images/chroniques/e90c906751ef7b622cb59ea6876fc1bca2561d1a.jpg");


