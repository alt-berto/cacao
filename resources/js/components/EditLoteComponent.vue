<template>
    
</template>
<script>
export default {
    data(  ) {
        return {
            base_url: window.location.protocol + "//" + window.location.host + "/",
            lotes: [], 
            endpoint: '/lotes',
            
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
        
    }
}
</script>