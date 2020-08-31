<template>
    <div class="plant-search">
        <label for="plant-name">Название растения</label>
        <input type="text"
               id="plant-name"
               v-model="searchPlantName"
               @input="searchPlants"
               @change="searchPlants">
        <plant-list :plants="searchedPlants"
                    :can-remove="canRemove"
                    @destroy-plant="destroyPlant"></plant-list>
    </div>
</template>

<script>
    import PlantList from './Plant-List';

    export default {
        components: {
            'plant-list': PlantList,
        },
        props: ['plants', 'can-remove'],
        data() {
            return {
                searchPlantName: '',
                searchedPlants: '',
            }
        },
        methods: {
            searchPlants() {
                this.searchedPlants = [];

                this.plants.forEach((item) => {
                    let upperSearchPlantName = this.searchPlantName.toUpperCase()
                    let upperItem = item.name.toUpperCase();

                    if (upperItem.indexOf(upperSearchPlantName) != -1
                        || upperSearchPlantName === '') {
                        this.searchedPlants.push(item);
                    }
                })
            },
            destroyPlant(plantId, index) {
                this.$emit('destroy-plant', plantId, index);
            }
        },
        created() {
            this.searchedPlants = this.plants;
        }
    }
</script>

<style lang="sass">

</style>
