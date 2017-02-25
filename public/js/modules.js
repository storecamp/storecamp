(function() {
  $(function() {
    'use strict';

    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    var PieData, pieChart, pieChartCanvas, pieOptions, salesChart, salesChartCanvas, salesChartData, salesChartOptions;
    if ($('#salesChart').length > 0) {
      salesChartCanvas = $('#salesChart').get(0).getContext('2d');
      salesChart = new Chart(salesChartCanvas);
      salesChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label: 'Electronics',
            fillColor: 'rgb(210, 214, 222)',
            strokeColor: 'rgb(210, 214, 222)',
            pointColor: 'rgb(210, 214, 222)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgb(220,220,220)',
            data: [65, 59, 80, 81, 56, 55, 40]
          }, {
            label: 'Digital Goods',
            fillColor: 'rgba(60,141,188,0.9)',
            strokeColor: 'rgba(60,141,188,0.8)',
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [28, 48, 40, 19, 86, 27, 90]
          }
        ]
      };
      salesChartOptions = {
        showScale: true,
        scaleShowGridLines: false,
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        bezierCurve: true,
        bezierCurveTension: 0.3,
        pointDot: false,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%=datasets[i].label%></li><%}%></ul>',
        maintainAspectRatio: true,
        responsive: true
      };
      salesChart.Line(salesChartData, salesChartOptions);
      pieChartCanvas = $('#pieChart').get(0).getContext('2d');
      pieChart = new Chart(pieChartCanvas);
      PieData = [
        {
          value: 700,
          color: '#f56954',
          highlight: '#f56954',
          label: 'Chrome'
        }, {
          value: 500,
          color: '#00a65a',
          highlight: '#00a65a',
          label: 'IE'
        }, {
          value: 400,
          color: '#f39c12',
          highlight: '#f39c12',
          label: 'FireFox'
        }, {
          value: 600,
          color: '#00c0ef',
          highlight: '#00c0ef',
          label: 'Safari'
        }, {
          value: 300,
          color: '#3c8dbc',
          highlight: '#3c8dbc',
          label: 'Opera'
        }, {
          value: 100,
          color: '#d2d6de',
          highlight: '#d2d6de',
          label: 'Navigator'
        }
      ];
      pieOptions = {
        segmentShowStroke: true,
        segmentStrokeColor: '#fff',
        segmentStrokeWidth: 1,
        percentageInnerCutout: 50,
        animationSteps: 100,
        animationEasing: 'easeOutBounce',
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: false,
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
        tooltipTemplate: '<%=value %> <%=label%> users'
      };
      pieChart.Doughnut(PieData, pieOptions);

      /* jVector Maps
       * ------------
       * Create a world map with markers
       */
      $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: 'transparent',
        regionStyle: {
          initial: {
            fill: 'rgba(210, 214, 222, 1)',
            'fill-opacity': 1,
            stroke: 'none',
            'stroke-width': 0,
            'stroke-opacity': 1
          },
          hover: {
            'fill-opacity': 0.7,
            cursor: 'pointer'
          },
          selected: {
            fill: 'yellow'
          },
          selectedHover: {}
        },
        markerStyle: {
          initial: {
            fill: '#00a65a',
            stroke: '#111'
          }
        },
        markers: [
          {
            latLng: [41.90, 12.45],
            name: 'Vatican City'
          }, {
            latLng: [43.73, 7.41],
            name: 'Monaco'
          }, {
            latLng: [-0.52, 166.93],
            name: 'Nauru'
          }, {
            latLng: [-8.51, 179.21],
            name: 'Tuvalu'
          }, {
            latLng: [43.93, 12.46],
            name: 'San Marino'
          }, {
            latLng: [47.14, 9.52],
            name: 'Liechtenstein'
          }, {
            latLng: [7.11, 171.06],
            name: 'Marshall Islands'
          }, {
            latLng: [17.3, -62.73],
            name: 'Saint Kitts and Nevis'
          }, {
            latLng: [3.2, 73.22],
            name: 'Maldives'
          }, {
            latLng: [35.88, 14.5],
            name: 'Malta'
          }, {
            latLng: [12.05, -61.75],
            name: 'Grenada'
          }, {
            latLng: [13.16, -61.23],
            name: 'Saint Vincent and the Grenadines'
          }, {
            latLng: [13.16, -59.55],
            name: 'Barbados'
          }, {
            latLng: [17.11, -61.85],
            name: 'Antigua and Barbuda'
          }, {
            latLng: [-4.61, 55.45],
            name: 'Seychelles'
          }, {
            latLng: [7.35, 134.46],
            name: 'Palau'
          }, {
            latLng: [42.5, 1.51],
            name: 'Andorra'
          }, {
            latLng: [14.01, -60.98],
            name: 'Saint Lucia'
          }, {
            latLng: [6.91, 158.18],
            name: 'Federated States of Micronesia'
          }, {
            latLng: [1.3, 103.8],
            name: 'Singapore'
          }, {
            latLng: [1.46, 173.03],
            name: 'Kiribati'
          }, {
            latLng: [-21.13, -175.2],
            name: 'Tonga'
          }, {
            latLng: [15.3, -61.38],
            name: 'Dominica'
          }, {
            latLng: [-20.2, 57.5],
            name: 'Mauritius'
          }, {
            latLng: [26.02, 50.55],
            name: 'Bahrain'
          }, {
            latLng: [0.33, 6.73],
            name: 'São Tomé and Príncipe'
          }
        ]
      });

      /* SPARKLINE CHARTS
       * ----------------
       * Create a inline charts with spark line
       */
      $('.sparkbar').each(function() {
        var $this;
        $this = $(this);
        $this.sparkline('html', {
          type: 'bar',
          height: $this.data('height') ? $this.data('height') : '30',
          barColor: $this.data('color')
        });
      });
      $('.sparkpie').each(function() {
        var $this;
        $this = $(this);
        $this.sparkline('html', {
          type: 'pie',
          height: $this.data('height') ? $this.data('height') : '90',
          sliceColors: $this.data('color')
        });
      });
      $('.sparkline').each(function() {
        var $this;
        $this = $(this);
        $this.sparkline('html', {
          type: 'line',
          height: $this.data('height') ? $this.data('height') : '90',
          width: '100%',
          lineColor: $this.data('linecolor'),
          fillColor: $this.data('fillcolor'),
          spotColor: $this.data('spotcolor')
        });
      });
    } else {
      salesChartCanvas = null;
      return salesChart = null;
    }
  });

}).call(this);

