<template>
    <div class="container-fluid">
        Log File Messages count
        <span class="pull-right-container">
            <small class="label bg-blue text-sm">{{ log.count }}</small>
        </span>
        <h1 class="page-header">Log [{{ log.date }}]</h1>
        <div class="row">
            <logs-panel :log="log"></logs-panel>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Log info :
                        <div class="group-btns pull-right">
                            <a :href="'/api/backlogs/' + log.date + '/download'" class="btn btn-xs btn-success">
                                <i class="fa fa-download"></i> DOWNLOAD
                            </a>
                            <a :data-href="'delete-log'+log.date" class="btn btn-xs btn-danger">
                                <i  :data-href="'delete-log'+log.date" class="fa fa-trash-o"></i> DELETE
                            </a>
                            <modal title="Are you sure to delete this log file?" :confirmData="{date: log.date}" :modalId="'delete-log'+log.date" :triggerConfirm="deleteLog" :content="'Log by date ' +log.date + ' is going to be deleted!'"></modal>
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
        <pagination :path="path" class="pull-right" v-bind:pagination="pagination"
                    v-on:click.native="getAllLogsPager(pagination.current_page)"
                    :offset="offset"
        ></pagination>
    </div>
</template>
<script>
    import Pagination from '../System/pagination.vue';
    import Logstable from './Logstable.vue';
    import LogsPanel from './LogsPanel.vue';
    import {router} from '../../routes.js';
    import Modal from '../Partials/Modal.vue';

    export default {
        data() {
            return {
                log: [],
                name: this.$route.name,
                path: this.$route.path,
                routeCounter: 0,
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
            deleteLog(e, data) {
                Vue.http.post(window.BASE_URL + '/api/backlogs/logs/delete', {date: data.date})
                    .then(response => {
                        this.error = false;
                        toastr.success('Log Deleted!');
                        router.push({name: 'logs'});
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.data.msg;
                        if(response.data.msg) {
                            toastr.error('Log Not Deleted! ' + response.data.msg);
                        } else {
                            toastr.error('Log Not Deleted!');
                        }
                    })
            },
            getAllLogsPager(page) {
                let paths = this.path.split('/');
                let level = paths[paths.length - 1];
                let date = paths[paths.length - 2];
                this.getAllLogs(page, date, level);
            },
            dLink(event) {
                let date = $(event.target).attr('data-date');
                return window.BASE_URL + '/api/backlogs/' + date;
            }
        },
        mounted: function () {
            let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
            let date = this.$route.params.date ? this.$route.params.date : false;
            let level = this.$route.params.key ? this.$route.params.key : false;
            if (!date) {
                this.$router.push('logs');
                return;
            }
            this.getAllLogs(page, date, level);
        },
        beforeRouteUpdate (to, from, next) {
//           Fix Vue bug on same component update
            next();
            if(!to.query.page) {
                if(this.path != to.path || this.routeCounter >= 1) {
                    this.pagination = {
                        current_page: 0
                    };
                    let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
                    let date = this.$route.params.date ? this.$route.params.date : false;
                    let level = this.$route.params.key ? this.$route.params.key : false;
                    this.getAllLogs(page, date, level);
                    this.name = this.$route.name;
                    this.path = this.$route.path;
                }
                this.routeCounter++;
            }
        },
        components: {
            Pagination,
            Logstable,
            LogsPanel,
            Modal
        }
    }
</script>
<style lang="scss" scoped>
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
        .navbar-nav > .active > a {
            background-color: #3949ab;
            &:focus, &:hover {
                background-color: #3949ab;
            }
        }
        .navbar-brand, .navbar-nav > li > a {
            color: #c5cae9;
        }
    }

    .navbar-fixed-top {
        border: 0;
    }

    .main {
        padding: 20px;
        .page-header {
            margin-top: 0;
        }
    }

    footer.main-footer {
        position: absolute;
        padding: 10px 0;
        bottom: 0;
        width: 100%;
        background-color: #e8eaf6;
        font-weight: 600;
        p {
            margin: 0;
        }
        i.fa.fa-heart {
            color: #C62828;
        }
    }

    .pagination {
        margin: 0;
        > li > {
            a, span {
                padding: 4px 10px;
            }
        }
    }

    .table-condensed > {
        tbody > tr > td.stack, tfoot > tr > td.stack, thead > tr > td.stack {
            padding: 0;
            border-top: none;
        }
    }

    .stack-content {
        padding: 8px;
        background-color: #F6F6F6;
        border-top: 1px solid #D1D1D1;
        color: #AE0E0E;
        font-family: consolas, sans-serif;
        font-size: 12px;
    }

    .info-box {
        &.level {
            display: block;
            padding: 0;
            margin-bottom: 15px;
            min-height: 70px;
            background: #fff;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            border-radius: 2px;
            .info-box-text, .info-box-number, .info-box-icon > i {
                text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
            }
            .info-box-text {
                display: block;
                font-size: 14px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .info-box-content {
                padding: 5px 10px;
                margin-left: 70px;
            }
            .info-box-number {
                display: block;
                font-weight: bold;
                font-size: 18px;
            }
            .info-box-icon {
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
            .progress {
                background: rgba(0, 0, 0, 0.2);
                margin: 5px -10px 5px -10px;
                height: 2px;
                .progress-bar {
                    background: #fff;
                }
            }
        }
        &.level-empty {
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
            &:hover {
                opacity: 1;
                -webkit-filter: grayscale(0);
                -moz-filter: grayscale(0);
                -ms-filter: grayscale(0);
                filter: grayscale(0);
            }
        }
    }

    .level {
        padding: 2px 6px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        border-radius: 2px;
        font-size: .9em;
        font-weight: 600;
    }

    .badge {
        &.level-all, &.level-emergency, &.level-alert, &.level-critical, &.level-error, &.level-warning, &.level-notice, &.level-info, &.level-debug {
            color: #FFF;
        }
    }

    .level {
        color: #FFF;
        i {
            color: #FFF;
        }
    }

    .info-box {
        &.level-all, &.level-emergency, &.level-alert, &.level-critical, &.level-error, &.level-warning, &.level-notice, &.level-info, &.level-debug {
            color: #FFF;
        }
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

    .stack {
        word-wrap: break-word;
        word-break: break-word;
    }
</style>
