<?php

namespace App\Http\Livewire\erp\Venta;

use Livewire\Component;

class AfipComponent extends Component {

    public $PtoVta, $req;

// public function FECAEARegInformativo() { return $this->LlamarMetodo('FECAEARegInformativo')->ResultGet->CbteTipo; }  // Ver si es necesario
// public function FECAEASinMovimientoConsultar() { return $this->LlamarMetodo('FECAEASinMovimientoConsultar')->ResultGet->CbteTipo; } // Ver si es necesario
// public function FECAEASinMovimientoInformar() { return $this->LlamarMetodo('FECAEASinMovimientoInformar')->ResultGet->CbteTipo; } // Ver si es necesario

public function FECAESolicitar() { 
    $this->req = array(
        'FeCAEReq' => [
            'FeCabReq' => [
                'CantReg' => 1,
                'PtoVta' => 1,
                'CbteTipo' => 6,
            ],
            'FeDetReq' => [
                'FECAEDetRequest' => [
                    [
                    'CantReg' 	=> 1,  // Cantidad de comprobantes a registrar
                        'PtoVta' 	=> 1,  // Punto de venta
                        'CbteTipo' 	=> 5,  // Tipo de comprobante (ver tipos disponibles) 
                        'Concepto' 	=> 1,  // Concepto del Comprobante=> (1)Productos, (2)Servicios, (3)Productos y Servicios
                        'DocTipo' 	=> 1, // Tipo de documento del comprador (99 consumidor final, ver tipos disponibles)
                        'DocNro' 	=> 20111111112,  // Número de documento del comprador (0 consumidor final)
                        'CbteDesde' 	=> 2,  // Número de comprobante o numero del primer comprobante en caso de ser mas de uno
                        'CbteHasta' 	=> 2,  // Número de comprobante o numero del último comprobante en caso de ser mas de uno
                        'CbteFch' 	=> 20250717, //,parseInt(date.replace(/-/g, '')), // (Opcional) Fecha del comprobante (yyyymmdd) o fecha actual si es nulo
                        'ImpTotal' 	=> 121, // Importe total del comprobante
                        'ImpTotConc' 	=> 0,   // Importe neto no gravado
                        'ImpNeto' 	=> 100, // Importe neto gravado
                        'ImpOpEx' 	=> 0,   // Importe exento de IVA
                        'ImpIVA' 	=> 21,  //Importe total de IVA
                        'ImpTrib' 	=> 0,   //Importe total de tributos
                        'MonId' 	=> 'PES', //Tipo de moneda usada en el comprobante (ver tipos disponibles)('PES' para pesos argentinos)
                        'CondicionIVAReceptorId' => 5, // Condición frente al IVA del receptor  
                        'MonCotiz' 	=> 1,     // Cotización de la moneda usada (1 para pesos argentinos)  
                        'Iva' 		=> [ // (Opcional) Alícuotas asociadas al comprobante
                        [
                            'Id' 		=> 5, // Id del tipo de IVA (5 para 21%)(ver tipos disponibles) 
                            'BaseImp' 	=> 100, // Base imponible
                            'Importe' 	=> 21 // Importe 
                        ],
                        ],
                    ]
                ]
            ]
        ]
    );

    return $this->LlamarMetodo('FECAESolicitar')->ResultGet->CbteTipo; 
    // "FECAESolicitarResult": {
    //     "FeCabResp": {
    //         "Cuit": 20255083571,
    //         "PtoVta": 1,
    //         "CbteTipo": 6,
    //         "FchProceso": "20250718105911",
    //         "CantReg": 1,
    //         "Resultado": "R",
    //         "Reproceso": "N"
    //     },
    //     "FeDetResp": {
    //         "FECAEDetResponse": {
    //             "Concepto": 1,
    //             "DocTipo": 1,
    //             "DocNro": 20111111112,
    //             "CbteDesde": 2,
    //             "CbteHasta": 2,
    //             "CbteFch": "20250717",
    //             "Resultado": "R",
    //             "CAE": "",
    //             "CAEFchVto": ""
    //         }
    //     },
}

//Revisados
//=========

/**
 * Solicita el Código de Autorización Electrónico Anticipado (CAEA) para un período y orden determinados.
 *
 * @param string $Periodo Período en formato 'YYYYMM'. Ej: '202507' para julio de 2025.
 * @param int    $Orden   Orden del mes: 1 = primera quincena, 2 = segunda quincena.
 *
 * @return object Devuelve un objeto con los siguientes atributos (según documentación de AFIP):
 *                - CAEA (string): Código CAEA otorgado.
 *                - Periodo (int): Año y mes solicitados.
 *                - Orden (int): Quincena solicitada.
 *                - FchVigDesde (string): Fecha de inicio de vigencia.
 *                - FchVigHasta (string): Fecha de fin de vigencia.
 *                - FchTopeInf (string): Fecha tope para informar comprobantes.
 *                - FchProceso (string): Fecha de procesamiento.
 *                - Observaciones (array|null): Lista de observaciones, si las hubiera.
 */

// Ejemplo de respuesta esperada:
/*
<CAEA>string</CAEA>
<Periodo>int</Periodo>
<Orden>short</Orden>
<FchVigDesde>string</FchVigDesde>
<FchVigHasta>string</FchVigHasta>
<FchTopeInf>string</FchTopeInf>
<FchProceso>string</FchProceso>
<Observaciones>
  <Obs xsi:nil="true" />
  <Obs xsi:nil="true" />
</Observaciones>
*/
public function FECAEASolicitar(string $Periodo, int $Orden) { 
    $this->req = array(
        'Periodo' 	=> $Periodo,
        'Orden' 	=> $Orden,
    );
    return $this->LlamarMetodo('FECAEASolicitar')->ResultGet;     
}

public function FECAEAConsultar($Periodo, $Orden) { 
    $this->req = array(
        'Periodo' 	=> $Periodo,
        'Orden' 	=> $Orden,
    );
    return $this->LlamarMetodo('FECAEARegInformativo')->ResultGet; 
    // <CAEA>string</CAEA>
    //       <Periodo>int</Periodo>
    //       <Orden>short</Orden>
    //       <FchVigDesde>string</FchVigDesde>
    //       <FchVigHasta>string</FchVigHasta>
    //       <FchTopeInf>string</FchTopeInf>
    //       <FchProceso>string</FchProceso>
    //       <Observaciones>
    //         <Obs xsi:nil="true" />
    //         <Obs xsi:nil="true" />
    //       </Observaciones>
}

public function FEParamGetCotizacion($MonId, $FchCotiz) { 
    $this->req = array(
        'MonId' 	=> $MonId,
        'FchCotiz' 	=> $FchCotiz,
    );
    return $this->LlamarMetodo('FEParamGetCotizacion')->ResultGet; 
    // <MonId>string</MonId>
    //       <MonCotiz>double</MonCotiz>
    //       <FchCotiz>string</FchCotiz>
}

public function FECompConsultar($CbteNro,$CbteTipo) { 
    $this->req = array(
        'FeCompConsReq' => array(
            'CbteNro' 	=> $CbteNro,
            'PtoVta' 	=> $this->PtoVta,
            'CbteTipo' 	=> $CbteTipo
        )
    );
    return $this->LlamarMetodo('FECompConsultar')->ResultGet; 
     
        // <Resultado>string</Resultado>
        //   <CodAutorizacion>string</CodAutorizacion>
        //   <EmisionTipo>string</EmisionTipo>
        //   <FchVto>string</FchVto>
        //   <FchProceso>string</FchProceso>
        //   <Observaciones>
        //     <Obs xsi:nil="true" />
        //     <Obs xsi:nil="true" />
        //   </Observaciones>
        //   <PtoVta>int</PtoVta>
        //   <CbteTipo>int</CbteTipo>
}

public function FECompUltimoAutorizado($CbteTipo) { 
    $this->req = array(
        'PtoVta' 	=> $this->PtoVta,
        'CbteTipo' 	=> $CbteTipo,
    );
    return $this->LlamarMetodo('FECompUltimoAutorizado')->FECompUltimoAutorizadoResult; 
    // <PtoVta>int</PtoVta>
    //     <CbteTipo>int</CbteTipo>
    //     <CbteNro>int</CbteNro>
}

public function FEParamGetCondicionIvaReceptor() { 
    $this->req = array(
        'ClaseCmp' => null,
    );
    return $this->LlamarMetodo('FEParamGetCondicionIvaReceptor')->ResultGet; 
    // <CondicionIvaReceptor>
    //         <Id>int</Id>
    //         <Desc>string</Desc>
    //         <Cmp_Clase>string</Cmp_Clase>
    //       </CondicionIvaReceptor>
}








// SIN PARÁMETROS
// ==============

public function FEDummy() { return $this->LlamarMetodo('FEDummy')->ResultGet; }

public function FECompTotXRequest() { return $this->LlamarMetodo('FECompTotXRequest')->FECompTotXRequestResult->RegXReq; }

public function FEParamGetActividades() { 
    return $this->LlamarMetodo('FEParamGetActividades')->ResultGet; 
    // <ActividadesTipo>
    //         <Id>long</Id>
    //         <Orden>short</Orden>
    //         <Desc>string</Desc>
    //       </ActividadesTipo>
}

public function FEParamGetPtosVenta() { 
    return $this->LlamarMetodo('FEParamGetPtosVenta')->ResultGet; 
    // <PtoVenta>
    //         <Nro>int</Nro>
    //         <EmisionTipo>string</EmisionTipo>
    //         <Bloqueado>string</Bloqueado>
    //         <FchBaja>string</FchBaja>
    //       </PtoVenta>
}

public function FEParamGetTiposCbte() { 
    return $this->LlamarMetodo('FEParamGetTiposCbte')->ResultGet->CbteTipo; 
    // <CbteTipo>
    //         <Id>int</Id>
    //         <Desc>string</Desc>
    //         <FchDesde>string</FchDesde>
    //         <FchHasta>string</FchHasta>
    //       </CbteTipo>
}

public function FEParamGetTiposConcepto() { 
    return $this->LlamarMetodo('FEParamGetTiposConcepto')->ResultGet; 
    // <ConceptoTipo>
    //         <Id>int</Id>
    //         <Desc>string</Desc>
    //         <FchDesde>string</FchDesde>
    //         <FchHasta>string</FchHasta>
    //       </ConceptoTipo>
}

public function FEParamGetTiposDoc() { 
    return $this->LlamarMetodo('FEParamGetTiposDoc')->ResultGet;
    // <DocTipo>
    //             <Id>int</Id>
    //             <Desc>string</Desc>
    //             <FchDesde>string</FchDesde>
    //             <FchHasta>string</FchHasta>
    //           </DocTipo>
}

public function FEParamGetTiposIva() { 
    return $this->LlamarMetodo('FEParamGetTiposIva')->ResultGet; 
    // <IvaTipo>
    //         <Id>string</Id>
    //         <Desc>string</Desc>
    //         <FchDesde>string</FchDesde>
    //         <FchHasta>string</FchHasta>
    //       </IvaTipo>
}

public function FEParamGetTiposMonedas() { 
    return $this->LlamarMetodo('FEParamGetTiposMonedas')->ResultGet; 
    // <Moneda>
    //         <Id>string</Id>
    //         <Desc>string</Desc>
    //         <FchDesde>string</FchDesde>
    //         <FchHasta>string</FchHasta>
    //       </Moneda>
}

public function FEParamGetTiposOpcional() { 
    return $this->LlamarMetodo('FEParamGetTiposOpcional')->ResultGet; 
    // <OpcionalTipo>
    //         <Id>string</Id>
    //         <Desc>string</Desc>
    //         <FchDesde>string</FchDesde>
    //         <FchHasta>string</FchHasta>
    //       </OpcionalTipo>
}

public function FEParamGetTiposPaises() { 
    return $this->LlamarMetodo('FEParamGetTiposPaises')->ResultGet; 
    // <PaisTipo>
    //         <Id>short</Id>
    //         <Desc>string</Desc>
    //       </PaisTipo>
}

public function FEParamGetTiposTributos() { 
    return $this->LlamarMetodo('FEParamGetTiposTributos')->ResultGet->CbteTipo; 
    // <TributoTipo>
    //         <Id>short</Id>
    //         <Desc>string</Desc>
    //         <FchDesde>string</FchDesde>
    //         <FchHasta>string</FchHasta>
    //       </TributoTipo>
}

}