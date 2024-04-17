<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\GeneraOrdenes;
use Auth;
use App\Exports\OrdenesExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $ordenes=DB::select("SELECT o.especial,o.fecha,j.jor_descripcion,o.mes,a.anl_descripcion
                             FROM ordenes_generadas o
                             JOIN matriculas m ON m.id=o.mat_id 
                             JOIN jornadas j ON j.id=m.jor_id
                             JOIN aniolectivo a ON a.id=m.anl_id
                             GROUP BY o.especial,o.fecha,j.jor_descripcion,o.mes,a.anl_descripcion
                             ORDER BY o.especial
                             ");
        return view('generarOrdenes.index')
        -> with ('periodos',$periodos)
        -> with('meses',$meses)
        -> with('jornadas',$jornadas)
        -> with('ordenes',$ordenes);
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
        $nmes=$this->mesesLetras($mes); //LETRA DEL MES
        $campus="G";
        $validar=DB::select("SELECT * FROM ordenes_generadas o
                             JOIN matriculas m ON m.id=o.mat_id
                             WHERE m.anl_id=$anl_id
                             AND m.jor_id=$jor_id
                             AND o.mes=$mes
                           ");
        
        if (empty($validar)){
        $secuenciales=DB::selectone("SELECT max(especial) AS secuencial FROM ordenes_generadas");
        $sec=$secuenciales->secuencial+1;
        
        $estudiantes=DB::select("SELECT *, m.id AS mat_id FROM matriculas m 
                                 JOIN estudiantes e ON m.est_id=e.id
                                 JOIN jornadas j ON m.jor_id=j.id
                                 JOIN cursos c ON  m.cur_id=c.id
                                 JOIN especialidades esp ON m.esp_id=esp.id
                                 WHERE m.anl_id=$anl_id 
                                 AND m.jor_id=$jor_id
                                 AND m.mat_estado=1"
                               );

        $valor_pagar=75;
        foreach ($estudiantes as $e)
        {
        $inpu['mat_id']=$e->mat_id;  //ID DE LA MATRICULA 
        $inpu['fecha']=date('Y-m-d'); //CUANDO SE GENERA LA ORDEN
        $inpu['mes']=$mes;
        $inpu['codigo']=$nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs."-".$e->mat_id; //
        $inpu['valor']=$valor_pagar;// VALOR A PAGAR
        $inpu['fecha_pago']=NULL;// EL BANCO DA LA FECHA DEL PAGO
        $inpu['estado']=0; // PENDIENTE = 0 / PAGADO = 1
        $inpu['responsable']=Auth::user()->usu_nombres; // USUARIO QUE REALIZA LA ORDEN 
        $inpu['motivo']=NULL;
        $inpu['vpagado']=0;// EL BANCO DA EL VALOR PAGADO 
        $inpu['especial']=$sec;
        $inpu['numero_documento']=NULL; // NUMERO DEL DOCUMENTO QUE PAGO EL USUARIO (CUANDO YA PAGUE)
        GeneraOrdenes::create($inpu);
        }
            session()->flash('success', 'ORDEN GENERADA EXISTOSAMENTE');
            return Redirect(route('genera_ordenes.index'));
        }else{
            session()->flash('error', 'YA EXISTE UNA ORDEN GENERADA CON ESTOS DATOS');
            return redirect()->route('genera_ordenes.index');
        }

        
    }

    public function matricula(){
        return $this->belongsTo(Matricula::class, "mat_id", "id");
    }

    public function verOrdenes($especial)
    {
        $ordenes = DB::select("SELECT o.*, m.*, e.est_cedula, e.est_apellidos, e.est_nombres, j.jor_descripcion
                               FROM ordenes_generadas o
                               JOIN matriculas m ON m.id = o.mat_id
                               JOIN estudiantes e ON e.id = m.est_id
                               JOIN jornadas j ON j.id = m.jor_id
                               WHERE o.especial = :especial
                               ORDER BY e.est_apellidos", ['especial' => $especial]);
        $meses = $this->meses(); // Obtener los meses
        return view('generarOrdenes.ordenes', compact('ordenes', 'meses')); // Pasar $meses a la vista
    }    
   

    public function eliminarOrden(Request $rq){
        $dt=$rq->all();
        $secuencial=$dt['secuencial'];
        $ordenes=GeneraOrdenes::where('especial',$secuencial)->delete();
        session()->flash('success', 'Orden eliminada exitosamente');
        return Redirect(route('genera_ordenes.index'));
    }

    // public function buscar(Request $rq) {
        
    //     // Realiza la consulta utilizando el valor de $dato
    //     $dato=($rq->buscar);
    //     $estudiantes = DB::select("SELECT * 
    //                             FROM ordenes_generadas o
    //                             JOIN matriculas m ON m.id = o.mat_id
    //                             JOIN estudiantes e ON e.id = m.est_id
    //                             JOIN especialidades esp ON esp.id = m.esp_id
    //                             JOIN cursos cur ON cur.id = m.cur_id
    //                             WHERE UPPER(e.est_nombres) LIKE UPPER('%$dato%') OR UPPER(e.est_apellidos) LIKE UPPER('%$dato%') AND secuencial=secuencial;
    //     ;
    //     ");
    
    //     // Pasa los resultados de la consulta y $dato a la vista
    //     return view('ordenes.buscar')
    //         ->with('estudiantes', $estudiantes);
    // }

    public function exportarExcel()
    {
    return Excel::download(new OrdenesExport, 'ordenes.xlsx');
    }
}
