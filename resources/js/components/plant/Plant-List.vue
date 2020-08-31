<template>
    <ul class="plant-list">
        <template v-if="plants.length">
            <li v-for="(plant, index) in plants" class="plant">
                <p>
                    {{ plant.name }}
                </p>
                <a v-if="canRemove"
                   @click="$emit('destroy-plant', plant.id, index)"
                   class="btn btn-primary">Удалить</a>
            </li>
        </template>
        <template v-else>
            Растений нет
        </template>
    </ul>
</template>

<script>
    export default {
        name: 'plain-list',
        props: ['plants', 'can-remove'],
        methods: {},
        created() {
        },
        mounted() {
        },
    }
</script>

<style lang="sass">
.plant
    display: flex
    justify-content: space-between
    margin-bottom: 5px
</style>
