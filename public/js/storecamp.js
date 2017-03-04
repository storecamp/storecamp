
/*! StoreCamp app.js
 * ================
 * Main JS application file for StoreCamp v0. This file
 * should be included in all pages. It controls some layout
 * options and implements exclusive StoreCamp plugins.
 */


/* ----------------------------------
 * - Initialize the StoreCamp Object -
 * ----------------------------------
 * All StoreCamp functions are implemented below.
 */

(function() {
  var _init;

  _init = function() {

    /* Layout
     * ======
     * Fixes the layout height in case min-height fails.
     *
     * @type Object
     * @usage $.StoreCamp.layout.activate()
     *        $.StoreCamp.layout.fix()
     *        $.StoreCamp.layout.fixSidebar()
     */
    $.StoreCamp.layout = {
      activate: function() {
        var _this;
        _this = this;
        _this.fix();
        _this.fixSidebar();
        $(window, '.wrapper').resize(function() {
          _this.fix();
          _this.fixSidebar();
        });
      },
      fix: function() {
        var controlSidebar, neg, postSetWidth, sidebar_height, window_height;
        neg = $('.main-header').outerHeight() + $('.main-footer').outerHeight();
        window_height = $(window).height();
        sidebar_height = $('.sidebar').height();
        if ($('body').hasClass('fixed')) {
          $('.content-wrapper, .right-side').css('min-height', window_height - $('.main-footer').outerHeight());
        } else {
          postSetWidth = void 0;
          if (window_height >= sidebar_height) {
            $('.content-wrapper, .right-side').css('min-height', window_height - neg);
            postSetWidth = window_height - neg;
          } else {
            $('.content-wrapper, .right-side').css('min-height', sidebar_height);
            postSetWidth = sidebar_height;
          }
          controlSidebar = $($.StoreCamp.options.controlSidebarOptions.selector);
          if (typeof controlSidebar !== 'undefined') {
            if (controlSidebar.height() > postSetWidth) {
              $('.content-wrapper, .right-side').css('min-height', controlSidebar.height());
            }
          }
        }
      },
      fixSidebar: function() {
        if (!$('body').hasClass('fixed')) {
          if (typeof $.fn.slimScroll !== 'undefined') {
            $('.sidebar').slimScroll({
              destroy: true
            }).height('auto');
          }
          return;
        } else if (typeof $.fn.slimScroll === 'undefined' && console) {
          console.error('Error: the fixed layout requires the slimscroll plugin!');
        }
        if ($.StoreCamp.options.sidebarSlimScroll) {
          if (typeof $.fn.slimScroll !== 'undefined') {
            $('.sidebar').slimScroll({
              destroy: true
            }).height('auto');
            $('.sidebar').slimscroll({
              height: $(window).height() - $('.main-header').height() + 'px',
              color: 'rgba(0,0,0,0.2)',
              size: '3px'
            });
          }
        }
      }
    };

    /* PushMenu()
     * ==========
     * Adds the push menu functionality to the sidebar.
     *
     * @type Function
     * @usage: $.StoreCamp.pushMenu("[data-toggle='offcanvas']")
     */
    $.StoreCamp.pushMenu = {
      activate: function(toggleBtn) {
        var screenSizes;
        screenSizes = $.StoreCamp.options.screenSizes;
        $(toggleBtn).on('click', function(e) {
          e.preventDefault();
          if ($(window).width() > screenSizes.sm - 1) {
            $('body').toggleClass('sidebar-collapse');
          } else {
            if ($('body').hasClass('sidebar-open')) {
              $('body').removeClass('sidebar-open');
              $('body').removeClass('sidebar-collapse');
            } else {
              $('body').addClass('sidebar-open');
            }
          }
        });
        $('.content-wrapper').click(function() {
          if ($(window).width() <= screenSizes.sm - 1 && $('body').hasClass('sidebar-open')) {
            $('body').removeClass('sidebar-open');
          }
        });
        if ($.StoreCamp.options.sidebarExpandOnHover || $('body').hasClass('fixed') && $('body').hasClass('sidebar-mini')) {
          this.expandOnHover();
        }
      },
      expandOnHover: function() {
        var _this, screenWidth;
        _this = this;
        screenWidth = $.StoreCamp.options.screenSizes.sm - 1;
        $('.main-sidebar').hover((function() {
          if ($('body').hasClass('sidebar-mini') && $('body').hasClass('sidebar-collapse') && $(window).width() > screenWidth) {
            _this.expand();
          }
        }), function() {
          if ($('body').hasClass('sidebar-mini') && $('body').hasClass('sidebar-expanded-on-hover') && $(window).width() > screenWidth) {
            _this.collapse();
          }
        });
      },
      expand: function() {
        $('body').removeClass('sidebar-collapse').addClass('sidebar-expanded-on-hover');
      },
      collapse: function() {
        if ($('body').hasClass('sidebar-expanded-on-hover')) {
          $('body').removeClass('sidebar-expanded-on-hover').addClass('sidebar-collapse');
        }
      }
    };

    /* Tree()
     * ======
     * Converts the sidebar into a multilevel
     * tree view menu.
     *
     * @type Function
     * @Usage: $.StoreCamp.tree('.sidebar')
     */
    $.StoreCamp.tree = function(menu) {
      var _this;
      _this = this;
      $('li a', $(menu)).on('click', function(e) {
        var $this, checkElement, parent, parent_li, ul;
        $this = $(this);
        checkElement = $this.next();
        if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
          checkElement.slideUp('normal', function() {
            checkElement.removeClass('menu-open');
          });
          checkElement.parent('li').removeClass('active');
        } else if (checkElement.is('.treeview-menu') && !checkElement.is(':visible')) {
          parent = $this.parents('ul').first();
          ul = parent.find('ul:visible').slideUp('normal');
          ul.removeClass('menu-open');
          parent_li = $this.parent('li');
          checkElement.slideDown('normal', function() {
            checkElement.addClass('menu-open');
            parent.find('li.active').removeClass('active');
            parent_li.addClass('active');
            _this.layout.fix();
          });
        }
        if (checkElement.is('.treeview-menu')) {
          e.preventDefault();
        }
      });
    };

    /* ControlSidebar
     * ==============
     * Adds functionality to the right sidebar
     *
     * @type Object
     * @usage $.StoreCamp.controlSidebar.activate(options)
     */
    $.StoreCamp.controlSidebar = {
      activate: function() {
        var _this, bg, btn, o, sidebar;
        _this = this;
        o = $.StoreCamp.options.controlSidebarOptions;
        sidebar = $(o.selector);
        btn = $(o.toggleBtnSelector);
        btn.on('click', function(e) {
          e.preventDefault();
          if (!sidebar.hasClass('control-sidebar-open') && !$('body').hasClass('control-sidebar-open')) {
            _this.open(sidebar, o.slide);
          } else {
            _this.close(sidebar, o.slide);
          }
        });
        bg = $('.control-sidebar-bg');
        _this._fix(bg);
        if ($('body').hasClass('fixed')) {
          _this._fixForFixed(sidebar);
        } else {
          if ($('.content-wrapper, .right-side').height() < sidebar.height()) {
            _this._fixForContent(sidebar);
          }
        }
      },
      open: function(sidebar, slide) {
        var _this;
        _this = this;
        if (slide) {
          sidebar.addClass('control-sidebar-open');
        } else {
          $('body').addClass('control-sidebar-open');
        }
      },
      close: function(sidebar, slide) {
        if (slide) {
          sidebar.removeClass('control-sidebar-open');
        } else {
          $('body').removeClass('control-sidebar-open');
        }
      },
      _fix: function(sidebar) {
        var _this;
        _this = this;
        if ($('body').hasClass('layout-boxed')) {
          sidebar.css('position', 'absolute');
          sidebar.height($('.wrapper').height());
          $(window).resize(function() {
            _this._fix(sidebar);
          });
        } else {
          sidebar.css({
            'position': 'fixed',
            'height': 'auto'
          });
        }
      },
      _fixForFixed: function(sidebar) {
        sidebar.css({
          'position': 'fixed',
          'max-height': '100%',
          'overflow': 'auto',
          'padding-bottom': '50px'
        });
      },
      _fixForContent: function(sidebar) {
        $('.content-wrapper, .right-side').css('min-height', sidebar.height());
      }
    };

    /* BoxWidget
     * =========
     * BoxWidget is a plugin to handle collapsing and
     * removing boxes from the screen.
     *
     * @type Object
     * @usage $.StoreCamp.boxWidget.activate()
     *        Set all your options in the main $.StoreCamp.options object
     */
    $.StoreCamp.boxWidget = {
      selectors: $.StoreCamp.options.boxWidgetOptions.boxWidgetSelectors,
      icons: $.StoreCamp.options.boxWidgetOptions.boxWidgetIcons,
      activate: function() {
        var _this;
        _this = this;
        $(_this.selectors.collapse).on('click', function(e) {
          e.preventDefault();
          _this.collapse($(this));
        });
        $(_this.selectors.remove).on('click', function(e) {
          e.preventDefault();
          _this.remove($(this));
        });
      },
      collapse: function(element) {
        var _this, box, box_content;
        _this = this;
        box = element.parents('.box').first();
        box_content = box.find('> .box-body, > .box-footer');
        if (!box.hasClass('collapsed-box')) {
          element.children(':first').removeClass(_this.icons.collapse).addClass(_this.icons.open);
          box_content.slideUp(300, function() {
            box.addClass('collapsed-box');
          });
        } else {
          element.children(':first').removeClass(_this.icons.open).addClass(_this.icons.collapse);
          box_content.slideDown(300, function() {
            box.removeClass('collapsed-box');
          });
        }
      },
      remove: function(element) {
        var box;
        box = element.parents('.box').first();
        box.slideUp();
      }
    };
  };

  'use strict';

  if (typeof jQuery === 'undefined') {
    throw new Error('StoreCamp requires jQuery');
  }


  /* StoreCamp
   *
   * @type Object
   * @description $.StoreCamp is the main object for the template's app.
   *              It's used for implementing functions and options related
   *              to the template. Keeping everything wrapped in an object
   *              prevents conflict with other plugins and is a better
   *              way to organize our code.
   */

  $.StoreCamp = {};


  /* --------------------
   * - StoreCamp Options -
   * --------------------
   * Modify these options to suit your implementation
   */

  $.StoreCamp.options = {
    navbarMenuSlimscroll: true,
    navbarMenuSlimscrollWidth: '3px',
    navbarMenuHeight: '200px',
    sidebarToggleSelector: '[data-toggle=\'offcanvas\']',
    sidebarPushMenu: true,
    sidebarSlimScroll: true,
    sidebarExpandOnHover: false,
    enableBoxRefresh: true,
    enableBSToppltip: true,
    BSTooltipSelector: '[data-toggle=\'tooltip\']',
    enableFastclick: true,
    enableControlSidebar: true,
    controlSidebarOptions: {
      toggleBtnSelector: '[data-toggle=\'control-sidebar\']',
      selector: '.control-sidebar',
      slide: true
    },
    enableBoxWidget: true,
    boxWidgetOptions: {
      boxWidgetIcons: {
        collapse: 'fa-minus',
        open: 'fa-plus',
        remove: 'fa-times'
      },
      boxWidgetSelectors: {
        remove: '[data-widget="remove"]',
        collapse: '[data-widget="collapse"]'
      }
    },
    directChat: {
      enable: true,
      contactToggleSelector: '[data-widget="chat-pane-toggle"]'
    },
    colors: {
      lightBlue: '#3c8dbc',
      red: '#f56954',
      green: '#00a65a',
      aqua: '#00c0ef',
      yellow: '#f39c12',
      blue: '#0073b7',
      navy: '#001F3F',
      teal: '#39CCCC',
      olive: '#3D9970',
      lime: '#01FF70',
      orange: '#FF851B',
      fuchsia: '#F012BE',
      purple: '#8E24AA',
      maroon: '#D81B60',
      black: '#222222',
      gray: '#d2d6de'
    },
    screenSizes: {
      xs: 480,
      sm: 768,
      md: 992,
      lg: 1200
    }
  };


  /* ------------------
   * - Implementation -
   * ------------------
   * The next block of code implements StoreCamp's
   * functions and plugins as specified by the
   * options above.
   */

  $(function() {
    var o;
    if (typeof StoreCampOptions !== 'undefined') {
      $.extend(true, $.StoreCamp.options, StoreCampOptions);
    }
    o = $.StoreCamp.options;
    _init();
    $.StoreCamp.layout.activate();
    $.StoreCamp.tree('.sidebar');
    $.StoreCamp.tree('.category');
    if (o.enableControlSidebar) {
      $.StoreCamp.controlSidebar.activate();
    }
    if (o.navbarMenuSlimscroll && typeof $.fn.slimscroll !== 'undefined') {
      $('.navbar .menu').slimscroll({
        height: o.navbarMenuHeight,
        alwaysVisible: false,
        size: o.navbarMenuSlimscrollWidth
      }).css('width', '100%');
    }
    if (o.sidebarPushMenu) {
      $.StoreCamp.pushMenu.activate(o.sidebarToggleSelector);
    }
    if (o.enableBSToppltip) {
      $('body').tooltip({
        selector: o.BSTooltipSelector
      });
    }
    if (o.enableBoxWidget) {
      $.StoreCamp.boxWidget.activate();
    }
    if (o.enableFastclick && typeof FastClick !== 'undefined') {
      FastClick.attach(document.body);
    }
    $.StoreCamp.imageLoad.activate();
    if (o.directChat.enable) {
      $(o.directChat.contactToggleSelector).on('click', function() {
        var box;
        box = $(this).parents('.direct-chat').first();
        box.toggleClass('direct-chat-contacts-open');
      });
    }

    /*
     * INITIALIZE BUTTON TOGGLE
     * ------------------------
     */
    $('.btn-group[data-toggle="btn-toggle"]').each(function() {
      var group;
      group = $(this);
      $(this).find('.btn').on('click', function(e) {
        group.find('.btn.active').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });
    });
  });

  $.StoreCamp.imageLoad = {
    files: {},
    activate: function() {
      var _this;
      _this = this;
      _this.initiateInstanceImage();
      _this.initiateProfileImage();
      _this.triggerRemoveFile();
    },
    renderInstanceImage: function(file, fileinput, settings, index) {
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
          console.log(index);
          $('.p').append('<div class=\'col-sm-6 col-md-4\'><div class=\'thumbnail\' style=\'background: #ffffff\'> <img class="img-responsive" src=\'' + image.src + '\' /> <div class=\'caption\'> <span  style=\'font-weight: bold;margin-bottom: 10px;position: relative;width: 100%;display: block;\'>' + s.toFixed(2) + ' Mb </h4> <a role="button" class="btn btn-danger remove-image pull-right" data-index=\'' + index + '\' class="remove">remove</a></div> </div> ');
          _this.renderLabelFileName(n, 'success');
          _this.triggerRemoveFile();
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
              _this.renderInstanceImage(F[i], fileinput, settings, i);
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
        return _this.files = this.files;
      });
    },
    triggerRemoveFile: function() {
      var _this;
      _this = this;
      return $(".remove-image").on('click', function(event) {
        var index;
        index = $(this).data('index');
        console.log(index);
        _this.removeFile(index);
      });
    },
    removeFile: function(index) {
      var _this, files, fl, i, j, newList, ref;
      _this = this;
      files = document.getElementById('fileupload').files;
      newList = [];
      console.log(files);
      fl = files.length;
      i = 0;
      for (i = j = 0, ref = files.length; 0 <= ref ? j < ref : j > ref; i = 0 <= ref ? ++j : --j) {
        if (i !== index) {
          newList.push(files.item(i));
        }
      }
      console.log(newList);
      document.getElementById('fileupload').val = newList;
      console.log(document.getElementById('fileupload').val);
    }
  };


  /* ------------------
   * - Custom Plugins -
   * ------------------
   * All custom plugins are defined below.
   */


  /*
   * BOX REFRESH BUTTON
   * ------------------
   * This is a custom plugin to use with the component BOX. It allows you to add
   * a refresh button to the box. It converts the box's state to a loading state.
   *
   * @type plugin
   * @usage $("#box-widget").boxRefresh( options );
   */

  (function($) {
    $.fn.boxRefresh = function(options) {
      var done, overlay, settings, start;
      settings = $.extend({
        trigger: '.refresh-btn',
        source: '',
        onLoadStart: function(box) {},
        onLoadDone: function(box) {}
      }, options);
      overlay = $('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');
      start = function(box) {
        box.append(overlay);
        settings.onLoadStart.call(box);
      };
      done = function(box) {
        box.find(overlay).remove();
        settings.onLoadDone.call(box);
      };
      return this.each(function() {
        var box, rBtn;
        if (settings.source === '') {
          if (console) {
            console.log('Please specify a source first - boxRefresh()');
          }
          return;
        }
        box = $(this);
        rBtn = box.find(settings.trigger).first();
        rBtn.on('click', function(e) {
          e.preventDefault();
          start(box);
          box.find('.box-body').load(settings.source, function() {
            done(box);
          });
        });
      });
    };
  })(jQuery);


  /*
   * TODO LIST CUSTOM PLUGIN
   * -----------------------
   * This plugin depends on iCheck plugin for checkbox and radio inputs
   *
   * @type plugin
   * @usage $("#todo-widget").todolist( options );
   */

  (function($) {
    $.fn.todolist = function(options) {
      var settings;
      settings = $.extend({
        onCheck: function(ele) {},
        onUncheck: function(ele) {}
      }, options);
      return this.each(function() {
        if (typeof $.fn.iCheck !== 'undefined') {
          $('input', this).on('ifChecked', function(event) {
            var ele;
            ele = $(this).parents('li').first();
            ele.toggleClass('done');
            settings.onCheck.call(ele);
          });
          $('input', this).on('ifUnchecked', function(event) {
            var ele;
            ele = $(this).parents('li').first();
            ele.toggleClass('done');
            settings.onUncheck.call(ele);
          });
        } else {
          $('input', this).on('change', function(event) {
            var ele;
            ele = $(this).parents('li').first();
            ele.toggleClass('done');
            settings.onCheck.call(ele);
          });
        }
      });
    };
  })(jQuery);

}).call(this);

