<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>

        <section class="py-6">

            <div class="py-3" v-for="course in courses.data" v-bind:key="course.id">
                <div class="bg-white rounded shadow p-4">
                    <div class="text-sm text-gray-500 flex justify-between items-center">
                        <div>
                            Mise en ligne par <strong>{{ course.user.name }}</strong>(<span class="text-gray-500 text-sm">{{
                                course.participants }} participant <span v-if="parseInt(course.participants) > 1">s</span>
                            </span>)
                        </div>
                        <span class="block text-sm text-gray-400">{{ course.episodes_count }}épisodes
                            <span v-if="course.episodes_count >1">s</span></span>
                    </div>
                    <h1 class="text-3xl">{{ course.title }}</h1>
                    <div class="text-sm text-gray-500 mt-2">{{ course.description }}</div>

                    <div class="flex items-center justify-between">
                        <a :href="'courses/' + course.id" class="bg-indigo-700 text-white px-2 py-1 text-sm mt-3
                    rounded hover:bg-indigo-500 inline-block">Voir la formation</a>
                        <a :href="'courses/edit/' + course.id" v-if="course.update" class="bg-gray-700 text-white px-2 py-1 text-sm mt-3
                    rounded hover:bg-gray-500 inline-block">Modifier</a>
                    </div>
                </div>
            </div>

            <inertia-link :href="link.url" class="text-indigo-500 border-gray-500 p-5"
             v-for="link in courses.links"  v-bind:key="link.label">
                <span v-bind:class="{ 'text-red-700': link.active }">
                    {{ link.label }}
                </span>
            </inertia-link>

        </section>
    </app-layout>
</template>

<script>

import AppLayout from './../../Layouts/AppLayout.vue'

export default {
    components: {
        AppLayout
    },

    props: ['courses'],

    data() {
        return {
            courseList: this.courses
        }
    },


    mounted() {
        console.log(this.courseList);
    }


}
</script>

