<?php




function logged(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }


    if(!isset($_SESSION['auth'])){

        header('Location: https://happytech63.fr/additional/suivie');

        exit();
    }

}






function nonco (): void {
    if(session_status() === PHP_SESSION_NONE){
        header('Location: https://happytech63.fr/additional/suivie/');
        exit();
    }
}
