<template>
    <div class="media file-item"
         :data-file-id="file.id"
         :data-filename="file.filename + '.' + file.extension"
         :data-disk="file.disk"
         :data-file-type="file.aggregate_type"
         :data-modified="file.updated_at"
         :data-size="formatBytes(file.size)"
         :data-status="detectPlayable(file)"
         :data-href="file.url">
        <div class="pull-left text-muted">
            <img v-if="file.aggregate_type == 'image'" :src="file.url" class="item-icons"
                 :alt="file.filename">
            <i v-else :class="icon"></i>
        </div>
        <div class="media-body">
            <div>
                <div class="pull-right inline items-list">
                    <a class="btn info-btn btn-default btn-xs"
                       :data-name="file.filename"
                       :data-id="file.id" :data-url="file.url" data-toggle="modal"
                       :data-mime="file.mime_type"
                       type="info"
                       role="button"
                       href="#info-modal">
                        <i class="fa fa-play" aria-hidden="true"></i>
                        info
                    </a>
                    <a class="btn download-btn btn-info btn-xs" type="download" role="button"
                       :href="file.download_url"><i
                            class="fa fa-cloud-download"
                            aria-hidden="true"></i> Download</a>
                    <a class="btn btn-default rename-btn btn-xs"
                       :data-rename-file="file.filename"
                       :data-rename-path="file.id"
                       data-toggle="modal" type="rename" role="button"
                       href="#renameFile-modal">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        edit
                    </a>
                    <a class="delete-file-btn text-danger btn btn-default btn-xs" type="delete" role="button"
                       :href="file.delete_url"
                       :data-id="file.id"
                       data-with-modal="true"
                       :data-name="file.filename">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        delete
                    </a>
                </div>
                <strong>{{file.filename + '.' + file.extension}}</strong>
            </div>
            <div class="text-muted">
                <small>size: {{ formatBytes(file.size)}}</small>
                <small>last_modified: {{ file.updated_at }}</small>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['file', 'icon'],
        methods: {
            detectPlayable(file) {
                if (file.aggregate_type == "audio" || file.aggregate_type == "video") {
                    return "playable";
                } else {
                    return false;
                }
            },
            formatBytes(bytes, precision = 2) {
                var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                if (bytes == 0) return '0 Byte';
                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
            }
        }
    }
</script>