<?php
if (isset($_GET['action']))
{
    if (substr($_GET['action'],0,1) != 'm')
    {
        $id_carte = $_GET['id'];
        if (isset($_SESSION['carte']))
        {
            $tab_carte = $_SESSION['carte'];
            if (isset($tab_carte[$id_carte]))
            {
                switch ($_GET['action'])
                {
                    case 'a':
                        $tab_carte[$id_carte] += 1;
                        break;
                    case 's':
                        $tab_carte[$id_carte] -= 1;
                        if  ($tab_carte[$id_carte] < 0)
                            $tab_carte[$id_carte] = 0;
                        break;
                    case 'd':
                        $tab_carte[$id_carte] = 0;
                        break;
                    case '*':
                        $tab_carte[$id_carte] = intval(mysqli_real_escape_string($mysqli,$_POST[$id_carte]));
                        if ($tab_carte[$id_carte] < 0)
                            $tab_carte[$id_carte] = 0;
                        break;
                }
            }
            else
            {
                switch ($_GET['action'])
                {
                    case 'a':
                        $tab_carte[$id_carte] = 1;
                        break;
                    case 's':
                        $tab_carte[$id_carte] = 0;
                        break;
                    case '*':
                        $tab_carte[$id_carte] = intval(mysqli_real_escape_string($mysqli,$_POST[$id_carte]));
                        break;
                }
            }
        }
        else
        {
            $tab_carte = array();
            switch ($_GET['action'])
            {
                case 'a':
                    $tab_carte[$id_carte] = 1;
                    break;
                case 's':
                    $tab_carte[$id_carte] = 0;
                    break;
                case '*':
                    $tab_carte[$id_carte] = intval(mysqli_real_escape_string($mysqli,$_POST[$id_carte]));
                    break;
            }
        }
        $tab_maj = array();
        foreach ($tab_carte as $key => $value)
        {
            if ($value > 0)
                $tab_maj[$key] = $tab_carte[$key];
        }
        $_SESSION['carte'] = $tab_maj;
    }
    else
    {
        if ((isset($_POST['ME' . $_GET['id']],$_POST['MP' . $_GET['id']],$_POST['MD' . $_GET['id']],$_POST['MB' . $_GET['id']]) && $_POST['MB' . $_GET['id']] != 0) || isset($_GET['key']))
        {
            $id_menu = $_GET['id'];

            if (!isset($_GET['key']))
            {
                $id_menu = $_GET['id'];
                $id = 'ME' . $_GET['id'];
                $id = intval(mysqli_real_escape_string($mysqli,$_POST[$id]));
                $id_menu .= $id;
                $id = 'MP' . $_GET['id'];
                $id = intval(mysqli_real_escape_string($mysqli,$_POST[$id]));
                $id_menu .= $id;
                $id = 'MD' . $_GET['id'];
                $id = intval(mysqli_real_escape_string($mysqli,$_POST[$id]));
                $id_menu .= $id;
                $id = 'MB' . $_GET['id'];
                $id = intval(mysqli_real_escape_string($mysqli,$_POST[$id]));
                $id_menu .= $id;
            }

            if (isset($_SESSION['menu']))
            {
                $tab_menu_global = $_SESSION['menu'];

                if (isset($tab_menu_global[$id_menu]))
                {
                    $tab_menu = $tab_menu_global[$id_menu];
                }
                else
                {
                    $tab_menu["id_menu"] = intval($_GET['id']);
                    $tab_menu["id_entree"] = intval(mysqli_real_escape_string($mysqli,$_POST['ME' . $_GET['id']]));
                    $tab_menu["id_plat"] = intval(mysqli_real_escape_string($mysqli,$_POST['MP' . $_GET['id']]));
                    $tab_menu["id_dessert"] = intval(mysqli_real_escape_string($mysqli,$_POST['MD' . $_GET['id']]));
                    $tab_menu["id_boisson"] = intval(mysqli_real_escape_string($mysqli,$_POST['MB' . $_GET['id']]));
                    $tab_menu["quantite"] = 0;
                }
            }
            else
            {
                $tab_menu_global = array();
                $tab_menu = array();
                $tab_menu["id_menu"] = intval($_GET['id']);
                $tab_menu["id_entree"] = intval(mysqli_real_escape_string($mysqli,$_POST['ME' . $_GET['id']]));
                $tab_menu["id_plat"] = intval(mysqli_real_escape_string($mysqli,$_POST['MP' . $_GET['id']]));
                $tab_menu["id_dessert"] = intval(mysqli_real_escape_string($mysqli,$_POST['MD' . $_GET['id']]));
                $tab_menu["id_boisson"] = intval(mysqli_real_escape_string($mysqli,$_POST['MB' . $_GET['id']]));
                $tab_menu["quantite"] = 0;
            }

            if (isset($_GET['key']))
            {
                $quantite = intval(mysqli_real_escape_string($mysqli,$_POST[$id_menu]));
            }
            else
            {
                $quantite = intval(mysqli_real_escape_string($mysqli,$_POST['M' . $_GET['id']]));
            }

            switch ($_GET['action'])
            {
                case 'ma':
                    $tab_menu["quantite"] += 1;
                    break;
                case 'ms':
                    $tab_menu["quantite"] -= 1;
                    if  ($tab_menu["quantite"] < 0)
                        $tab_menu["quantite"] = 0;
                    break;
                case 'm*':
                    $tab_menu["quantite"] = $quantite;
                    break;
                case 'md':
                    $tab_menu["quantite"] = 0;
                    break;
            }

            $tab_maj = array();
            $tab_menu_global[$id_menu] = $tab_menu;
            foreach ($tab_menu_global as $key => $value)
            {
                if ($key != $id_menu)
                    $tab_maj[$key] =  $value;
                else
                {
                    foreach ($tab_menu as $key => $value)
                    {
                        if ($key == "quantite" && $value > 0)
                            $tab_maj[$id_menu] = $tab_menu;
                    }
                }
            }
            $tab_menu_global = $tab_maj;
            $_SESSION['menu'] = $tab_menu_global;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$pourcentage = 0;
$message = '';
$code = '';

if (isset($_POST["code_reduction"]))
{
    $code = mysqli_real_escape_string($mysqli,$_POST["code_reduction"]);
    $query = 'SELECT * FROM reduction WHERE code = "' . $code . '" ';
    $res = mysqli_query($mysqli,$query);
    $ligne = mysqli_fetch_assoc($res);

    if (isset($ligne))
    {
        $pourcentage = $ligne["pourcentage"];
        $message = "Vous avez droit à une réduction de " . $pourcentage . "% sur le montant total de votre commande";
    }

}

$bon_reduction = '<form action="index.php?page=voirpanier" method = "post">
                    <h3>AJOUTER UN BON DE REDUCTION</h3>
                    <input type="text" placeholder="Saisissez votre code de réduction" name="code_reduction" value="' . $code . '"/>
                    <input type="submit" value="Valider" />
                    <p>'. $message .'</p>
                  </form>';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $panier = '';
    $size = 0;
    $i = 0;
    $nb_produit = 0;
    $prix_total_livraison = 0;
    $prix_total_emporter = 0;
    $prix = 0;
    $prix_total = 0;
    $mode = '';
    $composition = '';

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
            if ($mode == 'livraison')
                $prix = $ligne['prix_livraison'] * $value;
            else
                $prix = $ligne['prix_emporter'] *  $value;

            $panier .= '<form action="index.php?page=' . $_GET['page'] . '&action=*&id=' . $key . '" method="post">
                                <a href="index.php?page=' . $_GET['page'] . '&action=d&id=' . $key . '" class="panier_delete"><img src="source/img/remove.png" alt="delete"/></a>
                                <input type="label" value="'. $libelle .'"/>
                                <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&action=s&id=' . $key .'" value="-"/>
                                <input type="number" name="' . $key . '" oninput="this.form.submit()" value="' . $value . '" placeholder="quantité"/>
                                <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&action=a&id=' . $key . '" value="+"/>
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
            if ($mode == 'livraison')
                $prix = $ligne['prix_livraison'] * $quantite;
            else
                $prix = $ligne['prix_emporter'] *  $quantite;

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

            $panier .= '<form action="index.php?page=' . $_GET['page'] . '&action=m*&id=' . $key . '" method="post">
                                    <a href="index.php?page=' . $_GET['page'] . '&action=md&key=1&id=' . $key . '" class="panier_delete"><img src="source/img/remove.png" alt="delete"/></a>
                                    <input type="label" value="'. $libelle .'"/>
                                    <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&action=ms&key=1&id=' . $key .'" value="-"/>
                                    <input type="text" readonly name="' . $key . '" value="' . $quantite . '" placeholder="quantité"/>
                                    <input type="submit" formaction="index.php?page=' . $_GET['page'] . '&action=ma&key=1&id=' . $key . '" value="+" formmethod="post"/>
                                    <input type="label" value="' . $prix . ' €" />
                                    <p>' . $composition . '</p>
                                </form>';
            $nb_produit += 1 * $quantite;

        }
    }


    if(  (isset($_SESSION['adminConnected']) && $_SESSION['adminConnected'] == true) || (isset($_SESSION['memberConnected']) && $_SESSION['memberConnected'] == true)  )
    {   
        $login = mysqli_real_escape_string($mysqli,$_SESSION['login']);

        $query = "SELECT * FROM user WHERE login = '". $login . "'";
        $res = mysqli_query($mysqli,$query);
        $ligne = mysqli_fetch_assoc($res);

        $adresse = htmlentities($ligne['adresse']);
        $cp = htmlentities($ligne['cp']);
        $ville = htmlentities($ligne['ville']);
        $nb_point = htmlentities($ligne['point']);

        $livraison_adresse = '<div class="panier_adresse">
                                <h3>ADRESSE DE LIVRAISON</h3>
                                <p>Rue : ' . $adresse . '</p>
                                <p>Code Postal: '. $cp . '</p>
                                <p>Ville : ' .$ville . '</p>
                              </div>
                              <div class="panier_adresse">
                                  <form action="" method="post">
                                    <h3>AUTRE ADRESSE DE LIVRAISON</h3>
                                    <input type="text" value="" name="panier_adresse" placeholder="N° / Rue"/><br />
                                    <input type="text" value="" name="panier_cp" placeholder="Code Postal"/><br />
                                    <input type="text" value="" name="panier_ville" placeholder="Ville"/><br />
                                    <input type="submit" value="Vérifier" />
                                  </form>
                              </div>';
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
                $livraison_adresse = '';
                break;
            default:
                $check_livraison = 'checked';
                $check_emporter = '';
                $prix_total = $prix_total_livraison;
                break;
        }

        if ($pourcentage != 0)
        {
            $prix_total -= $prix_total * ($pourcentage / 100);
        }

        $panier .= '<form>
                        <input type="label" value="Nombre de produits"/>
                        <input type="label" value="'. $nb_produit .'"/>
                    </form>
                    <form action="index.php?page=' . $_GET['page'] . '" method="post">
                        <input type="label" value="TOTAL"/>
                        <input type="label" value="'. $prix_total .' €"/>
                        <p>
                            <label>Livraison</label><input type="radio" value="livraison" name="mode" onclick="this.form.submit()" ' . $check_livraison . '>
                            <label>A emporter</label><input type="radio" value="emporter" name="mode" onclick="this.form.submit()" ' . $check_emporter . '>
                        </p>
                    </form>';


        $message_point = '';
        $nb_reduc = intval($nb_point / 10);
        if ($nb_reduc > 0)
            $message_point = "Vous avez cumulez " . $nb_point . " points. Vous avec donc droit à ". $nb_reduc . " bons de reduction.";    
        if ($nb_point > 0)
            $message_point = "Vous avez cumulez " . $nb_point . " points. Vous n'avez pas encore assez de points pour avoir un bon de réduction.";
        else
            $message_point = "Vous n'avez cumulez aucun point.";


        $point =    "<h2>UTILISER MES POINT DE FIDELITE</h2>
                    <article class='point_article'>
                        <h3>1: JE CUMULE DES POINTS DE FIDELITE</h3>
                        <p>1 commande = 1 point cumulé</p>
                    </article>
                    <article class='point_article'>
                        <h3>2: J'ECHANGE MES POINTS EN BONS DE REDUCTION</h3>
                        <p>Dans votre espace 'Mon Compte', vous pouvez visualiser le total de vos points.</p>
                        <p>Au bout de 10 points, un bon de réduction vous ait offert</p>
                    </article>
                    <article class='point_article'>
                    <h3>3: J'UTILISE MES BONS DE REDUCTION QUAND JE VEUX</h3>
                    <p>Les bons de réduction peuvent être et cumulés lors du paiement</p>
                    </article>
                    <form action='index.php?page=voirpanier' method = 'post'  style='clear:both;'>
                        <input type='text' placeholder='Saisissez votre code de réduction' name='code_reduction' value='" . $code . "'/>
                        <input type='submit' value='Valider' />
                        <p>" . $message_point . "</p>
                    </form>";
    }
    else
    {
        $livraison_adresse = ''; 
        $point = '<p>Veuillez vous connecter afin de finaliser votre commande</p>'; 
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    require('views/content/voirpanier.html');
 ?>