
CREATE TABLE usuarios (
  id_usuario int AUTO_INCREMENT PRIMARY KEY ,
  nome varchar(30),
  email varchar(40),
  senha varchar(32)
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

