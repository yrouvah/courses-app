<template>
    <app-layout>
        <template #header>
            {{ course.title }}
        </template>

        <div class="py-4 mx-8">
            <div class="text-2xl">{{ this.courseShow.episodes[this.currentKey].title }}</div>
            <iframe class="w-full h-screen" :src="this.courseShow.episodes[0].video_url"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <div class="text-sm text-gray-500">{{ this.courseShow.episodes[this.currentKey].description }}</div>

            <div class="mt-6">
                <ul v-for="(episode, index) in this.courseShow.episodes" v-bind:key="episode.id">
                    <li class="mt-3 flex justify-between items-center">
                        <div>
                            Episode numero {{ index + 1 }} - {{ episode.title }}
                            <button class="text-gray-500 focus:text-indigo-500" @click="switchEpisode(index)">
                                Voir l'épisode
                            </button>
                        </div>
                        <progress-button  :episodeId="episode.id" :watched-episodes="watched"/>
                    </li>
                </ul>

            </div>
        </div>

    </app-layout>
</template>

<script>

import AppLayout from './../../Layouts/AppLayout.vue'
import ProgressButton from './ProgressButton.vue'

export default {
    components: {
        AppLayout,
        ProgressButton
    },
    props: ['course', 'watched'],

    data() {
        return {
            courseShow: this.course,
            currentKey: 0
        }
    },

    methods: {
        switchEpisode(index) {
            this.currentKey = index;

            windows.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            }
            )

        }
    },

    mounted() {
        // console.log(this.courseList);
    }


}
</script>

