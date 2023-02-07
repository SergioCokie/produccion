
/****Menú****/
--select * from modulos
--select id from modulos where modulo like "%Planificacion%"  

insert into modulos(modulo) values ("Planificacion"); 

insert into submodulos (nombre, ruta, id_modulo,ruta2) values ('Corbata', '/Planificacion/Corbatas.php', (select id from modulos where modulo like "%Planificacion%"), 'Planificacion/Corbatas')

select id from modulos where modulo like "%Planificacion%"  