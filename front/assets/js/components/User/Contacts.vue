<template>
    <div>
        <div>
            <div class="row">
                <div class="col-sm-9">
                    <p class="lead" style="font-weight: 700">
                        Your personal data will be visible only for those who you have opened the profile&nbsp;.</p>
                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, {{error}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form v-on:submit="updateContact" class="col-sm-9" method="post" id="updateContact">
                <div class="form-group">
                    <label class="control-label" for="name">Fullname</label>
                    <input type="text" name="name" v-model="contact.fullname" id="name" class="form-control"
                           placeholder="Ivan Ivanov">
                </div>

                <div class="form-group">
                    <label class="control-label">Profile Image</label>
                    <VueImgInputer v-model="file"
                                   :imgSrc="contact.avatar"
                                   accept="image/*" theme="material"
                                   bottomText="click to change profile image"
                                   placeholder="please select profile image"
                                   size="small" @onChange="fileChange"></VueImgInputer>
                </div>

                <div class="form-group">
                    <label class="control-label" for="email">Email</label>
                    <input disabled="" v-model="contact.email" type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label" for="skype">Skype</label>
                    <input type="text" v-model="contact.skype" name="skype" id="skype" class="form-control"
                           placeholder="me1992">
                </div>

                <div class="form-group">
                    <label class="control-label" for="mobile">Mobile Phone</label>
                    <input type="tel" v-model="contact.mobile" name="mobile" id="mobile" class="form-control"
                           placeholder="+380936555666">
                </div>

                <div class="form-group">
                    <label class="control-label" for="telegram">Telegram</label>
                    <input type="text" name="telegram" id="telegram" class="form-control" v-model="contact.telegram">
                </div>

                <div class="form-group">
                    <label class="control-label" for="linkedin">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" v-model="contact.linkedin" class="form-control"
                           placeholder="https://ua.linkedin.com/in/ivan-ivanov-999999a9">
                </div>

                <div class="form-group">
                    <label class="control-label" for="github">GitHub</label>
                    <input type="text" name="github" id="github" class="form-control" v-model="contact.github"
                           placeholder="https://github.com/storecamp/storecamp">
                </div>

                <a name="cv"></a>
                <div class="form-group">
                    <label class="control-label">Resume</label>
                    <File name="resume" :fileUpload="fileUpload" :already_exists_file="already_exists_file"
                          inputId="resume"></File>
                </div>

                <div class="form-group">
                    <input type="submit" name="save_changes" class="btn btn-primary btn-lg form_btn"
                           value="Save Changes">
                </div>
            </form>
        </div>
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
    import {UploadService} from '../../services/file-upload.service.js';

    export default {
        data() {
            return {
                file: {},
                resume: {},
                contact: {
                    avatar: null,
                    created_at: "",
                    email: "",
                    fullname: "",
                    github: "",
                    id: null,
                    linkedin: "",
                    mobile: "",
                    original_resume_name: "",
                    resume: "",
                    skype: "",
                    telegram: "",
                    updated_at: "",
                    user_id: null
                },
                fileUpload: null,
                error: false,
                errorMsg: '',
                already_exists_file: null
            }
        },
        methods: {
            showContact() {
                Vue.http.get(
                    'api/contacts/show'
                ).then(response => {
                    this.error = false;
                    this.contact = response.data;
                    this.fileUpload = null;
                    if (this.contact.resume) {
                        this.already_exists_file = {
                            fileName: this.contact.original_resume_name,
                            url: this.contact.resume
                        };
                    } else {
                        this.already_exists_file = null;
                    }
                }, response => {
                    this.error = true;
                    this.errorMsg = response.error
                })
            },
            updateContact(event) {
                event.preventDefault();
                let contact = this.contact;
                contact.file_status = $("input[name='file_status']").val();
                let resume = $("#resume").prop('files');
                if (resume.length) {
                    this.resume = resume[0];
                }
                Vue.http.put(
                    'api/contacts/update',
                    contact
                ).then(response => {
                    this.error = false;
                    this.contactUpload();
                }, response => {
                    this.error = true
                    this.errorMsg = response.error
                })
            },
            contactUpload() {
                const avatarformData = new FormData();
                const resumeFormData = new FormData();
                if (this.file.name) {
                    avatarformData.append('file', this.file, this.file.name);
                    UploadService.uploadAvatar(avatarformData);
                }
                let resumeStatus = $("input[name='file_status']").val();
                let updateStatus = true;
                if (this.resume.name) {
                    resumeFormData.append('resume', this.resume, this.resume.name);
                    resumeFormData.append('file_status', $("input[name='file_status']").val());
                    UploadService.uploadResume(resumeFormData, this);
                    updateStatus = false;
                    this.$root.$emit('resume_changed');
                }
                if (resumeStatus == 'removed') {
                    resumeFormData.append('file_status', $("input[name='file_status']").val());
                    UploadService.uploadResume(resumeFormData, this);
                    updateStatus = false;
                    this.$root.$emit('resume_changed');
                }
                if (updateStatus) {
                    this.showContact();
                }
            },
            fileChange(file, name) {
                console.log(file);
                console.log('FileName:', name);
            }

        },
        mounted: function () {
            this.showContact();

        },
        components: {
            vueSlider,
            Multiselect,
            VueImgInputer,
            File
        }
    }
</script>