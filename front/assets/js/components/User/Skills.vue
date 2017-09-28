<template>
    <div>
        <div>
            <div class="row">
                <div class="col-sm-9">
                    <p class="lead" style="font-weight: 700">Show Your skill and its level&nbsp;.</p>
                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, {{error}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form id="add-skill" class="skills-form col-sm-9">
                <div class="form-group">
                    <label class="control-label" for="skills">Your Skills</label>
                    <multiselect v-model="selectedSkill" id="ajax" @tag="addTag" :taggable="true"
                                 label="name"
                                 track-by="name" placeholder="Type to search" :options="skills"
                                 :multiple="false"
                                 :searchable="true" :loading="isLoading" :internal-search="true"
                                 :clear-on-select="true"
                                 :close-on-select="true" :options-limit="300" :limit="50"
                                 :limit-text="limitText"
                                 @search-change="all">
                        <span slot="noResult">Oops! No skills found. Consider changing the search query.</span>
                    </multiselect>
                </div>
                <div class="form-group">
                    <div class="skills-table-wrapper">
                        <table id="skills-table" class="skills-table editable">
                            <tbody>
                            <tr v-for="item in userSkillSet" style="margin-top: 15px;">
                                <td class="skill-name control-label"><label class="control-label"
                                                                            style="padding-right: 10px; padding-top: 0">{{item.name}}</label>
                                </td>
                                <td class="skill-score">
                                    <star-rating :max-rating="10"
                                                 @rating-selected="updateCounter(item.counter, $event)"
                                                 :rating="item.counter.counter" :showRating="false"
                                                 :star-size="28"></star-rating>
                                </td>
                                <td class="text-danger skill-remove">
                                    <button v-on:click="deleteTag(item, $event)" style=""
                                            class="btn btn-danger btn-xs"><i
                                            class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<style>
    .skills-table {
        width: 100%;
    }
</style>
<script>
    import StarRating from 'vue-star-rating'
    import Multiselect from 'vue-multiselect'
    import auth from '../../services/auth.service.js';

    export default {
        data() {
            return {
                autocompleteData: [],
                skills: [],
                skillsCount: '',
                skillnames: [],
                selectedSkill: '',
                userSkillSet: [],
                userSkillSetCount: '',
                isLoading: false,
                error: null
            }
        },
        methods: {
            userSkills() {
                this.$http.get('api/skills/userSkills').then(response => {
                    // get body data
                    this.userSkillSet = response.body.items;
                    this.userSkillSetCount = response.body.count;
                }, response => {
                    // error callback
                    this.error = response.data;
                });
            },

            all(query) {
                this.isLoading = true;
                this.$http.get('api/skills/all?q=' + query).then(response => {

                    // get body data
                    this.skills = response.body.items;
                    this.skillsCount = response.body.count;
                    this.isLoading = false

                }, response => {
                    // error callback
                    this.error = response.data;
                });
            },
            attachUserSkill(skill) {
                console.log(skill);
                this.$http.put('api/skills/userSkills', {tags_list: skill}).then(response => {
                    this.userSkills();
                    this.all();
                    this.selectedSkill = '';
                }, response => {
                    // error callback
                });
            },
            addTag (newTag) {
                event.preventDefault();
                this.attachUserSkill(newTag);
            },
            getData(data) {
                console.log(data);
            },
            limitText (count) {
                return `and ${count} other skills`
            },
            updateCounter (counter, event) {
                counter.counter = event;
                this.$http.put('api/skills/updateSkillCounter', {counter: counter}).then(response => {
                    this.userSkills();
                }, response => {
                    // error callback
                    this.error = response.data;
                });
            },
            deleteTag (tag, event) {
                event.preventDefault();
                this.$http.post('api/skills/deleteSkill', {tag: tag}).then(response => {
                    this.userSkills();
                }, response => {
                    // error callback
                    this.error = response.data;
                });
            }
        },
        mounted: function () {
            this.userSkills();
        },
        watch: {
            selectedSkill: function (val) {
                this.addTag(val);
                // get body data
                this.skills = [];
                this.skillsCount = 0;
                this.isLoading = false
            }
        },
        components: {
            StarRating,
            Multiselect
        },
    }
</script>