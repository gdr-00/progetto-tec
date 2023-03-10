<?php

use DB\DBAccess;
require_once("../html/nocrawling/connection.php");
$paginaHTML = file_get_contents("../html/prodotti.html");

$dbAccess = new DBAccess();
$connessioneRiuscita = $dbAccess->openConnection();
$stringaProdotti = "";

function replaceForeignText($string){
    $regex = '/\[([a-z]+)\s*=\s*([a-z]+)\]/i';
    $replacement = '<span lang="$1">$2</span>';
    return preg_replace($regex, $replacement, $string);
}

if($connessioneRiuscita){
    $prodotti = $dbAccess->getProducts();
    if($prodotti != null){
        $stringaProdotti .= '<ul id="products">';
        foreach($prodotti as $prodotto){
            $stringaProdotti .= '<li>';
            $stringaProdotti .= '<h3>'. replaceForeignText($prodotto['titolo']) . '</h3>';
            $stringaProdotti .= '<img src="'. $prodotto['immagine'] . '" alt="'.$prodotto['alt_immagine'].'">';
            $stringaProdotti .= '<p>'. replaceForeignText($prodotto['descrizione']) . '</p>';
            $stringaProdotti .= '</li>';
        }
        $stringaProdotti .= '</ul>';
    }
    else
        $stringaProdotti = '<p class="serverStringError">Nessun prodotto presente<p>';
}
else{
    $stringaProdotti = '<p class="serverStringError">Il servizio non è al momento raggiungibile, ci scusiamo per il disagio.<p>';
}
echo str_replace('<listaProdotti />', $stringaProdotti, $paginaHTML)
?>