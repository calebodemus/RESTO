<?php
    $titre = '';
    $url = '';
    $alt = '';
    $descriptif = '';
    $prix_livraison = 0;
    $prix_emporter = 0;
    $id_carte = 0;
    $quantite = 0;

    $query = 'SELECT *, carte.libelle titre, carte.id id_carte FROM carte,categorie WHERE categorie.id = carte.id_categorie AND categorie.libelle = "dessert"';
    $res = mysqli_query($mysqli,$query);

    while ($ligne = mysqli_fetch_assoc($res))
    {
        $titre = htmlentities($ligne['titre']);
        $url = htmlentities($ligne['url']);
        $alt = '';
        $descriptif = htmlentities($ligne['descriptif']);
        $prix_livraison = 'en livraison : ' . htmlentities($ligne['prix_livraison']) . ' €';
        $prix_emporter = 'à emporter : ' . htmlentities($ligne['prix_emporter']) . ' €';
        $id_carte = htmlentities($ligne['id_carte']);

        if (isset($_SESSION['carte']))
        {
            $carte = $_SESSION['carte'];
            if (isset($carte[$id_carte]))
                $quantite = $carte[$id_carte];
            else
                $quantite = 0;
        }


        require('views/'.$carte_html);
    }

?>