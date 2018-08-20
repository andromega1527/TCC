/*SERVE PARA ZERAR A TABELA QUANDO DER ERRO*/
drop table olx;
drop table anuncio;
drop table anunciante;
drop table comprador;
drop table produto;
drop table marca;
drop table reserva;
drop table forma_pagamento;
drop table cidade;
drop table estado;
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table estado(
codigo_estado integer PRIMARY KEY,
nome_estado varchar (2));
    
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table cidade(
codigo_cidade SERIAL PRIMARY KEY,
nome_cidade varchar (30));
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
 Create table forma_pagamento(
codigo_forma integer PRIMARY KEY,
forma_pagamento varchar (30));   
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
 Create table reserva(
codigo_reserva integer PRIMARY KEY,
reserva_status varchar (4));  
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table marca(
codigo_marca SERIAL PRIMARY KEY,
marca varchar (50));
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table produto(
codigo_produto SERIAL PRIMARY KEY,
produto varchar (30),
marca_produto integer,FOREIGN KEY (marca_produto) REFERENCES marca(codigo_marca));  
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table comprador(
CPF varchar (11) PRIMARY KEY,
comprador varchar (60),
loggin varchar (60),
senha varchar (20),
cidade_comprador integer , FOREIGN KEY (cidade_comprador) REFERENCES cidade(codigo_cidade),
estado_comprador integer , FOREIGN KEY (estado_comprador) REFERENCES estado(codigo_estado),
endereco_comprador varchar (60),
complemento_comprador varchar (30),
telefone_comprador varchar (11));    
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table anunciante(
CPF varchar (11) PRIMARY KEY,
anunciante varchar (60),
loggin varchar (60),
senha varchar (20),
cidade_anunciante integer , FOREIGN KEY (cidade_anunciante) REFERENCES cidade(codigo_cidade),
estado_anunciante integer , FOREIGN KEY (estado_anunciante) REFERENCES estado(codigo_estado),
endereco_anunciante varchar (60),
complemento_anunciante varchar (30),
telefone_anunciante varchar (11));  
    
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table anuncio(   
codigo_anuncio SERIAL PRIMARY KEY,
anunciante_anuncio varchar,FOREIGN KEY (anunciante_anuncio) REFERENCES anunciante(CPF),     
produto_anuncio integer, FOREIGN KEY (produto_anuncio) REFERENCES produto(codigo_produto),
status_uso varchar (200),
preco_anuncio numeric (7,2),
reservanuncio integer,FOREIGN KEY (reservanuncio) REFERENCES reserva (codigo_reserva));
/*_________________________________________________________CRIACAO TABELAS__________________________________________________________*/
Create table olx(   
codigovenda SERIAL PRIMARY KEY,
codigo_anuncio_venda integer,FOREIGN KEY (codigo_anuncio_venda) REFERENCES anuncio(codigo_anuncio),   
comprador_colx varchar,FOREIGN KEY (comprador_colx) REFERENCES comprador(CPF),
pagamento_forma integer, FOREIGN KEY (pagamento_forma) REFERENCES forma_pagamento(codigo_forma), 
desconto numeric (7,2) ,
total numeric (7,2)); 
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into estado(codigo_estado,nome_estado) values (01,'AC');
insert into estado(codigo_estado,nome_estado) values (02,'AL');
insert into estado(codigo_estado,nome_estado) values (03,'AP');
insert into estado(codigo_estado,nome_estado) values (04,'AM');
insert into estado(codigo_estado,nome_estado) values (05,'BA');
insert into estado(codigo_estado,nome_estado) values (06,'CE');
insert into estado(codigo_estado,nome_estado) values (07,'DF');
insert into estado(codigo_estado,nome_estado) values (08,'ES');
insert into estado(codigo_estado,nome_estado) values (09,'GO');
insert into estado(codigo_estado,nome_estado) values (10,'MA');
insert into estado(codigo_estado,nome_estado) values (11,'MT');
insert into estado(codigo_estado,nome_estado) values (12,'MS');
insert into estado(codigo_estado,nome_estado) values (13,'MG');
insert into estado(codigo_estado,nome_estado) values (14,'PA');
insert into estado(codigo_estado,nome_estado) values (15,'PB');
insert into estado(codigo_estado,nome_estado) values (16,'PR');
insert into estado(codigo_estado,nome_estado) values (17,'PE');
insert into estado(codigo_estado,nome_estado) values (18,'PI');
insert into estado(codigo_estado,nome_estado) values (19,'RJ');
insert into estado(codigo_estado,nome_estado) values (20,'RN');
insert into estado(codigo_estado,nome_estado) values (21,'RS');
insert into estado(codigo_estado,nome_estado) values (22,'RO');
insert into estado(codigo_estado,nome_estado) values (23,'RR');
insert into estado(codigo_estado,nome_estado) values (24,'SC');
insert into estado(codigo_estado,nome_estado) values (25,'SP');
insert into estado(codigo_estado,nome_estado) values (26,'SE');
insert into estado(codigo_estado,nome_estado) values (27,'TO');
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into cidade(nome_cidade) values ('Rio Branco');
insert into cidade(nome_cidade) values ('Maceio');
insert into cidade(nome_cidade) values ('Macapa');
insert into cidade(nome_cidade) values ('Manaus');
insert into cidade(nome_cidade) values ('Salvador');
insert into cidade(nome_cidade) values ('Fortaleza');
insert into cidade(nome_cidade) values ('Brasilia');
insert into cidade(nome_cidade) values ('Vitoria');
insert into cidade(nome_cidade) values ('Goiania');
insert into cidade(nome_cidade) values ('Sao Luiz');
insert into cidade(nome_cidade) values ('Cuiaba');
insert into cidade(nome_cidade) values ('Campo Grande');
insert into cidade(nome_cidade) values ('Belo Horizonte');
insert into cidade(nome_cidade) values ('Belem');
insert into cidade(nome_cidade) values ('Joao Pessoa');
insert into cidade(nome_cidade) values ('Curitiba');
insert into cidade(nome_cidade) values  ('Recife');
insert into cidade(nome_cidade) values ('Teresina');
insert into cidade(nome_cidade) values ('Rio de Janeiro');
insert into cidade(nome_cidade) values ('Natal');
insert into cidade(nome_cidade) values ('Porto Alegre');
insert into cidade(nome_cidade) values ('Porto Velho');
insert into cidade(nome_cidade) values ('Boa Vista');
insert into cidade(nome_cidade) values ('Florianopolis');
insert into cidade(nome_cidade) values ('Sao Paulo');
insert into cidade(nome_cidade) values ('Aracaju');
insert into cidade(nome_cidade) values('Palmas');
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into forma_pagamento(codigo_forma,forma_pagamento) values (01,'Dinheiro');
insert into forma_pagamento(codigo_forma,forma_pagamento) values (02,'Boleto Bancario');
insert into forma_pagamento(codigo_forma,forma_pagamento) values (03,'Cartao de Debito');
insert into forma_pagamento(codigo_forma,forma_pagamento) values (04,'Cartao de Credito');
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into reserva(codigo_reserva,reserva_status) values (01,'SIM');
insert into reserva(codigo_reserva,reserva_status) values (02,'NAO');
insert into reserva(codigo_reserva,reserva_status) values (03,'NULO');
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into marca(marca) values ('Apple');
insert into marca(marca) values ('Samsung');
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into produto (produto,marca_produto) values ('Iphone',01);
insert into produto (produto,marca_produto) values ('Galaxy',02);
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into comprador (CPF,comprador,loggin,senha,cidade_comprador,estado_comprador,endereco_comprador,complemento_comprador,telefone_comprador) values ('11111111111','Myreia Almeida','myreia.almeida','m1234567',25,25,'Rua Teste B. Teste, n 00','Casa Invisivel','19900000000');
insert into comprador (CPF,comprador,loggin,senha,cidade_comprador,estado_comprador,endereco_comprador,complemento_comprador,telefone_comprador) values ('22222222222','Sabrina Almeida','sabrina.almeida','s1234567',19,19,'Rua Teste B. Teste, n 00','Casa Invisivel','19911111111');
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into anunciante (CPF,anunciante,loggin,senha,cidade_anunciante,estado_anunciante,endereco_anunciante,complemento_anunciante,telefone_anunciante) values ('33333333333','Juliane Catani','juliane.catani','j1234567',25,25,'Rua Teste B. Teste, n 00','Casa Invisivel','19922222222');
insert into anunciante (CPF,anunciante,loggin,senha,cidade_anunciante,estado_anunciante,endereco_anunciante,complemento_anunciante,telefone_anunciante) values ('44444444444','Mayara Anjos','mayara.anjos','m1234567',19,19,'Rua Teste B. Teste, n 00','Casa Invisivel','19933333333');
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into anuncio (anunciante_anuncio,produto_anuncio,status_uso,preco_anuncio,reservanuncio) values ('33333333333',01,'Estao em bom estado,sem riscos com cabos e fone originais.',2000.00,3);
insert into anuncio (anunciante_anuncio,produto_anuncio,status_uso,preco_anuncio,reservanuncio) values ('44444444444',02,'Estao em bom estado,sem riscos com cabos e fone originais.',800.00,3);
/*_______________________________________________________ISERSAO DE DADOS______________________________________________________________*/
insert into olx (codigo_anuncio_venda,comprador_colx,pagamento_forma,desconto,total) values (01,'11111111111',04,00.00,2000.00);
/*______________________________________________________CONSULTA INNER JOIN_________________________________________________________*/

