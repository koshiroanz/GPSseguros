<?PHP

class Siniestro{
	
	private $numPoliza;
	private $apellido;
    private $nombre;
	private $dominio;
	private $conductor;
	private $terceroUno;
	private $dominioUno;
	private $conductorUno;
	private $terceroDos;
	private $dominioDos;
	private $conductorDos;
	private $fechaSiniestro;
	private $fechaDenunciaInterna;
	private $exposicionPolicial;
	private $fotocopiaDni;
	private $fotocopiaCV;
	private $fotocopiaCC;
	private $fotocopiaVTV;
	private $fotosAsegurado;
	private $otros;
	private $fechaReclamoTercero;
	private $exposicionPolicialTercero;
	private $fotocopiaCVTercero;
	private $boletoCompra;
	private $fotocopiaCCTercero;
	private $certificadoCobertura;
	private $denunciaAdministrativa;
	private $fotoCantTercero;
	private $presupuesto;
	private $presupuestoDos;
	private $totalPresupuesto;
	private $gastosMedicos;
	private $informeMedico;
	private $fechaEnvioDI;
	private $fechaEnvioRT;
	private $fechaDictamen;
	private $dictamen;
	private $ofrecimiento;
	private $vencimientoReclamo;

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	CONSTRUCT
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function __construct($numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotoCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $vencimientoReclamo){
        $this->numPoliza = $numPoliza;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->dominio = $dominio;
        $this->conductor = $conductor;
        $this->terceroUno = $terceroUno;
        $this->dominioUno = $dominioUno;
        $this->conductorUno = $conductorUno;
        $this->terceroDos = $terceroDos;
        $this->dominioDos = $dominioDos;
        $this->conductorDos = $conductorDos;
        $this->fechaSiniestro = $fechaSiniestro;
        $this->fechaDenunciaInterna = $fechaDenunciaInterna;
        $this->exposicionPolicial = $exposicionPolicial;
        $this->fotocopiaDni = $fotocopiaDni;
        $this->fotocopiaCV = $fotocopiaCV;
        $this->fotocopiaCC = $fotocopiaCC;
        $this->fotocopiaVTV = $fotocopiaVTV;
        $this->fotosAsegurado = $fotosAsegurado;
        $this->otros = $otros;
        $this->fechaReclamoTercero = $fechaReclamoTercero;
        $this->exposicionPolicialTercero = $exposicionPolicialTercero;
        $this->fotocopiaCVTercero = $fotocopiaCVTercero;
        $this->boletoCompra = $boletoCompra;
        $this->fotocopiaCCTercero = $fotocopiaCCTercero;
        $this->certificadoCobertura = $certificadoCobertura;
        $this->denunciaAdministrativa = $denunciaAdministrativa;
        $this->fotoCantTercero = $fotoCantTercero;
        $this->presupuesto = $presupuesto;
        $this->presupuestoDos = $presupuestoDos;
        $this->totalPresupuesto = $totalPresupuesto;
        $this->gastosMedicos = $gastosMedicos;
        $this->informeMedico = $informeMedico;
        $this->fechaEnvioDI = $fechaEnvioDI;
        $this->fechaEnvioRT = $fechaEnvioRT;
        $this->fechaDictamen = $fechaDictamen;
        $this->dictamen = $dictamen;
        $this->ofrecimiento = $ofrecimiento;
        $this->vencimientoReclamo = $vencimientoReclamo;
    }
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	GETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function getNumPoliza() {
        return $this->numPoliza;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDominio() {
        return $this->dominio;
    }

    public function getConductor() {
        return $this->conductor;
    }

    public function getTerceroUno() {
        return $this->terceroUno;
    }

    public function getDominioUno() {
        return $this->dominioUno;
    }

    public function getConductorUno() {
        return $this->conductorUno;
    }

    public function getTerceroDos() {
        return $this->terceroDos;
    }

    public function getDominioDos() {
        return $this->dominioDos;
    }

    public function getConductorDos() {
        return $this->conductorDos;
    }

    public function getFechaSiniestro() {
        return $this->fechaSiniestro;
    }

    public function getFechaDenunciaInterna() {
        return $this->fechaDenunciaInterna;
    }

    public function getExposicionPolicial() {
        return $this->exposicionPolicial;
    }

    public function getFotocopiaDni() {
        return $this->fotocopiaDni;
    }

    public function getFotocopiaCV() {
        return $this->fotocopiaCV;
    }

    public function getFotocopiaCC() {
        return $this->fotocopiaCC;
    }

    public function getFotocopiaVTV() {
        return $this->fotocopiaVTV;
    }

    public function getFotosAsegurado() {
        return $this->fotosAsegurado;
    }

    public function getOtros() {
        return $this->otros;
    }

    public function getFechaReclamoTercero() {
        return $this->fechaReclamoTercero;
    }

    public function getExposicionPolicialTercero() {
        return $this->exposicionPolicialTercero;
    }

    public function getFotocopiaCVTercero() {
        return $this->fotocopiaCVTercero;
    }

    public function getBoletoCompra() {
        return $this->boletoCompra;
    }

    public function getFotocopiaCCTercero() {
        return $this->fotocopiaCCTercero;
    }

    public function getCertificadoCobertura() {
        return $this->certificadoCobertura;
    }

    public function getDenunciaAdministrativa() {
        return $this->denunciaAdministrativa;
    }

    public function getFotoCantTercero() {
        return $this->fotoCantTercero;
    }

    public function getPresupuesto() {
        return $this->presupuesto;
    }

    public function getPresupuestoDos() {
        return $this->presupuestoDos;
    }

    public function getTotalPresupuesto() {
        return $this->totalPresupuesto;
    }

    public function getGastosMedicos() {
        return $this->gastosMedicos;
    }

    public function getInformeMedico() {
        return $this->informeMedico;
    }

    public function getFechaEnvioDI() {
        return $this->fechaEnvioDI;
    }

    public function getFechaEnvioRT() {
        return $this->fechaEnvioRT;
    }

    public function getFechaDictamen() {
        return $this->fechaDictamen;
    }

    public function getDictamen() {
        return $this->dictamen;
    }

    public function getOfrecimiento() {
        return $this->ofrecimiento;
    }

    public function getVencimientoReclamo() {
        return $this->vencimientoReclamo;
    }

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	SETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function setNumPoliza($numPoliza) {
        $this->numPoliza = $numPoliza;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDominio($dominio) {
        $this->dominio = $dominio;
    }

    public function setConductor($conductor) {
        $this->conductor = $conductor;
    }

    public function setTerceroUno($terceroUno) {
        $this->terceroUno = $terceroUno;
    }

    public function setDominioUno($dominioUno) {
        $this->dominioUno = $dominioUno;
    }

    public function setConductorUno($conductorUno) {
        $this->conductorUno = $conductorUno;
    }

    public function setTerceroDos($terceroDos) {
        $this->terceroDos = $terceroDos;
    }

    public function setDominioDos($dominioDos) {
        $this->dominioDos = $dominioDos;
    }

    public function setConductorDos($conductorDos) {
        $this->conductorDos = $conductorDos;
    }

    public function setFechaSiniestro($fechaSiniestro) {
        $this->fechaSiniestro = $fechaSiniestro;
    }

    public function setFechaDenunciaInterna($fechaDenunciaInterna) {
        $this->fechaDenunciaInterna = $fechaDenunciaInterna;
    }

    public function setExposicionPolicial($exposicionPolicial) {
        $this->exposicionPolicial = $exposicionPolicial;
    }

    public function setFotocopiaDni($fotocopiaDni) {
        $this->fotocopiaDni = $fotocopiaDni;
    }

    public function setFotocopiaCV($fotocopiaCV) {
        $this->fotocopiaCV = $fotocopiaCV;
    }

    public function setFotocopiaCC($fotocopiaCC) {
        $this->fotocopiaCC = $fotocopiaCC;
    }

    public function setFotocopiaVTV($fotocopiaVTV) {
        $this->fotocopiaVTV = $fotocopiaVTV;
    }

    public function setFotosAsegurado($fotosAsegurado) {
        $this->fotosAsegurado = $fotosAsegurado;
    }

    public function setOtros($otros) {
        $this->otros = $otros;
    }

    public function setFechaReclamoTercero($fechaReclamoTercero) {
        $this->fechaReclamoTercero = $fechaReclamoTercero;
    }

    public function setExposicionPolicialTercero($exposicionPolicialTercero) {
        $this->exposicionPolicialTercero = $exposicionPolicialTercero;
    }

    public function setFotocopiaCVTercero($fotocopiaCVTercero) {
        $this->fotocopiaCVTercero = $fotocopiaCVTercero;
    }

    public function setBoletoCompra($boletoCompra) {
        $this->boletoCompra = $boletoCompra;
    }

    public function setFotocopiaCCTercero($fotocopiaCCTercero) {
        $this->fotocopiaCCTercero = $fotocopiaCCTercero;
    }

    public function setCertificadoCobertura($certificadoCobertura) {
        $this->certificadoCobertura = $certificadoCobertura;
    }

    public function setDenunciaAdministrativa($denunciaAdministrativa) {
        $this->denunciaAdministrativa = $denunciaAdministrativa;
    }

    public function setFotoCantTercero($fotoCantTercero) {
        $this->fotoCantTercero = $fotoCantTercero;
    }

    public function setPresupuesto($presupuesto) {
        $this->presupuesto = $presupuesto;
    }

    public function setPresupuestoDos($presupuestoDos) {
        $this->presupuestoDos = $presupuestoDos;
    }

    public function setTotalPresupuesto($totalPresupuesto) {
        $this->totalPresupuesto = $totalPresupuesto;
    }

    public function setGastosMedicos($gastosMedicos) {
        $this->gastosMedicos = $gastosMedicos;
    }

    public function setInformeMedico($informeMedico) {
        $this->informeMedico = $informeMedico;
    }

    public function setFechaEnvioDI($fechaEnvioDI) {
        $this->fechaEnvioDI = $fechaEnvioDI;
    }

    public function setFechaEnvioRT($fechaEnvioRT) {
        $this->fechaEnvioRT = $fechaEnvioRT;
    }

    public function setFechaDictamen($fechaDictamen) {
        $this->fechaDictamen = $fechaDictamen;
    }

    public function setDictamen($dictamen) {
        $this->dictamen = $dictamen;
    }

    public function setOfrecimiento($ofrecimiento) {
        $this->ofrecimiento = $ofrecimiento;
    }

    public function setVencimientoReclamo($vencimientoReclamo) {
        $this->vencimientoReclamo = $vencimientoReclamo;
    }

}

?>