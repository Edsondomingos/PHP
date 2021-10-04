CREATE DATABASE IF NOT EXISTS associacao;

USE associacao;

CREATE TABLE IF NOT EXISTS associacao(
cnpj VARCHAR(14) NOT NULL  PRIMARY KEY, 
nome VARCHAR(100)  NOT NULL,
senha VARCHAR(20) NOT NULL,
endereco VARCHAR(100) NOT NULL,
estado VARCHAR(15) NOT NULL,
cep VARCHAR(30),
cidade VARCHAR(50) NOT NULL,
bairro VARCHAR(50) NOT NULL,
data_de_cadastro DATE

);

CREATE TABLE IF NOT EXISTS produto(
codigo int NOT  NULL auto_increment PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
descricao VARCHAR(100),
valor DECIMAL(7,2),
data_de_validade DATE,
unidade_medida VARCHAR(10)

);

CREATE TABLE IF NOT EXISTS pedidos(
id int NOT NULL auto_increment PRIMARY KEY,
pagamento VARCHAR(30) NOT NULL,
valor_total DECIMAL(7,2) NOT NULL,
numero_de_pedido VARCHAR(100),
data_do_pedido DATE,
nome_do_comprador VARCHAR(50) NOT NULL,
cpf_do_comprador VARCHAR(11) NOT NULL

);

CREATE TABLE IF NOT EXISTS produtores(
cpf VARCHAR(11) NOT NULL PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
data_de_cadastro DATE,
data_de_nascimento DATE,
endereco VARCHAR(100) NOT NULL,
estado VARCHAR(15) NOT NULL,
cep VARCHAR(30),
cidade VARCHAR(50) NOT NULL,
bairro VARCHAR(50),
quando_cadastrou DATE,
cnpj_associacao VARCHAR(14)  NOT NULL,
FOREIGN KEY (cnpj_associacao) REFERENCES associacao(cnpj)

);

CREATE TABLE IF NOT EXISTS telefone_associacao(
id int NOT NULL auto_increment PRIMARY KEY,
telefone VARCHAR(11),
is_whatsapp BOOLEAN,
cnpj_associacao VARCHAR(14) NOT NULL,
FOREIGN KEY (cnpj_associacao) REFERENCES associacao(cnpj)

);

CREATE TABLE IF NOT EXISTS telefone_produtores(
id int NOT NULL auto_increment PRIMARY KEY,
telefone VARCHAR(11),
is_whatsapp BOOLEAN,
cpf_produtores VARCHAR(11) NOT NULL,
FOREIGN KEY (cpf_produtores) REFERENCES produtores(cpf)

);

CREATE TABLE IF NOT EXISTS produto_produtores(
id int NOT NULL auto_increment PRIMARY KEY,
quantidade VARCHAR(100),
codigo_produto int NOT NULL,
cpf_produtores VARCHAR(11) NOT NULL,
FOREIGN KEY (codigo_produto) REFERENCES produto(codigo),
FOREIGN KEY (cpf_produtores) REFERENCES produtores(cpf)

);

CREATE TABLE IF NOT EXISTS produto_pedidos(
id int NOT NULL auto_increment PRIMARY KEY,
quantidade VARCHAR(50),
valor DECIMAL(7,2),
id_pedidos int,
codigo_produto int NOT NULL,
FOREIGN KEY (id_pedidos) REFERENCES pedidos(id),
FOREIGN KEY (codigo_produto) REFERENCES produto(codigo)

);

USE associacao;
INSERT INTO associacao (cnpj, nome,  senha, endereco, estado, cep, cidade, bairro, data_de_cadastro)
VALUES ('22222222222222', 'associacao', '123', 'br 101', 'RN','59190','Canguaretama','Areia branca','2021-10-03');

INSERT INTO produto ( nome, valor, descricao, data_de_validade) VALUES ('Batata doce', 3.50, 'Produto de boa qualidade', '2021/10/10');

INSERT INTO produto ( nome, valor, descricao, data_de_validade) VALUES ('Macaxeira', 2.50, 'Produto de boa qualidade', '2021/10/05');
