create database icatalogo;
use icatalogo;

create table tbl_produto(
    id int primary key auto_increment,
    descricao varchar(255) not null,
    peso decimal (10,2) not null,
    quantidade int not null,
    cor varchar(100) not null,
    tamanho varchar(100),
    valor decimal (10,2) not null,
    desconto int,
    imagem varchar(500)
);

create table tbl_administrador(
    id int primary key auto_increment,
    nome varchar(255) not null,
    usuario varchar(255) not null,
    senha varchar (255) not null
    );

create table tbl_categoria (
    id int primary key auto_increment,
    descricao varchar(255) not null
);

alter table tbl_produto
add column categoria_id int,
add foreign key (categoria_id) references tbl_categoria(id);