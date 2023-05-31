<template>
    <div class="container pt-20">
        <h2 class="font-bold heading-2 text-navy pb-8">Discover more topics you care about</h2>
        <ul class="flex gap-3">
            <li class="">
                <button @click="allResources()" id="uncategorized" class="px-6 py-3 font-bold text-base chips text-gray-4"
                :class="selectedCat === 'uncategorized' ? 'chips__active text-primary' : ''">All</button>
            </li>

            <template v-if="categories.length > 1">
                <li v-for="(item, index) in categories" :key="index" class="">
                    <template v-if="item.slug !== 'uncategorized'">
                        <button @click="filterCatetgory(item.slug)" class="px-6 py-3 font-bold text-base chips text-gray-4"
                        :class="selectedCat === item.slug ? 'chips__active text-primary' : ''">{{item.title}}</button>
                    </template>
                </li>
            </template>
        </ul>
    </div>
    <div v-if="resources && resources.data.length > 0" class="container py-10">
        <div class="grid grid-cols-1 gap-7 lg:grid-cols-4 lg:gap-12 list-resources">
            <div v-for="(item, index) in resources.data" :key="index">
            <article class="card card-resource h-full">
                <div class="card-content justify-between flex-grow">
                    <img :src="item.image ?? '/images/not-found-icon.png'" class="w-full object-cover min-h-[260px]" style="background: url('/images/not-found-icon.png'); background-repeat: no-repeat;
                        background-size: contain;">
                    <div class="px-4">
                        <span v-if="item.resourceCategory.id !== 1" class="text-gray-3 paragraph-2">
                            {{ item.resourceCategory.title }}
                        </span>
                        <a :href="'/resources/' + item.slug">
                            <h2 class="paragraph-1 font-bold">{{ item.title }}</h2>
                        </a>
                    </div>
                </div>
                <div class="card-footer card-footer__end px-4 pb-4">
                    <a :href="'/resources/' + item.slug" class="paragraph-2 text-primary font-medium">See Detail</a>
                </div>
            </article>
        </div>
        </div>
    </div>
    <div v-else class="effect-1 looping-notfound w-full lg:min-h-[500px] pt-10">
        <template v-if="emptyResources">
            <div>
                <div class="flex justify-center items-center mb-10" v-if="emptyResources.image">
                    <img :src="'/' + emptyResources.content_metas[0].value" alt="" class="w-[174px] h-auto object-cover" style="background: url('/images/not-found-icon.png'); background-repeat: no-repeat;
                        background-size: contain;">
                </div>

                <div class="">
                    <div class=" flex justify-center mb-6">
                        <h1 class="paragraph-1 uppercase font-bold text-navy">{{ emptyResources.excerpt }}</h1>
                    </div>
                    <div class="flex justify-center text-center">
                        <p class="paragraph-1 text-gray-3 w-[60%]">{{ emptyResources.content }}</p>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <template v-if="resources && resources.to">
        <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between test">
            <div class="container flex justify-evenly pt-6 lg:pt-16">
                <template v-if="!resources.prev_page_url">
                    <span class="relative gap-4 hidden lg:flex items-center">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.7207 2C7.1817 2 2.69143 6.47715 2.69143 12C2.69143 17.5228 7.1817 22 12.7207 22C18.2597 22 22.75 17.5228 22.75 12C22.75 6.47715 18.2597 2 12.7207 2Z"
                                stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.7188 8L8.70704 12L12.7188 16" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16.7305 12L8.70704 12" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="paragraph-2 text-gray-3 font-medium">Previous</span>
                    </span>
                </template>
                <template v-else>
                    <button @click="paginate(resources.prev_page_url)" class="relative gap-4 hidden lg:flex items-center">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.7207 2C7.1817 2 2.69143 6.47715 2.69143 12C2.69143 17.5228 7.1817 22 12.7207 22C18.2597 22 22.75 17.5228 22.75 12C22.75 6.47715 18.2597 2 12.7207 2Z"
                                stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.7188 8L8.70704 12L12.7188 16" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16.7305 12L8.70704 12" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span
                            class="paragraph-2 text-gray-3 font-medium ease-in-out duration-150 hover:bg-primary hover:text-gray-6">Previous</span>
                    </button>
                </template>

                <div class="flex gap-4">
                    <template v-for="(item, index) in resources.links" :key="index">
                        <span aria-current="page" v-if="item.active === true">
                            <span
                                class="relative flex items-center px-3 py-1 paragraph-2 font-medium text-gray-6 bg-primary rounded-full">{{ item.label }}</span>
                        </span>
                        <template v-else>
                            <button @click="paginate(item.url)" v-if="item.url !== null && item.label.includes('Next') === false && item.url !== null && item.label.includes(' Previous') === false"
                                class="relative flex items-center px-3 py-1 paragraph-2 font-medium text-gray-3 bg-white border-2 border-transparent rounded-full hover:text-primary hover:border-primary transition ease-in-out duration-150"
                                aria-label="{{ __('Go to page :page', ['page' => item.label]) }}">
                                {{ item.label }}
                            </button>
                        </template>
                    </template>
                </div>

                <template v-if="resources.next_page_url">
                    <button @click="paginate(resources.next_page_url)" class="relative gap-4 lg:flex items-center hidden">
                        <span class="paragraph-2 text-gray-3 font-medium">Next</span>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.2832 22C17.8222 22 22.3125 17.5228 22.3125 12C22.3125 6.47715 17.8222 2 12.2832 2C6.74417 2 2.25391 6.47715 2.25391 12C2.25391 17.5228 6.74417 22 12.2832 22Z"
                                stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.2852 16L16.2969 12L12.2852 8" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8.27344 12H16.2969" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </template>
                <template v-else>
                    <span class="relative gap-4 lg:flex items-center hidden">
                        <span class="paragraph-2 text-gray-3 font-medium">Next</span>
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.2832 22C17.8222 22 22.3125 17.5228 22.3125 12C22.3125 6.47715 17.8222 2 12.2832 2C6.74417 2 2.25391 6.47715 2.25391 12C2.25391 17.5228 6.74417 22 12.2832 22Z"
                                stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.2852 16L16.2969 12L12.2852 8" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8.27344 12H16.2969" stroke="#828282" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </template>
            </div>
        </nav>
    </template>
    
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            categories: [],
            resources: null,
            emptyResources: null,
            isLoaded: false,
            selectedCat: 'uncategorized'
        }
    },
    methods: {
        onImgLoad() {
            return this.isLoaded = true
        },

        filterCatetgory(slug){
            this.selectedCat = slug
            axios
                .get('/api/resources/category/' + slug)
                .then(response => (this.resources = response.data))
        },
        paginate(url){
            axios
                .get(url)
                .then(response => (this.resources = response.data))

            console.log(this.resources)
        },
        allResources(){
            this.selectedCat ='uncategorized'
            axios
                .get('/api/resources')
                .then(response => (this.resources = response.data))
        }
    },
    mounted() {
    },

    beforeMount() {
        axios
            .get('/api/resources/categories')
            .then(response => (this.categories = response.data))
        
        axios
            .get('/api/resources')
            .then(response => (this.resources = response.data))
        
        axios
            .get('/api/resources/empty')
            .then(response => (this.emptyResources = response.data))

        // console.log(this.emptyResources);
    },
}
</script>
<style lang="scss" scoped>
    
</style>