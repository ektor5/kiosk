  CREATE TABLE aule (
   aule_id INTEGER AUTO_INCREMENT,
   aule_nome CHAR(32) NOT NULL,
   PRIMARY KEY(aule_id)
   );
   
  INSERT INTO aule (aule_nome) VALUES("Aula 102");
  INSERT INTO aule (aule_nome) VALUES("Aula 111");
  INSERT INTO aule (aule_nome) VALUES("Aula 112");
  INSERT INTO aule (aule_nome) VALUES("Aula 113");
  INSERT INTO aule (aule_nome) VALUES("Aula 114");
  INSERT INTO aule (aule_nome) VALUES("Aula 115");
  INSERT INTO aule (aule_nome) VALUES("Aula 116");
  INSERT INTO aule (aule_nome) VALUES("Aula 117");
  INSERT INTO aule (aule_nome) VALUES("Aula 118");
  INSERT INTO aule (aule_nome) VALUES("Aula 119");
  INSERT INTO aule (aule_nome) VALUES("Aula 120");
  INSERT INTO aule (aule_nome) VALUES("Aula 211");
  INSERT INTO aule (aule_nome) VALUES("Aula 212");
INSERT INTO aule (aule_nome) VALUES("Aula 213");
INSERT INTO aule (aule_nome) VALUES("Aula 214");
INSERT INTO aule (aule_nome) VALUES("Aula 215");
INSERT INTO aule (aule_nome) VALUES("Aula 216");
INSERT INTO aule (aule_nome) VALUES("Aula 217");
INSERT INTO aule (aule_nome) VALUES("Aula 218");
INSERT INTO aule (aule_nome) VALUES("Aula 219");
INSERT INTO aule (aule_nome) VALUES("Aula 220");
INSERT INTO aule (aule_nome) VALUES("Aula 311");
INSERT INTO aule (aule_nome) VALUES("Aula 312");
INSERT INTO aule (aule_nome) VALUES("Aula 313");
INSERT INTO aule (aule_nome) VALUES("Aula 314");
INSERT INTO aule (aule_nome) VALUES("Aula 315");
INSERT INTO aule (aule_nome) VALUES("Aula 316");
INSERT INTO aule (aule_nome) VALUES("Aula 317");
INSERT INTO aule (aule_nome) VALUES("Aula 318");
INSERT INTO aule (aule_nome) VALUES("Aula 319");
INSERT INTO aule (aule_nome) VALUES("Aula 320");
INSERT INTO aule (aule_nome) VALUES("Aula 411");
INSERT INTO aule (aule_nome) VALUES("Aula 412");
INSERT INTO aule (aule_nome) VALUES("Aula 413");
INSERT INTO aule (aule_nome) VALUES("Aula 414");
INSERT INTO aule (aule_nome) VALUES("Aula 415");
INSERT INTO aule (aule_nome) VALUES("Aula 416");
INSERT INTO aule (aule_nome) VALUES("Aula 417");
INSERT INTO aule (aule_nome) VALUES("Aula 418");
INSERT INTO aule (aule_nome) VALUES("Aula 419");
INSERT INTO aule (aule_nome) VALUES("Aula 420");

  CREATE TABLE docenti (
  doc_id INTEGER AUTO_INCREMENT,
  doc_nome VARCHAR(20) NOT NULL,
  doc_aula INTEGER
    REFERENCES aule(aule_id)
    ON DELETE SET NULL ON UPDATE CASCADE,
  PRIMARY KEY(doc_id)
  );

   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Baldi E.",2);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Baldini G.",4);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Bastianini A.",32);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Bastoni S.",12);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Bellanova M.",4);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Bellesi S.",1);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Bianchi G.",8);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Bigi B.",9);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Bondi A.",15);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Calusi L.",16);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Camardo G.",24);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Cannavo' G.L.",2);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Cantara V.",5);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Capotondi S.",21);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Cavarra C.",31);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Cecconi L.",2);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Cervelli A.",12);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Chemello G.",19);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Chiti G.",18);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Cini F. B.",25);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Consumi C.",27);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Conti C.",20);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Corti C.",10);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Cuozzo P.",5);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Dell&#39;Amico M.",7);
   INSERT INTO docenti (doc_nome) VALUES ("Dell&#39;Anno A. M.");
   INSERT INTO docenti (doc_nome) VALUES ("Donzelli R.");
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Fallai F.",26);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Fazzini P.",14);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Galardi A.",17);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Garosi A.",11);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Gerunda M.",23);
   INSERT INTO docenti (doc_nome, doc_aula) VALUES ("Gialanella G.",30);
   INSERT INTO docenti (doc_nome) VALUES ("Grosso T.");
   INSERT INTO docenti (doc_nome) VALUES ("Guzzo A.");
   INSERT INTO docenti (doc_nome) VALUES ("Intranuovo T.");
   INSERT INTO docenti (doc_nome) VALUES ("Lenzerini A.");
   INSERT INTO docenti (doc_nome) VALUES ("Lippi D.");
   INSERT INTO docenti (doc_nome) VALUES ("Marchiano` E.");
   INSERT INTO docenti (doc_nome) VALUES ("Marini S.");
   INSERT INTO docenti (doc_nome) VALUES ("Marra F.");
   INSERT INTO docenti (doc_nome) VALUES ("Marzucchi G.");
   INSERT INTO docenti (doc_nome) VALUES ("Massicci G.");
   INSERT INTO docenti (doc_nome) VALUES ("Materazzi M.");
   INSERT INTO docenti (doc_nome) VALUES ("Menchise N.");
   INSERT INTO docenti (doc_nome) VALUES ("Messere M.");
   INSERT INTO docenti (doc_nome) VALUES ("Mileto R.");
   INSERT INTO docenti (doc_nome) VALUES ("Molinaro A.");
   INSERT INTO docenti (doc_nome) VALUES ("Morandi C.");
   INSERT INTO docenti (doc_nome) VALUES ("Morelli G.");
   INSERT INTO docenti (doc_nome) VALUES ("Nencini A.");
   INSERT INTO docenti (doc_nome) VALUES ("Pacini M.");
   INSERT INTO docenti (doc_nome) VALUES ("Pagliai M.");
   INSERT INTO docenti (doc_nome) VALUES ("Paolini M.");
   INSERT INTO docenti (doc_nome) VALUES ("Paolucci C.");
   INSERT INTO docenti (doc_nome) VALUES ("Pazzagli L.");
   INSERT INTO docenti (doc_nome) VALUES ("Pecciarelli G.");
   INSERT INTO docenti (doc_nome) VALUES ("Perelli E.");
   INSERT INTO docenti (doc_nome) VALUES ("Petrucci S.");
   INSERT INTO docenti (doc_nome) VALUES ("Pianigiani A.");
   INSERT INTO docenti (doc_nome) VALUES ("Pratelli P.");
   INSERT INTO docenti (doc_nome) VALUES ("Puccioni E.");
   INSERT INTO docenti (doc_nome) VALUES ("Rocco");
   INSERT INTO docenti (doc_nome) VALUES ("Rossi G.");
   INSERT INTO docenti (doc_nome) VALUES ("Savarese L.");
   INSERT INTO docenti (doc_nome) VALUES ("Scheggi A.");
   INSERT INTO docenti (doc_nome) VALUES ("Tinti E.");
   INSERT INTO docenti (doc_nome) VALUES ("Trapassi G.");
   INSERT INTO docenti (doc_nome) VALUES ("Villari G.");
   INSERT INTO docenti (doc_nome) VALUES ("Viti Laura");
   INSERT INTO docenti (doc_nome) VALUES ("Viti Leandro");
   INSERT INTO docenti (doc_nome) VALUES ("Volpato A. P.");

  CREATE TABLE ore (
  ore_id INTEGER,
  ore_inizio CHAR(5) NOT NULL,
  ore_fine CHAR(5) NOT NULL,
  PRIMARY KEY(ore_id)
  );
  INSERT INTO ore VALUES (1,"8:25","9:15");
  INSERT INTO ore VALUES (2,"9:15","10:05");
  INSERT INTO ore VALUES (3,"10:05","10:50");
  INSERT INTO ore VALUES (4,"11:00","11:45");
  INSERT INTO ore VALUES (5,"11:45","12:35");
  INSERT INTO ore VALUES (6,"12:35","13:25");


  CREATE TABLE orario (
  ora_id INTEGER AUTO_INCREMENT,
  ora_docente INTEGER NOT NULL,
  ora_giorno INTEGER NOT NULL,
  ora_ora INTEGER NOT NULL,
  ora_note VARCHAR(20) DEFAULT "",
  PRIMARY KEY(ora_id)
  );  

   INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (1,1,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (2,0,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (3,4,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (4,0,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (5,3,4,"c/o Roncalli");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (6,0,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (7,0,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (8,2,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (9,2,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (10,1,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (11,3,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (12,2,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (13,4,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (14,3,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (15,2,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (16,0,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (17,3,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (18,3,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (19,2,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (20,3,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (21,5,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (22,1,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (23,4,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (24,5,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (25,0,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (26,4,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (27,1,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (28,5,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (29,4,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (30,3,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (31,2,3,"c/o Roncalli");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (32,0,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (33,5,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (34,4,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (35,0,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (36,2,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (37,0,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (38,3,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (39,5,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (40,4,5,"primi 30 minuti");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (41,4,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (42,0,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (43,4,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (44,5,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (45,2,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (46,1,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (47,0,4,"secondi 30 minuti");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (48,3,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (49,5,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (50,5,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (51,4,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (52,4,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (53,0,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (54,2,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (55,0,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (56,4,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (57,1,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (58,5,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (59,4,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (60,2,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (61,4,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (62,4,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (63,2,4,"secondi 30 minuti");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (64,3,2,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (65,2,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (66,5,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (67,5,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (68,4,3,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (69,0,4,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (70,4,6,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (71,2,5,"");
  INSERT INTO orario (ora_docente,ora_giorno,ora_ora,ora_note) VALUES (72,5,3,"");

  CREATE TABLE rss (
  rss_link VARCHAR(128) NOT NULL,
  PRIMARY KEY(rss_link)
  );  

  INSERT INTO rss  VALUES ("http://www.ansa.it/web/notizie/rubriche/politica/politica_rss.xml");
  INSERT INTO rss  VALUES ("http://www.ansa.it/web/notizie/rubriche/spettacolo/spettacolo_rss.xml");

  CREATE TABLE conf (
  cnf_pass CHAR(32),
  cnf_timeout INTEGER,
  cnf_hlimit INTEGER,
  cnf_tmnow INTEGER,
  cnf_tmafter INTEGER,
  cnf_tmweek INTEGER,
  cnf_tmrss INTEGER,
  cnf_collate INTEGER
  );  
  INSERT INTO conf VALUES("447b20a7fcbf53a5d5be013ea0b15af",600,1,5000,10000,15000,15000,0);