(function() {
  $.StoreCamp.dropzone = {
    paramName: 'file',
    maxFilesize: 1024,
    acceptedFiles: '.mp4,.mkv,.avi, image/*,application/pdf,.psd,.docx,.doc,.aac,.ogg,.oga,.mp3,.wav, .zip',
    accept: function(file, done) {
      done();
    },
    init: function() {
      this.on('success', function(file, messageOrDataFromServer, myEvent) {
        var folderBody, folderBodyUrl;
        folderBody = $('#folder-body');
        folderBodyUrl = folderBody.data('folder-url');
        return $.ajax({
          url: folderBodyUrl,
          type: 'GET',
          success: function(data) {
            var players;
            folderBody.html(data);
            players = plyr.setup();
            $.StoreCamp.media.reindex($('.media-plyr-item'), players);
          },
          error: function(xhr, textStatus, errorThrown) {
            $.StoreCamp.templates.alert('danger', xhr.statusText, 'Sorry error appeared');
            console.error(xhr);
          }
        }, false);
      });
    }
  };

  Dropzone.options.myAwesomeDropzone = $.StoreCamp.dropzone;

  Dropzone.options.myAwesomeDropzoneBody = $.StoreCamp.dropzone;

}).call(this);

(function() {
  var EventEmitter,
    slice = [].slice;

  EventEmitter = (function() {
    function EventEmitter() {
      this.events = {};
    }

    EventEmitter.prototype.emit = function() {
      var args, event, i, len, listener, ref;
      event = arguments[0], args = 2 <= arguments.length ? slice.call(arguments, 1) : [];
      if (!this.events[event]) {
        return false;
      }
      ref = this.events[event];
      for (i = 0, len = ref.length; i < len; i++) {
        listener = ref[i];
        listener.apply(null, args);
      }
      return true;
    };

    EventEmitter.prototype.addListener = function(event, listener) {
      var base;
      this.emit('newListener', event, listener);
      ((base = this.events)[event] != null ? base[event] : base[event] = []).push(listener);
      return this;
    };

    EventEmitter.prototype.on = EventEmitter.prototype.addListener;

    EventEmitter.prototype.once = function(event, listener) {
      var fn;
      fn = (function(_this) {
        return function() {
          _this.removeListener(event, fn);
          return listener.apply(null, arguments);
        };
      })(this);
      this.on(event, fn);
      return this;
    };

    EventEmitter.prototype.removeListener = function(event, listener) {
      var l;
      if (!this.events[event]) {
        return this;
      }
      this.events[event] = (function() {
        var i, len, ref, results;
        ref = this.events[event];
        results = [];
        for (i = 0, len = ref.length; i < len; i++) {
          l = ref[i];
          if (l !== listener) {
            results.push(l);
          }
        }
        return results;
      }).call(this);
      return this;
    };

    EventEmitter.prototype.removeAllListeners = function(event) {
      delete this.events[event];
      return this;
    };

    return EventEmitter;

  })();

  $.StoreCamp.eventEmitter = function() {
    return new EventEmitter();
  };

}).call(this);

