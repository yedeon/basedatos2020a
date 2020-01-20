 SELECT * FROM bd2;
        SELECT precio FROM bd2 where precio >1.0;
        select * from bd2 where id =3;
        select * from bd2 where lower(descripcion) LIKE lower('Ch%');
        select * from bd2 where lower(descripcion) LIKE lower('%a%');
        select * from bd2 where lower(descripcion) LIKE lower('%o');
        insert into bd2 (id,descripcion,precio,categoria)values (2,'2','2','2')  ;
        insert into bd2 (descripcion,precio,categoria)values ('4','3','3')  ; --si no pones id se ponesolo autoincrementa
        insert into bd2 (id)values ()  ; --comentarios
        UPDATE bd2 SET descripcion =3,precio=3,categoria=3,id=8 WHERE id=2; 
        DELETE FROM bd2  WHERE id=9;