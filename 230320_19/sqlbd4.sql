SELECT * FROM bd4;
insert into bd4 (nroemp,nombref,nombrec,pass,correo,oficina,puesto)values (4,4,4,4,4,4,4)  ;
DELETE FROM bd4  WHERE id=2;
SELECT count(*) FROM bd4 WHERE nroemp='4';
DELETE FROM bd4  WHERE id=9;
SELECT * FROM bd4;
        SELECT precio FROM bd3 where precio >1.0;
        select * from bd3 where id =3;
        select * from bd3 where lower(descripcion) LIKE lower('Ch%');
        select * from bd3 where lower(descripcion) LIKE lower('%a%');
        select * from bd3 where lower(descripcion) LIKE lower('%o');
        insert into bd3 (id,descripcion,precio,categoria)values (2,'2','2','2')  ;
        insert into bd3 (descripcion,precio,categoria)values ('4','3','3')  ; --si no pones id se ponesolo autoincrementa
		 insert into bd3 (descripcion,precio,categoria) values ('8','4','4')  ; 
        insert into bd3 (id)values ()  ; --comentarios
        UPDATE bd3 SET descripcion =3,precio=3,categoria=3 WHERE id=2; 
			SELECT count(*) FROM bd3 where precio is not null ;
			SELECT COUNT(distinct precio ) from bd3;--- distintos
			select min(precio)from bd3;
			select max(precio)from bd3;
			select id,precio,(precio*2)as bono from bd3;-- nueva columna con formula 
		select current_date;--	
		select current_time;--
		select current_timestamp;--
		select extract(year from current_timestamp) 
			do $$
			begin
				if exists(select pais from precios where pais=iraq )then 
				delete from precios where pais= iraq;
					Raise Notice 'found';
				else
					Raise Notice 'Not found';
				end if;
			end $$
		DELETE FROM bd3  WHERE id=9;
SELECT * FROM bd3;
---modificar tablas ya hechas	
ALTER TABLE public.bd3	ADD CONSTRAINT precio PRIMARY KEY descripcion;  ---primaria
ALTER TABLE public.bd3	ADD CONSTRAINT precio FOREIGN KEY descripcion REFERENCES bd1(precio);  ---foranea relaciona 2tablas (2 sean primarykey y formato)
ALTER TABLE products DROP CONSTRAINT products_pkey; ---- remover primarykey
ALTER TABLE bd3 ADD CONSTRAINT unique_equip_id UNIQUE USING INDEX equipment_equip_id;
ALTER TABLE bd3 ALTER COLUMN precio SET NOT NULL;
ALTER TABLE bd3 ALTER COLUMN id serial primary key SET not null;
idtest serial primary key not null,
SELECT * FROM bd3;
---crear tabla
create table bd3(
            id serial    ,--- serial incremntal
            descripcion varchar(200) primary key ,--- primary key(noserepite y noesnull)// foreignkey clavepara1omascolumasreferncias
            precio decimal(12,2) NOT NULL,
            categoria varchar(100),
            PRIMARY KEY (precio,categoria),
            UNIQUE (c2, c3),
            net_price numeric CHECK(net_price > 0),
            po_no INTEGER PRIMARY KEY --- ingeger numero // no lleva , final es ultimorenglon
            );
            SELECT * FROM bd2;--refresh manualment arbol ver nueva tabla
 Create table bd4(
            idtest serial primary key not null,
            nombre varchar(20),
            telefono varchar(12) default 'Desconocido' 
        )
 --ojoooo  drop 
 drop table bd4;
 --ojoooo  drop 
 
 