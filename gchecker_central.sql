
CREATE TABLE status_usuarios (
  id int AUTO_INCREMENT PRIMARY KEY ,
  names_status_users int(50),
  FOREIGN KEY(id) REFERENCES usuarios (id_status),
  nome varchar(30),
   create_at date, 
   update_at date

);
  
CREATE TABLE user_saldo (
 id_saldo int AUTO_INCREMENT PRIMARY KEY ,
 valor_saldo int(50),
 dias_saldo int(50),
 fk_id_usuario int,
 FOREIGN KEY(fk_id_usuario) REFERENCES usuarios (id_usuario),
 create_at date, 
 update_at date
  
);



CREATE TABLE usuarios (
  id_usuario int AUTO_INCREMENT PRIMARY KEY ,
  id_status  int 
  nome varchar(30), 
  email varchar(40),
  senha varchar(32),
  status_usuario int PRIMARY KEY 
);