(function() {
  var ref, ref1, ref2, ref3, ref4, ref5;

  $.StoreCamp.fileLinker = {
    emitter: $.StoreCamp.eventEmitter(),
    options: {
      typesAvailable: [''],
      fileLinker: $('.file-linker'),
      fileLinkerSelectedBlock: $('.selected-block'),
      selectedItemsClassPath: ".selected-block .selected-item",
      requestUrl: (ref = $('.file-linker').attr('data-requestUrl')) != null ? ref : APP_URL + "/admin/media/file_linker/local",
      fileTypes: (ref1 = $('.file-linker').attr('data-file-types')) != null ? ref1 : "image, document, audio, video, archive",
      fileMultiple: (ref2 = $('.file-linker').attr('data-multiple')) != null ? ref2 : "false",
      disk: (ref3 = $('.file-linker').attr('data-disk')) != null ? ref3 : 'local',
      fileAttachOutputPath: (ref4 = $('.file-linker').attr('data-attach-output-path')) != null ? ref4 : "form .tab-content",
      fileLinkerModal: $('#fileLinker-modal'),
      submitBtn: $('#fileLinker-modal').find('button[type=submit]'),
      modalTitle: $('#fileLinker-modal').find('.modal-title'),
      modalBody: $('#fileLinker-modal').find('.modal-body'),
      preferredTag: (ref5 = $('.file-linker').attr('data-preferred-tag')) != null ? ref5 : "thumbnail",
      inputTemplateClass: "selected-files_input",
      fileBlockTemplate: function(selectorId, content, fileName, href) {
        return "<div data-id='" + selectorId + "' data-href='" + href + "' class='col-xs-4 col-md-3 col-lg-2 selected-item'>" + content + "<strong class='text-muted'>" + fileName + "</strong></div>";
      },
      inputTemplate: function() {
        return "<input type=\"text\" name=\"selected_files\" class='hidden " + this.inputTemplateClass + "'/>";
      }
    },
    activate: function() {
      var _this;
      _this = this;
      return _this.fileSystemEvents();
    },
    fileSystemEvents: function() {
      var _this;
      _this = this;
      _this.options.fileLinkerModal.on('shown.bs.modal', function(event) {
        var fileLinker;
        fileLinker = $(event.relatedTarget);
        $(this).modal('show');
        if ($('#fileLinker-modal .modal-body').is(':empty')) {
          _this.showFiles(_this.options.requestUrl);
        }
      });
    },
    showFiles: function(requestUrl) {
      var _this, _token, dataObject;
      _this = this;
      _token = $('meta[name="csrf-token"]').attr('content');
      dataObject = {
        multiple: _this.options.fileMultiple,
        dataTypes: _this.options.fileTypes,
        _token: _token
      };
      return $.ajax({
        url: requestUrl,
        type: 'POST',
        data: dataObject,
        _method: "post",
        headers: {
          'X-CSRF-TOKEN': _token
        },
        success: function(data) {
          _this.options.modalBody.html(data);
          _this.fileEvents();
          _this.folderEvents([$(".directory-item .select-folder"), $(".navigation-links a")]);
          _this.reindexSelectedFiles();
        },
        error: function(xhr, textStatus, errorThrown) {
          $.StoreCamp.templates.alert('danger', xhr.statusText, 'Sorry error appeared');
          console.error(xhr);
        }
      }, false);
    },
    fileEvents: function() {
      var _this;
      _this = this;
      return $(".files .file-item").on("click", function(event) {
        var btn, fileItemCheckBox, folderBody, selectFileName, selectId, selectUrl;
        event.preventDefault();
        btn = $(this);
        selectId = btn.attr('data-file-id');
        fileItemCheckBox = btn.find('input:checkbox');
        selectUrl = btn.attr('data-href');
        selectFileName = btn.attr('data-file-name');
        folderBody = $('#folder-body');
        _this.selectFile(btn, selectId, fileItemCheckBox, selectFileName, selectUrl);
        return _this.selectedMakeOutput();
      });
    },
    folderEvents: function(selectors) {
      var _this;
      _this = this;
      return selectors.forEach(function(item, i, arr) {
        return item.on("click", function(event) {
          var btn, fileItem, folderDisk, folderId, folderUrl;
          event.preventDefault();
          btn = $(this);
          folderUrl = btn.attr('data-folder-url');
          folderId = btn.attr('data-folder-id');
          folderDisk = btn.attr('data-disk');
          fileItem = btn.closest('.directory-item');
          _this.selectFolder(folderUrl);
        });
      });
    },
    selectFile: function(btn, selectId, fileItemCheckBox, selectFileName, selectUrl) {
      var _this;
      _this = this;
      $('.file-item').find('input:checkbox').iCheck('disable');
      if (_this.options.fileMultiple === "false") {
        if (btn.hasClass('checked')) {
          btn.removeClass('checked');
          fileItemCheckBox.iCheck('uncheck');
          fileItemCheckBox.iCheck('disable');
          $('.file-item').find('input:checkbox').iCheck('uncheck');
          $('.file-item').removeClass('checked');
          _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'remove');
        } else {
          $('.file-item').find('input:checkbox').iCheck('uncheck');
          $('.file-item').removeClass('checked');
          btn.addClass('checked');
          fileItemCheckBox.iCheck('enable');
          fileItemCheckBox.iCheck('check');
          _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'add');
          fileItemCheckBox.iCheck('disable');
        }
      } else {
        if (btn.hasClass('checked')) {
          btn.removeClass('checked');
          fileItemCheckBox.iCheck('uncheck');
          fileItemCheckBox.iCheck('disable');
          _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'remove');
        } else {
          btn.addClass('checked');
          fileItemCheckBox.iCheck('enable');
          fileItemCheckBox.iCheck('check');
          _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'add');
          fileItemCheckBox.iCheck('disable');
        }
      }
      _this.emitter.emit("selectedChanged");
    },
    manageToFileBlock: function(btn, selectFileName, selectId, selectUrl, methodType) {
      var _this;
      _this = this;
      switch (methodType) {
        case "add":
          return _this.fileBlockAddTemplate(btn);
        case "remove":
          return _this.fileBlockRemoveTemplate(btn);
      }
    },
    fileBlockAddTemplate: function(btn) {
      var _this, content, fileName, href, htmlContent, selectorId;
      _this = this;
      selectorId = btn.attr('data-file-id');
      href = btn.attr('data-href');
      content = btn.find(".mailbox-attachment-icon").html();
      fileName = btn.find(".mailbox-attachment-name").html();
      htmlContent = _this.options.fileBlockTemplate(selectorId, content, fileName, href);
      if (_this.options.fileMultiple === "false") {
        $("" + _this.options.selectedItemsClassPath).remove();
        return _this.options.fileLinkerSelectedBlock.append(htmlContent);
      } else {
        return _this.options.fileLinkerSelectedBlock.append(htmlContent);
      }
    },
    reindexSelectedFiles: function() {
      var selectedItems;
      selectedItems = $("" + this.options.selectedItemsClassPath);
      return this._setFileBlockSelectedState(selectedItems);
    },
    fileBlockRemoveTemplate: function(btn) {
      var blockItem;
      blockItem = $(".selected-block [data-id='" + (btn.attr('data-file-id')) + "']");
      return blockItem.remove();
    },
    _setFileBlockSelectedState: function(btn) {
      return btn.each(function(index) {
        var blockItem;
        blockItem = $(".file-item[data-file-id='" + ($(this).attr('data-id')) + "']");
        blockItem.addClass('checked');
        blockItem.find('input:checkbox').iCheck('disable');
        return blockItem.find('input:checkbox').iCheck('check');
      });
    },
    _getFileBlockSelectedIds: function(selector) {
      var items;
      items = [];
      selector.each(function(index) {
        return items[index] = $(this).attr('data-id');
      });
      return $.unique(items);
    },
    selectFolder: function(folderUrl) {
      var _this;
      _this = this;
      return _this.showFiles(folderUrl);
    },
    selectedMakeOutput: function() {
      var _this, generatedBlock, outputBlock;
      _this = this;
      outputBlock = $("" + this.options.fileAttachOutputPath);
      if (outputBlock.length !== 0) {
        generatedBlock = outputBlock.find("." + _this.options.inputTemplateClass);
        if (generatedBlock.length > 0) {
          return generatedBlock.val(this._getFileBlockSelectedIds($("" + this.options.selectedItemsClassPath)));
        } else {
          outputBlock.append(this.options.inputTemplate());
          generatedBlock = outputBlock.find("." + _this.options.inputTemplateClass);
          return generatedBlock.val(this._getFileBlockSelectedIds($("" + this.options.selectedItemsClassPath)));
        }
      }
    }
  };

  $.StoreCamp.fileLinker.activate();

}).call(this);

