/*Dans un second fichier .sql, tu stockeras les requêtes qui te permettront de réaliser ces actions :

Affiche toutes les données.
Affiche uniquement les prénoms.
Affiche les prénoms, les dates de naissance et l’école de chacun.
Affiche uniquement les élèves qui sont de sexe féminin.
Affiche uniquement les élèves qui font partie de l’école d'Addy.
Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet (DESC). Ensuite, la même chose mais en limitant les résultats à 2.
Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Bruxelles, toujours en SQL.
Modifie Ginette (toujours en SQL) et change son sexe et son prénom en “Omer”.
Supprimer la personne dont l’ID est 3.
Modifier le contenu de la colonne School de sorte que "1" soit remplacé par "Liege" et "2" soit remplacé par "Gent". (attention au type de la colonne !)
Faire d’autres manipulations pour voir si t’es bien compris.*/

-- Affiche toutes les données.
SELECT * FROM students;
-- Affiche uniquement les prénoms.
SELECT first_name FROM students;
-- Affiche les prénoms, les dates de naissance et l’école de chacun.
SELECT first_name, birth_date, school FROM students;

