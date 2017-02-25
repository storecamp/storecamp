$ ->
  'use strict'

  ### ChartJS
  # -------
  # Here we will create a few charts using ChartJS
  ###

  #-----------------------
  #- MONTHLY SALES CHART -
  #-----------------------
  # Get context with jQuery - using jQuery's .get() method.
  if($('#salesChart').length > 0)
    salesChartCanvas = $('#salesChart').get(0).getContext('2d')
    salesChart = new Chart(salesChartCanvas)
  # This will get the first returned node in the jQuery collection.
    salesChartData =
      labels: [
        'January'
        'February'
        'March'
        'April'
        'May'
        'June'
        'July'
      ]
      datasets: [
        {
          label: 'Electronics'
          fillColor: 'rgb(210, 214, 222)'
          strokeColor: 'rgb(210, 214, 222)'
          pointColor: 'rgb(210, 214, 222)'
          pointStrokeColor: '#c1c7d1'
          pointHighlightFill: '#fff'
          pointHighlightStroke: 'rgb(220,220,220)'
          data: [
            65
            59
            80
            81
            56
            55
            40
          ]
        }
        {
          label: 'Digital Goods'
          fillColor: 'rgba(60,141,188,0.9)'
          strokeColor: 'rgba(60,141,188,0.8)'
          pointColor: '#3b8bba'
          pointStrokeColor: 'rgba(60,141,188,1)'
          pointHighlightFill: '#fff'
          pointHighlightStroke: 'rgba(60,141,188,1)'
          data: [
            28
            48
            40
            19
            86
            27
            90
          ]
        }
      ]
    salesChartOptions =
      showScale: true
      scaleShowGridLines: false
      scaleGridLineColor: 'rgba(0,0,0,.05)'
      scaleGridLineWidth: 1
      scaleShowHorizontalLines: true
      scaleShowVerticalLines: true
      bezierCurve: true
      bezierCurveTension: 0.3
      pointDot: false
      pointDotRadius: 4
      pointDotStrokeWidth: 1
      pointHitDetectionRadius: 20
      datasetStroke: true
      datasetStrokeWidth: 2
      datasetFill: true
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%=datasets[i].label%></li><%}%></ul>'
      maintainAspectRatio: true
      responsive: true
    #Create the line chart
    salesChart.Line salesChartData, salesChartOptions
    #---------------------------
    #- END MONTHLY SALES CHART -
    #---------------------------
    #-------------
    #- PIE CHART -
    #-------------
    # Get context with jQuery - using jQuery's .get() method.
    pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    pieChart = new Chart(pieChartCanvas)
    PieData = [
      {
        value: 700
        color: '#f56954'
        highlight: '#f56954'
        label: 'Chrome'
      }
      {
        value: 500
        color: '#00a65a'
        highlight: '#00a65a'
        label: 'IE'
      }
      {
        value: 400
        color: '#f39c12'
        highlight: '#f39c12'
        label: 'FireFox'
      }
      {
        value: 600
        color: '#00c0ef'
        highlight: '#00c0ef'
        label: 'Safari'
      }
      {
        value: 300
        color: '#3c8dbc'
        highlight: '#3c8dbc'
        label: 'Opera'
      }
      {
        value: 100
        color: '#d2d6de'
        highlight: '#d2d6de'
        label: 'Navigator'
      }
    ]
    pieOptions =
      segmentShowStroke: true
      segmentStrokeColor: '#fff'
      segmentStrokeWidth: 1
      percentageInnerCutout: 50
      animationSteps: 100
      animationEasing: 'easeOutBounce'
      animateRotate: true
      animateScale: false
      responsive: true
      maintainAspectRatio: false
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
      tooltipTemplate: '<%=value %> <%=label%> users'
    #Create pie or douhnut chart
    # You can switch between pie and douhnut using the method below.
    pieChart.Doughnut PieData, pieOptions
    #-----------------
    #- END PIE CHART -
    #-----------------

    ### jVector Maps
    # ------------
    # Create a world map with markers
    ###

    $('#world-map-markers').vectorMap
      map: 'world_mill_en'
      normalizeFunction: 'polynomial'
      hoverOpacity: 0.7
      hoverColor: false
      backgroundColor: 'transparent'
      regionStyle:
        initial:
          fill: 'rgba(210, 214, 222, 1)'
          'fill-opacity': 1
          stroke: 'none'
          'stroke-width': 0
          'stroke-opacity': 1
        hover:
          'fill-opacity': 0.7
          cursor: 'pointer'
        selected: fill: 'yellow'
        selectedHover: {}
      markerStyle: initial:
        fill: '#00a65a'
        stroke: '#111'
      markers: [
        {
          latLng: [
            41.90
            12.45
          ]
          name: 'Vatican City'
        }
        {
          latLng: [
            43.73
            7.41
          ]
          name: 'Monaco'
        }
        {
          latLng: [
            -0.52
            166.93
          ]
          name: 'Nauru'
        }
        {
          latLng: [
            -8.51
            179.21
          ]
          name: 'Tuvalu'
        }
        {
          latLng: [
            43.93
            12.46
          ]
          name: 'San Marino'
        }
        {
          latLng: [
            47.14
            9.52
          ]
          name: 'Liechtenstein'
        }
        {
          latLng: [
            7.11
            171.06
          ]
          name: 'Marshall Islands'
        }
        {
          latLng: [
            17.3
            -62.73
          ]
          name: 'Saint Kitts and Nevis'
        }
        {
          latLng: [
            3.2
            73.22
          ]
          name: 'Maldives'
        }
        {
          latLng: [
            35.88
            14.5
          ]
          name: 'Malta'
        }
        {
          latLng: [
            12.05
            -61.75
          ]
          name: 'Grenada'
        }
        {
          latLng: [
            13.16
            -61.23
          ]
          name: 'Saint Vincent and the Grenadines'
        }
        {
          latLng: [
            13.16
            -59.55
          ]
          name: 'Barbados'
        }
        {
          latLng: [
            17.11
            -61.85
          ]
          name: 'Antigua and Barbuda'
        }
        {
          latLng: [
            -4.61
            55.45
          ]
          name: 'Seychelles'
        }
        {
          latLng: [
            7.35
            134.46
          ]
          name: 'Palau'
        }
        {
          latLng: [
            42.5
            1.51
          ]
          name: 'Andorra'
        }
        {
          latLng: [
            14.01
            -60.98
          ]
          name: 'Saint Lucia'
        }
        {
          latLng: [
            6.91
            158.18
          ]
          name: 'Federated States of Micronesia'
        }
        {
          latLng: [
            1.3
            103.8
          ]
          name: 'Singapore'
        }
        {
          latLng: [
            1.46
            173.03
          ]
          name: 'Kiribati'
        }
        {
          latLng: [
            -21.13
            -175.2
          ]
          name: 'Tonga'
        }
        {
          latLng: [
            15.3
            -61.38
          ]
          name: 'Dominica'
        }
        {
          latLng: [
            -20.2
            57.5
          ]
          name: 'Mauritius'
        }
        {
          latLng: [
            26.02
            50.55
          ]
          name: 'Bahrain'
        }
        {
          latLng: [
            0.33
            6.73
          ]
          name: 'São Tomé and Príncipe'
        }
      ]

    ### SPARKLINE CHARTS
    # ----------------
    # Create a inline charts with spark line
    ###

    #-----------------
    #- SPARKLINE BAR -
    #-----------------
    $('.sparkbar').each ->
      $this = $(this)
      $this.sparkline 'html',
        type: 'bar'
        height: if $this.data('height') then $this.data('height') else '30'
        barColor: $this.data('color')
      return
    #-----------------
    #- SPARKLINE PIE -
    #-----------------
    $('.sparkpie').each ->
      $this = $(this)
      $this.sparkline 'html',
        type: 'pie'
        height: if $this.data('height') then $this.data('height') else '90'
        sliceColors: $this.data('color')
      return
    #------------------
    #- SPARKLINE LINE -
    #------------------
    $('.sparkline').each ->
      $this = $(this)
      $this.sparkline 'html',
        type: 'line'
        height: if $this.data('height') then $this.data('height') else '90'
        width: '100%'
        lineColor: $this.data('linecolor')
        fillColor: $this.data('fillcolor')
        spotColor: $this.data('spotcolor')
      return
    return
  # ---
  else
      salesChartCanvas = null
      salesChart = null

