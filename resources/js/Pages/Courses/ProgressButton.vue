<template>
    <div>
        <button class="bg-green-500 px-2 py-2 text-white rounded" @click="toggleProgress()">Termined ?</button>
    </div>
</template>

<script>


export default {
    props:['episodeId'],

    methods:{
        toggleProgress(){
            axios.post('/toggleProgress',{
                episodeId: this.episodeId,
            })
            .then(response=>console.log(response))
            .catch(error=>console.log(error));
        }
    }

}
</script>

