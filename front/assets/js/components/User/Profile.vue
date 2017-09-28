<template>
    <div>
        <div>
            <div class="row">
                <div class="col-sm-9">
                    <p class="lead" style="font-weight: 700">Show Your main profile data&nbsp;.</p>
                    <div class="alert alert-danger" v-if="error">
                        <p>There was an error, {{error}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="post" v-on:submit="updateProfile" id="updateProfile" class="col-sm-9">
                <div class="form-group">
                    <label class="control-label" for="position">Position</label>
                    <input type="text" name="position" autocomplete="off" data-provide="typeahead"
                           id="position"
                           class="form-control" v-model="profile.position"
                           placeholder="Senior PHP Developer">
                </div>
                <div class="form-group">
                    <label class="control-label" for="salary">Salary not lower than</label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="number" name="salary" id="salary" step="100" min="100"
                               required="required" v-model="profile.salary" autocomplete="off"
                               class="form-control input salary"
                               placeholder="500">
                    </div>
                    <p class="help-block">Если не уверены сколько написать, посмотрите
                        <a target="_blank"
                           href="https://djinni.co/salaries/?city=Львов&amp;job=PHP&amp;year=6m">наш виджет зарплат</a>
                        и
                        <a target="_blank"
                           href="/search/?sortby=rating&amp;keywords=PHP">как оценивают себя другие</a>.
                    </p>
                </div>
                <div class="form-group">
                    <label class="control-label" for="location">City/Location</label>
                    <input type="text" name="location" id="location" autocomplete="off"
                           data-provide="typeahead"
                           required="required" v-model="profile.location"
                           class="form-control input location"
                           placeholder="Kiev, Lviv, Odessa, Kharkiv">
                    <p class="help-block">Город, где вы ищете работу.
                        Например: Киев, Львов.</p>
                </div>

                <div class="form-group">
                    <label class="control-label" for="moreinfo">
                        Experience
                    </label>
                    <textarea rows="9" class="form-control" maxlength="750" name="moreinfo" id="moreinfo"
                              placeholder="Php, Laravel, Angular2, Vue.js, Node.js, Express.js,
MySQL, Redis, MongoDB,
JavaScript, Linux, CSS, HTML, Backbone, React." v-model="profile.experience"></textarea>
                    <p class="help-block">Напишите главное, не пишите все
                        знакомые аббревиатуры.</p>
                    <p class="charsLeft-warn moreinfo-charsLeft-warn text-warning" style="display:none;">
                        <span class="charsLeftHelp">Осталось символов:</span>
                        <span class="charsLeft moreinfo-charsLeft label label-danger">750</span>
                    </p>
                </div>
                <div class="form-group">
                    <h4 class="" style="margin-bottom: 0;">Additional Info </h4>
                </div>
                <div class="clearfix"></div>
                <div id="extraquestions">
                    <div class="form-group">
                        <label class="control-label">Experience</label>
                        <vue-slider ref="slider" :height="8"
                                    :dotSize="20" :tooltip="true" :disabled="false" :piecewise="true"
                                    :piecewiseLabel="true" :real-time="true" :min="0" :max="15"
                                    :interval="1"
                                    v-model="profile.experience_time"></vue-slider>
                        <p class="help-block experience-slider-value" style="color: inherit;">
                            {{profile.experience_time}} years</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Main trend</label>
                        <multiselect v-model="profile.main_trend" name="main_trend" id="main_trend"
                                     @tag="addMainTrend" :taggable="true" label="name"
                                     track-by="name" placeholder="Type to search"
                                     :options="profile.trend_options"
                                     :multiple="false"
                                     :searchable="true" :loading="false" :clear-on-select="true"
                                     :close-on-select="true" :options-limit="300" :limit="50">
                            <span slot="noResult">Oops! No trends found. Consider changing the search query.</span>
                        </multiselect>
                        <p class="help-block">
                            For employers to be easier <a href="/employees/">find you</a>
                        </p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Secondary trend</label>
                        <multiselect v-model="profile.second_trend" name="second_trend" id="second_trend"
                                     @tag="addSecondTrend" :taggable="true" label="name"
                                     track-by="name" placeholder="Type to search"
                                     :options="profile.trend_options"
                                     :multiple="false"
                                     :searchable="true" :loading="false" :clear-on-select="true"
                                     :close-on-select="true" :options-limit="300" :limit="50">
                            <span slot="noResult">Oops! No trends found. Consider changing the search query.</span>
                        </multiselect>
                        <p class="help-block">
                            For special cases, like .NET + Lead.
                        </p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">English Skill level</label>
                        <div class="radio" v-for="item in profile.all_english_skills">
                            <label v-if="item.name == profile.english_skill">
                                <input type="radio" name="english_level" checked :value="item.name">
                                {{item.name}}
                            </label>
                            <label v-if="item.name != profile.english_skill">
                                <input type="radio" name="english_level" :value="item.name">
                                {{item.name}}
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            Working variants
                        </label>
                        <div class="working_variant">
                            <div class="checkbox" v-for="item in profile.all_working_variants">
                                <label v-if="_in_array(item.id, profile.working_variants)">
                                    <input type="checkbox" name="employment_options" checked :value="item.id">
                                    {{item.name}}
                                </label>
                                <label v-if="!_in_array(item.id, profile.working_variants)">
                                    <input type="checkbox" name="employment_options" :value="item.id">
                                    {{item.name}}
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="">Looking for something special?</h4>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label class="control-label" for="expectations">Expectations</label>
                            <textarea rows="5" class="input form-control expectations" maxlength="750"
                                      name="expectations"
                                      v-model="profile.expectations" id="expectations"></textarea>
                            <span class="label label-info">{{750 - profile.expectations.length}}</span>
                        </div>
                        <br>

                        <div class="form-group">
                            <label class="control-label" for="achievement">Achievement</label>
                            <textarea rows="5" class="input form-control achievement" maxlength="750" name="achievement"
                                      v-model="profile.achievement" id="achievement"></textarea>
                            <span class="label label-info">{{750 - profile.achievement.length}}</span>
                        </div>
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="submit" v-on:click="updateProfile" class="btn btn-primary btn-lg form_btn"
                               value="Update profile">
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
</template>
<style>
    #updateProfile .multiselect--active {
        z-index: 3 !important;
    }
