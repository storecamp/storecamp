<template>
    <div class="container-fluid">
        Log File Messages count
        <span class="pull-right-container">
            <small class="label bg-blue text-sm">{{ log.count }}</small>
        </span>
        <h1 class="page-header">Log [{{ log.date }}]</h1>

        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-flag"></i> Levels</div>
                    <ul class="list-group">
                        <div v-for="(item, level) in log.menu">
                            <a v-if="item['count'] === 0" href="#" class="list-group-item disabled">
                                <span v-html="item['icon']+' '+item['name']"></span>
                                <span class="badge">
                                {{ item['count'] }}
                            </span>
                            </a>
                            <router-link v-else :to="{name: 'logsShow', query: {date: log.date, key: item.name.toLowerCase()}}" v-on:click="reloadPage" :class="'list-group-item '+level">
                                <span v-html="item['icon']+' '+item['name']" :class="'level level-'+level"></span>
                                <span :class="'badge level-'+level">
                                    {{ item['count'] }}
                                </span>
                            </router-link>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Log info :

                        <div class="group-btns pull-right">
                            <a :href="'/api/backlogs/' + log.date + '/download'" class="btn btn-xs btn-success">
                                <i class="fa fa-download"></i> DOWNLOAD
                            </a>
                            <a href="#delete-log-modal" class="btn btn-xs btn-danger" data-toggle="modal">
                                <i class="fa fa-trash-o"></i> DELETE
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td>File path :</td>
                                <td colspan="5">{{ log.path }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Log entries :</td>
                                <td>
                                    <span class="label label-primary">{{ log.count }}</span>
                                </td>
                                <td>Size :</td>
                                <td>
                                    <span class="label label-primary">{{ log.size }}</span>
                                </td>
                                <td>Created at :</td>
                                <td>
                                    <span class="label label-primary">{{ log.createdAt }}</span>
                                </td>
                                <td>Updated at :</td>
                                <td>
                                    <span class="label label-primary">{{ log.updatedAt }}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <logstable v-for="(entry, num) in log.entries" :envs="log.envs" :num="num" :entry="entry" :log="log" :key="num"></logstable>
                </div>
            </div>
        </div>
    <pagination class="pull-right" v-bind:pagination="pagination"
                v-on:click.native="getAllLogs(pagination.current_page)"
                :offset="offset"
    ></pagination>
    </div>
</template>
<script>
    import Pagination from '../System/pagination.vue';
    import Logstable from './Logstable.vue';

    export default {
        data() {
            return {
                log: [],
                pagination: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 4,
                count: 0,
                error: false,
                errorMsg: ''
            }
        },
        methods: {
            getAllLogs(page, date, level) {
                let url = window.BASE_URL + '/api/backlogs';
                if (date) {
                    url += '/' + date;
                }
                if (level) {
                    url += '/' + level;
                }
                if (page) {
                    url += '?page=' + page;
                }
                Vue.http.get(url)
                    .then(response => {
                        this.error = false;
                        this.log = response.data;
                        this.pagination = response.data.entries;
                        this.log.entries = response.data.entries.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            dLink(event) {
                let date = $(event.target).attr('data-date');
                return window.BASE_URL + '/api/backlogs/' + date;
            },
            reloadPage() {
                location.reload();
            }
        },
        mounted: function () {
            let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
            let date = this.$route.query.date ? this.$route.query.date : false;
            let level = this.$route.query.key ? this.$route.query.key : false;
            if (!date) {
                this.$router.push('logs');
                return;
            }
            this.getAllLogs(page, date, level);
        },
        components: {
            Pagination,
            Logstable
        }
    }
</script>
<style>

    html {
        position: relative;
        min-height: 100%;
    }

    body {
        /* Margin bottom by footer height */
        /*margin-bottom: 50px;*/
        /*font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, sans-serif;*/
        /*font-weight: 600;*/
    }

    h1, h2, h3 {
        font-family: 'Montserrat', 'Helvetica Neue', Helvetica, sans-serif;
    }

    .sub-header {
        padding-bottom: 10px;
        border-bottom: 1px solid #EEE;
    }

    .navbar-inverse {
        background-color: #1a237e;
        border-color: #1a237e;
    }

    .navbar-inverse .navbar-nav > .active > a,
    .navbar-inverse .navbar-nav > .active > a:focus,
    .navbar-inverse .navbar-nav > .active > a:hover {
        background-color: #3949ab;
    }

    .navbar-inverse .navbar-brand {
        color: #c5cae9;
    }

    .navbar-inverse .navbar-nav > li > a {
        color: #c5cae9;
    }

    .navbar-fixed-top {
        border: 0;
    }

    .main {
        padding: 20px;
    }

    .main .page-header {
        margin-top: 0;
    }

    footer.main-footer {
        position: absolute;
        padding: 10px 0;
        bottom: 0;
        width: 100%;
        background-color: #e8eaf6;
        font-weight: 600;
    }

    footer.main-footer p {
        margin: 0;
    }

    footer.main-footer i.fa.fa-heart {
        color: #C62828;
    }

    .pagination {
        margin: 0;
    }

    .pagination > li > a,
    .pagination > li > span {
        padding: 4px 10px;
    }

    .table-condensed > tbody > tr > td.stack,
    .table-condensed > tfoot > tr > td.stack,
    .table-condensed > thead > tr > td.stack {
        padding: 0;
        border-top: none;
    }

    .stack-content {
        padding: 8px;
        background-color: #F6F6F6;
        border-top: 1px solid #D1D1D1;
        color: #AE0E0E;
        font-family: consolas, sans-serif;
        font-size: 12px;
    }

    .info-box.level {
        display: block;
        padding: 0;
        margin-bottom: 15px;
        min-height: 70px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        border-radius: 2px;
    }

    .info-box.level .info-box-text,
    .info-box.level .info-box-number,
    .info-box.level .info-box-icon > i {
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
    }

    .info-box.level .info-box-text {
        display: block;
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .info-box.level .info-box-content {
        padding: 5px 10px;
        margin-left: 70px;
    }

    .info-box.level .info-box-number {
        display: block;
        font-weight: bold;
        font-size: 18px;
    }

    .info-box.level .info-box-icon {
        border-radius: 2px 0 0 2px;
        display: block;
        float: left;
        height: 70px;
        width: 70px;
        text-align: center;
        font-size: 40px;
        line-height: 70px;
        background: rgba(0, 0, 0, 0.2);
    }

    .info-box.level .progress {
        background: rgba(0, 0, 0, 0.2);
        margin: 5px -10px 5px -10px;
        height: 2px;
    }

    .info-box.level .progress .progress-bar {
        background: #fff;
    }

    .info-box.level-empty {
        opacity: .6;
        -webkit-filter: grayscale(1);
        -moz-filter: grayscale(1);
        -ms-filter: grayscale(1);
        filter: grayscale(1);
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        -webkit-transition-property: -webkit-filter, opacity;
        -moz-transition-property: -moz-filter, opacity;
        -o-transition-property: filter, opacity;
        transition-property: -webkit-filter, -moz-filter, -o-filter, filter, opacity;
    }

    .info-box.level-empty:hover {
        opacity: 1;
        -webkit-filter: grayscale(0);
        -moz-filter: grayscale(0);
        -ms-filter: grayscale(0);
        filter: grayscale(0);
    }

    .level {
        padding: 2px 6px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        border-radius: 2px;
        font-size: .9em;
        font-weight: 600;
    }

    .badge.level-all,
    .badge.level-emergency,
    .badge.level-alert,
    .badge.level-critical,
    .badge.level-error,
    .badge.level-warning,
    .badge.level-notice,
    .badge.level-info,
    .badge.level-debug,
    .level, .level i,
    .info-box.level-all,
    .info-box.level-emergency,
    .info-box.level-alert,
    .info-box.level-critical,
    .info-box.level-error,
    .info-box.level-warning,
    .info-box.level-notice,
    .info-box.level-info,
    .info-box.level-debug {
        color: #FFF;
    }

    .label-env {
        font-size: .85em;
    }

    .badge.level-all, .level.level-all, .info-box.level-all {
        background-color: #8A8A8A;
    }

    .badge.level-emergency, .level.level-emergency, .info-box.level-emergency {
        background-color: #B71C1C;
    }

    .badge.level-alert, .level.level-alert, .info-box.level-alert {
        background-color: #D32F2F;
    }

    .badge.level-critical, .level.level-critical, .info-box.level-critical {
        background-color: #F44336;
    }

    .badge.level-error, .level.level-error, .info-box.level-error {
        background-color: #FF5722;
    }

    .badge.level-warning, .level.level-warning, .info-box.level-warning {
        background-color: #FF9100;
    }

    .badge.level-notice, .level.level-notice, .info-box.level-notice {
        background-color: #4CAF50;
    }

    .badge.level-info, .level.level-info, .info-box.level-info {
        background-color: #1976D2;
    }

    .badge.level-debug, .level.level-debug, .info-box.level-debug {
        background-color: #90CAF9;
    }

    .badge.level-empty, .level.level-empty {
        background-color: #D1D1D1;
    }

    .badge.label-env, .label.label-env {
        background-color: #6A1B9A;
    }
</style>
