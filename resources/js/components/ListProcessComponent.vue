<template>
    <div class="card">
    <div class="card-body">
        <div v-for="( etapa, index ) in etapas" :key="index">
            <h4> {{ etapa.name }}</h4>
            <div class="table-responsive"><table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Lote</th>
                    <th scope="col">F. Entrada</th>
                    <th scope="col">F. Salida</th>
                    <th scope="col">Peso Entrada</th>
                    <th scope="col">Peso Salida</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table></div><br><br>
        </div>
    </div>    
</div>
</template>
<script>
export default {
    data(  ) {
        return {
            base_url: window.location.protocol + "//" + window.location.host + "/",
            etapas: [], 
            endpoint: '/etapa/active',
            
        }
    },
    created(  ) {
        this.fetchEtapas(  );
    },
    methods: {
        fetchEtapas(  ) {
            //
            axios.get( this.endpoint ).then( ( response ) => {
                this.etapas = response.data;               
                console.log( this.etapas);
            } );
            
        },
        
        
    }
}
</script>