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
        props: ['images', 'app-url'],
        data() {
            return {
                dropzoneOptions: {
                    url: domainUrl + 'api/file/load',
                    thumbnailWidth: 150,
                    thumbnailHeight: 150,
                    addRemoveLinks: true,
                },
            };
        },
        methods: {
            uploadSuccess(file, response) {
                console.log('File Successfully Uploaded with file name: ' + response.file);
                let fileName = response.file;
                this.createFileInput(fileName);
            },
            uploadError(file, message) {
                console.log('An Error Occurred');
            },
            fileRemoved() {},
            createFileInput(fileName) {
                let form = document.getElementById('page-edit-form');
                let fileInput = document.createElement('input');

                fileInput.type = 'text';
                fileInput.name = 'slider_image[]';
                fileInput.setAttribute('value', fileName);
                fileInput.style.display = 'none';

                form.appendChild(fileInput);
            }
        },
        mounted() {
            var file = { size: 123, name: "Icon", type: "image/png" };
            this.images.map((image) => {
                let imageUrl = this.appUrl + image;
                this.createFileInput(image);
                this.$refs.myVueDropzone.manuallyAddFile(file, imageUrl);
            })
        }
    };
</script>
