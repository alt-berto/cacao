<template>
<div class="card">
    <div class="card-body">
        <div class="">            
            
            <div class="form-group">
                <label class="text-uppercase" for="consecutive" >Consecutivo: </label>
                <input class="form-control" v-model="consecutive" value="" type="number" name="consecutive" id="consecutive" required autocomplete="consecutive" autofocus>                                    
                <p class="text-danger mt-2" v-if="consecutive_error"><small>*Escriba un consecutivo, el siguiente consecutivo es: {{ next_consecutive }}.</small></p>
            </div>
            <div class="form-group">
                <label class="text-uppercase" for="name" >Nombre: </label>
                <input class="form-control" v-model="name" value="" type="text" name="name" id="name" autocomplete="name" autofocus>
                
            </div>
            <div class="form-group">
                <label class="text-uppercase" for="date" >Fecha: </label>
                <input class="form-control" v-model="date" type="date" name="date" id="date" required autocomplete="date" autofocus>                    
                <p class="text-danger mt-2" v-if="date_error"><small>*Asigne una fecha com formato correcto ex: dd/mm/aaaa!.</small></p>
            </div>
            <div class="form-group">
                <label class="text-uppercase" for="note" >Observaciones: </label>
                <input class="form-control" v-model="note" value="" type="text" name="note" id="note" autocomplete="note" autofocus>
            </div>
            <div class="form-group">
                <label class="text-uppercase" for="status" >Estado: </label>
                <select name="status" v-model="status" id="status" class="form-control">
                    <option value="process" selected> En proceso </option>
                    <option value="finished"> Procesado </option>
                    <option value="defective"> Defectuoso </option>                                          
                </select>                
            </div>
            <br>
            <h1> Origen </h1>
            <hr>
            <div v-for="( input, index ) in lote_unidad_productiva" :key="index">
                <div class="form-group">
                    <label class="text-uppercase" for="unidad_productiva" >Unidad Productiva #{{ index + 1 }}: </label>
                    <select name="unidad_productiva" @change="onChange( $event, index )" id="unidad_productiva" class="form-control" required autofocus>
                        <option v-for="( unidad, index ) in input.unidad_productiva" :key="index" :value="unidad.id"> {{ unidad.name }} </option>                    
                        <option value="" selected> Seleccione una unidad productiva</option>
                    </select>                    
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="sector_id" >Sector #{{ index + 1 }}: </label>
                    <select name="sector_id" v-model="input.sector_id" id="sector_id" class="form-control" required autofocus>
                        
                        <option v-for="( sector, index ) in input.sectores" :key="index" :value="sector.id"> {{ sector.name }} </option>
                        <option value="" selected> Seleccione un sector</option>
                                            
                    </select>
                    <p class="text-danger mt-2" v-if="input.sector_error"><small>*Seleccione un sector!, Si no le aparecen sectores abajo esta el boton para ir al formulario para crear sector, agrege los sectores a la unidad productiva.</small></p>
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="measure" >Unidad de Medida #{{ index + 1 }}: </label>
                    <select name="measure" v-model="input.measure" id="measure" class="form-control">
                            <option :value="input.measure" selected> {{ input.measure }} </option>                                                             
                    </select>                
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="amount" >Cantidad (Peso) #{{ index + 1 }}: </label>
                    <input class="form-control" v-model="input.amount" value="" type="number" name="amount" id="amount" required autocomplete="amount" autofocus>                                    
                    <p class="text-danger mt-2" v-if="input.amount_error"><small>*La cantidad tiene que ser mayor a 0.</small></p>
                </div>

                <div class="form-group">
                    <label class="text-uppercase" for="input_note" >Observaciones #{{ index + 1 }}: </label>
                    <input class="form-control" v-model="input.note" value="" type="text" name="input_note" id="input_note" autocomplete="input_note" autofocus>
                </div>

                <template v-if="input.sectores.length == 0">
                    <br>
                    <a :href="base_url + 'sector/create'" class="btn btn-info">Crear Sectores</a>
                </template>
                <button @click="remove( index )" v-show="index || ( !index && lote_unidad_productiva.length > 1 )" class="btn btn-danger"> Remover Sector </button>
                <button v-if="input.sector_id != '0' && input.amount > 0" @click="add( index )" v-show="index == lote_unidad_productiva.length-1" class="btn btn-warning"> Agregar sector </button>                   
                
                <hr>
            </div>        
            <p class="text-danger mt-2" v-if="sector_error"><small>*Revise la informacion de los origenes.</small></p>

            <template v-if="success == 'done'">
                <br/>
                <div class="alert alert-success alert-block" style="margin-left: 25%; margin-right: 25%;">
                    <button type="button" class="close" data-dismiss="alert">×</button>  
                    <strong> Se ha creado el lote!. </strong>
                </div>
                <br/>
                </template>
                <template v-else-if="success == 'error'">
                <br/>
                <div class="alert alert-danger alert-block" style="margin-left: 25%; margin-right: 25%;">
                    <button type="button" class="close" data-dismiss="alert">×</button>  
                    <strong> Ha ocurrido un error, favor intente luego!.</strong>
                </div>
                <br/>
            </template>
            <br><br>    
            <button @click="create" class="btn btn-primary" type="submit">Crear Lote</button>
            <a class="btn btn-dark" :href="base_url+ '/lotes'">Volver</a>
            </div>
        </div>        
    </div>    
