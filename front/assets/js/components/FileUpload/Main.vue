<template>
    <div id="fileContainer">
        <div v-show="!fileUpload && !already_exists_file">
            <label v-show="withLabel">Select an file</label>
            <input type="text" hidden name="file_status" :value="file_status">
            <input type="file" class="fileUpload" :name="name ? name : 'fileInput'" :id="inputId ? inputId : 'fileInput'" @change="onUploadFileChange">
        </div>
        <div v-if="fileUpload">
            <span :name="fileName">{{fileName}}</span>
            <button @click="removeFile">Remove file</button>
        </div>
        <div v-if="already_exists_file">
            <span :name="already_exists_file.fileName">{{already_exists_file.fileName}}</span>
            <span @click="removeFile" class="removeFile text-danger">Remove file</span>
        </div>
    </div>
</template>
<style>
    #fileContainer {
        text-align: left;
    }
    img {
        width: 30%;
        margin: auto;
        display: block;
        margin-bottom: 10px;
    }
    .removeFile:hover {
        cursor: pointer;
        text-decoration: underline;
    }
    #fileContainer {
        padding-top: 7px;
    }
    button {
    }
</style>
<script>
    export default {
        data() {
            return {
                fileName: '',
                file_status: 'empty'
            }
        },
        props: ['fileUpload', 'name', 'already_exists_file', 'inputId', 'withLabel'],
        methods: {
            onUploadFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.fileUpload = files[0];
                this.fileName = files[0].name;
                this.file_status = 'uploaded';
            },
            removeFile: function (e) {
                e.preventDefault();
                this.fileUpload = null;
                this.fileName = '';
                this.already_exists_file = null;
                this.file_status = 'removed';
                $('input.fileUpload').val(null);
            }
        },
        mounted: function () {
            if(this.already_exists_file) {
                console.log(this.already_exists_file);
                this.file_status = 'exists';
            }
        },
    }
</script>