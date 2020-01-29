SELECT * FROM bd3;
        SELECT precio FROM bd3 where precio >1.0;
        select * from bd3 where id =3;
        select * from bd3 where lower(descripcion) LIKE lower('Ch%');
        select * from bd3 where lower(descripcion) LIKE lower('%a%');
        select * from bd3 where lower(descripcion) LIKE lower('%o');
        insert into bd3 (id,descripcion,precio,categoria)values (2,'2','2','2')  ;
        insert into bd3 (descripcion,precio,categoria)values ('4','3','3')  ; --si no pones id se ponesolo autoincrementa
        insert into bd3 (id)values ()  ; --comentarios
        UPDATE bd3 SET descripcion =3,precio=3,categoria=3 WHERE id=2; 
			SELECT * FROM bd3;
        DELETE FROM bd3  WHERE id=9;
SELECT * FROM bd3;
---modificar tablas ya hechas	
ALTER TABLE public.bd3	ADD CONSTRAINT precio PRIMARY KEY descripcion;  ---primaria
ALTER TABLE public.bd3	ADD CONSTRAINT precio FOREIGN KEY descripcion REFERENCES bd1(precio);  ---foranea relaciona 2tablas (2 sean primarykey y formato)
ALTER TABLE products DROP CONSTRAINT products_pkey; ---- remover primarykey
ALTER TABLE bd3 ADD CONSTRAINT unique_equip_id UNIQUE USING INDEX equipment_equip_id;
ALTER TABLE bd3 ALTER COLUMN precio SET NOT NULL;
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