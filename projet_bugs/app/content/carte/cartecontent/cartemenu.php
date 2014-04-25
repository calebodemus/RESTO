<?php

    $carte_lib = '';
    $carte_id = '';

    $entree = '';
    $plat = '';
    $dessert = '';
    $boisson = "<option value='0'></option>";

    $quantite = 0;
    $name = '';
    $menu = '';
    $menu_panier = '';
    $menu_id = '';
    $libelle = '';
    $descriptif = '';
    $url = '';
    $check_menu = '';
    $prix_livaison_menu = 0;
    $prix_emporter_menu = 0;

    $query = 'SELECT *,carte.id boisson_id, carte.libelle boisson_lib FROM carte, categorie
                                                        WHERE categorie.id = carte.id_categorie
                                                        AND (categorie.libelle = "soda"
                                                        OR categorie.libelle = "eau")';

    $res = mysqli_query($mysqli,$query);

    while ($ligne = mysqli_fetch_assoc($res))
    {
        $boisson_id =  htmlentities($ligne["boisson_id"]);
        $boisson_lib = htmlentities($ligne["boisson_lib"]);
        $boisson .= "<option value='" . $boisson_id . "'>" . $boisson_lib . "</option>";
    }


    $query = 'SELECT *, menu.id id_menu, categorie.libelle lib_cat, menu.libelle lib_menu,
                        menu.descriptif desc_menu, menu.url url_menu, carte.libelle lib_carte,
                        carte.id id_carte, menu.prix_emporter prix_emporter_menu, menu.prix_livraison prix_livaison_menu
              FROM menu, carte, composer, categorie WHERE carte.id = composer.id_carte
                                                    AND menu.id = composer.id_menu
                                                    AND categorie.id = carte.id_categorie';

    $res = mysqli_query($mysqli,$query);

    while ($ligne = mysqli_fetch_assoc($res))
    {
        if ($menu_id != htmlentities($ligne['id_menu']))
        {
            if ($menu_id != '')
            {
                $menu .= '<p>ENTREES</p>' . $entree . '<br /><p>PLATS</p>' .$plat . '<br /><p>DESSERTS</p>' . $dessert . '<br />';
                $name = 'MB' . $menu_id;
                $menu .= '<p>BOISSONS</p><select  name="'. $name .'">';
                $menu .= $boisson;
                $menu .= '</select><br />';
                $menu .= '<p>en livraison : ' . $prix_livaison_menu . ' €</p>';
                $menu .= '<p>à emporter : ' . $prix_emporter_menu . ' €</p>';
                $name = 'M' . $menu_id;
                $menu .= '<input type="number" name="' . $name . '" value="0" placeholder="quantité"/>';
                $menu .= '<input type="submit" formaction="index.php?page=carte&cart=menu&action=m*&id=' . $menu_id . '" value="AJOUTER"/>';
                $menu .= '</p></form>';

                if (isset($_SESSION['menu']))
                {
                    $tab_menu_global = $_SESSION['menu'];
                    foreach ($tab_menu_global as $key => $value)
                    {
                        $tab_menu = $value;
                        if ($tab_menu['id_menu'] == $menu_id)
                        {
                            $list = $tab_menu['id_entree'] . ',' . $tab_menu['id_plat'] . ',' . $tab_menu['id_dessert'] . ',' . $tab_menu['id_boisson'];
                            $query1 = 'SELECT * FROM carte WHERE id in (' . $list . ')';
                            $res1 = mysqli_query($mysqli,$query1);

                            while ($ligne1 = mysqli_fetch_assoc($res1))
                            {
                                if ($ligne1['id'] == $tab_menu['id_entree'])
                                    $lib_entree = $ligne1['libelle'];
                                if ($ligne1['id'] == $tab_menu['id_plat'])
                                    $lib_plat = $ligne1['libelle'];
                                if ($ligne1['id'] == $tab_menu['id_dessert'])
                                    $lib_dessert = $ligne1['libelle'];
                                if ($ligne1['id'] == $tab_menu['id_boisson'])
                                    $lib_boisson = $ligne1['libelle'];
                            }

                            $quantite =  $tab_menu['quantite'];
                            $menu_panier .= '<div>
                                                <form action="" method="post">
                                                    <input type="label" value="Entrée: ' . $lib_entree . '"/>
                                                    <input type="label" value="Plat: ' . $lib_plat . '"/>
                                                    <input type="label" value="Dessert: ' . $lib_dessert . '"/>
                                                    <input type="label" value="Boisson: ' . $lib_boisson . '"/><br />
                                                    <input type="submit" formaction="index.php?page=carte&cart=menu&action=ms&key=1&id=' . $key . '" value="-"/>
                                                    <input type="label" name="' . $key . '" value="' . $quantite . '" placeholder="quantité"/>
                                                    <input type="submit" formaction="index.php?page=carte&cart=menu&action=ma&key=1&id=' . $key . '" value="+"/>
                                                </form>
                                             </div>';
                        }
                    }

                }

                require('views/'.$carte_html);
                $menu_panier = '';
                $entree = '';
                $plat = '';
                $dessert = '';
            }
            $menu_id = htmlentities($ligne['id_menu']);
            $libelle =  htmlentities($ligne['lib_menu']);
            $descriptif =  htmlentities($ligne['desc_menu']);
            $url =  htmlentities($ligne['url_menu']);
            $menu = '<form action="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=m*&id='. $menu_id . '" method="post"><p>';
            $prix_livaison_menu = htmlentities($ligne['prix_livaison_menu']);
            $prix_emporter_menu = htmlentities($ligne['prix_emporter_menu']);

        }
        $carte_lib = htmlentities($ligne['lib_carte']);
        $carte_id = htmlentities($ligne['id_carte']);
        switch (htmlentities($ligne['lib_cat']))
        {
            case 'entree':
                $name = 'ME' . $menu_id;
                $entree .= '<input class="radio" type="radio" value=""' . $carte_id . '" name="'. $name .'" ' . $check_menu . ' /><label>' . $carte_lib . '</label><br />';
                break;
            case 'plat':
                $name = 'MP' . $menu_id;
                $plat .= '<input class="radio" type="radio" value=""' . $carte_id . '" name="'. $name .'" ' . $check_menu . ' /><label>' . $carte_lib . '</label><br />';
                break;
            case 'dessert':
                $name = 'MD' . $menu_id;
                $dessert .= '<input class="radio" type="radio" value=""' . $carte_id . '" name="'. $name .'" ' . $check_menu . ' /><label>' . $carte_lib . '</label><br />';
                break;
        }
    }
    $menu .= '<p>ENTREES</p>' . $entree . '<br /><p>PLATS</p>' .$plat . '<br /><p>DESSERTS</p>' . $dessert . '<br />';
    $name = 'MB' . $menu_id;
    $menu .= '<p>BOISSONS</p><select  name="'. $name .'">';
    $menu .= $boisson;
    $menu .= '</select><br />';
    $menu .= '<p>en livraison : ' . $prix_livaison_menu . ' €</p>';
    $menu .= '<p>à emporter : ' . $prix_emporter_menu . ' €</p>';
    $name = 'M' . $menu_id;
    $menu .= '<input type="number" name="' . $name . '" value="0" placeholder="quantité"/>';
    $menu .= '<input type="submit" formaction="index.php?page=carte&cart=menu&action=m*&id=' . $menu_id . '" value="AJOUTER"/>';
    $menu .= '</p></form>';

    if (isset($_SESSION['menu']))
    {
        $tab_menu_global = $_SESSION['menu'];
        foreach ($tab_menu_global as $key => $value)
        {
            $tab_menu = $value;
            if ($tab_menu['id_menu'] == $menu_id)
            {
                $list = $tab_menu['id_entree'] . ',' . $tab_menu['id_plat'] . ',' . $tab_menu['id_dessert'] . ',' . $tab_menu['id_boisson'];
                $query1 = 'SELECT * FROM carte WHERE id in (' . $list . ')';
                $res1 = mysqli_query($mysqli,$query1);

                while ($ligne1 = mysqli_fetch_assoc($res1))
                {
                    if ($ligne1['id'] == $tab_menu['id_entree'])
                        $lib_entree = $ligne1['libelle'];
                    if ($ligne1['id'] == $tab_menu['id_plat'])
                        $lib_plat = $ligne1['libelle'];
                    if ($ligne1['id'] == $tab_menu['id_dessert'])
                        $lib_dessert = $ligne1['libelle'];
                    if ($ligne1['id'] == $tab_menu['id_boisson'])
                        $lib_boisson = $ligne1['libelle'];
                }

                $quantite =  $tab_menu['quantite'];
                $menu_panier .= '<div>
                                                    <form action="" method="post">
                                                        <input type="label" value="Entrée: ' . $lib_entree . '"/>
                                                        <input type="label" value="Plat: ' . $lib_plat . '"/>
                                                        <input type="label" value="Dessert: ' . $lib_dessert . '"/>
                                                        <input type="label" value="Boisson: ' . $lib_boisson . '"/><br />
                                                        <p>en livraison : ' . ($prix_livaison_menu * $quantite) . ' €</p>
                                                        <p>à emporter : ' . ($prix_emporter_menu * $quantite) . ' €</p>
                                                        <input type="submit" formaction="index.php?page=carte&cart=menu&action=ms&key=1&id=' . $key . '" value="-"/>
                                                        <input type="label" name="' . $key . '" value="' . $quantite . '" placeholder="quantité"/>
                                                        <input type="submit" formaction="index.php?page=carte&cart=menu&action=ma&key=1&id=' . $key . '" value="+"/>
                                                    </form>
                                                 </div>';
            }
        }

    }
    require('views/'.$carte_html);

?>