(function() {
  $.StoreCamp.imageLoad = {
    activate: function() {
      var _this;
      _this = this;
      _this.initiateInstanceImage();
      _this.initiateProfileImage();
    },
    renderInstanceImage: function(file, fileinput, settings) {
      var _this, image, reader;
      _this = this;
      reader = new FileReader;
      image = new Image;
      reader.onload = function(_file) {
        image.src = _file.target.result;
        image.onload = function() {
          var h, n, s, scaleWidth, t, w;
          w = this.width;
          h = this.height;
          t = file.type;
          n = file.name;
          s = ~~(file.size / 1024) / 1024;
          scaleWidth = settings.thumbnail_size;
          $('.p').append('<div class=\'s-12 m-12 l-12 xs-12\'><div class=\'thumbnail\' style=\'background: #ffffff\'><img class="img-responsive" src=\'' + image.src + '\' /><div class=\'caption\' style=\'position: absolute;right: 10px;top:10px;\'> <h4  style=\'background: black;padding: 4px; color: white\'>' + s.toFixed(2) + ' Mb </h4></div></div> </div> ');
          _this.renderLabelFileName(n, 'success');
        };
        image.onerror = function() {
          alert('Invalid file type: ' + file.type);
          _this.renderLabelFileName(file.name, "error");
          fileinput.val(null);
        };
      };
      reader.readAsDataURL(file);
    },
    renderProfileImage: function(file, fileinput, settings) {
      var _this, image, reader;
      _this = this;
      reader = new FileReader;
      image = new Image;
      reader.onload = function(_file) {
        image.src = _file.target.result;
        image.onload = function() {
          var h, n, s, scaleWidth, t, w;
          w = this.width;
          h = this.height;
          t = file.type;
          n = file.name;
          s = ~~(file.size / 1024) / 1024;
          scaleWidth = settings.thumbnail_size;
          $('.profile-img').attr("src", image.src).css({
            position: 'relative'
          });
          _this.renderLabelFileProfile(n, "success");
          _this.downButton("success");
        };
        image.onerror = function() {
          alert('Invalid file type: ' + file.type);
          _this.renderLabelFileProfile(file.name, file.type);
          _this.downButton("error");
          fileinput.val(null);
        };
      };
      reader.readAsDataURL(file);
    },
    downButton: function(message) {
      var _this, button;
      _this = this;
      button = $('#upload-button');
      button.removeClass("text-info");
      button.removeClass("text-danger");
      if (message === "success") {
        button.removeClass("hidden");
        button.addClass("block");
        return button.val('to download press').addClass("text-info");
      } else {
        button.addClass("hidden");
        button.removeClass("block");
        button.addClass("text-danger");
        button.val('wrong file format');
        return button.bind("click", function(event) {
          event.preventDefault();
          return $(this).unbind(event);
        });
      }
    },
    renderLabelFileName: function(filename, message) {
      var _this, fileLabel;
      _this = this;
      fileLabel = $('.filelabel');
      if (fileLabel.find("span.text-info").length > 0 || fileLabel.find("span.text-danger").length > 0) {
        fileLabel.find("span.text-info").remove();
        fileLabel.find("span.text-danger").remove();
      }
      if (message === "success") {
        return $('.filelabel').append($('<span>').addClass('text-info').css({
          'font-size': '100%',
          'display': 'inline-block',
          'font-weight': 'normal',
          'margin-left': '1em',
          'font-style': 'normal'
        }));
      } else {
        return $('.filelabel').append($('<span>').addClass('text-danger').text(" format is not valid").css({
          'font-size': '100%',
          'display': 'inline-block',
          'font-weight': 'normal',
          'margin-left': '1em',
          'font-style': 'normal'
        }));
      }
    },
    renderLabelFileProfile: function(filename, message) {
      var ImgBlock, _this, fileLabel;
      _this = this;
      fileLabel = $('.label');
      ImgBlock = $('.profile-img');
      if (ImgBlock.next("span.text-info").length > 0 || ImgBlock.next("span.text-danger").length > 0) {
        console.log(ImgBlock.next());
        ImgBlock.next("span.text-info").remove();
        ImgBlock.next("span.text-danger").remove();
      }
      if (message === "success") {
        return ImgBlock.after($('<span>').addClass('text-info').css({
          'font-size': '100%',
          'display': 'inline-block',
          'font-weight': 'normal',
          'margin-left': '1em',
          'font-style': 'normal'
        }));
      } else {
        return ImgBlock.after($('<span>').addClass('text-danger').html("<br/><b>format is not valid </b>").css({
          'font-size': '100%',
          'display': 'inline-block',
          'font-weight': 'normal',
          'margin-left': '1em',
          'font-style': 'normal'
        }));
      }
    },
    initiateInstanceImage: function() {
      var _this, fileinput, settings;
      _this = this;
      fileinput = $('#fileupload').attr('accept', 'image/jpeg,image/png,image/gif');
      settings = {
        thumbnail_size: 460,
        thumbnail_bg_color: '#ddd',
        thumbnail_border: '1px solid #fff',
        thumbnail_shadow: '0 0 0px rgba(0, 0, 0, 0.5)',
        label_text: '',
        warning_message: 'Not an image file.',
        warning_text_color: '#f00',
        input_class: 'custom-file-input button button-primary button-block'
      };
      fileinput.change(function(e) {
        var F, i;
        $('.p').html('');
        if (this.disabled) {
          return alert('File upload not supported!');
        }
        F = this.files;
        if (F && F[0]) {
          i = 0;
          while (i < F.length) {
            if (F[i].type.match('image.*')) {
              _this.renderInstanceImage(F[i], fileinput, settings);
            } else {
              _this.renderLabelFileName(F[i].name, "error");
            }
            i++;
          }
        }
      });
    },
    initiateProfileImage: function() {
      var _this, fileElement, settings;
      _this = this;
      fileElement = $('#file').attr('accept', 'image/jpeg,image/png,image/gif');
      settings = {
        thumbnail_size: 100,
        thumbnail_bg_color: '#ddd',
        thumbnail_border: '3px solid white',
        thumbnail_border_radius: '3px',
        label_text: '',
        warning_message: 'Not an image file.',
        warning_text_color: '#f00',
        input_class: 'custom-file-input button button-primary button-block'
      };
      fileElement.change(function(e) {
        var F, i;
        $('.profile-img-block').html('');
        if (this.disabled) {
          return alert('File upload not supported!');
        }
        F = this.files;
        if (F && F[0]) {
          i = 0;
          while (i < F.length) {
            if (F[i].type.match('image.*')) {
              _this.renderProfileImage(F[i], fileElement, settings);
              _this.renderLabelFileProfile(F[i].name, "success");
            } else {
              _this.renderLabelFileProfile(F[i].name, 'error');
              _this.downButton("error");
              fileElement.val(null);
            }
            i++;
          }
        }
      });
    }
  };

  $.StoreCamp.imageLoad.activate();

}).call(this);

