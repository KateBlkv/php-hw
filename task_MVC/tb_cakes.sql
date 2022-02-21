use climbers;
-- DROP TABLE tb_cakes;
create table if not exists tb_cakes
(
    id    int auto_increment primary key,
    title  varchar(100) not null,
    filling varchar(255)  not null,
    weight int  not null,
    price int  not null,
    pic varchar(255)  default 'sadcake.jpg'
);
insert into tb_cakes (title, filling,weight, price)
value ('First', 'Sweet', 1, 1200);