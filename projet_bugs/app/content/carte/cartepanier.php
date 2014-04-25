<?php
    $panier = '';
    $size = 0;
    $i = 0;
    $nb_produit = 0;
    $prix_total_livraison = 0;
    $prix_total_emporter = 0;
    $prix = 0;
    $prix_total = 0;
    $composition = '';
    $mode = '';

    if (isset($_SESSION['carte']))
    {
        $tab_panier_carte = $_SESSION['carte'];

        foreach ($tab_panier_carte as $key => $value)
        {
            $query = 'SELECT * FROM carte WHERE id = ' . $key;
            $res = mysqli_query($mysqli,$query);
            $ligne = mysqli_fetch_assoc($res);

            $libelle = htmlentities($ligne['libelle']);
            $prix_total_livraison += $ligne['prix_livraison'] * $value;
            $prix_total_emporter += $ligne['prix_emporter'] *  $value;

            if (isset($_POST['mode']))
                $mode = $_POST['mode'];
            if ($mode == 'emporter')
                $prix = $ligne['prix_emporter'] *  $value;
            else
                $prix = $ligne['prix_livraison'] * $value;

            $panier .= '<form action="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=*&id=' . $key . '" method="post">
                            <a href="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=d&id=' . $key . '" class="panier_delete"><img src="source/img/remove.png" alt="delete"/></a>
                            <input type="label" value="'. $libelle .'"/>
                            <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=s&id=' . $key .'" value="-"/>
                            <input type="number" name="' . $key . '" oninput="this.form.submit()" value="' . $value . '" placeholder="quantité"/>
                            <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=a&id=' . $key . '" value="+"/>
                            <input type="label" value="' . $prix . ' €" />
                        </form>';
            $nb_produit += 1 * $value;
        }
    }

    if (isset($_SESSION['menu']))
    {
        $tab_panier_menu_global = $_SESSION['menu'];

        foreach ($tab_panier_menu_global as $key => $value)
        {
            $tab_panier_menu = $value;

            $query = 'SELECT * FROM menu WHERE id = ' . $tab_panier_menu['id_menu'];
            $res = mysqli_query($mysqli,$query);
            $ligne = mysqli_fetch_assoc($res);

            $libelle = htmlentities($ligne['libelle']);
            $quantite =  htmlentities($tab_panier_menu['quantite']);
            $prix_total_livraison += $ligne['prix_livraison'] * $quantite;
            $prix_total_emporter += $ligne['prix_emporter'] *  $quantite;

            if (isset($_POST['mode']))
                $mode = $_POST['mode'];
            if ($mode == 'emporter')
                $prix = $ligne['prix_emporter'] *  $quantite;
            else
                $prix = $ligne['prix_livraison'] * $quantite;

            $list = '(' . $tab_panier_menu['id_entree'] . ',' . $tab_panier_menu['id_plat'] . ',' . $tab_panier_menu['id_dessert'] . ',' . $tab_panier_menu['id_boisson'] . ')';
            $query = 'SELECT * FROM carte WHERE id in ' . $list;
            $res = mysqli_query($mysqli,$query);
            $count = mysqli_num_rows($res);
            $i = 0;
            $composition = '';
            while ($ligne = mysqli_fetch_assoc($res))
            {
                $i += 1;
                if ($i < $count)
                    $composition .= htmlentities($ligne['libelle']) . ', ';
                else
                    $composition .= htmlentities($ligne['libelle']);
            }

            $panier .= '<form action="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=m*&id=' . $key . '" method="post">
                                <a href="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=md&key=1&id=' . $key . '" class="panier_delete"><img src="source/img/remove.png" alt="delete"/></a>
                                <input type="label" value="'. $libelle .'"/>
                                <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=ms&key=1&id=' . $key .'" value="-"/>
                                <input type="text" readonly name="' . $key . '" value="' . $quantite . '" placeholder="quantité"/>
                                <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '&action=ma&key=1&id=' . $key . '" value="+"/>
                                <input type="label" value="' . $prix . ' €" />
                                <p>' . $composition . '</p>
                            </form>';
            $nb_produit += 1 * $quantite;

        }
    }

    if (isset($_POST['mode']))
        $mode = $_POST['mode'];

    switch ($mode)
    {
        case 'livraison':
            $check_livraison = 'checked';
            $check_emporter = '';
            $prix_total = $prix_total_livraison;
            break;
        case 'emporter':
            $check_livraison = '';
            $check_emporter = 'checked';
            $prix_total = $prix_total_emporter;
            break;
        default:
            $check_livraison = 'checked';
            $check_emporter = '';
            $prix_total = $prix_total_livraison;
            break;
    }

    $panier .= '<form>
                    <input type="label" value="Nombre de produits"/>
                    <input type="label" value="'. $nb_produit .'"/>
                </form>
                <form action="index.php?page=' . $_GET['page'] . '&cart=' . $cart . '" method="post">
                    <input type="label" value="TOTAL"/>
                    <input type="label" value="'. $prix_total .' €"/>
                    <p>
                        <label>Livraison</label><input type="radio" value="livraison" name="mode" onclick="this.form.submit()" ' . $check_livraison . '>
                        <label>A emporter</label><input type="radio" value="emporter" name="mode" onclick="this.form.submit()" ' . $check_emporter . '>
	                </p>
                </form>
                <form action="index.php?page=voirpanier" method="post">
                    <input type="submit" name="visualiser" value="VOIR MON PANIER">
                </form>';


    require('views/content/carte/cartepanier.html');
?>