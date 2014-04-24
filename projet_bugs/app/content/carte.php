<?php
$carte_php = '';
$carte_html = '';
$cart = '';

$tab_cart = array(
    'menu' => 'content/carte/cartecontent/cartemenu',
    'entree' => 'content/carte/cartecontent/carteentrees',
    'plat' => 'content/carte/cartecontent/carteplats',
    'dessert' => 'content/carte/cartecontent/cartedesserts',
    'boisson' => 'content/carte/cartecontent/carteboissons',
);

if (isset($_GET['cart']))
{
    if ($_GET['cart'] != '')
    {
        $cart = $_GET['cart'];
        $carte_php = $tab_cart[$cart] . '.php';
        $carte_html = $tab_cart[$cart] . '.html';
    }
    else
        $carte_php = 'content/home.php';
}
else
    $carte_php = 'content/home.php';

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
//$_SESSION['menu'] = array();
//$_SESSION['carte'] = array();
require('views/content/carte.html');
?>