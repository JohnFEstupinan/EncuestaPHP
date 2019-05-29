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
    $PromedioPorPreguntas = PromedioPorPreguntaLogica($IdDoc);
    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Helvetica','',8);
            $this->SetTextColor(31,78,120);
            $this->Cell(0,0,"Expedido: ".date("d/m/y"),0,1,'L');
            
            $this->SetMargins(10,10,10);
            $this->SetFont('Helvetica','B',10);
            $this->SetTextColor(31,78,120);
        
            $this->Cell(0,0,utf8_decode('Sistema de Encuestas - Reporte Encuesta Evaluación Docente - ').date("d/M/y"),0,0,'C');
            $this->Image("..\..\IconImages\IconoEncuesta.png" , 185 ,5, 8 , 8 , "png");
                
        }        
        
        function Footer(){
            
            $this->SetY(276);

            $this->SetTextColor(31,78,120);    
            $this->SetFont('Helvetica','IB',10);

            $this->Line(81,276,133,276);
            $this->SetDrawColor(128,128,128); 
            $this->Cell(4.5);          
            $this->Cell(0,10,'Firma Recibido',0,1,'C');



            $this->Cell(9);
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');

        }

        function TablaDatosDocente($Datos_Docente){
            
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(185,5,'Datos del Docente',1,1,'C',1);
            $this->Cell(90,5,'Nombres y Apellidos',1,0,'C',1);

            foreach($Datos_Docente as $row){
                $this->SetFillColor(255,0,0);
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8); 
                $this->Cell(95,5,utf8_decode($row['NomApell_Docente']),1,0,'C');   
            }
            $this->Ln();  
        }

        function TablaPromedioPorCurso($PromedioPorGrupo){

            $this->Ln();
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(185,5,'Promedio Por Grupo',1,1,'C',1);
            $this->Cell(95,5,'Grupo',1,0,'C',1);
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
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(185,5,'Observaciones al Docente',1,1,'C',1);

                foreach($Resultado as $row){
                    
                    if(@mysqli_num_rows($Resultado)>0){
                        if($row["Evaluacion"]!=""){
                          $this->SetFillColor(255,0,0);
                          $this->SetTextColor(0);
                          $this->SetFont('Helvetica','',8);    
                          $this->Cell(185,5,utf8_decode("*    ".$row['Evaluacion']),1,1,'');  
                        }
                        
                    }else{
                        $this->SetFillColor(219,219,219);
                        $this->SetTextColor(0);
                        $this->SetFont('Helvetica','',10);    
                        $this->Cell(185,5,'Sin Observaciones',1,0,'C',1);                        
                        $this->Ln();
                        
                    }                    

                }
        }

        function TablaPromedioGeneral($PromedioGeneral){

            $this->Ln();
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',12);

            $this->Cell(50);
            $this->Cell(93,5,'Calificacion Final',1,1,'C',1);
            
            foreach($PromedioGeneral as $row){    
                $this->Cell(50); 
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8);

                if($row['PromedioGeneral']>=3){                   
                    $this->SetFillColor(169,208,142);
                    $this->Cell(93,5,$row['PromedioGeneral'],1,1,'C',1);
                }   else{                   
                    $this->SetFillColor(255,129,129);
                    $this->Cell(93,5,$row['PromedioGeneral'],1,1,'C',1);
                }       
            }
        }

        function TablaPromedioPorPreguntas($PromedioPorPreguntas){

            $this->Ln();
            $this->Ln();
            $this->SetFillColor(31,78,120);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,128,128);
            $this->SetLineWidth(.3);
            $this->SetFont('Helvetica','B',11);

            $this->Cell(50);
            $this->Cell(46.5,5,utf8_decode('Número de Pregunta'),1,0,'C',1);
            $this->Cell(0.2);
            $this->Cell(46.5,5,'Promedio por Pregunta',1,1,'C',1);

            
            foreach($PromedioPorPreguntas as $row){
                $this->Cell(50);
                
                $this->SetTextColor(0);
                $this->SetFont('Helvetica','',8);
                $this->SetFillColor(255,255,255);
                $this->Cell(46.5,5,$row['IdPregunta'],1,0,'C',1);                
                $this->Cell(0.2);
                $this->Cell(46.5,5,$row['PromedioGeneralPregunta'],1,1,'C',1); 
            }
        }            
    }

    if($ValidaExisteEncuestas){
        $pdf=new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetY(30);
        $pdf->TablaDatosDocente($DatosDocente);
        $pdf->TablaPromedioPorCurso($PromedioPorGrupo,$Resultado,$PromedioGeneral);
        $pdf->TablaObservacionesDocente($Resultado);
        $pdf->TablaPromedioPorPreguntas($PromedioPorPreguntas);
        $pdf->TablaPromedioGeneral($PromedioGeneral);  
        $pdf->Output();
    }else{
        header('location: ..\Presentacion\FrmErrorConsultarDatosEncuestaDocente.php');
    }
?>