</style>
<script>
    import auth from '../../services/auth.service.js';
    import vueSlider from 'vue-slider-component'
    import Multiselect from 'vue-multiselect'

    export default {
        data() {
            return {
                profile: {
                    experience_time: null,
                    id: null,
                    created_at: "",
                    description: "",
                    experience: "",
                    expectations: "",
                    achievement: "",
                    english_skill: "",
                    job_variants: "",
                    location: "",
                    main_trend: null,
                    position: "",
                    salary: "0",
                    second_trend: "",
                    updated_at: "",
                    user_id: null,
                    trend_options: []
                },
                error: false,
                errorMsg: ''
            }
        },
        methods: {
            showProfile() {
                Vue.http.get(
                    'api/profile/show'
                ).then(response => {
                    this.error = false;
                    this.profile = response.data;
                    this.profile.main_trend = {'name': response.data.main_trend};
                    this.profile.second_trend = {'name': response.data.second_trend};
                    if (this.profile.salary) {
                        let salary = this.profile.salary.split('.');
                        this.profile.salary = salary[0];
                    } else {
                        this.profile.salary = 0;
                    }
                    if (this.profile.experience_time) {
                        let experience_time = this.profile.experience_time.split('.');
                        this.profile.experience_time = experience_time[0];
                    } else {
                        this.profile.experience_time = 0;
                    }

                    this.profile.experience = this.profile.experience ? this.profile.experience : '';
                    this.profile.position = this.profile.position ? this.profile.position : '';
                    this.profile.expectations = this.profile.expectations ? this.profile.expectations : '';
                    this.profile.achievement = this.profile.achievement ? this.profile.achievement : '';
                }, response => {
                    this.error = true
                    this.errorMsg = response.error
                })
            },
            updateProfile(event) {
                event.preventDefault();
                let profile = this.profile;
                let english = $('input[name=english_level]:checked', '#updateProfile').val();
                if (english) {
                    this.profile.english_skill = english;
                }
                let selected_working_variants = [];
                $('input[name="employment_options"]:checked').each(function (i) {
                    console.log($(this).val());
                    selected_working_variants[i] = ($(this).val());
                });
                profile.selected_working_variants = selected_working_variants;
                selected_working_variants = [];
                Vue.http.put(
                    'api/profile/update',
                    profile
                ).then(response => {
                    this.error = false;
                    this.showProfile();
                }, response => {
                    this.error = true
                    this.errorMsg = response.error
                })
            },
            addMainTrend: function (val) {
                return this.profile.main_trend = {'name': val};
            },
            addSecondTrend: function (val) {
                return this.profile.second_trend = {'name': val};
            },
            _in_array(what, where) {
                for (var i = 0, length_array = where.length; i < length_array; i++) {
                    if (what == where[i].id) {
                        return true;
                    }
                }
                return false;
            }
        },
        mounted: function () {
            this.showProfile();
        },
        components: {
            vueSlider,
            Multiselect
        }
    }
</script>