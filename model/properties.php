<?php
function getPropertyByProduct($id)
{
    $sql = "SELECT * FROM properties WHERE id_product = " . $id;
    return getAll($sql);
}
function getOneProperty($id)
{
    $sql = "SELECT * FROM properties WHERE id = " . $id;
    return getOne($sql);
}
function addProperty($idProduct, $name, $description)
{
    $sql = "INSERT INTO properties(id_product, name, description) 
    VALUES(" . $idProduct . ",'" . $name . "', '" . $description . "')";
    return querySql($sql);
}
function delProperty($id)
{
    $sql = "DELETE FROM properties WHERE id=" . $id;
    return querySql($sql);
}