(function() {
  $.StoreCamp.media = {
    options: {
      players: plyr.setup(document.querySelectorAll('.js-player'), []),
      playerStatus: $('.play-status'),
      mediaItems: $('.media[data-status="playable"]'),
      directoryItem: $(".directories .directory-item"),
      fileItem: $(".media"),
      infoData: {
        itemUrl: 'data-href',
        itemType: 'data-file-type',
        itemDisk: 'data-disk',
        itemModified: 'data-modified',
        itemName: 'data-filename',
        itemSize: 'data-size',
        itemId: 'data-file-id'
      },
      infoTemplate: function(filename, type, modified, size) {
        return "<div class='text-muted'>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">name: </small>\n  <p class='pull-right'>" + filename + "</p>\n </span>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">type: </small>\n  <p class='pull-right'>" + type + "</p>\n</span>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">modified: </small>\n  <p class='pull-right'>" + modified + "</p>\n</span>\n<span class=\"container\">\n  <small class=\"label pull-left bg-gray\">size: </small>\n  <p class='pull-right'>" + size + "</p>\n</span>\n</div>\n<div class='clearfix'></div>";
      },
      videoTemplate: function(mediaUrl, mediaId, filename, type, modified, size) {
        return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item media-plyr-item\" style=\"margin-bottom: 10px\">\n          <span class=\"mailbox-attachment-icon has-img\">\n              <video class='js-player' controls>\n                   <source src=\"" + mediaUrl + "\"\n                             type=\"video/mp4\">\n                    <source src=\"" + mediaUrl + "\"\n                              type=\"video/webm\">\n               </video>\n          </span>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n</div>";
      },
      audioTemplate: function(mediaUrl, mediaId, filename, type, modified, size) {
        return " <div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item media-plyr-item\" style=\"margin-bottom: 10px\">\n           <audio class='js-player' controls title=\"" + mediaUrl + "\">\n                  <source src=\"" + mediaUrl + "\"\n                          type=\"audio/mp3\">\n                  <source src=\"" + mediaUrl + "\"\n                          type=\"audio/ogg\">\n            </audio>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
      },
      documentTemplate: function(mediaUrl, mediaId, filename, type, modified, size) {
        return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n<div class=\"text-center\">\n    <i class=\"item-icon fa fa-file-word-o fa-2x\"></i>\n</div>\n<div class='clearfix'></div>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
      },
      imageTemplate: function(mediaUrl, mediaId, filename, type, modified, size) {
        return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n<div class=\"pull-left text-muted\">\n  <img src=\"" + mediaUrl + "\" class=\"item-image\" alt=\"" + filename + "\">\n</div>\n<div class='clearfix'></div>\n" + (this.infoTemplate(filename, type, modified, size)) + "\n </div>";
      },
      pdfTemplate: function(mediaUrl, mediaId, filename, type, modified, size) {
        return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n <div class=\"text-center\">\n   <i class=\"item-icon fa fa-file-pdf-o fa-2x\"></i>\n</div>\n <button class='btn btn-block' data-toggle=\"collapse\" data-target=\"#pdf-file\">Preview " + filename + "</button>\n <div id=\"pdf-file\" class=\"collapse\">\n       <a class=\"pdf-file\" href=\"" + mediaUrl + "\">" + filename + "</a>\n </div>\n <div class='clearfix'></div>\n " + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
      },
      archiveTemplate: function(mediaUrl, mediaId, filename, type, modified, size) {
        return "<div id='" + mediaId + "' data-id='" + mediaId + "' class=\"col-xs-12 col-md-12 col-lg-12 file-item\" style=\"margin-bottom: 10px\">\n <div class=\"text-center\">\n   <i class=\"item-icon fa fa-archive fa-2x\"></i>\n</div>\n <div class='clearfix'></div>\n " + (this.infoTemplate(filename, type, modified, size)) + "\n  </div>";
      }
    },
    activate: function() {
      var _this;
      _this = this;
      _this.fileSystemEvents();
      if (_this.options.mediaItems.length > 0) {
        _this.reindex(_this.options.mediaItems, _this.options.players);
      }
    },
    fileSystemEvents: function() {
      var _this;
      _this = this;
      $(".media .info-btn").on("click", function(event) {
        var btn;
        event.preventDefault();
        btn = $(this);
        _this.infoFile(btn);
      });
      $(".media .delete-btn").on("click", function(event) {
        var btn, deleteUrl, fileItem;
        event.preventDefault();
        btn = $(this);
        deleteUrl = btn.attr('href');
        fileItem = btn.closest('.file-item');
        _this.deleteFile(deleteUrl, fileItem);
      });
      _this.options.directoryItem.find(".delete-file").on("click", function(event) {
        var btn, deleteUrl, fileItem;
        event.preventDefault();
        btn = $(this);
        deleteUrl = btn.attr('href');
        fileItem = btn.closest('.directory-item');
        _this.deleteFile(deleteUrl, fileItem);
      });
    },
    reindex: function(mediaItems, players) {
      var _this;
      _this = this;
      return [].forEach.call(mediaItems, function(item, i, arr) {
        $(item).attr('data-media-number', i);
      });
    },
    deleteFile: function(deleteUrl, fileItem) {
      var _this;
      _this = this;
      return $.ajax({
        url: deleteUrl,
        type: 'GET',
        success: function(data) {
          fileItem.remove();
          $.StoreCamp.templates.alert('success', data.title, data.message);
        },
        error: function(xhr, textStatus, errorThrown) {
          $.StoreCamp.templates.alert('danger', xhr.statusText, xhr.responseText);
          console.error(xhr);
        }
      }, false);
    },
    infoFile: function(btn) {
      var _this, fileItem, item, itemDisk, itemId, itemModified, itemName, itemSize, itemType, itemUrl, players;
      _this = this;
      fileItem = btn.closest('.media');
      itemUrl = fileItem.attr("" + _this.options.infoData.itemUrl);
      itemType = fileItem.attr("" + _this.options.infoData.itemType);
      itemDisk = fileItem.attr("" + _this.options.infoData.itemDisk);
      itemModified = fileItem.attr("" + _this.options.infoData.itemModified);
      itemName = fileItem.attr("" + _this.options.infoData.itemName);
      itemSize = fileItem.attr("" + _this.options.infoData.itemSize);
      itemId = fileItem.attr("" + _this.options.infoData.itemId);
      console.log(itemType);
      if (itemType === "video") {
        $.StoreCamp.templates.modal(itemId, _this.options.videoTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName);
      }
      if (itemType === "audio") {
        $.StoreCamp.templates.modal(itemId, _this.options.audioTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName);
      }
      if (itemType === "document") {
        $.StoreCamp.templates.modal(itemId, _this.options.documentTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName);
      }
      if (itemType === "image") {
        $.StoreCamp.templates.modal(itemId, _this.options.imageTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName);
      }
      if (itemType === "pdf") {
        $.StoreCamp.templates.modal(itemId, _this.options.pdfTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName);
        $('.pdf-file').media({
          width: 100 + "%",
          height: 400
        });
      }
      if (itemType === "archive") {
        $.StoreCamp.templates.modal(itemId, _this.options.archiveTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName);
      }
      item = $("#" + itemId);
      if (item.length === 1) {
        players = plyr.setup(item, []);
      }
      return $('#' + itemId).on('hidden.bs.modal', function() {
        if (itemType === "video") {
          _this.pausePlayers(players);
        }
        if (itemType === "audio") {
          _this.pausePlayers(players);
        }
        return $(this).remove();
      });
    },
    pausePlayers: function(players) {
      var _this;
      _this = this;
      return players.forEach(function(player, i, arr) {
        players[i].pause();
        $('.media-plyr-item').removeClass('playing');
      });
    }
  };

  $.StoreCamp.media.activate();

}).call(this);

