<template>
    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-9 files">

        <div class="panel">

            <div class="panel-body">
                <div v-if="media" v-for="file in media">
                    <file-item v-if="file.aggregate_type == 'video'" :file="file"
                               :icon="'item-icons fa fa-video-camera fa-2x'"></file-item>
                    <file-item v-if="file.aggregate_type == 'image'" :file="file"
                               :icon="'item-icons fa fa-image fa-2x'"></file-item>
                    <file-item v-if="file.aggregate_type == 'audio'" :file="file"
                               :icon="'item-icons fa fa-file-audio-o fa-2x'"></file-item>
                    <file-item v-if="file.aggregate_type == 'archive'" :file="file"
                               :icon="'item-icons fa fa-archive fa-2x'"></file-item>
                    <file-item v-if="file.aggregate_type == 'document'" :file="file"
                               :icon="'item-icons fa fa-file-word-o fa-2x'"></file-item>
                    <file-item v-if="file.aggregate_type == 'pdf'" :file="file"
                               :icon="'item-icons fa fa-file-pdf-o fa-2x'"></file-item>
                </div>
            </div><!-- /.panel-body -->
        </div>
        <h3 v-if="!count" class="text-warning">No Files found</h3>
    </div>
</template>
<script>
    import FileItem from "./FileItem.vue";

    export default {
        data() {
            return {
                files: []
            };
        },
        props: ["media", "disk", "count"],
        mounted: function () {
        },
        components: {
            FileItem
        }
    }

</script>
