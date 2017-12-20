<template>
    <div class="container-fluid">
        <h1 class="page-header">List of Logs</h1>
        <div class="table-responsive">
            <table class="table table-condensed table-hover table-stats">
                <thead>
                <tr>
                    <th v-for="(header, key) in logs.headers" :class="key == 'date' ? 'text-left' : 'text-center'">
                        <span v-if="key == 'date'" class="label label-info">{{ header }}</span>
                        <span v-else v-html="logs.icons[key]" :class="'level level-'+key"></span>
                    </th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="logs.count" v-for="(date, row) in logs.rows">
                    <td v-for="(value, key) in logs.rows[date.date]"
                        :class="key == 'date' ? 'text-left' : 'text-center'">
                        <span v-if="key == 'date'" class="label label-primary">{{ date.date }}</span>
                        <span v-else-if="value == 0" class="level level-empty">{{ value }}</span>
                        <router-link v-else :to="{name: 'logsShowDateKey', params: {date: date.date, key: key}}">
                            <span :class="'level level-' + key">{{ value }}</span>
                        </router-link>
                    </td>
                    <td class="text-right">
                        <router-link :to="{name: 'logsShowDate', params: {date: date.date}}" class="btn btn-xs btn-info">
                            <i class="fa fa-search"></i>
                        </router-link>

                        <a :href="'/api/backlogs/' + date.date + '/download'" class="btn btn-xs btn-success">
                            <i class="fa fa-download"></i>
                        </a>
                        <a href="#delete-log-modal" class="btn btn-xs btn-danger" :data-log-date="date.date">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
                <tr v-else>
                    <td colspan="11" class="text-center">
                        <span class="label label-default">{{ logs.empty_logs }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <pagination class="pull-left" v-bind:pagination="pagination"
                    v-on:click.native="getAllLogs(pagination.current_page)"
                    :offset="offset"
        ></pagination>
    </div>
</template>
<script>
    import Pagination from '../System/pagination.vue';

    export default {
        data() {
            return {
                logs: [],
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
            getAllLogs(page) {
                let url = window.BASE_URL + '/api/backlogs/logs';

                if (page) {
                    url += '?page=' + page;
                }
                Vue.http.get(url)
                    .then(response => {
                        this.error = false;
                        this.logs = response.data;
                        this.pagination = response.data.rows;
                        this.logs.rows = response.data.rows.data;
                    }, response => {
                        this.error = true;
                        this.errorMsg = response.error;
                    })
            },
            dLink(event) {
                let date = $(event.target).attr('data-date');
                return window.BASE_URL + '/api/backlogs/' + date;
            }
        },
        mounted: function () {
            let page = this.$route.query.page ? this.$route.query.page : this.pagination.current_page;
            this.getAllLogs(page);
        },
        components: {
            Pagination
        }
    }
</script>