(function() {
  $.StoreCamp.productReview = {
    options: {
      confirmMessageClass: "confirmMessage",
      confirmMessageBody: "confirmMessageBody",
      confirmMessageBtn: "confirmMessageBtn",
      editMessageClass: "editMessage",
      deleteMessageClass: "deleteMessage",
      commentBlock: "box-comment",
      commentsBlock: "box-comments",
      confirmEditBtn: "confirm-edit"
    },
    activate: function() {
      this.postMessage();
      this.editMessage();
      return this.deleteMessage();
    },
    postMessage: function() {
      var _this;
      _this = this;
      return $("." + this.options.confirmMessageBtn).on("click", function(e) {
        var _token, commentsBlock, dataObject, href, message, messageBlock;
        messageBlock = $("." + _this.options.confirmMessageBody);
        commentsBlock = $("." + _this.options.commentsBlock);
        message = messageBlock.val();
        href = $(e.target).attr("data-href");
        e.preventDefault();
        _token = $('meta[name="csrf-token"]').attr('content');
        dataObject = {
          reply_message: message,
          _token: _token
        };
        return $.ajax({
          url: href,
          type: 'put',
          _method: "put",
          headers: {
            'X-CSRF-TOKEN': _token
          },
          data: dataObject,
          success: function(data) {
            toastr.success('success', "Message Created <br> Everything Ok");
            commentsBlock.append(data.message);
            _this.scrollToBottom();
            messageBlock.val(null);
          },
          error: function(xhr, textStatus, errorThrown) {
            toastr.error('Sorry error appeared', " " + xhr.statusText + " ");
            console.error(xhr);
          }
        }, false);
      });
    },
    editMessage: function() {
      var _this;
      _this = this;
      return $("." + this.options.editMessageClass).on("click", function(e) {
        var href, message, messageBlock, messsageBlockAttr, textArea;
        messsageBlockAttr = $(e.target).attr("data-message-block");
        messageBlock = $("." + _this.options.commentsBlock + " #" + messsageBlockAttr);
        message = messageBlock.text();
        href = $(e.target).attr("data-href");
        textArea = "<textarea id='body-" + messsageBlockAttr + "' name='message' class='form-control' rows='6' style='height: auto;margin-bottom: 10px'>" + message + "</textarea>";
        $.StoreCamp.templates.withAdditionalBtn("Edit Message", null, "btn btn-primary pull-left " + _this.options.confirmEditBtn).modal("review-" + messsageBlockAttr, textArea, "Edit Message");
        return $("." + _this.options.confirmEditBtn).on("click", function(e) {
          var dataObject;
          e.preventDefault();
          console.log(e);
          dataObject = {
            reply_message: $("#body-" + messsageBlockAttr).val()
          };
          return $.ajax({
            url: href,
            type: 'POST',
            data: dataObject,
            _method: "post",
            success: function(data) {
              var genericModal;
              toastr.success('success', "Message Saved <br> Everything Ok");
              genericModal = $("#review-" + messsageBlockAttr);
              genericModal.modal('hide');
              messageBlock.html(data.body);
            },
            error: function(xhr, textStatus, errorThrown) {
              toastr.error('Sorry error appeared', " " + xhr.statusText + " ");
              console.error(xhr);
            }
          }, false);
        });
      });
    },
    deleteMessage: function() {
      var _this;
      _this = this;
      return $("." + this.options.deleteMessageClass).on("click", function(e) {
        var href, message, messageBlock, messsageBlockAttr;
        messsageBlockAttr = $(e.target).attr("data-message-block");
        messageBlock = $("." + _this.options.commentBlock + "[data-message-block='" + messsageBlockAttr + "'");
        message = messageBlock.text();
        href = $(e.target).attr("data-href");
        e.preventDefault();
        console.log(e);
        return $.ajax({
          url: href,
          type: 'POST',
          _method: "post",
          success: function(data) {
            toastr.success('success', "Message Deleted <br> " + data.message);
            messageBlock.remove();
          },
          error: function(xhr, textStatus, errorThrown) {
            toastr.error('Sorry error appeared', " " + xhr.statusText + " ");
            console.error(xhr);
          }
        }, false);
      });
    },
    scrollToBottom: function() {
      var $messageList, _this;
      _this = this;
      $messageList = $("." + _this.options.commentsBlock);
      if ($messageList.length) {
        $messageList.animate({
          scrollTop: $messageList[0].scrollHeight
        }, 500);
      }
    }
  };

  $.StoreCamp.productReview.activate();

}).call(this);

