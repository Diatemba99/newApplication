<?php

if(isset($_GET['page'])){
    switch($_GET['page']){

        case 'dashboard':
            require_once './view/dashboard/dashboard.php';
        break;

        case 'listessurveyinitial':
            require_once './view/draftinitial/listessurveyinitial.php';
        break;

        case 'infonavire':
            require_once './view/draftinitial/infonavire.php';
        break;

        case 'navire':
            require_once './view/draftinitial/navire.php';
        break;

        case 'draftinitial':
                require_once './view/draftinitial/draftinitial.php';
            break;

        case 'ctmainitial':
            require_once './view/draftinitial/ctmainitial.php';
        break;

        case 'cmminitial':
            require_once './view/draftinitial/cmminitial.php';
        break;

        case 'tpcinitial':
            require_once './view/draftinitial/tpcinitial.php';
        break;

        case 'deplacementinitial':
            require_once './view/draftinitial/deplacementinitial.php';
        break;

        case 'ctmafinal':
            require_once './view/draftfinal/ctmafinal.php';
        break;

        case 'cmmfinal':
            require_once './view/draftfinal/cmmfinal.php';
        break;

        case 'tpcfinal':
            require_once './view/draftfinal/tpcfinal.php';
        break;

        case 'deplacementfinal':
            require_once './view/draftfinal/deplacementfinal.php';
        break;

        case 'rapportfinal':
            require_once './view/draftfinal/rapportfinal.php';
        break;

        case 'infodraftinitial':
            require_once './view/draftinitial/infodraftinitial.php';
        break;

        case 'infodraftfinal':
            require_once './view/draftfinal/infodraftinitial.php';
        break;

        case 'cargaison':
            require_once './view/draftfinal/cargaison.php';
        break;
       

        case 'liste_personnel':
                require_once './view/personnel/liste.php';
            break;

        case 'draftfinal':
                require_once './view/draftfinal/listessurveyinitial.php';
            break;

        case 'overviewinitial':
                require_once './view/draftinitial/overviewinitial.php';
            break;
        
        case 'overviewfinal':
                require_once './view/draftfinal/overviewfinal.php';
            break;
        
        case 'connexion':
        require_once 'view/personnel/connexion.php';
        break;

        case 'deconnexion':
        require_once 'deconnexion.php';
        break;

       

       

    }

}else{
    require_once './view/personnel/connexion.php';
}

?>