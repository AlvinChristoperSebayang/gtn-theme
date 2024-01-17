<template>
    <div class="latest-posts container pt-10 pb-20 lg:pt-[100px] lg:pb-[126px]">
        <h3 class="font-default font-semibold text-black text-center text-[28px] leading-[36.4px] mb-[28px]
    lg:text-[40px] lg:leading-[56px] lg:mb-10">Read through our design stories</h3>

        <ul class="list-none flex justify-center gap-2 latest-posts-menu mb-10">
            <li class="posts-menu-item">
                <button class="btn btn__tertiary font-default font-medium text-center text-black flex justify-center items-center
                    transition-all duration-300
                    h-[44px] w-[121px] text-[14px] leading-[19.6px] tracking-[0.28px]
                    lg:h-[48px] lg:w-[120px] lg:text-[16px] lg:leading-[22.4px] lg:tracking-[0.32px]"
                    :class="selectedPosts === 'article' ? 'active' : '' " @click="selectedPosts = 'article'">
                    Blog
                </button>
            </li>
            <li class="posts-menu-item">
                <button class="btn btn__tertiary font-default font-medium text-center text-black flex justify-center items-center
                    transition-all duration-300
                    h-[44px] w-[121px] text-[14px] leading-[19.6px] tracking-[0.28px]
                    lg:h-[48px] lg:w-[120px] lg:text-[16px] lg:leading-[22.4px] lg:tracking-[0.32px]"
                    :class="selectedPosts === 'freebies' ? 'active' : '' " @click="selectedPosts = 'freebies'">
                    Freebies
                </button>
            </li>
        </ul>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-6 gap-y-6 lg:gap-y-[60px] posts-grid" v-if="posts_data">
            <template v-for="post in posts_data" :key="post.id">
                <template v-if="post.meta_field.orely_post_is_coming_soon ">
                    <article class="flex flex-col resource-blog items-center group" style="opacity: 0;">
                        <figure class="grayscale w-full h-[214px] rounded-2xl lg:rounded-3xl overflow-hidden">
                            <img loading="lazy"
                                class="object-cover rounded-2xl lg:rounded-3xl w-full h-[214px] duration-500 "
                                :src="post.card_basic.basic_card_image" :alt="post.title" :title="post.title" width="344px"
                                height="214px">
                        </figure>
                        <div class="flex flex-col w-full gap-4 card-meta pt-4">
                            <div class="flex w-full justify-between">
                                <p v-if="post.postTags" class="body-2 text-[#454B57]">{{ post.postTags[0].name }}</p>
                                <p class="body-2 text-[#454B57]">{{ post.date }}</p>
                            </div>
                            <h3 class="heading-4 font-semibold leading-snug">Coming Soon</h3>
                        </div>
                    </article>
                </template>
                <template v-else>
                    <article
                        class="flex flex-col gap-5 resource-blog transition-all duration-500  hover:duration-500 group"
                        style="opacity: 0;">
                        <a :href="post.link" target="_self" :alt="post.title" :title="post.title">
                            <figure class="w-full h-[214px] rounded-2xl lg:rounded-3xl overflow-hidden">
                                <img loading="lazy"
                                    class="object-cover rounded-2xl lg:rounded-3xl w-full h-[214px] duration-500 group-hover:scale-[1.05]"
                                    :src="post.card_basic.basic_card_image" :alt="post.title" :title="post.title" width="344px"
                                    height="214px">
                            </figure>
                            <div class="flex flex-col w-full gap-4 card-meta pt-4">
                                <div class="flex w-full justify-between">
                                    <p v-if="post.postTags" class="font-default text-[14px] leading-[22px] tracking-[0.14px] text-[#454B57]">{{ post.postTags[0].name }}
                                    </p>
                                    <template v-if="selectedPosts === 'article'">
                                        <p class="font-default text-[14px] leading-[22px] tracking-[0.14px] text-[#454B57]">{{ post.date }}</p>
                                    </template>
                                    <template v-else>
                                        <p class="font-default uppercase font-semibold text-[18px] leading-[27px] tracking-[0.14px] text-[#0F39A6]">{{ post.pricingType[0].name }}</p>
                                    </template>
                                    
                                </div>
                                <div class="flex flex-col gap-2 card-title">
                                    <h3 class="font-default font-semibold text-[18px] leading-[27px]">{{ post.card_basic.basic_card_title }}</h3>
                                <p class="font-helvetica text-[14px] leading-normal tracking-[0.28px] text-black" v-if="selectedPosts === 'freebies'" v-html="post.card_basic.basic_card_excerpt"></p>
                                </div>
                            </div>
                        </a>
                    </article>
                </template>
            </template>
        </div>
        <div class="flex justify-center pt-[40px]">
            <a :href="$settings.site.url + '/resources'"
                class="btn btn__tertiary h-[48px] py-0 px-6 lg:text-[16px] flex items-center justify-center font-medium lg:leading-[24px]">View
                more</a>
        </div>
    </div>
</template>
<script>
    import {
        isProxy,
        toRaw
    } from 'vue';
    import {
        gsap
    } from 'gsap';
    import {
        ScrollTrigger
    } from 'gsap/ScrollTrigger';

    gsap.registerPlugin(ScrollTrigger);
    export default {
        props: {
            posts_lists: {
                type: Object,
                default: {}
            },
            freebies_lists: {
                type: Object,
                default: {}
            }
        },
        data() {
            return {
                selectedPosts: 'article',
                posts_data: [],
                articles: [],
                freebies: [],
            }
        },
        mounted() {
            if (this.posts_lists !== null) {
                this.articles = this.posts_lists;
            }

            if (this.freebies_lists !== null) {
                this.freebies = this.freebies_lists;
            }

            this.posts_data = this.articles;

            var tileAnimeted = gsap.timeline({
                paused: false,
                scrollTrigger: {
                    trigger: '.latest-posts',
                    start: 'top 60%'
                },
                smoothChildTiming: true
            })
            tileAnimeted.fromTo('.latest-posts h3', {
                scale: 1.2,
                opacity: 0
            }, {
                opacity: 1,
                scale: 1,
                duration: 1
            })

            var timelineDesignStoriesLoad = gsap.timeline({
                    paused: false,
                    scrollTrigger: {
                        trigger: '.posts-grid',
                        start: 'top 60%'
                    },
                    smoothChildTiming: true
                })
            setTimeout(() => {
                timelineDesignStoriesLoad
                    .fromTo('.posts-grid .resource-blog', {
                        opacity: 0,
                        scale: 1.1
                    }, {
                        opacity: 1,
                        scale: 1,
                        stagger: .2
                    })
            }, 80);

        },
        watch: {
            selectedPosts: {
                handler(post_type) {
                    this.changeShowPosts(post_type);
                }
            }
        },
        methods: {
            changeShowPosts(post_type) {
                if (post_type === 'article') {
                    this.posts_data = [];
                    this.posts_data = this.articles;
                } else if (post_type === 'freebies') {
                    this.posts_data = [];
                    this.posts_data = this.freebies;
                }
                var timelineDesignStories = gsap.timeline({
                    paused: true,
                })
                setTimeout(() => {
                    timelineDesignStories
                        .fromTo('.posts-grid .resource-blog', {
                            opacity: 0,
                            scale: 1.1
                        }, {
                            opacity: 1,
                            scale: 1,
                            stagger: .2
                        })
                    timelineDesignStories.play();
                }, 80);
            }
        },
    }
</script>
<style lang="scss" scoped>
    .latest-posts-menu .posts-menu-item button.active {
        @apply transition-all duration-300 bg-secondary;
    }
</style>