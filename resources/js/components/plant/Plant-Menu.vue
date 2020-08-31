<template>
    <div class="plant-menu">
        <plant-search :plants="plants"
                      :can-remove="canRemove"
                      @destroy-plant="destroyPlant"/>
        <div class="new-plant">
            <label for="new-plant-name">Название нового растения</label>
            <input type="text" v-model="newPlantName" id="new-plant-name">
            <button class="btn btn-primary"
                    @click="addNewPlant">Добавить</button>
        </div>
    </div>
</template>

<script>
    import PlantSearch from './Plant-Search';

    export default {
        components: {
            'plant-search': PlantSearch,
        },
        props: ['plants', 'can-remove'],
        data() {
            return {
                newPlantName: '',
            }
        },
        methods: {
            addNewPlant() {
                axios({
                    url: domainUrl + 'api/add_new_plant',
                    method: 'post',
                    data: {
                        plant_name: this.newPlantName,
                    }
                })
                .catch(err => console.log(err));

                let lastPlant = this.plants[this.plants.length - 1];
                this.plants.push({ name: this.newPlantName, id: lastPlant.id + 1 });

                this.newPlantName = '';
            },
            destroyPlant(plantId, index) {
                axios({
                    url: domainUrl + 'api/destroy_plant',
                    method: 'post',
                    data: {
                        plant_id: plantId,
                    }
                })
                .catch(err => console.log(err));

                this.plants.splice(index, 1);
            },
        },
        created() {
        }
    }
</script>

<style scoped>

</style>
