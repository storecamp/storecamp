<template>
<span id="folders-side">
    <div class="col-xs-5 col-sm-5 col-md-4 col-lg-3 directories">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
            <div v-for="directory in directories" class="col-xs-12 col-md-6 directory-item">
                    <a class="delete-file text-danger btn btn-default btn-xs" type="delete"
                       role="button"
                       :href="directory.delete_url"><i
                            class="fa fa-times" aria-hidden="true"></i></a>

                <button :data-href="'delete-folder-'+directory.id"
                        class="delete-file text-danger btn btn-default btn-xs" role="link"
                        title="Are you sure you want to delete folder?">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                <modal title="Are you sure to delete the folder?"
                       :confirmData="{id: folder.id, disk: folder.disk}"
                       :modalId="'delete-folder-'+directory.id" :triggerConfirm="deleteFolder"
                       :content="'Folder by the name: <b class=\'text-warning\'>' + directory.name + '</b> is going to be deleted!'"></modal>

                <button :data-href="'rename-folder-'+directory.unique_id"
                        class="rename-file text-danger btn btn-default btn-xs"
                        data-toggle="modal"
                        role="button">
                        <i :data-href="'rename-folder-'+directory.unique_id" class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                    <modal title="Are you sure to rename the folder?"
                           :confirmData="{
                                          id: directory.unique_id,
                                          old_name: directory.name,
                                          path: path.path,
                                          disk: directory.disk
                                       }"
                           :modalId="'rename-folder-'+directory.unique_id"
                           :triggerConfirm="renameFolder"
                           :content="renameDirContent(directory.unique_id, path.path, directory.name)">
                    </modal>
                    <router-link :to="{name: 'mediaDiskFolder', params: {disk: disk, folder_id: directory.unique_id}}"
                                 class="btn btn-app"><i class='fa fa-file'></i>
                        <span>{{directory['name'].substr(0, 15)}}</span>
                        <span v-if="directory.locked" rel="tooltip" title="Folder Locked"
                              data-toggle="tooltip"
                              data-container="body"
                              class="locked-file text-info btn-xs" role="button">
                                <span class="fa fa-key" aria-hidden="true"></span>
                        </span>

                    </router-link>
                </div>
            <h3 v-if="!directories.length" class="text-warning">No folders found</h3>
        </div>
        <!-- /.box-body -->
    </div>
</div>
</span>
</template>
<script>
    import Modal from "../Partials/Modal.vue";

    export default {
        data() {
            return {}
        },
        props: ['folder', "directories", "disk", "path"],
        methods: {
            renameDirContent(folderId, path, folderName) {
                path = path ? path : "../";
                return '<div class="input-group margin">' +
                    '<div class="input-group-btn">' +
                    '<button type="button" class="btn btn-info disabled">' + path + '</button>' +
                    '</div>' +
                    '<input name="new_name" ' +
                    'id="rename_folder-' + folderId + '-input" class="rename-folder-input" value=' + folderName + '>' +
                    '</div>';
            },
            deleteFolder(event, data, form) {
                let _this = this;
                Vue.http.get(window.BASE_URL + '/api/media/delete/folder/' + data.disk + '/' + data.id)
                    .then(response => {
                        this.error = false;
                        _this.$parent.$parent.eventHub.$emit('delete-dir', response.data);
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    });
                return;
            },
            renameFolder(event, data, form) {
                let new_name = form.find('.rename-folder-input');
                data.new_name = new_name.val();
                data.folder = data.id;
                let _this = this;
                Vue.http.post(window.BASE_URL + '/api/media/renameDirectory/' + data.disk, data)
                    .then(response => {
                        this.error = false;
                        _this.$parent.$parent.eventHub.$emit('rename-dir', response.data);
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    });
                return;
            }
        },
        mounted: function () {
        },
        components: {
            Modal
        }
    }
</script>