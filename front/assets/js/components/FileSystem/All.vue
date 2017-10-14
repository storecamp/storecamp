<template>
    <div>
        <div v-if="folder">
            <div class="col-md-7 pull-left">
                <small>
                    Folder
                </small>
                <b style="font-size: 20px; text-decoration: underline;" class="text-info">
                    <a href="#" class="active" style="margin-left: 10px" data-folder-id="#"
                       data-folder-url="">../</a>
                </b>
                <a href="#"
                   style="margin-left: 10px"
                   class="text-info"
                   data-folder-id=""
                   data-folder-url="">
                    local
                </a>
            </div>
            <div id="disks" class="col-md-5 pull-right text-right">
                <small>Disks</small>
                <b v-for="disk in rootFolders"
                   style="font-size: 20px; text-decoration: underline;" class="text-info">
                    <router-link :to="{name: 'mediaDiskFolder', params: {disk: disk.disk, folder_id: disk.folder_id}}"
                                 :class="disk.class" style="margin-left: 10px"
                                 :data-folder-id="disk.folder_id"
                                 :data-disk="disk.disk"
                                 :data-folder-url="disk.folder_url">{{disk.disk}}
                    </router-link>
                </b>
            </div>
        </div>
        <div class="hidden">
            <div id="current-container">
                <button type="button" id="upload-browse-button" class="upload-browse-button btn btn-primary">Browse...
                </button>
                <button type="button" id="uploadfiles" class="upload-start-upload btn btn-success">Upload</button>
            </div>
            <div id="uploader">Your browser doesn't support native upload.</div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Media Files</h3>
                        <div class="box-tools">
                            <div class="form-group">

                                <a class="btn btn-xs btn-default" href="#"
                                   style="margin-left: 10px">
                                    back
                                </a>
                                <a data-toggle="modal"
                                   href="#upload-modal"
                                   class="btn btn-xs btn-default" style="margin-left: 10px">
                                    upload
                                </a>
                                <a data-toggle="modal"
                                   href="#newdir-modal"
                                   class="btn btn-xs btn-default" style="margin-left: 10px">
                                    create directory
                                </a>

                                <form method="get"
                                      class="input-group pull-right"
                                      style="width: 200px; margin-left: 10px">
                                    <input type="text" name="search" class="form-control pull-right"
                                           placeholder="Search">
                                </form>
                            </div>
                        </div>
                        <div class="clearifx"></div>
                        <span class="media_tags">
                           <span class="text-muted">only: </span>
                        <li>
                            <a href="#" class="btn btn-xs btn-icon" style="margin-left: 10px">
                            - all
                            </a>
                        </li>
                        <li>
                            <a href="#video"
                               class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                            <i class="fa fa-video-camera"></i> - video
                            </a>
                        </li>

                        <li>
                             <a href="audio"
                                class="btn btn-xs btn-icon"
                                style="margin-left: 10px">
                        <i class="fa fa-music"></i> - audio
                            </a>
                        </li>
                        <li>
                            <a href="#image"
                               class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                            <i class="fa fa-image"></i> - image
                            </a>
                        </li>
                        <li>
                            <a href="pdf"
                               class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                            <i class="fa fa-file-pdf-o"></i> - pdf
                            </a>
                        </li>
                        <li>
                             <a href="archive"
                                class="btn btn-xs btn-icon"
                                style="margin-left: 10px">
                            <i class="fa fa-file-archive-o"></i> - archive
                            </a>
                        </li>
                        <li>
                            <a href="#document"
                               class="btn btn-xs btn-icon"
                               style="margin-left: 10px">
                        <i class="fa fa-file-archive-o"></i> - document
                            </a>
                        </li>

                    </span>
                    </div><!-- /.box-header -->
                    <div id="folder-body"
                         data-folder-url="http://storecamp.dev/en/admin/media/getIndex/local/c52ae992-f435-4014-acf4-8959204658d0"
                         class="box-body folder-body">
                        <files></files>
                        <folders></folders>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Folders from "./Folders.vue";
    import Files from "./Files.vue";

    export default {
        data() {
            return {
                count: 0,
                directories: [],
                disk: "local",
                folder: {},
                media: {},
                path: "",
                rootFolders: [],
                urlFolderPathBuild: ""
            }
        },
        methods: {
            getFolder(page, disk, folder_id) {
                let pageNum = page ? page : 1;
                let url = '/api/media/index';
                if (disk) {
                    url += "/" + disk;
                }
                if (folder_id) {
                    url += "/" + folder_id;
                }
                Vue.http.get(window.BASE_URL + url + '?page=' + pageNum)
                    .then(response => {
                        this.error = false;
                        this.count = response.data.count;
                        this.directories = response.data.directories;
                        this.disk = response.data.disk;
                        this.folder = response.data.folder;
                        this.media = response.data.media;
                        this.path = response.data.media;
                        this.rootFolders = response.data.rootFolders;
                        this.urlFolderPathBuild = response.data.urlFolderPathBuild;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            }
        },
        mounted: function () {
            let page = this.$route.params.page ? this.$route.params.page : 0;
            let disk = this.$route.params.disk ? this.$route.params.disk : "local";
            let folder_id = this.$route.params.folder_id ? this.$route.params.folder_id : null;
            this.getFolder(page, disk, folder_id);

        },
        components: {
            folders: Folders,
            files: Files
        }
    }
</script>
<style lang="scss">
    //colors
    $alice_blue: aliceblue;
    $white: white;
    $danger-color: #F44336;

    //@extend-elements
    //original selectors
    //.delete-file, .rename-file, .download-file, .tag-file
    %extend_media_1 {
        position: absolute;
        top: auto;
        right: 0;
        display: none;
        padding: 3px;
    }

    .delete-file {
        @extend %extend_media_1;
    }

    .rename-file {
        @extend %extend_media_1;
        display: none;
        top: 30px;
        z-index: 9999;
    }

    .locked-file {
        position: absolute;
        top: 5px;
        color: chocolate;
    }

    .download-file {
        @extend %extend_media_1;
        display: none;
        top: 30px;
        z-index: 9999;
    }

    .tag-file {
        @extend %extend_media_1;
    }

    .file-item {
        padding-top: 10px;
        padding-bottom: 10px;
        &.checked {
            -webkit-box-shadow: inset 0 0 0 3px #fff, inset 0 0 0 7px #0073aa;
            box-shadow: inset 0 0 0 3px #fff, inset 0 0 0 7px #0073aa;
        }
        .mailbox-attachment-icon {
            border: 1px solid transparent;
        }
        .mailbox-attachment-info {
            overflow: hidden;
        }
        &:hover {
            .mailbox-attachment-icon {
                border: 1px solid #3c8dbc;
            }
        }
        .item-icons {
            height: 2em;
        }
        .item-icon {
            width: 100%;
            height: 150px;
            display: block;
            font-size: 120px;
            text-align: center;
            list-style-type: none !important;
        }
        .item-image {
            width: 100%;
            display: block;
            font-size: 120px;
            text-align: center;
            list-style-type: none !important;
        }
        &:hover {
            .delete-file {
                display: block;
                z-index: 9999;
            }
            .download-file {
                display: block;
                z-index: 9999;
            }
        }
    }

    #my-awesome-dropzone-body {
        border: 2px dashed $alice_blue;
        //Instead of the line below you could use @include border-radius($radius, $vertical-radius)
        border-radius: 5px;
        background: $white;
        .dz-message {
            text-decoration: dashed;
            font-weight: 700;
        }
        > .dz-preview {
            display: none;
        }
    }

    .files li {
        list-style-type: none;
    }

    .directory-item:hover {
        .delete-file {
            display: block;
            z-index: 9999;
        }
        .rename-file {
            display: block;
            z-index: 9999;
        }
    }

    .media_tags {
        display: inline-block;
        li {
            list-style-type: none;
            display: inline;
            a {
                border-bottom: 2px solid transparent;
                background: transparent;
            }
            &.active a, &:hover a {
                border-radius: 0;
                background: #3d3d3d;
                color: whitesmoke;
                border-bottom: 2px solid #3d3d3d;
            }
        }
    }

    .dropzone {
        border: 2px dashed $alice_blue !important;
        border-radius: 5px;
        background: white;
    }

    .playing {
        .mailbox-attachment-icon {
            border: 1px solid #3c8dbc;
        }
    }

    .directories {
        .box-default {
            border: none;
            box-shadow: none;
            border-left: 2px dashed $alice_blue;
            min-height: 400px;
        }
        .box-header {
            border-bottom: 2px dashed $alice_blue;
        }
    }

    #fileLinker-modal {
        .selected-block {
            word-wrap: break-word;
            div {
                text-align: center;
                img {
                    width: 100%;
                    height: auto;
                    position: relative;
                    background: #f4f4f4;
                    border: 2px solid #f4f4f4;
                }
                small {
                }
                .item-icon {
                    width: 100%;
                    height: 120px;
                    display: block;
                    font-size: 90px;
                    text-align: center;
                    list-style-type: none !important;
                    border: 2px solid #f4f4f4;
                    background: #f4f4f4;
                }

            }
        }
    }

    .files.selected-block {
        word-wrap: break-word;
        display: block;
        width: 100%;
        div {
            text-align: center;
            img {
                width: 100%;
                height: auto;
                position: relative;
                background: #f4f4f4;
                border: 2px solid #f4f4f4;
            }
            small {
            }
            .item-icon {
                width: 100%;
                height: 120px;
                display: block;
                font-size: 90px;
                text-align: center;
                list-style-type: none !important;
                border: 2px solid #f4f4f4;
                background: #f4f4f4;
            }
        }

    }

    .selected-block {
        .selected-item {
            padding-left: 0;
            .remove-selected {
                color: $danger-color;
            }
        }
    }

    %extend_media_2 {
        display: inline-block;
        position: relative;
    }

    .items-list {
        &:hover {

        }
        .delete-btn {
            @extend %extend_media_2
        }

        .rename-btn {
            @extend %extend_media_2

        }
        .download-btn {
            @extend %extend_media_2

        }
        .info-btn {
            @extend %extend_media_2
        }
    }
</style>