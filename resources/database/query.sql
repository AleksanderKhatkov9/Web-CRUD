DROP database phpdb;
USE phpdb;
SELECT * FROM phpdb.user;
INSERT INTO phpdb.user(id, name, password, email) VALUES(1 ,'Sasha','1234','bendar01@tut.by');
UPDATE phpdb.user SET name = 'Tana', password = '567', email = 'ivan@tut.by' WHERE id=2;
DELETE FROM phpdb.user WHERE id= 1;
DELETE FROM phpdb.user WHERE id  BETWEEN 2 AND 15;

