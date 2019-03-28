<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use View;
use App\Paciente,App\Persona,App\Cliente,App\Examen,App\Comprobante,App\ReniecTipoDocumentos;
use App\Departamento,App\Distrito,App\Provincia,App\PlanAtencion,App\TipoExamen,App\CentroConvenio;
use ZipArchive;
use Session;
use Hashids;
use PDO;

class ConsultaController extends Controller
{


	public function actionListarConsulta($idopcion)
	{

		/******************* validar url **********************/
		$validarurl = $this->funciones->getUrl($idopcion,'Ver');
	    if($validarurl <> 'true'){return $validarurl;}
	    /******************************************************/ 

		$listaconsulta = DB::table('Consulta')
		->join('Persona', 'Persona.cod_Persona', '=', 'Consulta.cod_Paciente')
		->select('Persona.dni','Persona.apPaterno','Persona.apMaterno','Persona.nombre','Consulta.*')
		->take(100)
		->orderBy('Consulta.fecha_Examen', 'desc')
		->orderBy('Consulta.hora_Examen', 'desc')
	    ->get();


		return View::make('consulta/listaconsulta',
						 [
							 'listaconsulta' => $listaconsulta,
							 'idopcion' => $idopcion
						 ]);

	}	


	public function actionAgregarConsulta($idopcion,Request $request)
	{


		if($_POST)
		{

			DB::beginTransaction();

			try
			{



				$fechaexamen 		= Input::get('fechaexamen');
				$fechainforme 		= Input::get('fechainforme');
				$horaexamen 		= Input::get('horaexamen');
				$tipopago  			= Input::get('tipopago');

				$acuenta 			= Input::get('acuenta');
				$saldo 				= Input::get('saldo');
				$total 				= Input::get('montototal');
				$edad 				= Input::get('edad');

				$medicoorden		= Input::get('medicoorden');
				$tratante			= Input::get('tratante');
				$codPaciente		= Input::get('codPaciente');
				$codMedico			= Input::get('codMedico');

				$tipodocumento		= Input::get('tipodocumento');
				$numerodocumento	= Input::get('numerodocumento');
				$razonsocial		= Input::get('razonsocial');
				$subtotal			= Input::get('subtotal');	
				$igv				= Input::get('igv');		
				$email				= Input::get('email');	

				$codLocal			= Session::get('listalocal')->codLocal;

				$xml  	 			= Input::get('xml');



				$idcreate = new GeneralClass();
				$idconsulta = $idcreate->getCreateId('Consulta','codConsulta');

				$tconsulta            			=  new Consulta;

				$tconsulta->codConsulta 		=  $idconsulta;
				$tconsulta->fechaexamen 		=  $fechaexamen;
				$tconsulta->fechainforme 		=  $fechainforme;
				$tconsulta->horaexamen 			=  $horaexamen;
				$tconsulta->tipopago			=  $tipopago;
				$tconsulta->acuenta				=  $total;
				$tconsulta->saldo				=  0;
				$tconsulta->total				=  $total;
				$tconsulta->medicoorden			=  $medicoorden;
				$tconsulta->tratante			=  $tratante;
				$tconsulta->codPaciente			=  $codPaciente;
				$tconsulta->codMedico			=  $codMedico;
				$tconsulta->codLocal			=  $codLocal;
				$tconsulta->edad			=  $edad;

				$tconsulta->tipodocfe			=  $tipodocumento;
				$tconsulta->nrodocfe			=  $numerodocumento;
				$tconsulta->razonsocialfe		=  $razonsocial;
				$tconsulta->subtotal			=  $subtotal;
				$tconsulta->igv					=  $igv;
				$tconsulta->correofe		    =  $email;
				$tconsulta->estadofe		    =  '';
				$tconsulta->estado				=  'P';
				$tconsulta->save();




				$listadetalle 	= explode('&&&', $xml);

				for ($i = 0; $i < count($listadetalle)-1; $i++) {

					$detalle 			= explode('***', $listadetalle[$i]);

					$xprecio 			= $detalle[0];
					$xplanatencion 		= $detalle[1];
					$xcentroconvenio 	= $detalle[2];
					$xexamen 			= $detalle[3];
					$xsubtotal 			= $detalle[0];


					$iddetalle = $idcreate->getCreateId('DetalleConsulta','codDetalleConsulta');

					$tdetalle            	 		=	new DetalleConsulta;
					$tdetalle->codDetalleConsulta 	=  $iddetalle;
					$tdetalle->cantidad 	     	=  1;
					$tdetalle->subtotal 	 		=  $xsubtotal;
					$tdetalle->informe 	 			=  '';
					$tdetalle->estado 	 			=  'P';
					$tdetalle->codConsulta 	 		=  $idconsulta;
					$tdetalle->codExamen 	 		=  $xexamen;			
					$tdetalle->codPlanAtencion 	 	=  $xplanatencion;
					$tdetalle->codCentroConvenio	=  $xcentroconvenio;	
					$tdetalle->save();




				}	

				//DB::commit();
				return Redirect::to('/gestion-consultas/'.$idOpcion)->with('alertaMensajeGlobal', 'Consulta  Registrado con Exito');	
				
			}
			catch(Exception $ex)
			{
				DB::rollback();
				return Redirect::to('/gestion-consultas/'.$idOpcion)->with('alertaMensajeGlobalE', 'Error inesperado. Por favor contacte con el administrador del sistema');	
				
			}

		}else{


			/******************* validar url **********************/
			$validarurl = $this->funciones->getUrl($idopcion,'Anadir');
		    if($validarurl <> 'true'){return $validarurl;}
		    /******************************************************/

			$listaplanatencion 		= PlanAtencion::get();
			$PlanAtencion 			= PlanAtencion::pluck('descripcion','cod_PlanAtencion')->toArray();
			$comboplanatencion  	= array(0 => "Seleccione Plan") + $PlanAtencion;

			$TipoExamen 			= TipoExamen::pluck('nombre','cod_TipoExamen')->toArray();
			$combotipoexamen  		= array(0 => "Seleccione Grupo") + $TipoExamen;

			$CentroConvenio 		= CentroConvenio::wherein('tipo',array('L', 'C'))->pluck('razonSocial','cod_CentroConvenio')->toArray();
			$combocentroconvenio 	= array(0 => "Seleccione Centro") + $CentroConvenio;

			$Examen 				= Examen::pluck('nombre','cod_Examen')->toArray();
			$comboexamen  			= array(0 => "Seleccione Examen") + $Examen;

			$Comprobante			= Comprobante::pluck('nombre','cod_Comprobante')->toArray();
			$combocomprobante  		= array(0 => "Seleccione Comprobante") + $Comprobante;

			$TipoDocumento 			= ReniecTipoDocumentos::pluck('nombre','id')->toArray();
			$combotipodocumento  	= array(0 => "Seleccione Tipo Documento") + $TipoDocumento;

			$informado 				= Persona::join('Medico', 'Persona.Cod_Persona', '=', 'Medico.Cod_Medico')
			->where('Medico.trabajacerin','=','1')
			->select(DB::raw("nombre+' '+apPaterno +' '+apMaterno as nombres, cod_Persona"))
		    ->pluck('nombres','cod_Persona')->toArray();

			$comboinformado  		= array(0 => "Seleccione Informado") + $informado;


			$hoy	= date('d-m-Y');

			return View::make('consulta/agregarconsulta',
						[
						'comboplanatencion' 	=> $comboplanatencion,
						'combotipoexamen' 		=> $combotipoexamen,
						'combocentroconvenio' 	=> $combocentroconvenio,
						'comboexamen' 			=> $comboexamen,
						'combocomprobante'		=> $combocomprobante,
						'combotipodocumento'	=> $combotipodocumento,
						'comboinformado'		=> $comboinformado,	
						'listaplanatencion' 	=> $listaplanatencion,											
						'idopcion' 				=> $idopcion,
						'hoy' 					=> $hoy,
						]);



		}
	}



}
