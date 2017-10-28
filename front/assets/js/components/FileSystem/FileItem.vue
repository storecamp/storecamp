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
                    <button :data-href="'info-file-'+file.id"
                            :class="'btn info-btn btn-default btn-xs' + ' item-' + file.id"
                            data-toggle="modal"
                            role="button">
                        <i :data-href="'info-file-'+file.id" :class="'fa fa-play' + ' item-' + file.id" aria-hidden="true"></i>
                        info
                    </button>

                    <modal :withConfirm="false" :title="'File info: ' + file.filename + '.' + file.extension"
                           :confirmData="{file: file}"
                           :modalId="'info-file-'+file.id"
                           :content="infoFileContent()">
                    </modal>

                    <a class="btn download-btn btn-info btn-xs" type="download" role="button"
                       :href="file.download_url"><i
                            class="fa fa-cloud-download"
                            aria-hidden="true"></i> Download</a>
                    <button class="btn btn-default rename-btn btn-xs"
                            :data-href="'rename-file-'+file.id">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        edit
                    </button>

                    <modal :withConfirm="true" :title="'File rename: ' + file.filename + '.' + file.extension"
                           :confirmData="{file: file}"
                           :triggerConfirm="renameConfirm"
                           :modalId="'rename-file-'+file.id"
                           :content="renameFileContent()">
                    </modal>
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
    import Modal from "../Partials/Modal.vue";
    export default {
        data() {
            return {
                options: {

                }
            }
        },
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
                let sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                if (bytes == 0) return '0 Byte';
                let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));

                return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];

            },
            renameConfirm(event, data, form) {
                event.preventDefault();
                let formData = {};
                formData.selected_id = data.file.id;
                formData.new_name = form.find('.rename-file-input').val();

                Vue.http.post(window.BASE_URL + '/api/media/renameFile/' + data.file.disk, formData)
                    .then(response => {
                        this.error = false;
                        this.$parent.$parent.eventHub.$emit('rename-file', response.data);
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    });
            },
            renameFileContent() {
                return '<div class="input-group margin">' +
                    '<div class="input-group-btn">' +
                    '<button type="button" class="btn btn-info disabled"> ' + this.file.full_path + ' </button>' +
                    '</div>' +
                    '<input name="new_name" id="rename_file_' + this.file.id + '_input" ' +
                    'class="rename-file-input" value=' + this.file.filename + '>' + '</div>';
            },
            infoFileContent() {
                let itemType = this.file.aggregate_type,
                    itemId = this.file.id,
                    itemUrl = this.file.url,
                    itemModified = this.file.updated_at,
                    itemSize = this.formatBytes(this.file.size),
                    itemMime = this.file.mime_type,
                    itemName = this.file.filename + "." + this.file.extension;
                let _this = this;
                var html = "";
                if ($("" + itemId).length > 0) {
                    $("" + itemId).remove();
                }

                if (itemType === "video") {
                    html = _this.videoTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize, itemName, itemMime);
                }

                if (itemType === "audio") {
                    html = _this.audioTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize, itemName);
                }

                if (itemType === "document") {
                    html = _this.documentTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize, itemName);
                }

                if (itemType === "image") {
                    html = _this.imageTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize, itemName);
                }

                if (itemType === "pdf") {
                    html = _this.pdfTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize, itemName);
                    $('.pdf-file').media({
                        width: 100 + "%",
                        height: 400
                    });
                }

                if (itemType === "archive") {
                    html = _this.archiveTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize);
                }

                var item, players;

                item = $("#info-file-" + _this.file.id);

                if (item.length === 1) {
                    players = plyr.setup(item, []);
                }

                return html;
            },
            infoTemplate: function (filename, type, modified, size) {
                return "<div class='text-muted'>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">name: </small>\n  <p class='pull-right'>" + filename + "</p>\n </span>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">type: </small>\n  <p class='pull-right'>" + type + "</p>\n</span>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">modified: </small>\n  <p class='pull-right'>" + modified + "</p>\n</span>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">size: </small>\n  <p class='pull-right'>" + size + "</p>\n</span>\n</div>\n<div class='clearfix'></div>";
            },
            videoTemplate: function (mediaUrl, mediaId, filename, type, modified, size, mime) {
                return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item media-plyr-item\" style=\"margin-bottom: 10px\">\n          <span class=\"mailbox-attachment-icon has-img\">\n              <video class='js-player' controls>\n                   <source src=\"" + mediaUrl + "\" type=\"video/mp4\">\n                    <source src=\"" + mediaUrl + "\" type=\"video/webm\">\n                    <source src=\"" + mediaUrl + "\" type=\"" + mime + "\">\n               </video>\n          </span>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n</div>";
            },
            audioTemplate: function (mediaUrl, mediaId, filename, type, modified, size) {
                return " <div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item media-plyr-item\" style=\"margin-bottom: 10px\">\n           <audio class='js-player' controls title=\"" + mediaUrl + "\">\n                  <source src=\"" + mediaUrl + "\"\n                          type=\"audio/mp3\">\n                  <source src=\"" + mediaUrl + "\"\n                          type=\"audio/ogg\">\n            </audio>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
            },
            documentTemplate: function (mediaUrl, mediaId, filename, type, modified, size) {
                return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n<div class=\"text-center\">\n    <i class=\"item-icon fa fa-file-word-o fa-2x\"></i>\n</div>\n<div class='clearfix'></div>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
            },
            imageTemplate: function (mediaUrl, mediaId, filename, type, modified, size) {
                return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n<div class=\"pull-left text-muted\">\n  <img src=\"" + mediaUrl + "\" class=\"item-image\" alt=\"" + filename + "\">\n</div>\n<div class='clearfix'></div>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n </div>";
            },
            pdfTemplate: function (mediaUrl, mediaId, filename, type, modified, size) {
                return "<div id='" + mediaId + "' data-id='" + mediaId + "' \nclass=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n <div class=\"text-center\">\n   <i class=\"item-icon fa fa-file-pdf-o fa-2x\"></i>\n</div>\n <button class='btn btn-block' data-toggle=\"collapse\" data-target=\"#pdf-file\">Preview " + filename + "</button>\n <div id=\"pdf-file\" class=\"collapse\">\n       <a class=\"pdf-file\" href=\"" + mediaUrl + "\">" + filename + "</a>\n </div>\n <div class='clearfix'></div>\n " + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
            },
            archiveTemplate: function (mediaUrl, mediaId, filename, type, modified, size) {
                return "<div id='" + mediaId + "' data-id='" + mediaId + "' \nclass=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n <div class=\"text-center\">\n   <i class=\"item-icon fa fa-archive fa-2x\"></i>\n</div>\n <div class='clearfix'></div>\n " + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
            },
            pausePlayers: function (players) {
                let _this = this;
                return players.forEach(function (player, i, arr) {
                    players[i].pause();
                    $('.media-plyr-item').removeClass('playing');
                });
            },
            reindex: function (mediaItems, players) {
                let _this = this;
                return [].forEach.call(mediaItems, function (item, i, arr) {
                    $(item).attr('data-media-number', i);
                });
            }
        },
        mounted: function () {
            this.options = {
                players: plyr.setup(document.querySelectorAll('.js-player'), []),
                playerStatus: $('.play-status'),
                mediaItems: $('.media[data-status="playable"]')
            };
            if (this.options.mediaItems.length > 0) {
                this.reindex(this.options.mediaItems, this.options.players);
            }
            let _this = this;
            this.eventHub.$on('modal-closed', function (context) {
                if (_this.file.aggregate_type === "video") {
                    _this.pausePlayers(_this.options.players);
                }
                if (_this.file.aggregate_type === "audio") {
                    _this.pausePlayers(_this.options.players);
                }
            });
            return;
        },
        components: {
            Modal
        }
    }
</script>