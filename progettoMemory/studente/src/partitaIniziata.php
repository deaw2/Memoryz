<?php
    session_start();
    if(isset($_GET["nome_stanza"])){
        require "../../sql/config.php";
        //frtvhre il vontrnuto efare tutt
        //controlla se la partita e` inizizata
        $inCorso = mysqli_fetch_all($connessione-> query("select inCorso from stanze where nome_stanza='$_GET[nome_stanza]'"))[0][0];
        //print_r($inCorso);
        
        //controllo se il round e` iniziato
        //echo 'in corso = '.$inCorso[0][0];
        if($inCorso==1){
            $inCorso = mysqli_fetch_all($connessione-> query("select inCorso, img_round, inizio_round from round where nome_stanza='$_GET[nome_stanza]'"))[0];
            if($inCorso[0]==1){
                //echo "iniziato round";
                echo $inCorso[1].";".$inCorso[2].";".$_SESSION["TTL"];//invia le info per far caricare la pagina nel modo corretto (il tempo di creazione e l'immagine del round)
                
            }else{
                echo "<br>il round deve ancora iniziare";
            }
        }else{
            echo "<br>la partita deve ancora iniziare";
        }
        
        
    }

?>