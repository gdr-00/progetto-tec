<?php

namespace DB;

use mysqli;
class DBAccess {
    private const HOST_DB = "localhost";
    private const DATABASE_NAME = "tecweb";
    private const USERNAME = "tecweb";
    private const PASSWORD = "eDD&%5+QrPr4?A-";
    private $connection;

    public function openConnection(){
        $this->connection = mysqli_connect(DBAccess::HOST_DB, DBAccess::USERNAME, DBAccess::PASSWORD, DBAccess::DATABASE_NAME);
        if(mysqli_connect_errno()){
            return false;
        }
        else{
            return true;
        }
    }

    public function closeConnection(){
        if($this->connection != null){
            $this->connection->close();
        }
    }

    

    public function getProducts(){
        $query = "SELECT * FROM prodotti ORDER BY titolo ASC";
        $queryResult=mysqli_query($this->connection, $query) or die("Errore in openDBConnection: ".mysqli_error($this->connection));
        if (mysqli_num_rows($queryResult) == 0){
            return null;
        } else{
            $result = array();
            while($row = mysqli_fetch_assoc($queryResult)){
                array_push($result, $row);
            }
            $queryResult->free();
            return $result;
        }
    }
    
    private function filterInput($input) {
        $input = trim($input);
        $input = strip_tags($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    private function filterProductInput($input) {
        $this->filterInput($input);

    }
    public function login($username, $password){
        /*$query = "SELECT * FROM utenti WHERE username='$username' AND password='$password'";
        $queryResult = mysqli_query($this->connection, $query) or die ("Errore in openDBConnection: ".mysqli_error($this->connection));

        if(mysqli_num_rows($this->connection) > 0){
            if ($username == "admin" && $password == "admin")
                $_SESSION['admin'] = true;
            return true;
        } else{
            return false;
        }*/
        session_start();
        $user = mysqli_real_escape_string($this->connection, $username);
        $passw = mysqli_real_escape_string($this->connection, $password);

        $query = "SELECT * FROM utenti WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $user, $passw);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['admin'] = true;
            }
            return true;
        } 
        else {
            return false;
        }
    }

    public function insertProduct ($titolo, $descrizione, $immagine, $alt){
        $query = "INSERT INTO prodotti (titolo, descrizione, immagine, alt_immagine) VALUES(\"$titolo\", \"$descrizione\", \"$immagine\", \"$alt\")";
        $queryResult = mysqli_query($this->connection, $query) or die ("Errore in openDBConnection: ".mysqli_error($this->connection));
        
        if(mysqli_affected_rows($this->connection) > 0){
            return true;
        } else{
            return false;
        }
    }

    public function updateProduct($old_title, $titolo, $descrizione, $immagine, $alt){
        $query = "UPDATE prodotti SET titolo = \"$titolo\", descrizione = \"$descrizione\", immagine = \"$immagine\", alt_immagine = \"$alt\" WHERE titolo = \"$old_title\"";
        $queryResult = mysqli_query($this->connection, $query) or die ("Errore in openDBConnection: ".mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection) > 0){
            return true;
        } else{
            return false;
        }
    }

    public function deleteProduct($nome) {
        $query = "DELETE FROM prodotti WHERE id = $nome";
        echo $query;
        $queryResult=mysqli_query($this->connection, $query) or die("Errore in openDBConnection: ".mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection) > 0) {
            return true;
        } else{
            return false;
        }
    }
}

?>