</div>
</template>
<script>
export default {
    data(  ) {
        return {
            base_url: window.location.protocol + "//" + window.location.host + "/",
            lote_unidad_productiva: [
                {
                    unidad_productiva: [],
                    sectores: [],
                    sector_error: false,
                    sector_id: '',
                    measure: 'Kg',
                    amount: 0,
                    amount_error: false,
                    note: '',
                    isactive: true,
                }
            ],
            sector_error: false,
            next_consecutive: 0,
            unidad_productiva: [], 
            consecutive_error: false,
            consecutive: 0,
            name: '',
            date: new Date(  ).toISOString(  ).slice( 0,10 ),
            date_error: false,
            note: '',
            status: '',

            success: '',

            endpoint: '/lotes',
            endpoint_sector: '/lotes/unidad_productiva',
            endpoint_unidad: '/unidad/productiva/active',
            
        }
    },
    created(  ) {
        this.fetchUnidadProductiva(  );
    },
    methods: {
        create(  ) {
            let self = this;

            self.sector_error = false;
            self.consecutive_error = false;
            self.date_error = false;

            Object.keys( self.lote_unidad_productiva ).forEach( function( key ) {
                if ( self.lote_unidad_productiva[ key ].sector_id == '0' || self.lote_unidad_productiva[ key ].sector_id == '' ) {
                    self.lote_unidad_productiva[ key ].sector_error = true;
                    self.sector_error = true;
                }
                if ( self.lote_unidad_productiva[ key ].amount == 0 ) {
                    self.lote_unidad_productiva[ key ].amount_error = true;
                    self.sector_error = true;
                }
            } );

            if ( self.consecutive <= 0 ) {
                self.consecutive_error = true;
            }
            if ( self.date == '' ) {
                self.date_error = true;
            }

            if ( self.sector_error == false && self.consecutive_error == false && self.date_error == false ) {
                //
                axios( {
                    method: 'POST',
                    url: self.endpoint,
                    data: {
                        unidades_productivas: self.lote_unidad_productiva,
                        consecutive: self.consecutive,
                        name: self.name,
                        date: self.date,
                        note: self.note,
                        status: self.status,
                    },
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    } ).then( response => {
                        //
                        self.success = 'done';
                        self.lote_unidad_productiva = [
                            {
                                unidad_productiva: self.unidad_productiva,
                                sectores: [],
                                sector_error: false,
                                sector_id: '',
                                measure: 'Kg',
                                amount: 0,
                                amount_error: false,
                                note: '',
                                isactive: true,
                            }
                        ];
                        self.sector_error = false;
                        self.next_consecutive += 1;                        
                        self.consecutive_error = false;
                        self.consecutive += 1;
                        self.name = '';
                        self.date = new Date(  ).toISOString(  ).slice( 0,10 );
                        self.date_error = false;
                        self.note = '';
                        self.status = '';
                        //
                } ).catch( error => {
                    self.success = 'error';
                    console.log( error );
                } );
            }


        },
        onChange( event, index ) {
            let self = this;
            self.lote_unidad_productiva[ index ].sectores = [];
            self.lote_unidad_productiva[ index ].sector_selected = '';
            //
            Object.keys( self.unidad_productiva ).forEach( function( key ) {
                if ( event.target.value == self.unidad_productiva[ key ].id ) {
                    Object.keys( self.unidad_productiva[ key ].sectores ).forEach( function( key_2 ) {
                        self.lote_unidad_productiva[ index ].sectores.push( { id: self.unidad_productiva[ key ].sectores[ key_2 ].id, name: self.unidad_productiva[ key ].sectores[ key_2 ].name } );
                    } );                    
                }
            } );            
        },
        fetchUnidadProductiva(  ) {
            //
            axios.get( this.endpoint_unidad ).then( ( response ) => {
                this.unidad_productiva = response.data;
                this.lote_unidad_productiva[ 0 ].unidad_productiva = this.unidad_productiva;
                console.log( this.lote_unidad_productiva[ 0 ].unidad_productiva );
            } );
            
        },
        add( index ) {
            let self = this;      
            let size = Object.keys( self.unidad_productiva ).length - 1;
            
            if ( size > index ) {
                this.lote_unidad_productiva.push( { 
                    unidad_productiva: self.unidad_productiva, 
                    sectores: [], 
                    sector_error: false,
                    sector_id: '', 
                    measure: 'Kg', 
                    amount: 0,
                    amount_error: false,
                    note: '', 
                    isactive: true
                } );                
            }      
        },
        remove( index ) {
            this.lote_unidad_productiva.splice( index, 1 );
        },
    }
}
</script>