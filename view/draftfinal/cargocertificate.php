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
        $this->Cell(80, 10, 'REPUBLIC OF GUINEA', 0);

        // Image au centre
        $this->Image('./page/assets/images/ministary.PNG', 60, 5, 90);

        // Texte à droite
        $this->Cell(60);
        $this->Cell(60, 10, 'General Directorate of the', 0);
        $this->Ln(5);
        $this->Cell(135);
        $this->Cell(60, 10, 'Office of Quantity and Quality', 0);
        $this->ln(5);
        $this->Cell(135);
        $this->Cell(60, 10, '        of Minerals for Export', 0);
        $this->Ln(20); // Saut de ligne
        $this->SetFont('Arial', '', 12);
        $this->Cell(80, 10, 'Work - Justice - Solidarity', 0);
        $this->Ln(5);
        $this->Cell(80, 10, 'Ministry of Mine and Geology', 0);
        $this->Ln(5);
        $this->Cell(80, 10, '', 0);
        $this->Ln(10);

        // Marque l'en-tête comme imprimé
            $this->headerPrinted = true;
        }
    
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-25);
    // Police Arial italique 8
    $this->SetFont('Arial','B',10);
    $this->Image('./page/assets/images/Flag.PNG',20,  280, 10);

        // Texte au centre
        $this->Cell(70);
        $this->Cell(60, 10, 'Conakry Commune de Kaloum', 0);
        $this->Ln(5);
        $this->Cell(72);
        $this->Cell(60, 10, ('République de Guinée'), 0);
        $this->Ln(5);
        $this->Cell(68);
        $this->Cell(60, 10, ('Immeuble OFAB-CONAKRY-BP :295'), 0);
        $this->Ln(5);
        $this->Cell(80);
        $this->Cell(60, 10, 'www.mines.gov.gn', 0);


        $this->Image('./page/assets/images/logonimba.PNG',175,  275, 20);
}

function viewTable()
{

    $idNavire= $_GET['id'];

    $obj_draft = new Draft();
    $all_draft = $obj_draft->getDraftByID($idNavire);
    foreach ($all_draft as $draft) {
        $nomNavire=$draft['nomNavire'];
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
        $LBPf=$ctmafinal['l'];
        $LBMf=$ctmafinal['lL'];
        $Laf=$ctmafinal['l1'];
        $Lmf=$ctmafinal['l3'];
        $Lff=$ctmafinal['l2'];
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
        $LBP=$ctmainitial['l'];
        $LBM=$ctmainitial['lL'];
        $La=$ctmainitial['l1'];
        $Lm=$ctmainitial['l3'];
        $Lf=$ctmainitial['l2'];

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
         $LSl=$deplacementfinal['ls'];
         $Kl=$deplacementfinal['constantes'];
         $Dpl=$deplacementfinal['densitemesure'];
         $Dsl=$deplacementfinal['densiteTableHydrostatique'];
        

        $OTHERSl=$deplacementfinal['others'];
        $Dpl=$deplacementfinal['densitemesure'];
    }

    $obj_cargaison = new Cargaison();
    $all_cargaison = $obj_cargaison->getCargaisonlByID($idNavire);
    foreach ($all_cargaison as $cargaison) {
        $cargo=$cargaison['poidsCargaisonMMG'];
        $cargoS=$cargaison['poidsCargaison'];

    }
            $this->SetFont('Times','BU',12);
            $this->Cell(70,20,(''));
            $this->Cell(100,20,('CARGO CERTIFICATE'));
            $this->ln();
            $this->SetFont('Times','B',12);
            $this->Cell(100,10,('At the end of the technical evaluation carried out today '.$dateFinal.', we hereby confirm that the cargo'));
            $this->Ln();
            $this->Cell(100,10,('loaded in the vessel '.$nomNavire. ' to company account '.$societeMiniere. ' is '.$cargo.' MT.'));
            $this->Ln();
            $this->Cell(100,10,('From Port of departure '.$nomPortDepart.'. Port of destination '.$nomPortDestination));
            $this->Ln();
            $this->Cell(100,10,('From the above, we issue this certificate to serve and enforce what is law.'));
            // $this->Cell(100,10,utf8_decode('From the above, we issue this certificate to serve and enforce what is law.'));
            $this->Ln();
            
            
            $this->SetFont('Times','B',12);
            
            $this->Cell(130,20,('Surveyor MMG'));
            $this->Cell(90,20,("Master of the Ship"));
            $this->SetFont('Times','',12);
            $this->Ln();
            $this->Cell(130,8,($inspecteurMinier));
            $this->Cell(90,8,($nomCapitaine));
            


}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->viewTable();
$pdf->Output();

?>