/*produto recebe marca -  INNER*/
select produto.codigo_produto ,produto.produto , produto.marca_produto AS marca_produto , marca.codigo_marca, marca.marca 
from produto , marca
where produto.marca_produto = marca.codigo_marca;

/*comprador recebe cidade -  INNER*/
select comprador.CPF ,comprador.comprador , comprador.cidade_comprador AS cidade_comprador , cidade.codigo_cidade, cidade.nome_cidade  
from comprador , cidade
where comprador.cidade_comprador = cidade.codigo_cidade;

/*comprador recebe estado -  INNER*/
select comprador.CPF ,comprador.comprador , comprador.estado_comprador AS estado_comprador , estado.codigo_estado, estado.nome_estado  
from comprador , estado
where comprador.estado_comprador = estado.codigo_estado;

/*anunciante recebe cidade -  INNER*/
select anunciante.CPF ,anunciante.anunciante , anunciante.cidade_anunciante AS cidade_anunciante , cidade.codigo_cidade, cidade.nome_cidade  
from anunciante , cidade
where anunciante.cidade_anunciante = cidade.codigo_cidade;

/*anunciante recebe estado -  INNER*/
select anunciante.CPF ,anunciante.anunciante , anunciante.estado_anunciante AS estado_anunciante , estado.codigo_estado, estado.nome_estado  
from anunciante , estado
where anunciante.estado_anunciante = estado.codigo_estado;


