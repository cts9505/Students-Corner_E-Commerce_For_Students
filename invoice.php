<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include_once('tcpdf/tcpdf.php');

$id=$_GET['id'];

$inv_mst_query = "SELECT * FROM orders WHERE id=$id";             
$inv_mst_results = mysqli_query($connn,$inv_mst_query);   
$count = mysqli_num_rows($inv_mst_results);  
if($count>0) 
{
	$inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	<style type="text/css">
	body{
	font-size:12px;
	line-height:24px;
	font-family: "Josefin Sans", sans-serif;
	 text-transform: capitalize;
	color:#000;
	}
	</style>    
	<table cellpadding="0" cellspacing="0" style="border:1px solid #ddc;width:100%;">
	<table style="width:100%;" style="margin-top:20%" >
	<tr><td colspan="2" align="center"><img src="./images/banner.jpeg" style="align:center;width:1800%;"><hr></td></tr>
	<tr><td colspan="2" align="center"><b style="font-size:larger"><large>INVOICE</large></b></td></tr>
	<tr><td colspan="2" align="center"><b></td></tr>
	<tr><td colspan="2" align="center"></td></tr>
	<tr><td colspan="2"><b>Billed  To :<br>&nbsp;</b>
      ' .$inv_mst_data_row['name'].' '.$inv_mst_data_row['sname'].' </td>&nbsp;</tr>
	<tr><td>&nbsp;&nbsp;' .$inv_mst_data_row['email'].' <br>&nbsp;&nbsp;'.$inv_mst_data_row['number'].'<br>
    '.$inv_mst_data_row['address'].'</td><td align="right"><b>Invoice No : '.$inv_mst_data_row['id']+1000 .'</b><br> '.$inv_mst_data_row['placed_on'].'</td></tr>
	<tr><td>&nbsp;</td><td align="right"><b></b></td></tr>
	<tr><td colspan="2" align="center"></td></tr></table>
    <table width="100%">
	<tr class="heading" >
		<td align="center">
			<p2 ><b style="background:#eee;border-bottom:1px solid #ddd;font-weight:bolder;font-size:larger" >ITEM </b></p2><br><p1 style="font-weight:lighter;font-size 40%;">(Prices are Including GST/Taxes)</p1>
		</td>
	</tr>';
       
		$total=0;
		$inv_det_query = "SELECT total_products,total_price FROM orders WHERE id=$id ";
		$inv_det_results = mysqli_query($connn,$inv_det_query);    
		while($inv_det_data_row = mysqli_fetch_array($inv_det_results, MYSQLI_ASSOC))
		{	
            $name=explode(" - ",$inv_det_data_row['total_products']);
            foreach($name as $d){
		$content .= '
		  <tr class="itemrows" style="width:100%;height:max-content;">
			  <td>
				  <p style="font-size:large;font-family: "Josefin Sans", sans-serif;
				  text-transform: capitalize;">'.$d.'</p>
			  </td>
			  
		  </tr>';
		$total=$inv_det_data_row['total_price'];
        $gst=$total*0.05;
        $tax=$total*0.025;
		}}
		$content .= '<tr class="total"><td colspan="2" align="right"><hr></td></tr>
		<tr><td colspan="2" align="right">
        <b><br>SGST 2.5% :</b>'.$tax.'
        <b><br>CGST 2.5% :</b>'.$tax.'
        <b><br>TOTAL TAX : </b>'.$gst.'</td></tr>
		<tr><td colspan="2" align="right"><b style="font-size:120%">GRAND&nbsp;TOTAL:&nbsp;'.$total.'/-</b></td></tr>
	<tr><td colspan="2" align="right"><b></b></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="1" align="left"><b>Thank You !<br></b></td></tr>
	<tr><td colspan="2"><b>Payment Method</b> <br>&nbsp;Bank : Student Corner <BR> PICT, Pune - 43. <br> Payment ID : '.$inv_mst_data_row['payment_id'].'</td></tr>
	</table>
    
</table>'; 

$pdf->writeHTML($content);

 $file_location = "/xampp/htdocs/studentcorner/invoices/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INVOICE_".$id+1000 .".pdf";
$p=$pdf->Output($file_location.$file_name, 'S');

ob_end_clean();

if($_GET['ACTION']=='VIEW') 
{
	$pdf->Output($file_name, 'I'); // I means Inline view
} 
else if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_name, 'D'); // D means download
}

 // F means upload PDF file on some folder
if($_GET['ACTION']=='EMAIL'){  
    include('smtp/PHPMailerAutoload.php');
    require './vendor/autoload.php';
    $inv_mst_query = "SELECT * FROM orders WHERE id=$id";             
    $inv_mst_results = mysqli_query($connn,$inv_mst_query);   
    $count = mysqli_num_rows($inv_mst_results);  
    if($count>0) 
    {
      
        $inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);
        
    // $email=$inv_mst_data_row['email'];
    // $subject="Invoice";
    // $body="Find Attchements";
    }   
     echo smtp_mailer($p);
    function smtp_mailer($p){ echo "<script> alert('Email sent successfully.');</script>";
        $mail = new PHPMailer(true); 
        $mail->IsSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 25; 
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = 2; 
        $mail->FromName = "Students Corner";
        $mail->Username = "studentscornerpict@gmail.com";
        $mail->Password = "hjzdolwmvvthgdbr";
        $mail->SetFrom("studentscornerpict@gmail.com");
        $mail->Subject = 'INVOICE';
        $mail->Body ='INVOICE';
        $mail->AddAddress('9chaitanyashinde@gmail.com');
        $mail->addStringAttachment($p,'INVOICE_1057.pdf');
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if(!$mail->Send()){
            echo $mail->ErrorInfo; echo "<script> alert('Email sent successfully.');</script>";
        }else{
            $msg='Sent email ';
            echo "<script> alert('Email sent successfully.');</script>";
            echo $msg;
            return $msg;
        }
    }}
}

//----- End Code for generate pdf
	

else
{
	echo 'Record not found for PDF.';
}

?>