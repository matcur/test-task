<template>
    <div>
        <vue-dropzone
            ref="myVueDropzone"
            id="dropzone"
            :options="dropzoneOptions"
            :useCustomSlot="true"
            @vdropzone-success="uploadSuccess"
            @vdropzone-error="uploadError"
            @vdropzone-removed-file="fileRemoved"
        >
            <div class="dropzone-custom-content">
                <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
                <div class="subtitle">...or click to select a file from your computer</div>
            </div>
        </vue-dropzone>
    </div>
</template>

<script>
    import vue2Dropzone from "vue2-dropzone";
    import "vue2-dropzone/dist/vue2Dropzone.min.css";

    export default {
        components: {
            vueDropzone: vue2Dropzone
        },
        props: ['images', 'input-class-name'],
        data() {
            return {
                dropzoneOptions: {
                    url: domainUrl + 'api/file/load',
                    thumbnailWidth: 150,
                    thumbnailHeight: 150,
                    addRemoveLinks: true,
                    destroyDropzone: false,
                },
            };
        },
        methods: {
            uploadSuccess(file, response) {
                let fileName = response.file;
                this.createFileInput(fileName);
            },
            uploadError(file, message) {},
            fileRemoved(file, error, xhr) {
                let fileInput = document.querySelector('input[value=\"' + file.name + '\"]');
                fileInput.parentNode.removeChild(fileInput);

            },
            createFileInput(fileName) {
                let form = document.getElementById('page-edit-form');
                let fileInput = document.createElement('input');

                fileInput.type = 'text';
                fileInput.name = this.inputClassName;
                fileInput.setAttribute('value', fileName);
                fileInput.style.display = 'none';

                form.appendChild(fileInput);
            }
        },
        mounted() {
            this.images.map((image) => {
                let imageUrl = domainUrl + image;
                let file = { size: 123, name: image, type: "image/png" };

                this.createFileInput(image);
                this.$refs.myVueDropzone.manuallyAddFile(file, imageUrl);
            })
        }
    };
</script>
