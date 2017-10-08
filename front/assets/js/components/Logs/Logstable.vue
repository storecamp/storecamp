<template>
    <div class="table-responsive">
        <table id="entries" style="word-break: break-all;" class="table table-condensed">
            <thead>
            <tr>
                <th>ENV</th>
                <th style="width: 120px;">Level</th>
                <th style="width: 65px;">Time</th>
                <th>Header</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <span class="label label-env">{{ envs[num] }}</span>
                </td>
                <td>
            <span :class="'level level-'+entry.level">
                {{ entry.level }}
            </span>
                </td>
                <td>
            <span class="label label-default">
                {{ entry.datetime }}
            </span>
                </td>
                <td>
                    <p>{{ entry.header }}</p>
                </td>
                <td class="text-right">
                    <a v-if="entry.stack" class="btn btn-xs btn-default" role="button"
                       data-toggle="collapse"
                       :href="'#log-stack-'+num" aria-expanded="false"
                       :aria-controls="'log-stack-'+num">
                        <i class="fa fa-toggle-on"></i> Stack
                    </a>
                </td>
            </tr>
            <td v-if="entry.stack" colspan="5" class="stack">
                <div v-html="entry.stack" class="stack-content collapse"
                     :id="'log-stack-'+num">
                </div>
            </td>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props: ['entry', 'num', 'envs']
    }
</script>