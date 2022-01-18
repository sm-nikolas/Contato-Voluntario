<?php
require('../fpdf/fpdf.php');

//Conecta no banco
include("conexao.php");

//Faz o select desejado
$result=mysqli_query($conexao,"SELECT id_usuario,tipo_usuario,nome_usuario,email,cpf FROM usuario ORDER BY id_usuario");
$number_of_products = mysqli_num_rows($result);

//Inicializa 3 colunas e o total    
$column_id_usuario   = "";
$column_tipo_usuario = "";
$column_nome_usuario = "";
$column_email        = "";
$column_cpf          = "";
$column_cep          = "";

//Percorre os dados encontrados e transforma em array
while($row = mysqli_fetch_array($result))
{
	$id_usuario   = $row["id_usuario"];
	$tipo_usuario = substr($row["tipo_usuario"],0,100);
    $nome_usuario = $row["nome_usuario"];
    $email        = $row["email"];
    $cpf          = $row["cpf"];

	$column_id_usuario      = $column_id_usuario.$id_usuario."\n";
	$column_tipo_usuario    = $column_tipo_usuario.$tipo_usuario."\n";
    $column_nome_usuario    = $column_nome_usuario.$nome_usuario."\n";
    $column_email  	        = $column_email.$email."\n";
    $column_cpf         	= $column_cpf.$cpf."\n";



	//Soma as preços (TOTAL)

}
mysqli_close($conexao);

//Converte com milhar (.) e decimal (,).


//Cria o PDF
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image('../img/logo.png',75,20,55);

//Posição do Nome dos campos
$Y_Fields_Name_position = 50;
//Posição dos campos
$Y_Table_Position = 56;

//Criando o cabeçalho dos campos preenchendo de cinza
$pdf->SetFillColor(200, 162, 200,     200, 162, 200,    200, 162, 200);
//Nome em negrito
$pdf->SetFont('Arial','B',12);
$pdf->SetDrawColor(200, 162, 200);
$pdf->SetTextColor(0,0,0);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(20);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(11,6,'TIPO',1,0,'C',1);
$pdf->SetX(41);
$pdf->Cell(70,6,'NOME',1,0,'C',1);
$pdf->SetX(111);
$pdf->Cell(55,6,'E-MAIL',1,0,'C',1);
$pdf->SetX(166);
$pdf->Cell(33,6,'CPF',1,0,'C',1);
$pdf->Ln();

//Agora mostra as 3 colunas
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(10,6,$column_id_usuario,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(11,6,$column_tipo_usuario,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(41);
$pdf->MultiCell(70,6,$column_nome_usuario,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(111);
$pdf->MultiCell(55,6,$column_email,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(166);
$pdf->MultiCell(33,6,$column_cpf,1,'C');

//Crie linhas (caixas) para cada Produto)
//Se você não usar o código a seguir, não criará as linhas que separam cada linha
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(20);
	$pdf->MultiCell(179,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>