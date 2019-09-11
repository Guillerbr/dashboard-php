CREATE TABLE status_usuarios (
  id int AUTO_INCREMENT PRIMARY KEY,
  names_status_users int(50)
   );

CREATE TABLE usuarios (
  id_usuario int AUTO_INCREMENT PRIMARY KEY,
  id_status  int,
  nome varchar(30), 
  email varchar(40),
  senha varchar(32),
  FOREIGN KEY(id_status) REFERENCES status_usuarios (id)
);

CREATE TABLE user_saldo (
 id_saldo int AUTO_INCREMENT PRIMARY KEY,
 fk_id_usuario int,
 valor_saldo int(50),
 dias_saldo int(50),
 FOREIGN KEY(fk_id_usuario) REFERENCES usuarios (id_usuario)
);




/*

EXEMPLO 

CREATE TABLE user_client (

id int not null AUTO_INCREMENT,
data date,
id_user int,
user_status int,
primary key (id),
foreign key (id_user) references user_id(id),
foreign key (user_status) references atatus_user(id_status)

)default charset = utf8;


-------------------------------------------------------------
EXEMPLO N : N    -MUITOS PARA MUITOS

CREATE TABLE aluno (
    registro varchar (30) PRIMARY KEY,
    nome varchar (30),
    telefone varchar (30)
);

CREATE TABLE disciplina (
    id_disci int PRIMARY KEY,
    nome varchar (30),
    carga int (30)
);

CREATE TABLE aluno_disciplina (
    registro_alu varchar (30),
    id_disci_ger int,
    FOREIGN KEY(registro_alu) REFERENCES aluno (registro),
    FOREIGN KEY(id_disci_ger) REFERENCES disciplina (id_disci)
);





*/