(function() {
  $.StoreCamp.templates = {
    additionalModalButtonRenderState: "",
    options: {
      alertTemplate: function(type, title, message) {
        return "<div class=\"alert alert-" + type + " alert-dismissible\">\n<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>\n<h4>" + title + "</h4>\n" + message + "\n</div>";
      },
      additionalBtnTemplate: function(text, id, className) {
        return "<button type=\"button\" data-dismiss=\"modal\" class=\"btn " + className + "\"  style='margin: auto 10px' id=\"" + id + "\">" + text + "</button>";
      },
      modalTemplate: function(modalId, Message, Header, AriaLabel, Ok, Cancel) {
        return "<div class=\"modal fade\" id=\"" + modalId + "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"" + AriaLabel + "\" aria-hidden=\"true\">\n<div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\">\n<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n<h3>" + Header + "</h3></div>\n<div class=\"modal-body\"><p>" + Message + "</p></div>\n<div class='clearfix'></div> <div class=\"modal-footer\">\n" + $.StoreCamp.templates.additionalModalButtonRenderState + "\n<button class=\"btn btn-default\" data-dismiss=\"modal\">" + Cancel + "</button></div>\n</div></div></div>";
      }
    },
    alert: function(type, title, message) {
      var _this;
      _this = this;
      return $('#alerts').append(_this.options.alertTemplate(type, title, message));
    },
    modal: function(modalId, Message, Header, btntrigger, AriaLabel, Ok, Cancel) {
      var _this, aria, autoLaunch, cancelText, confirmLink, defaultCallback, genericModal, html, message, okText, title, triggerLink;
      _this = this;
      title = Header != null ? Header : 'Please confirm...';
      message = Message != null ? Message : 'Are you sure?';
      okText = Ok != null ? Ok : 'Ok';
      cancelText = Cancel != null ? Cancel : 'Cancel';
      modalId = modalId != null ? modalId : '';
      aria = AriaLabel != null ? AriaLabel : modalId;
      autoLaunch = true;
      triggerLink = btntrigger != null ? btntrigger : $('.modal-auto-Trigger');
      html = _this.options.modalTemplate(modalId, message, title, aria, okText, cancelText);
      defaultCallback = function(target) {
        window.location.hash = target.hash;
      };
      if (modalId === '') {
        modalId = 'genericModal' + parseInt(Date.now());
      }
      html = _this.options.modalTemplate(modalId, message, title, AriaLabel, okText, cancelText);
      $('body').append(html);
      genericModal = $('#' + modalId);
      confirmLink = triggerLink;
      if (autoLaunch) {
        genericModal.modal('show');
        defaultCallback(genericModal);
      }
      confirmLink.on('click', function(e) {
        e.preventDefault();
        if (autoLaunch) {
          genericModal.modal('show');
        }
      });
      $('button[data-dismiss="ok"]', genericModal).on('click', function() {
        genericModal.modal('hide');
        defaultCallback(confirmLink);
      });
    },
    withAdditionalBtn: function(text, id, className) {
      var _this;
      _this = this;
      _this.additionalModalButtonRenderState = _this.options.additionalBtnTemplate(text, id, className);
      return _this;
    }
  };

}).call(this);

//# sourceMappingURL=modules.js.map
