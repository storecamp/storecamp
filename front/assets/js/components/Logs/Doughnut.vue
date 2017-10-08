<script>
    // Load complete module with all charts
    import VueCharts from 'vue-chartjs'

    export default VueCharts.Doughnut.extend({
        mixins: [VueCharts.mixins.reactiveProp],
        props: ['chartData', 'options'],
        mounted () {
            this.renderChart(this.chartData, this.options)
        }
    })
</script>