<?php 
session_start();
require_once 'Drive.php';

$drive= new Drive();
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $drive->client()->setAccessToken($_SESSION['access_token']);
  $drive->create_google_service_api();
  $drive->create_doc($_GET['nombre']);
  

}
else {

$drive->set_redirect('subir_archivo.php');

if (! isset($_GET['code'])) {
	$_SESSION['file_name']=$_GET['nombre'];
	$drive->get_credentials($_GET['code']);
		
}
 else {
 	
 	$drive->auth($_GET['code']); 
	$drive->create_google_service_api();	
	$drive->create_doc($_SESSION['file_name']);
	require_once 'listado.php';
	
}
}















 ?>
