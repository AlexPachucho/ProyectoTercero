<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\GeneraOrdenes;
use Auth;

class GenerarOrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rq)
    {
        //
        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $meses=$this->meses();
        return view('generarOrdenes.index')
        -> with ('periodos',$periodos)
        -> with('meses',$meses)
        -> with('jornadas',$jornadas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function meses(){
        return [1 => 'Enero', 
                2 => 'Febrero', 
                3 => 'Marzo',  
                4 => 'Abril', 
                5 => 'Mayo',  
                6 => 'Junio', 
                7 => 'Julio',  
                8 => 'Agosto',  
                9 => 'Septiembre',
                10 => 'Octubre',
                11 => 'Noviembre',  
                12 => 'Diciembre',
               ];
    }

    public function mesesLetras($nmes){
        $resultado="";
        $nmes==1?$resultado="E":"";
        $nmes==2?$resultado="F":"";
        $nmes==3?$resultado="M":"";
        $nmes==4?$resultado="A":"";
        $nmes==5?$resultado="MY":"";
        $nmes==6?$resultado="J":"";
        $nmes==7?$resultado="JL":"";
        $nmes==8?$resultado="AG":"";
        $nmes==9?$resultado="S":"";
        $nmes==10?$resultado="O":"";
        $nmes==11?$resultado="N":"";
        $nmes==12?$resultado="D":"";

        // switch ($nmes) {
        //     case 1:
        //         $resultado = "de Ene."; break;
        //     case 2:
        //         $resultado = "de Febr."; break;
                     
        // $nmes==1?$resultado="E":"";

        // if  ($nmes ==1){
        //     $resultado = "E";
        // }

        return $resultado;
    }

    public function generarOrdenes(Request $rq){
        $datos=$rq->all();
        $anl_id=$datos["anl_id"]; //AÑO
        $jor_id=$datos["jor_id"]; //JORNADA
        $mes=$datos["mes"]; //MES A GENERAR ORDEN
        $estudiantes=DB::select("SELECT *, m.id AS mat_id FROM matriculas m 
                                 JOIN estudiantes e ON m.est_id=e.id
                                 WHERE m.anl_id=$anl_id 
                                 AND m.jor_id=$jor_id
                                 AND m.mat_estado=1"
                               );

        $valor_pagar=75;
        foreach ($estudiantes as $e)
        {
            dd($mes);
        $inpu['mat_id']=$e->mat_id;  //ID DE LA MATRICULA
        $inpu['fecha']=date('Y-m-d'); //CUANDO SE GENERA LA ORDEN
        $inpu['mes']=$mes;
        $inpu['codigo']; //
        $inpu['valor']=$valor_pagar;// VALOR A PAGAR
        $inpu['fecha_pago']=NULL;// EL BANCO DA LA FECHA DEL PAGO
        $inpu['tipo']; 
        $inpu['estado']=0; // PENDIENTE = 0 / PAGADO = 1
        $inpu['responsable']=Auth::user()->usu_nombres; // USUARIO QUE REALIZA LA ORDEN
        $inpu['obs']; 
        $inpu['identificador'];
        $inpu['motivo'];
        $inpu['vpagado']=0;// EL BANCO DA EL VALOR PAGADO 
        $inpu['f_acuerdo'];
        $inpu['ac_no'];
        $inpu['especial_code']; 
        $inpu['especial'];
        $inpu['numero_documento']=NULL; // NUMERO DEL DOCUMENTO QUE PAGO EL USUARIO (CUANDO YA PAGUE)
        }

    }

    public function matricula(){
        return $this->belongsTo(Matricula::class, "mat_id", "id");
    }

}
