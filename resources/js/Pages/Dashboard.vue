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
                description:null

            }
        }
    },
    methods: {
        submit(){
            this.$inertia.post('/courses', this.form )
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
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                                Description de la formation
                            </label>
                            <textarea type="text" class="shadow appearence-none border rounded w-full py-2 px-3
                             text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description"
                             v-model="form.description"></textarea>
                        </div>

                        <div class="flex iems-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4
                            rounded focus:outline-none focus:shadow-outline" type="submit">
                                Créer ma formation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
