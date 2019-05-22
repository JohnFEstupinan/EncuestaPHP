<?php
    include_once('LogicaEncuesta.php');
    include_once('..\..\Reportes\fpdf.php');
    include_once('LogicaDocente.php');

    $IdDoc = $_POST['Docente'];   
    $PromedioPorGrupo =PromedioPorGrupoLogica($IdDoc);
    $Resultado = ConsultarObservacionesDocenteLogica($IdDoc);
    $PromedioGeneral = PromedioGeneralDocenteLogica($IdDoc);
    $DatosDocente = ObtenerDatosDocenteLogica($IdDoc);
    $ValidaExisteEncuestas =  ValidarSiExisteEncuestaLogica($IdDoc);
    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Helvetica','',8);
            $this->SetTextColor(31,78,120);
            $this->Cell(0,0,"Expedido: ".date("d/m/y"),0,1,'L');
            
            $this->SetMargins(10,10,10);
            $this->SetFont('Helvetica','B',8);
            $this->SetTextColor(31,78,120);
        
            $this->Cell(0,0,'Sistema de Encuestas - Reporte Encuesta Evaluacion Docente - '.date("d/M/y"),0,0,'C');
            $this->Image("..\..\IconImages\IconoEncuesta.png" , 185 ,5, 8 , 8 , "png");
                
        }        
        
        function Footer(){
            $this->SetY(-20);
            $this->SetY(285);

            $this->SetTextColor(31,78,120);    
            $this->SetFont('Helvetica','IB',10);
                
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
            $this->SetY(-20);
        }

        function TablaDatosDocente($Datos_Docente){
            
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(185,5,'Datos del Docente',1,1,'C',1);
            $this->Cell(90,5,'Nombre',1,1,'C',1);

            foreach($Datos_Docente as $row){
                $this->SetFillColor(255,0,0);
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8);
                $this->SetY(44.99); 
                $this->SetX(100);         
                $this->Cell(95,5,$row['NomApell_Docente'],1,0,'C');   
            }
            $this->Ln();  
        }

        function TablaPromedioPorCurso($PromedioPorGrupo){
            $this->Ln();
            $this->Ln();
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(185,5,'Promedio Por Grupo',1,1,'C',1);
            $this->Cell(95,5,'Grupo',1,1,'C',1);
            $this->SetY(65); 
            $this->SetX(105);
            $this->Cell(90,5,'Promedio',1,1,'C',1);


            foreach($PromedioPorGrupo as $row){
                $this->SetFillColor(255,0,0);
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8);

                $this->Cell(95,5,$row['Num_Grupo'] ,1,0,'C');  
                $this->Cell(90,5,$row['PromedioGrupo'] ,1,1,'C');
                }   
        }

        function TablaObservacionesDocente($Resultado){

            $this->Ln();
            $this->Ln();
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(185,5,'Observaciones al Docente',1,1,'C',1);

            foreach($Resultado as $row){  
                $this->SetFillColor(255,0,0);
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8);

                $this->Cell(185,5,$row['Evaluacion'] ,1,1,'');
            }
        }

        function TablaPromedioGeneral($PromedioGeneral){

            $this->Ln();
            $this->Ln();
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(93,5,'Calificacion Final ',1,1,'C',1);

            foreach($PromedioGeneral as $row){  
                $this->SetFillColor(255,0,0);
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8);
                $this->SetY(115);
                $this->SetX(103);
                $this->Cell(92,5,$row['PromedioGeneral'] ,1,1,'C');
            }
        }

        function FirmaRecibidoDocente($Datos_Docente){

            $this->Line(73,265,135,265);
            $this->SetDrawColor(128,128,128);
            $this->Text(93,270,"Firma Recibido");
            foreach($Datos_Docente as $row){
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8);
                $this->Text(83,275,$row['NomApell_Docente']);   
            }
        }
            
    }

    if($ValidaExisteEncuestas){
        $pdf=new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetY(40);
        $pdf->TablaDatosDocente($DatosDocente);
        $pdf->TablaPromedioPorCurso($PromedioPorGrupo,$Resultado,$PromedioGeneral);
        $pdf->TablaObservacionesDocente($Resultado);
        $pdf->TablaPromedioGeneral($PromedioGeneral);
        $pdf->FirmaRecibidoDocente($DatosDocente);
        $pdf->Output();
    }else{
        header('location: ..\Presentacion\FrmErrorConsultarDatosEncuestaDocente.php');
    }
?>