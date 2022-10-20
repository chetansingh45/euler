<?php
    function isAdmin(){
        if($_SESSION['user']['type']==1){
            return true;
        }
        return false;
    }

    function isJrAdmin(){
        if($_SESSION['user']['type'] == 4){
            return true;
        }else{
           return false;
        }
    }

    function isPublisher(){
        if($_SESSION['user']['type']==2){
            return true;
        }
        return false;
    }

    function isViewer(){
        if($_SESSION['user']['type']==3){
            return true;
        }
        return false;
    }

    function role(){
        return $_SESSION['user']['type'];
    }
?>