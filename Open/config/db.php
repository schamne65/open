<?php

function conectar(){
    try{
        $base=new PDO("mysql:host=localhost;dbname=sistema2","root","mysql");
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $base;
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
        return null;
    }
}


// copiado del tutorial que vi po el momento sin uso
const METHOD="AES-256-CBC";
const SECRET_KEY='%SISTEMA24$';
const SECRET_IV='100620';

?>