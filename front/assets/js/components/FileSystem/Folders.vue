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
                    <a class="rename-file text-danger btn btn-default btn-xs" data-toggle="modal"
                       href="#renameDir-modal" :data-new_name="directory.name"
                       :data-rename-id="directory.unique_id" type="rename" role="button"><i
                            class="fa fa-edit" aria-hidden="true"></i></a>
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
            <h3 v-if="!directories && !directories.length" class="text-warning">No folders found</h3>
        </div>
        <!-- /.box-body -->
    </div>
</div>
</span>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        props: ['folder', "directories", "disk"],
        mounted: function () {
            this.$parent.$parent.routeKey = this.$route.fullPath;
        }
    }
</script>