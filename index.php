<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $server = "localhost";
    $db = "table_test_php";
    $user = "root";
    $pass = "";

    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.

    $newUser = "
        INSERT INTO table_test_php.utilisateur (id, nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (NULL, 'Roger', 'Roger', 'rogerRoro@Roger.be', 'rogerRogerRoger', 'La bas', 7898, 'RogerLand', NULL)
    ";
    $pdo->exec($newUser);

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $newProduct = "
        INSERT INTO table_test_php.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'pomme', 2.54, 'un fruit', 'un fruit rond, ici il est rouge, qui se mange a toute heure de la journee')
    ";
    $pdo->exec($newProduct);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.

    $newUsers = "
        INSERT INTO table_test_php.utilisateur (id, nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (NULL, 'Michel', 'Michel', 'michelMimi@Michel.be', 'Michou9845', 'Rue michmich', 1458, 'Belgique', NULL),
               (NULL, 'Sarah', 'Sarah', 'adressemail@gmail.com', 'viveleslicorne', 'Rue gradelfront', 4596, 'France', NULL)
    ";
    $pdo->exec($newUsers);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.

    $newProducts = "
        INSERT INTO table_test_php.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'table', 72.99, 'un meuble', 'un meuble pour y poser des truc, souvent les gens prennent un repas grace a ca'),
               (NULL, 'chaise', 8752.01, 'un meuble', 'un meuble tres aprécié pour s\'assoire et souvent utililisé avec une table')
    ";
    $pdo->exec($newProducts);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.

    $pdo->beginTransaction();

    $newUser1 = "
        INSERT INTO table_test_php.utilisateur (id, nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (NULL, 'Alyvias', 'Héloise', 'Alyvias.Héloise@yahoo.fr', 'azerty', 'Rue fleurie', 4545, 'Belgique', NULL)
    ";
    $pdo->exec($newUser1);

    $newUser2 = "
        INSERT INTO table_test_php.utilisateur (id, nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (NULL, 'Rocher', 'Tristan', 'trofor@dur.com', 'musCutr0b1', 'Hyurle', 4785, 'Allemagne', NULL)
    ";
    $pdo->exec($newUser2);

    $newUser3 = "
        INSERT INTO table_test_php.utilisateur (id, nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (NULL, 'Pas', 'Didé', 'aled@inspi.com', 'jsaipa', 'okuneidé', 7452, 'Belgique', NULL)
    ";
    $pdo->exec($newUser3);

    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();

    $newProduct1 = "
        INSERT INTO table_test_php.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'objet', 45, 'c\'est un truc', 'descrition longue de l\'objet')
    ";
    $pdo->exec($newProduct1);

    $newProduct2 = "
        INSERT INTO table_test_php.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'truc', 215, 'super descrition courte', 'magnifique descrition longue')
    ";
    $pdo->exec($newProduct2);

    $newProduct3 = "
        INSERT INTO table_test_php.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'tasse', 1, 'elle est transparente', 'un peu grande elle peux etre cool achete')
    ";
    $pdo->exec($newProduct3);

    $pdo->commit();
}

catch (PDOException $e){
    echo $e->getMessage();
    $pdo->rollBack();
}