
-- Ejercicio 2 : Modificar la comision de los vendedores y ponerla al 2% cuando
-- ganan mas de 50000 

select * from vendedores v 
update  vendedores set comision=0.5 where sueldo >= 50000;
select * from vendedores v where v.sueldo >= 50000;

-- ================================================================================
-- Ejercicio 3 : Incrementar el precio de los coches en un 5%

select
	c.precio, 
	(precio*1.05) as aumento
from coches c

update coches set precio = (precio*1.05);

-- ================================================================================
-- Ejercicio 4 : Incrementar el precio de los coches en un 5%
-- Sacar todos los vendedores cuya fecha de alta sea posterior al 1 de julio de 2018

select  * from vendedores v where fecha >= '2023-07-01';

-- ================================================================================
-- Ejercicio 5 : Mostrar todos los vendedores con su nombre y el numero de días que llevan
-- en el concesionario
select  
	nombre
	,fecha
	,current_date
	,date_part('day',current_date::timestamp-fecha::timestamp) as Dias
from vendedores v;

-- ================================================================================
-- Ejercicio 6 : Visualizar el n ombre y los apellidos de los vendedores en una sola columna,
-- su fecha de registro y el día de la semana en la que s eregistraron
select  
	concat(nombre,' ', apellidos) as nombres
	,fecha
	,to_char(fecha::timestamp ,'day') as DiaSemana
from vendedores v;

-- ================================================================================
-- Ejercicio 7 : Mostrar el nombre y salaro de los vendedoeres con cargo ayudante de tienda

select 
	v.nombre
	,v.apellidos 
	,v.sueldo 
from vendedores v
where v.cargo = 'Ayudante de tienda';

-- ================================================================================
-- Ejercicio 8 : Visualizar todos los coches en cuya marca exista la letar a y que 
-- la marca empiecen por f
select * from coches c
where marca like '%a%' and modelo like 'F%';

-- ================================================================================
-- Ejercicio 9 : Mostrar todos los vendedores del grupo 2, ordenados por salario
-- de mayor a menor

select * 
from vendedores v 
where grupo_id = 2
order by sueldo desc  ;

-- ================================================================================
-- Ejercicio 10 : Visualizar los apellidos d elos vendedore ssu fecha y su numwerom de grupo 
-- ordenado por fecha desc y mostrar los ultimos 4

select  v.apellidos 
		,v.fecha 
		,v.id  
from  vendedores v 
order by fecha desc 
limit 4;

-- ================================================================================
-- Ejercicio 11 : Visualizar los dos los cargos y el numero de vendedores que hay en cada cargo

select 	v.cargo
		,count(cargo) as total  
from vendedores v
group by cargo ;

-- ================================================================================
-- Ejercicio 12 : Visualizar la mas asalarial edl consesionario (anual)
select sum(sueldo) as masa 
from vendedores v ;

-- ================================================================================
-- Ejercicio 13 : Sacar la media de sueldos entre todos los valores por grupo
select 	grupo_id 
		,g.nombre 
		,ceil (avg(sueldo)) as Promedio
		,g.ciudad 
from vendedores v 
inner join grupos g on g.id = v.id 
group by grupo_id, g.nombre, g.ciudad ;

-- ================================================================================
-- Ejercicio 14 : Visualizar las cantidades totales vendidas de cada coche a cada cliente mostrando 
-- el nombre del producto numero de cliente y la suma de las unidades
select
		co.modelo  as coche 
		,cl.nombre 
		,sum(e.cantidad) as Total 
from encargos e  
inner join coches co on co.id = e.coches_id 
inner join clientes cl on cl.id = e.cliente_id  
group by co.modelo ,cl.nombre ,e.coches_id, e.cliente_id;

-- ================================================================================
-- Ejercicio 15 : Mostrar los cliente que mas pedidos han hecho y mostrar cuantos hicieron 
select c.nombre 
		,count(e.id)
from encargos e 
inner join clientes c on c.id = e.cliente_id 
group by cliente_id,c.nombre  order by 2 desc limit 2;

-- ================================================================================
-- Ejercicio 16 : Obtener listado de clientes atendidos por el vendedor 'David Lopez'

select *
from clientes c 
where  vendedor_id in  (select id from vendedores v where nombre='David' and apellidos = 'Lopez');

-- ================================================================================
-- Ejercicio 17 : Obtener listado de clientes atendidos por el cliente 'Fruteria Antonia'

select e.id as Encargo, cantidad, c.nombre, c2.modelo, e.fecha 
from encargos e 
inner join clientes c on c.id = e.cliente_id 
inner join coches c2 on c2.id = e.coches_id 
where e.cliente_id in (select id from clientes c3 where id=2);


-- ================================================================================
-- Ejercicio 18 : Listar los cientes que han hecho algún encargo del coche "Mercedez Ranchera"

select 
		c.nombre 
		,c2.modelo 
		,c2.marca 
from clientes c 
inner join encargos e on e.cliente_id = c.id 
inner join coches c2 on c2.id = e.coches_id 
where e.coches_id = 3;

-- ================================================================================
-- Ejercicio 19 : Obtener los vendedores con 2 o mas clientes












