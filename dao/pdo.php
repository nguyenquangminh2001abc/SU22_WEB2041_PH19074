<?php
function pdo_get_connection(){
    $hots = "localhost";
    $dbname = "duan_mau_ph19074";
    $user = "root";
    $pass = "";

    try {
        $conn = new PDO("mysql:host=$hots; dbname=$dbname;", $user , $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn ;
    } catch (PDOException $e){
        return "lỗi kết nối" . $e->getMessage();
    }
};

function pdo_excute($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    }
    catch(PDOException $e)
    {
        throw $e;
    }
    finally
    {
       unset($conn);
    }
}

// truy vấn nhiều dữ liệu
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e)
    {
        throw $e;
    }
    finally{
        unset($conn);
    }
}

// truy vấn 1 dữ liệu 

function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e)
    {
        throw $e;
    }
    finally
    {
        unset($conn);
    }
}

?>