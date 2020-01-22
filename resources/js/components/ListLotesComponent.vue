<template>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Consecutivo</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Obervaciones</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="( lote, index ) in lotes" :key="index">
                <td>{{ lote.id }}</td>
                <td>{{ lote.consecutive }}</td>
                <td>{{ lote.name }}</td>
                <td> {{ get_total( lote.lote_unidadproductivas ) }} </td>
                <td>{{ lote.date }}</td>
                <td>{{ lote.note }}</td>
                <td>
                    <template v-if="lote.status == 'process'">
                        En Proceso
                    </template>
                    <template v-else-if="lote.status == 'finished'">
                        Procesado
                    </template>
                    <template v-else>
                        Defectuoso
                    </template>
                </td>          
                <td>{{ lote.created_at }}</td>
                <td>{{ lote.updated_at }}</td>
                <td><a href="#" data-toggle="modal" :data-target="'#modal_id_' + lote.id" class="btn btn-info">Ver Detalle</a></td>
                <td><a href="#" class="btn btn-warning">Editar</a></td>
                <td><a @click="destroy( lote.id )" class="btn btn-danger">Eliminar</a></td>
                
                <!-- Modal -->
                <div class="modal fade" :id="'modal_id_' + lote.id" tabindex="-1" role="dialog" :aria-labelledby="'modal_id_' + lote.id + 'Label'" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" :id="'modal_id_' + lote.id + 'Label'">Detalle del Lote: {{ lote.consecutive }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group">
                                    <li class="list-group-item"> <b> Consecutivo: </b> {{ lote.consecutive }} </li>
                                    <li class="list-group-item"> <b> Nombre: </b> {{ lote.name }} </li>
                                    <li class="list-group-item"> <b> Fecha: </b> {{ lote.date }} </li>
                                    <li class="list-group-item"> <b> Cantidad: </b> {{ get_total( lote.lote_unidadproductivas ) }} </li>
                                    <li class="list-group-item"> <b> Obsservaciones: </b> {{ lote.note }} </li>
                                    <li class="list-group-item">
                                        <b> Estado: </b> 
                                        <template v-if="lote.status == 'process'">
                                            En Proceso
                                        </template>
                                        <template v-else-if="lote.status == 'finished'">
                                            Procesado
                                        </template>
                                        <template v-else>
                                            Defectuoso
                                        </template>
                                    </li>
                                    <li class="list-group-item"> <b> Creado: </b> {{ lote.created_at }} </li>
                                    <li class="list-group-item"> <b> Modificado: </b> {{ lote.updated_at }} </li>
                                    <li class="list-group-item">
                                        <b> Unidades Productivas: </b><br><br>
                                        <ul class="list-group">
                                            <li class="list-group-item" v-for="( unidad_productiva, index ) in lote.lote_unidadproductivas" :key="index">
                                                <b> Unidad Productiva: </b> {{ unidad_productiva.sector.unidadproductiva.name }} <br>
                                                <b> Sector: </b> {{ unidad_productiva.sector.name }} <br>
                                                <b> Cantidad: </b> {{ unidad_productiva.amount + ' ' + unidad_productiva.measure }} <br>                                                
                                                <b> Observaciones: </b> {{ unidad_productiva.note }} <br>
                                                <hr>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
              </tr>
            </tbody>
        </table>
        
    </div>    
</div>
</template>
<script>
export default {
    data(  ) {
        return {
            base_url: window.location.protocol + "//" + window.location.host + "/",
            lotes: [], 
            endpoint: '/lote/active',
            
        }
    },
    created(  ) {
        this.fetchLotes(  );
    },
    methods: {
        fetchLotes(  ) {
            //
            axios.get( this.endpoint ).then( ( response ) => {
                this.lotes = response.data;               
                console.log( this.lotes);
            } );
            
        },
        destroy( id ) {
            axios( {
                method: 'DELETE',
                url: '/lotes/' + id,
                data: {
                    id: id,
                },
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            } ).then( response => {
                if ( response.data == 'done' ) {
                    this.fetchLotes(  );
                }          
            } ).catch( error => {
                console.log( error );
            } );
        },
        get_total: function( details ) {
            let self = this;
            let total = 0;
            let measure = "";
            for( let detail of details ) {
                measure = detail.measure;
                total += detail.amount;
            }
            return total + ' ' + measure;
        },
        
    }
}
</script>