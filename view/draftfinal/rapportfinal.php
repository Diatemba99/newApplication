<?php
require('./fpdf186/fpdf.php');
require_once './model/draftinitial.php';
require_once './model/infodraftinitial.php';
require_once './model/ctmainitial.php';
require_once './model/ctmafinal.php';
require_once './model/cmmfinal.php';
require_once './model/tpcfinal.php';
require_once './model/deplacementinitial.php';
require_once './model/deplacementfinal.php';
require_once './model/cargaison.php';
// $idNavire= $_GET['id'];

// $obj_draft = new Draft();
// $all_draft = $obj_draft->getDraftByID($idNavire);
// foreach ($all_draft as $draft) {
//     $nomNavire=$draft['nomNavire'];
// }

class PDF extends FPDF
{
    private $headerPrinted = false;
// En-tête
function Header()
{
    // // Logo
    // $this->Image('./page/assets/images/NIMBA.png',10,6,30);
    // // Police Arial gras 15
    // $this->SetFont('Arial','B',15);
    // // Décalage à droite
    // $this->Cell(80);
    // // Titre
    // $this->Cell(30,10,'Republic of Guinea Work-Justice-Solidarity',0,0,'C');
    // // Saut de ligne
    // $this->Ln(20);
    // Imprime l'en-tête uniquement si ce n'est pas déjà fait
    if (!$this->headerPrinted) {
    // Texte à gauche
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80, 10, 'Ministry of Mine and Geology', 0);

        // Image au centre
        $this->Image('./page/assets/images/ministary.PNG', 60, 5, 90);

        // Texte à droite
        $this->Cell(60);
        $this->Cell(60, 10, 'Republic of Guinea', 0);
        $this->Ln(5);
        $this->Cell(135);
        $this->Cell(60, 10, 'Work-Justice-Solidarity', 0);
        $this->Ln(20); // Saut de ligne
        $this->SetFont('Arial', '', 12);
        $this->Cell(80, 10, 'General Directorate of the', 0);
        $this->Ln(5);
        $this->Cell(80, 10, 'Office of Quantity and Quality', 0);
        $this->Ln(5);
        $this->Cell(80, 10, 'of Minerals for Export', 0);
        $this->Ln(10);

        // Marque l'en-tête comme imprimé
            $this->headerPrinted = true;
        }
    
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function viewTable()
{

    // require_once './model/infodraftinitial.php';
    // require_once './model/ctmafinal.php';
    // require_once './model/cmmfinal.php';
    // require_once './model/tpcfinal.php';
    // require_once './model/deplacementfinal.php';
    // require_once './model/cargaison.php';

    $idNavire= $_GET['id'];

    $obj_draft = new Draft();
    $all_draft = $obj_draft->getDraftByID($idNavire);
    foreach ($all_draft as $draft) {
        $nomNavire=$draft['nomNavire'];
        $LBP=$draft['lbp'];
        $LBM=$draft['between_draft_mark'];
        $La=$draft['ap_to_fore_draft_mark'];
        $Lm=$draft['midship_to_mid_draft_mark'];
        $Lf=$draft['fp_to_fore_draft_mark'];
        $keel=$draft['keelplate'];
        $disp=$draft['disp'];
    }

    $obj_infodraft = new Infodraftinitial();
    $info_draft = $obj_infodraft->getInfoDraftByID($idNavire);
    foreach ($info_draft as $infdraft) {
        $nomCapitaine=$infdraft['nomCapitaine'];
        $imoNumber=$infdraft['imoNumber'];
        $agenceMaritime=$infdraft['agenceMaritime'];
        $societeMiniere=$infdraft['societeMiniere'];
        $typeMinerai=$infdraft['typeMinerai'];
        $dateSurveyInitial=$infdraft['dateSurveyInitial'];
        $heureSurveyInitial=$infdraft['heureSurveyInitial'];
        $nomPortDepart=$infdraft['nomPortDepart'];
        $nomPortDestination=$infdraft['nomPortDestination'];
        $inspecteurMinier=$infdraft['inspecteurMinier'];
    }

    $obj_ctmafinal = new Ctmafinal();
    $all_ctmafinal = $obj_ctmafinal->getCtmaInitialByID($idNavire);
    foreach ($all_ctmafinal as $ctmafinal) {
        $tEavbdf=$ctmafinal['tEavbd'];
        $tEavtdf=$ctmafinal['tEavtb'];
        $tEmbdf=$ctmafinal['tEmbd'];
        $tEmtdf=$ctmafinal['tEmtb'];
        $tEarbdf=$ctmafinal['tEarbd'];
        $tEartbf=$ctmafinal['tEartb'];
        $dateFinal=$ctmafinal['dateFinal'];
        $heureFinal=$ctmafinal['heureFinal'];
    }

    $obj_ctmainitial = new Ctmainitial();
    $all_ctmainitial = $obj_ctmainitial->getCtmaInitialByID($idNavire);
    foreach ($all_ctmainitial as $ctmainitial) {
        $tEavbd=$ctmainitial['tEavbd'];
        $tEavtd=$ctmainitial['tEavtb'];
        $tEmbd=$ctmainitial['tEmbd'];
        $tEmtd=$ctmainitial['tEmtb'];
        $tEarbd=$ctmainitial['tEarbd'];
        $tEartb=$ctmainitial['tEartb'];

    }

    $obj_deplacementinitial = new Deplacementinitial();
    $all_deplacementinitial = $obj_deplacementinitial->getDeplacementinitialByID($idNavire);
    foreach ($all_deplacementinitial as $deplacementinitial) {
        $FO=$deplacementinitial['fuelOil'];
        $DO=$deplacementinitial['dieselOil'];
        $LO=$deplacementinitial['lubrifiantOil'];
        $FW=$deplacementinitial['freshWater'];
        $BW=$deplacementinitial['ballastWater'];
        $LS=$deplacementinitial['ls'];
        $K=$deplacementinitial['constantes'];
        $OTHERS=$deplacementinitial['others'];
        $Dp=$deplacementinitial['densitemesure'];
        $Ds=$deplacementinitial['densiteTableHydrostatique'];
    }

    $obj_deplacementfinal = new Deplacementfinal();
    $all_deplacementfinal = $obj_deplacementfinal->getDeplacementitialByID($idNavire);
    foreach ($all_deplacementfinal as $deplacementfinal) {
        $FOl=$deplacementfinal['fuelOil'];
        $DOl=$deplacementfinal['dieselOil'];
        $LOl=$deplacementfinal['lubrifiantOil'];
        $FWl=$deplacementfinal['freshWater'];
        $BWl=$deplacementfinal['ballastWater'];
        
        // $Kl=$deplacementfinal['constantes'];
        $OTHERSl=$deplacementfinal['others'];
        $Dpl=$deplacementfinal['densitemesure'];
        // $Dsl=$deplacementfinal['densiteTableHydrostatique'];
    }

    $obj_cargaison = new Cargaison();
    $all_cargaison = $obj_cargaison->getCargaisonlByID($idNavire);
    foreach ($all_cargaison as $cargaison) {
        $cargo=$cargaison['poidsCargaisonMMG'];
        $cargoS=$cargaison['poidsCargaison'];

    }
            $this->SetFont('Times','B',12);
            // $this->Cell(70,20,utf8_decode(''));
            $this->Cell(100,20,('GENERAL DIRECTORATE OF THE OFFICE OF QUANTITY OF MINERALS FOR EXPORTS'));
            $this->ln();
            $this->SetFont('Times','BU',12);
            $this->Cell(70,20,(''));
            $this->Cell(100,20,('REPORTING SHEET'));
            $this->Ln();

            $this->SetFont('Times','',12);
            $this->Cell(90,8,('Initial Draft Date :'.'   '.$dateSurveyInitial),1,0,'C');
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(90,8,('Final Draft Date :'.' '.$dateFinal),1,0,'C');
            $this->ln();
            $this->Cell(90,8,('Port of Departure :'.'   '.$nomPortDepart),1,0,'C');
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(90,8,('Port of Destination :'.'   '.$nomPortDestination),1,0,'C');
            $this->Ln();
            $this->Cell(90,8,('Initial Draft Time :'.'   '.$heureSurveyInitial),1,0,'C');
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(90,8,('Final Draft Time :'.'   '.$heureFinal),1,0,'C');
            $this->Ln();
            $this->Cell(90,8,('Company :'.'   '.$societeMiniere),1,0,'C');
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(90,8,('Product :'.' '.$typeMinerai),1,0,'C');
            $this->ln();
            $this->Cell(90,8,('Vessel :'.'   '.$nomNavire),1,0,'C');
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(90,8,('IMO NUMBER :'.'   '.$imoNumber),1,0,'C');
            $this->Ln();
            $this->Cell(90,8,('Cargo MMG (TM) :'.'   '.$cargo),1,0,'C');
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(90,8,('Cargo Company (MT) :'.'   '.$cargoS),1,0,'C');
            $this->Ln();
            $this->Cell(90,8,('Name of Captain :'.'   '.$nomCapitaine),1,0,'C');
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(90,8,('Maritime Agency :'.'   '.$agenceMaritime),1,0,'C');
            $this->Ln();

            $this->SetFont('Times','B',12);
            $this->Cell(70,20,(''));
            $this->Cell(100,20,('DETAILS OF OPERATIONS'));
            $this->Ln();

            $this->SetFont('Times','BU',12);
            $this->Cell(90,20,('Draft Initial'),0,0,'C');
            $this->Cell(90,20,('Draft Final'),0,0,'C');
            $this->SetFont('Times','',12);
            $this->Ln();
            $this->Cell(30, 10, 'FWD', 1);
            $this->Cell(30, 10, 'MID', 1);
            $this->Cell(30, 10, 'AFT', 1);
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace Tableau & 2
            $this->Cell(30, 10, 'FWD', 1);
            $this->Cell(30, 10, 'MID', 1);
            $this->Cell(30, 10, 'AFT', 1);
            $this->Ln();
            $this->Cell(30, 10,'   '.$tEavbd, 1);
            $this->Cell(30, 10,'   '.$tEmbd, 1);
            $this->Cell(30, 10,'   '.$tEarbd, 1);
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(30, 10,'   '.$tEavbdf, 1);
            $this->Cell(30, 10,'   '.$tEmbdf, 1);
            $this->Cell(30, 10,'   '.$tEarbdf, 1);
            $this->Ln();
            $this->Cell(30, 10,'   '.$tEavtd, 1);
            $this->Cell(30, 10,'   '.$tEmtd, 1);
            $this->Cell(30, 10,'   '.$tEartb, 1);
            $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            $this->Cell(30, 10,'   '.$tEavtdf, 1);
            $this->Cell(30, 10,'   '.$tEmtdf, 1);
            $this->Cell(30, 10,'   '.$tEartbf, 1);
            $this->Ln();
            // $this->Cell(90,8,utf8_decode('FWD TEavbd :'.'   '.$tEavbd),1,0,'C');
            // $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            // $this->Cell(90,8,utf8_decode('FWD TEavbd :'.'   '.$tEavbdf),1,0,'C');
            // $this->ln();
            // $this->Cell(90,8,utf8_decode('FWD TEavtd :'.'   '.$tEavtd),1,0,'C');
            // $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            // $this->Cell(90,8,utf8_decode('FWD TEavtd :'.'   '.$tEavtdf),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('MID TEMbd :'.'   '.$tEmbd),1,0,'C');
            // $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            // $this->Cell(90,8,utf8_decode('MID TEMbd :'.'   '.$tEmbdf),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('MID TEMtd :'.'   '.$tEmtd),1,0,'C');
            // $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            // $this->Cell(90,8,utf8_decode('MID TEMtd :'.'   '.$tEmtdf),1,0,'C');
            // $this->ln();
            // $this->Cell(90,8,utf8_decode('AFT TEarbd :'.'   '.$tEarbd),1,0,'C');
            // $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            // $this->Cell(90,8,utf8_decode('AFT TEarbd :'.'   '.$tEarbdf),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('AFT TEartd :'.'   '.$tEartb),1,0,'C');
            // $this->Cell(10, 10, '', 0); // Cellule vide pour l'espace
            // $this->Cell(90,8,utf8_decode('AFT TEartd :'.'   '.$tEartbf),1,0,'C');
            
            $this->Ln();
            $this->SetFont('Times','B',12);
            $this->Cell(63.5, 10, 'DATA', 1);
            $this->Cell(63.5, 10, 'INITIALS', 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'LBP', 1);
            $this->Cell(63.5, 10, '   '.$LBP, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'LBM', 1);
            $this->Cell(63.5, 10, '   '.$LBM, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'La', 1);
            $this->Cell(63.5, 10, '   '.$La, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'Lm', 1);
            $this->Cell(63.5, 10, '   '.$Lm, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'Lf', 1);
            $this->Cell(63.5, 10, '   '.$Lf, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'FO', 1);
            $this->Cell(63.5, 10, '   '.$FO, 1);
            $this->Cell(63.5, 10, '   '.$FOl, 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'DO', 1);
            $this->Cell(63.5, 10, '   '.$DO, 1);
            $this->Cell(63.5, 10, '   '.$DOl, 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'LO', 1);
            $this->Cell(63.5, 10, '   '.$LO, 1);
            $this->Cell(63.5, 10, '   '.$LOl, 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'FW', 1);
            $this->Cell(63.5, 10, '   '.$FW, 1);
            $this->Cell(63.5, 10, '   '.$FWl, 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'LS', 1);
            $this->Cell(63.5, 10, '   '.$LS, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'K', 1);
            $this->Cell(63.5, 10, '   '.$K, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'KEEL', 1);
            $this->Cell(63.5, 10, '   '.$keel, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'Dp', 1);
            $this->Cell(63.5, 10, '   '.$Dp, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'Ds', 1);
            $this->Cell(63.5, 10, '   '.$Ds, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'OTHERS', 1);
            $this->Cell(63.5, 10, '   '.$OTHERS, 1);
            $this->Cell(63.5, 10, '   '.$OTHERSl, 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'DISP(TM)', 1);
            $this->Cell(63.5, 10, '   '.$disp, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            $this->Cell(63.5, 10, 'Cargo(TM)', 1);
            $this->Cell(63.5, 10, '   '.$cargo, 1);
            $this->Cell(63.5, 10, 'FINALS', 1);
            $this->Ln();
            
            // $this->Cell(90,8,utf8_decode('LBP :'.'   '.$LBP),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('LBM :'.'   '.$LBM),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('La :'.'   '.$La),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('La :'.'   '),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('Lm :'.'   '.$Lm),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('Lm :'.'   '),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('Lf :'.'   '.$Lf),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('Lf :'.'   '),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('FO :'.'   '.$FO),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('FO :'.'   '.$FOl),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('DO :'.'   '.$DO),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('DO :'.'   '.$DOl),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('LO :'.'   '.$LO),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('LO :'.'   '.$LOl),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('FW :'.'   '.$FW),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('FW :'.'   '.$FWl),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('BW :'.'   '.$BW),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('BW :'.'   '.$BWl),1,0,'C');
            // $this->Ln();          
            // $this->Cell(90,8,utf8_decode('LS :'.'   '.$LS),1,0,'C');
            // $this->Ln();         
            // $this->Cell(90,8,utf8_decode('K :'.'   '.$K),1,0,'C');
            // $this->Ln();           
            // $this->Cell(90,8,utf8_decode('KEEL :'.'   '.$keel),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('Ds :'.'   '.$Ds),1,0,'C');           
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('OTHERS :'.'   '.$OTHERS),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('OTHERS :'.'   '.$OTHERSl),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode('Déplacement :'.'   '.$Dp),1,0,'C');           
            // $this->Cell(90,8,utf8_decode('Déplacement :'.'   '.$Dpl),1,0,'C');
            // $this->Ln();
            // $this->Cell(90,8,utf8_decode(''));           
            // $this->Cell(90,8,utf8_decode('Cargo :'.'   '.$cargo),1,0,'C');
            // $this->Ln();
            $this->SetFont('Times','BU',12);
            
            $this->Cell(90,20,('Surveyor'));
            $this->Cell(90,20,('Chief Officer'));
            $this->SetFont('Times','',12);
            $this->Ln();
            $this->Cell(90,8,($inspecteurMinier));
            $this->Cell(90,8,(''));
            


}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->viewTable();
$pdf->Output();


// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World !');
// $pdf->Output();
?>