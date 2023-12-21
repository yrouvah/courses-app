<script >
import AppLayout from '@/Layouts/AppLayout.vue';
export default{
    components:{
        AppLayout
    },

    data(){
        return{
            form:{
                title:null,
                description:null,
                episodes: [
                    {title: null, description: null, video_url:null}
                ]

            }
        }
    },
    methods: {
        submit(){
            this.$inertia.post('/courses', this.form )
        },
        add(){
            this.form.episodes.push({title: null, description: null, video_url:null});
        },
        remove(){
            this.form.episodes.pop();
        }

    },
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

               <!-- Flash message
                <div class="bg-green-200 text-green-500 p-3" v-if="$page.flash.success">
                        {{ $page.flash.success }}
                </div>
                -->

                <div class="w-full ">
                    <form  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent='submit'>
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                                Titre de la formation
                            </label>
                            <input type="text" class="shadow appearence-none border rounded w-full py-2 px-3
                             text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titre"
                              v-model="form.title" >

                              <!-- <div class="bg-red-200 text-red-800 py-4" v-if="$page.errors.title">
                                        {{ $page.errors.title[0] }}
                                 </div> -->
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                                Description de la formation
                            </label>
                            <textarea type="text" class="shadow appearence-none border rounded w-full py-2 px-3
                             text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description"
                             v-model="form.description"></textarea>

                             <!-- <div class="bg-red-200 text-red-800 py-4" v-if="$page.errors.description">
                                        {{ $page.errors.description[0] }}
                                 </div> -->
                        </div>

                        <div class="mb-4">
                            <h2 class="text-2xl">Episodes de la formation</h2>
                            <div v-for="(episode, index) in form.episodes" v-bind:key='index'>

                                <label  class="block text-gray-700 text-sm font-bold mb-2" :for="'title-' +index">
                                    Titre de l'episode num {{index+1}}
                                </label>
                                <input type="text" class="shadow appearence-none border rounded w-full py-2 px-3
                                text-gray-700 leading-tight focus:outline-none focus:shadow-outline" :id="'title-'+index"
                                 v-model="form.episodes[index].title" >
                                   <!-- <div class="bg-red-200 text-red-800 py-4 my-2"
                                   v-if="$page.errors['episodes'+index+'.title']">
                                        {{ $page.errors['episodes.'+index+'.title'][0] }}
                                   </div> -->

                                <label  class="block text-gray-700 text-sm font-bold mb-2" :for="'description-' +index">
                                    Description de l'episode num {{index+1}}
                                </label>
                                <input type="text" class="shadow appearence-none border rounded w-full py-2 px-3
                                text-gray-700 leading-tight focus:outline-none focus:shadow-outline" :id="'description-'+index"
                                 v-model="form.episodes[index].description" >
                                   <!-- <div class="bg-red-200 text-red-800 py-4 my-2"
                                      v-if="$page.errors['episodes'+index+'.description']">
                                        {{ $page.errors['episodes.'+index+'.description'][0] }}
                                   </div> -->

                                <label  class="block text-gray-700 text-sm font-bold mb-2" :for="'video_url-' +index">
                                    URL de la video de l'episode num {{index+1}}
                                </label>
                                <input type="text" class="shadow appearence-none border rounded w-full py-2 px-3 mb-5
                                text-gray-700 leading-tight focus:outline-none focus:shadow-outline" :id="'video_url-'+index"
                                 v-model="form.episodes[index].video_url" >
                                    <!-- <div class="bg-red-200 text-red-800 py-4 my-2"
                                    v-if="$page.errors['episodes'+index+'.video_url']">
                                        {{ $page.errors['episodes.'+index+'.video_url'][0] }}
                                   </div> -->

                            </div>
                        </div>
                        <button class="bg-green-600 rounded py-2 px-4 my-2 text-white block" v-if="form.episodes.length<15" @click.prevent="add">+</button>
                        <button class="bg-red-600 rounded py-2 px-4 my-2 text-white block" v-if="form.episodes.length>1" @click.prevent="remove">🗑️</button>

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4
                        rounded focus:outline-none focus:shadow-outline" type="submit">
                            Créer ma formation
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