//# sourceMappingURL=admin.js.map


/**
 * StoreCamp Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

(function() {
  (function($, StoreCamp) {

    /**
     * Toggles layout classes
     *
     * @param String cls the layout class to toggle
     * @returns void
     */
    var change_layout, change_skin, demo_settings, get, my_skins, setup, skin_black, skin_black_light, skin_blue, skin_blue_light, skin_green, skin_green_light, skin_purple, skin_purple_light, skin_red, skin_red_light, skin_yellow, skin_yellow_light, skins_list, store, tab_button, tab_pane;
    change_layout = function(cls) {
      $('body').toggleClass(cls);
      StoreCamp.layout.fixSidebar();
      if (cls === 'layout-boxed') {
        StoreCamp.controlSidebar._fix($('.control-sidebar-bg'));
      }
      if ($('body').hasClass('fixed') && cls === 'fixed') {
        StoreCamp.pushMenu.expandOnHover();
        StoreCamp.layout.activate();
      }
      StoreCamp.controlSidebar._fix($('.control-sidebar-bg'));
      StoreCamp.controlSidebar._fix($('.control-sidebar'));
    };

    /**
     * Replaces the old skin with the new skin
     * @param String cls the new skin class
     * @returns Boolean false to prevent link's default action
     */
    change_skin = function(cls) {
      $.each(my_skins, function(i) {
        $('body').removeClass(my_skins[i]);
      });
      $('body').addClass(cls);
      store('skin', cls);
      return false;
    };

    /**
     * Store a new settings in the browser
     *
     * @param String name Name of the setting
     * @param String val Value of the setting
     * @returns void
     */
    store = function(name, val) {
      if (typeof Storage !== 'undefined') {
        localStorage.setItem(name, val);
      } else {
        window.alert('Please use a modern browser to properly view this template!');
      }
    };

    /**
     * Get a prestored setting
     *
     * @param String name Name of of the setting
     * @returns String The value of the setting | null
     */
    get = function(name) {
      if (typeof Storage !== 'undefined') {
        return localStorage.getItem(name);
      } else {
        window.alert('Please use a modern browser to properly view this template!');
      }
    };

    /**
     * Retrieve default settings and apply them to the template
     *
     * @returns void
     */
    setup = function() {
      var tmp;
      tmp = get('skin');
      if (tmp && $.inArray(tmp, my_skins)) {
        change_skin(tmp);
      }
      $('[data-skin]').on('click', function(e) {
        if ($(this).hasClass('knob')) {
          return;
        }
        e.preventDefault();
        change_skin($(this).data('skin'));
      });
      $('[data-layout]').on('click', function() {
        change_layout($(this).data('layout'));
      });
      $('[data-controlsidebar]').on('click', function() {
        var slide;
        change_layout($(this).data('controlsidebar'));
        slide = !StoreCamp.options.controlSidebarOptions.slide;
        StoreCamp.options.controlSidebarOptions.slide = slide;
        if (!slide) {
          $('.control-sidebar').removeClass('control-sidebar-open');
        }
      });
      $('[data-sidebarskin=\'toggle\']').on('click', function() {
        var sidebar;
        sidebar = $('.control-sidebar');
        if (sidebar.hasClass('control-sidebar-dark')) {
          sidebar.removeClass('control-sidebar-dark');
          sidebar.addClass('control-sidebar-light');
        } else {
          sidebar.removeClass('control-sidebar-light');
          sidebar.addClass('control-sidebar-dark');
        }
      });
      $('[data-enable=\'expandOnHover\']').on('click', function() {
        $(this).attr('disabled', true);
        StoreCamp.pushMenu.expandOnHover();
        if (!$('body').hasClass('sidebar-collapse')) {
          $('[data-layout=\'sidebar-collapse\']').click();
        }
      });
      if ($('body').hasClass('fixed')) {
        $('[data-layout=\'fixed\']').attr('checked', 'checked');
      }
      if ($('body').hasClass('layout-boxed')) {
        $('[data-layout=\'layout-boxed\']').attr('checked', 'checked');
      }
      if ($('body').hasClass('sidebar-collapse')) {
        $('[data-layout=\'sidebar-collapse\']').attr('checked', 'checked');
      }
    };
    'use strict';

    /**
     * List of all the available skins
     *
     * @type Array
     */
    my_skins = ['skin-blue', 'skin-black', 'skin-red', 'skin-yellow', 'skin-purple', 'skin-green', 'skin-blue-light', 'skin-black-light', 'skin-red-light', 'skin-yellow-light', 'skin-purple-light', 'skin-green-light'];
    tab_pane = $('<div />', {
      'id': 'control-sidebar-theme-demo-options-tab',
      'class': 'tab-pane active'
    });
    tab_button = $('<li />', {
      'class': 'active'
    }).html('<a href=\'#control-sidebar-theme-demo-options-tab\' data-toggle=\'tab\'>' + '<i class=\'fa fa-wrench\'></i>' + '</a>');
    $('[href=\'#control-sidebar-home-tab\']').parent().before(tab_button);
    demo_settings = $('<div />');
    demo_settings.append('<h4 class=\'control-sidebar-heading\'>' + 'Layout Options' + '</h4>' + '<div class=\'form-group\'>' + '<label class=\'control-sidebar-subheading\'>' + '<input type=\'checkbox\' data-layout=\'fixed\' class=\'pull-right\'/> ' + 'Fixed layout' + '</label>' + '<p>Activate the fixed layout. You can\'t use fixed and boxed layouts together</p>' + '</div>' + '<div class=\'form-group\'>' + '<label class=\'control-sidebar-subheading\'>' + '<input type=\'checkbox\' data-layout=\'layout-boxed\'class=\'pull-right\'/> ' + 'Boxed Layout' + '</label>' + '<p>Activate the boxed layout</p>' + '</div>' + '<div class=\'form-group\'>' + '<label class=\'control-sidebar-subheading\'>' + '<input type=\'checkbox\' data-layout=\'sidebar-collapse\' class=\'pull-right\'/> ' + 'Toggle Sidebar' + '</label>' + '<p>Toggle the left sidebar\'s state (open or collapse)</p>' + '</div>' + '<div class=\'form-group\'>' + '<label class=\'control-sidebar-subheading\'>' + '<input type=\'checkbox\' data-enable=\'expandOnHover\' class=\'pull-right\'/> ' + 'Sidebar Expand on Hover' + '</label>' + '<p>Let the sidebar mini expand on hover</p>' + '</div>' + '<div class=\'form-group\'>' + '<label class=\'control-sidebar-subheading\'>' + '<input type=\'checkbox\' data-controlsidebar=\'control-sidebar-open\' class=\'pull-right\'/> ' + 'Toggle Right Sidebar Slide' + '</label>' + '<p>Toggle between slide over content and push content effects</p>' + '</div>' + '<div class=\'form-group\'>' + '<label class=\'control-sidebar-subheading\'>' + '<input type=\'checkbox\' data-sidebarskin=\'toggle\' class=\'pull-right\'/> ' + 'Toggle Right Sidebar Skin' + '</label>' + '<p>Toggle between dark and light skins for the right sidebar</p>' + '</div>');
    skins_list = $('<ul />', {
      'class': 'list-unstyled clearfix'
    });
    skin_blue = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-blue\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px; background: #367fa9;\'></span><span class=\'bg-light-blue\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #222d32;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\'>Blue</p>');
    skins_list.append(skin_blue);
    skin_black = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-black\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div style=\'box-shadow: 0 0 2px rgba(0,0,0,0.1)\' class=\'clearfix\'><span style=\'display:block; width: 20%; float: left; height: 7px; background: #fefefe;\'></span><span style=\'display:block; width: 80%; float: left; height: 7px; background: #fefefe;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #222;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\'>Black</p>');
    skins_list.append(skin_black);
    skin_purple = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-purple\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-purple-active\'></span><span class=\'bg-purple\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #222d32;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\'>Purple</p>');
    skins_list.append(skin_purple);
    skin_green = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-green\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-green-active\'></span><span class=\'bg-green\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #222d32;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\'>Green</p>');
    skins_list.append(skin_green);
    skin_red = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-red\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-red-active\'></span><span class=\'bg-red\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #222d32;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\'>Red</p>');
    skins_list.append(skin_red);
    skin_yellow = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-yellow\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-yellow-active\'></span><span class=\'bg-yellow\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #222d32;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\'>Yellow</p>');
    skins_list.append(skin_yellow);
    skin_blue_light = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-blue-light\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px; background: #367fa9;\'></span><span class=\'bg-light-blue\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #f9fafc;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\' style=\'font-size: 12px\'>Blue Light</p>');
    skins_list.append(skin_blue_light);
    skin_black_light = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-black-light\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div style=\'box-shadow: 0 0 2px rgba(0,0,0,0.1)\' class=\'clearfix\'><span style=\'display:block; width: 20%; float: left; height: 7px; background: #fefefe;\'></span><span style=\'display:block; width: 80%; float: left; height: 7px; background: #fefefe;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #f9fafc;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\' style=\'font-size: 12px\'>Black Light</p>');
    skins_list.append(skin_black_light);
    skin_purple_light = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-purple-light\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-purple-active\'></span><span class=\'bg-purple\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #f9fafc;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\' style=\'font-size: 12px\'>Purple Light</p>');
    skins_list.append(skin_purple_light);
    skin_green_light = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-green-light\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-green-active\'></span><span class=\'bg-green\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #f9fafc;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\' style=\'font-size: 12px\'>Green Light</p>');
    skins_list.append(skin_green_light);
    skin_red_light = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-red-light\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-red-active\'></span><span class=\'bg-red\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #f9fafc;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\' style=\'font-size: 12px\'>Red Light</p>');
    skins_list.append(skin_red_light);
    skin_yellow_light = $('<li />', {
      style: 'float:left; width: 33.33333%; padding: 5px;'
    }).append('<a href=\'javascript:void(0);\' data-skin=\'skin-yellow-light\' style=\'display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)\' class=\'clearfix full-opacity-hover\'>' + '<div><span style=\'display:block; width: 20%; float: left; height: 7px;\' class=\'bg-yellow-active\'></span><span class=\'bg-yellow\' style=\'display:block; width: 80%; float: left; height: 7px;\'></span></div>' + '<div><span style=\'display:block; width: 20%; float: left; height: 20px; background: #f9fafc;\'></span><span style=\'display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;\'></span></div>' + '</a>' + '<p class=\'text-center no-margin\' style=\'font-size: 12px;\'>Yellow Light</p>');
    skins_list.append(skin_yellow_light);
    demo_settings.append('<h4 class=\'control-sidebar-heading\'>Skins</h4>');
    demo_settings.append(skins_list);
    tab_pane.append(demo_settings);
    $('#control-sidebar-home-tab').after(tab_pane);
    setup();
  })(jQuery, $.StoreCamp);

  $(document).ready(function() {
    return $('.product-popup-gallery').magnificPopup({
      delegate: 'a',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1]
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return item.el.attr('title') + '<small>StoreCamp - online platform</small>';
        }
      },
      callbacks: {
        beforeOpen: function() {
          this.st.mainClass = this.st.el.attr('data-effect');
        }
      },
      midClick: true
    });
  });

  (function($) {
    var items;
    items = [$('.sidebar-menu'), $('.media_tags'), $('.site_sidebar')];
    items.forEach(function(item, i, arr) {
      var makeAnchorActive, nav;
      nav = item;
      makeAnchorActive = function(navigtation) {
        var activeParents, anchor, current, definedLinks, results;
        anchor = navigtation.find('a');
        current = window.location.href;
        i = 0;
        results = [];
        while (i < anchor.length) {
          definedLinks = anchor[i].href;
          if (definedLinks === current) {
            activeParents = nav.attr('data-active-parents');
            if (activeParents) {
              $(anchor[i]).parent().parent().closest('li').addClass('active');
              $(anchor[i]).parent().addClass('active');
            } else {

            }
            $(anchor[i]).parent().addClass('active');
          }
          results.push(i++);
        }
        return results;
      };
      return makeAnchorActive(nav);
    });
  })($);

}).call(this);

//# sourceMappingURL=app.js.map

//# sourceMappingURL=storecamp.js.map
