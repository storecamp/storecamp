<template>
    <div>
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="lead" style="font-weight: 700">Your personal additional settings&nbsp;.</p>
                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, {{error}}</p>
                    </div>
                </div>
            </div>
        </div>
        <form v-on:submit="updateSettings" class="form-horizontal form-horizontal-text-left js-account-form"
              method="post" id="updateSettings">
            <div class="row">
                <div class="col-sm-12">
                    <h4>NewsLetter with vacancies</h4>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="settings.subscribe" name="subscribe" value="true"
                                       checked="checked">
                                Receive new vacancies (if profile is online)
                            </label>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12">
                    <h4>Contacts Stop-list</h4>
                    <div class="form-group">
                        <label class="control-label" for="stop_list">Stop-List</label>
                        <input type="text" name="stop_list" autocomplete="off"
                               id="stop_list"
                               class="form-control" v-model="settings.stop_list"
                               placeholder="John Doe, Jane Doe">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" name="save_changes" class="btn btn-primary btn-lg form_btn"
                               value="Save Changes">
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<style>
    .img-inputer--small {
        height: 100% !important;
        min-height: 160px;
    }
</style>
<script>
    import auth from '../../services/auth.service.js';
    import vueSlider from 'vue-slider-component'
    import Multiselect from 'vue-multiselect'
    import VueImgInputer from 'vue-img-inputer'
    import File from '../FileUpload/Main.vue'
    import * as uploader from '../../services/file-upload.service.js';

    export default {
        data() {
            return {
                settings: {},
                error: false,
                errorMsg: ''
            }
        },
        methods: {
            showSettings() {
                Vue.http.get(
                    'api/additional_settings/show'
                ).then(response => {
                    this.error = false;
                    this.settings = response.data;
                }, response => {
                    this.error = true;
                    this.errorMsg = response.error
                })
            },
            updateSettings(event) {
                event.preventDefault();
                let settings = this.settings;
                Vue.http.put(
                    'api/additional_settings/update',
                    settings
                ).then(response => {
                    this.error = false;
                    this.showSettings();
                }, response => {
                    this.error = true
                    this.errorMsg = response.error
                })
            }

        },
        mounted: function () {
            this.showSettings();

        },
        components: {}
    }
</script>