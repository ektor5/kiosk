  CREATE TABLE docenti (
  doc_id INTEGER AUTO_INCREMENT,
  doc_nome VARCHAR(20) NOT NULL,
  PRIMARY KEY(doc_id)
  );

   INSERT INTO docenti (doc_nome) VALUES ("Baldi E.");
   INSERT INTO docenti (doc_nome) VALUES ("Baldini G.");
   INSERT INTO docenti (doc_nome) VALUES ("Bastianini A.");
   INSERT INTO docenti (doc_nome) VALUES ("Bastoni S.");
   INSERT INTO docenti (doc_nome) VALUES ("Bellanova M.");
   INSERT INTO docenti (doc_nome) VALUES ("Bellesi S.");
   INSERT INTO docenti (doc_nome) VALUES ("Bianchi G.");
   INSERT INTO docenti (doc_nome) VALUES ("Bigi B.");
   INSERT INTO docenti (doc_nome) VALUES ("Bondi A.");
   INSERT INTO docenti (doc_nome) VALUES ("Calusi L.");
   INSERT INTO docenti (doc_nome) VALUES ("Camardo G.");
   INSERT INTO docenti (doc_nome) VALUES ("Cannavo' G.L.");
   INSERT INTO docenti (doc_nome) VALUES ("Cantara V.");
   INSERT INTO docenti (doc_nome) VALUES ("Capotondi S.");
   INSERT INTO docenti (doc_nome) VALUES ("Cavarra C.");
   INSERT INTO docenti (doc_nome) VALUES ("Cecconi L.");
   INSERT INTO docenti (doc_nome) VALUES ("Cervelli A.");
   INSERT INTO docenti (doc_nome) VALUES ("Chemello G.");
   INSERT INTO docenti (doc_nome) VALUES ("Chiti G.");
   INSERT INTO docenti (doc_nome) VALUES ("Cini F. B.");
   INSERT INTO docenti (doc_nome) VALUES ("Consumi C.");
   INSERT INTO docenti (doc_nome) VALUES ("Conti C.");
   INSERT INTO docenti (doc_nome) VALUES ("Corti C.");
   INSERT INTO docenti (doc_nome) VALUES ("Cuozzo P.");
   INSERT INTO docenti (doc_nome) VALUES ("Dell&#39;Amico M.");
   INSERT INTO docenti (doc_nome) VALUES ("Dell&#39;Anno A. M.");
   INSERT INTO docenti (doc_nome) VALUES ("Donzelli R.");
   INSERT INTO docenti (doc_nome) VALUES ("Fallai F.");
   INSERT INTO docenti (doc_nome) VALUES ("Fazzini P.");
   INSERT INTO docenti (doc_nome) VALUES ("Galardi A.");
   INSERT INTO docenti (doc_nome) VALUES ("Garosi A.");
   INSERT INTO docenti (doc_nome) VALUES ("Gerunda M.");
   INSERT INTO docenti (doc_nome) VALUES ("Gialanella G.");
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
  INSERT INTO conf 
VALUES("447b20a7fcbf53a5d5be013ea0b15af",600,1,5000,10000,15000,15000,0);
