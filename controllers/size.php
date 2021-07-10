<?php
include_once('../web-config.php');
include_once('../models/size-model.php');

$SizeModel = new Size();

if(isset($_POST['Create'])){
    $errors = array();
    echo "reached";
    if(empty($_POST['SizeValue'])){
        array_push($errors, "Size value is required");
    }
    if($errors == null){
        $SizeModel->Add(
            $_POST['SizeValue']
        );
        redirectWindow(getHTMLRoot(). "/sizes");
    }
    else{
        redirectWindow(getHTMLRoot(). "/sizes?error=$errors[0]");
    }
}

if(isset($_POST['Edit'])){
    $errors = array();
    if(empty($_POST['SizeID'])){
        array_push($errors, "Size not found");
    }
    if(empty($_POST['SizeValue'])){
        array_push($errors, "Size value is required");
    }
    if($errors == null){
        $SizeModel->Edit(
            $_POST['SizeID'],
            $_POST['SizeValue']
        );
        redirectWindow(getHTMLRoot(). "/sizes");
    }
    else{
        redirectWindow(getHTMLRoot(). "/sizes?error=$errors[0]");
    }
}

if(isset($_REQUEST['Delete'])){
    $errors = array();
    if(empty($_REQUEST['id'])){
        array_push($errors, "Size not found");
    }
    if($errors == null){
        $SizeModel->Delete(
            $_REQUEST['id']
        );
        redirectWindow(getHTMLRoot(). "/sizes");
    }
    else{
        redirectWindow(getHTMLRoot(). "/sizes?error=$errors[0]");
    }
}


?>