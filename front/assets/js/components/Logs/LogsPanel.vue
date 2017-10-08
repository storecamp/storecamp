<template>
    <div class="col-md-2 logs-panel">
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
                    <router-link v-else :to="{name: 'logsShowDateKey', params: {date: log.date, key: item.name.toLowerCase()}}" :class="'list-group-item '+level" >
                        <span v-html="item['icon']+' '+item['name']" :class="'level level-'+level"></span>
                        <span :class="'badge level-'+level">
                                    {{ item['count'] }}
                                </span>
                    </router-link>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['log']
    }
</script>

<style lang="scss">
    .logs-panel {
        .all.router-link-active {
            background-color: #8A8A8A;
        }

        .emergency.router-link-active {
            background-color: #B71C1C;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .alert.router-link-active {
            background-color: #D32F2F;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .critical.router-link-active {
            background-color: #F44336;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .error.router-link-active {
            background-color: #FF5722;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .warning.router-link-active {
            background-color: #FF9100;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .notice.router-link-active {
            background-color: #4CAF50;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .info.router-link-active {
            background-color: #1976D2;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .debug.router-link-active {
            background-color: #90CAF9;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .empty.router-link-active {
            background-color: #D1D1D1;
            .badge, .level  {
                background: #8A8A8A;
            }
        }

        .env.router-link-active {
            background-color: #6A1B9A;
            .badge, .level  {
                background: #8A8A8A;
            }
        }
    }
</style>