<template>
    <div>
            <div v-for="i in [currentIndex]" :key="i">
                <img :src="appUrl + currentImg" />
            </div>
        <a class="prev" @click="prev" href="#">&#10094; Previous</a>
        <a class="next" @click="next" href="#">&#10095; Next</a>
    </div>
</template>

<script>
    export default {
        props: ['images', 'app-url'],
        data() {
            return {
                timer: null,
                currentIndex: 0
            };
        },
        mounted() {
            this.startSlide();
        },
        methods: {
            startSlide() {
                this.timer = setInterval(() => this.currentIndex++, 4000);
            },
            next() {
                clearInterval(this.timer);
                this.resetTimer();
                this.currentIndex++;
            },
            prev() {
                clearInterval(this.timer);
                this.resetTimer();
                this.currentIndex--;
            },
            resetTimer() {
                clearInterval(this.timer);
                this.startSlide();
            }
        },
        computed: {
            currentImg() {
                return this.images[Math.abs(this.currentIndex) % this.images.length];
            }
        }
    };
</script>

<style>
    .fade-enter-active,
    .fade-leave-active {
        transition: all 0.9s ease;
        overflow: hidden;
        visibility: visible;
        position: absolute;
        width:100%;
        opacity: 1;
    }

    .fade-enter,
    .fade-leave-to {
        visibility: hidden;
        width:100%;
        opacity: 0;
    }

    img {
        height:600px;
        width:100%
    }

    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.7s ease;
        border-radius: 0 4px 4px 0;
        text-decoration: none;
        user-select: none;
    }

    .next {
        right: 0;
    }

    .prev {
        left: 0;
    }

    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.9);
    }
</style>
