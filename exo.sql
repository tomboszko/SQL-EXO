-- Dans un second fichier .sql, tu stockeras les requêtes qui te permettront de réaliser ces actions :

-- Affiche toutes les données.
SELECT * FROM students;
-- Affiche uniquement les prénoms.
SELECT nom FROM students;
-- Affiche les prénoms, les dates de naissance et l’école de chacun.
SELECT prenom, datenaissance, students.school FROM students JOIN school ON students.school = school.idschool;
-- Affiche uniquement les élèves qui sont de sexe féminin.
SELECT * FROM students WHERE genre = 'F';
-- Affiche uniquement les élèves qui font partie de l’école d'Addy.
SELECT students.nom, school.school
FROM students 
JOIN school ON students.school = school.idschool 
WHERE school.idschool = (
    SELECT school 
    FROM students 
    WHERE nom = 'Addy'
);
-- Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet (DESC). 
SELECT prenom FROM students ORDER BY prenom DESC;
-- Ensuite, la même chose mais en limitant les résultats à 2.
SELECT prenom FROM students ORDER BY prenom DESC LIMIT 2;
-- Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Bruxelles, toujours en SQL.
INSERT INTO students (nom, prenom, datenaissance, genre, school) VALUES ('Dalor', 'Ginette', '1930-01-01', 'F', 1);
-- Modifie Ginette (toujours en SQL) et change son sexe et son prénom en “Omer”.
UPDATE students SET prenom = 'Omer', genre = 'M' WHERE nom = 'Dalor';
-- Supprimer la personne dont l’ID est 3.
DELETE FROM students WHERE idstudent = 3;
-- Modifier le contenu de la colonne School de sorte que "1" soit remplacé par "Liege" et "2" soit remplacé par "Gent". (attention au type de la colonne !)
UPDATE students SET school = 1 WHERE school = 2;
UPDATE students SET school = 2 WHERE school = 1;
-- Faire d’autres manipulations pour voir si t’es bien compris.
SELECT * FROM students WHERE genre = 'M' AND school = 2;
SELECT * FROM students WHERE genre = 'M' OR school = 2;
SELECT * FROM students WHERE genre = 'M' OR school = 2 AND prenom = 'Omer';
SELECT * FROM students WHERE genre = 'M' OR (school = 2 AND prenom = 'Omer');
SELECT * FROM students WHERE genre = 'M' OR school = 2 OR prenom = 'Omer';