/*anuncio recebe anunciante -  INNER*/
select anuncio.codigo_anuncio,anuncio.anunciante_anuncio,anuncio.produto_anuncio AS anunciante_anuncio, anunciante.CPF ,anunciante.anunciante
from anuncio, anunciante
where anuncio.anunciante_anuncio = anunciante.CPF;
 
 
/*anuncio recebe produto -  INNER*/
select anuncio.codigo_anuncio,anuncio.anunciante_anuncio,anuncio.produto_anuncio AS produto_anuncio, produto.codigo_produto ,produto.produto
from anuncio, produto
where anuncio.produto_anuncio = produto.codigo_produto;


/*anuncio recebe reserva -  INNER*/
select anuncio.codigo_anuncio,anuncio.anunciante_anuncio,anuncio.produto_anuncio, anuncio.reservanuncio AS reservanuncio, reserva.codigo_reserva ,reserva.reserva_status
from anuncio, reserva
where anuncio.reservanuncio = reserva.codigo_reserva;

/*olx recebe anuncio -  INNER*/
select olx.codigovenda,olx.codigo_anuncio_venda,olx.comprador_colx, olx.pagamento_forma AS codigo_anuncio_venda, anuncio.codigo_anuncio,anuncio.anunciante_anuncio,anuncio.produto_anuncio
from olx, anuncio
where olx.codigo_anuncio_venda = anuncio.codigo_anuncio;

/*olx recebe comprador-  INNER*/
select olx.codigovenda,olx.codigo_anuncio_venda,olx.comprador_colx, olx.pagamento_forma AS comprador_colx, comprador.CPF ,comprador.comprador 
from olx, comprador
where olx.comprador_colx = comprador.CPF;

/*olx recebe pagamento-  INNER*/
select olx.codigovenda,olx.codigo_anuncio_venda,olx.comprador_colx, olx.pagamento_forma AS pagamento_forma,forma_pagamento.codigo_forma,forma_pagamento.forma_pagamento  
from olx, forma_pagamento
where olx.pagamento_forma = forma_pagamento.codigo_forma;

select * from cidade;
-