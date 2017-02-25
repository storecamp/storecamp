###! StoreCamp app.js
# ================
# Main JS application file for StoreCamp v0. This file
# should be included in all pages. It controls some layout
# options and implements exclusive StoreCamp plugins.
###

### ----------------------------------
# - Initialize the StoreCamp Object -
# ----------------------------------
# All StoreCamp functions are implemented below.
###

_init = ->

  ### Layout
  # ======
  # Fixes the layout height in case min-height fails.
  #
  # @type Object
  # @usage $.StoreCamp.layout.activate()
  #        $.StoreCamp.layout.fix()
  #        $.StoreCamp.layout.fixSidebar()
  ###

  $.StoreCamp.layout =
    activate: ->
      _this = this
      _this.fix()
      _this.fixSidebar()
      $(window, '.wrapper').resize ->
        _this.fix()
        _this.fixSidebar()
        return
      return
    fix: ->
#Get window height and the wrapper height
      neg = $('.main-header').outerHeight() + $('.main-footer').outerHeight()
      window_height = $(window).height()
      sidebar_height = $('.sidebar').height()
      #Set the min-height of the content and sidebar based on the
      #the height of the document.
      if $('body').hasClass('fixed')
        $('.content-wrapper, .right-side').css 'min-height', window_height - $('.main-footer').outerHeight()
      else
        postSetWidth = undefined
        if window_height >= sidebar_height
          $('.content-wrapper, .right-side').css 'min-height', window_height - neg
          postSetWidth = window_height - neg
        else
          $('.content-wrapper, .right-side').css 'min-height', sidebar_height
          postSetWidth = sidebar_height
        #Fix for the control sidebar height
        controlSidebar = $($.StoreCamp.options.controlSidebarOptions.selector)
        if typeof controlSidebar != 'undefined'
          if controlSidebar.height() > postSetWidth
            $('.content-wrapper, .right-side').css 'min-height', controlSidebar.height()
      return
    fixSidebar: ->
#Make sure the body tag has the .fixed class
      if !$('body').hasClass('fixed')
        if typeof $.fn.slimScroll != 'undefined'
          $('.sidebar').slimScroll(destroy: true).height 'auto'
        return
      else if typeof $.fn.slimScroll == 'undefined' and console
        console.error 'Error: the fixed layout requires the slimscroll plugin!'
      #Enable slimscroll for fixed layout
      if $.StoreCamp.options.sidebarSlimScroll
        if typeof $.fn.slimScroll != 'undefined'
#Destroy if it exists
          $('.sidebar').slimScroll(destroy: true).height 'auto'
          #Add slimscroll
          $('.sidebar').slimscroll
            height: $(window).height() - $('.main-header').height() + 'px'
            color: 'rgba(0,0,0,0.2)'
            size: '3px'
      return

  ### PushMenu()
  # ==========
  # Adds the push menu functionality to the sidebar.
  #
  # @type Function
  # @usage: $.StoreCamp.pushMenu("[data-toggle='offcanvas']")
  ###

  $.StoreCamp.pushMenu =
    activate: (toggleBtn) ->
#Get the screen sizes
      screenSizes = $.StoreCamp.options.screenSizes
      #Enable sidebar toggle
      $(toggleBtn).on 'click', (e) ->
        e.preventDefault()
        #Enable sidebar push menu
        if $(window).width() > screenSizes.sm - 1
          $('body').toggleClass 'sidebar-collapse'
        else
          if $('body').hasClass('sidebar-open')
            $('body').removeClass 'sidebar-open'
            $('body').removeClass 'sidebar-collapse'
          else
            $('body').addClass 'sidebar-open'
        return
      $('.content-wrapper').click ->
#Enable hide menu when clicking on the content-wrapper on small screens
        if $(window).width() <= screenSizes.sm - 1 and $('body').hasClass('sidebar-open')
          $('body').removeClass 'sidebar-open'
        return
      #Enable expand on hover for sidebar mini
      if $.StoreCamp.options.sidebarExpandOnHover or $('body').hasClass('fixed') and $('body').hasClass('sidebar-mini')
        @expandOnHover()
      return
    expandOnHover: ->
      _this = this
      screenWidth = $.StoreCamp.options.screenSizes.sm - 1
      #Expand sidebar on hover
      $('.main-sidebar').hover (->
        if $('body').hasClass('sidebar-mini') and $('body').hasClass('sidebar-collapse') and $(window).width() > screenWidth
          _this.expand()
        return
      ), ->
        if $('body').hasClass('sidebar-mini') and $('body').hasClass('sidebar-expanded-on-hover') and $(window).width() > screenWidth
          _this.collapse()
        return
      return
    expand: ->
      $('body').removeClass('sidebar-collapse').addClass 'sidebar-expanded-on-hover'
      return
    collapse: ->
      if $('body').hasClass('sidebar-expanded-on-hover')
        $('body').removeClass('sidebar-expanded-on-hover').addClass 'sidebar-collapse'
      return

  ### Tree()
  # ======
  # Converts the sidebar into a multilevel
  # tree view menu.
  #
  # @type Function
  # @Usage: $.StoreCamp.tree('.sidebar')
  ###

  $.StoreCamp.tree = (menu) ->
    _this = this
    $('li a', $(menu)).on 'click', (e) ->
#Get the clicked link and the next element
      $this = $(this)
      checkElement = $this.next()
      #Check if the next element is a menu and is visible
      if checkElement.is('.treeview-menu') and checkElement.is(':visible')
#Close the menu
        checkElement.slideUp 'normal', ->
          checkElement.removeClass 'menu-open'
          #Fix the layout in case the sidebar stretches over the height of the window
          #_this.layout.fix();
          return
        checkElement.parent('li').removeClass 'active'
      else if checkElement.is('.treeview-menu') and !checkElement.is(':visible')
#Get the parent menu
        parent = $this.parents('ul').first()
        #Close all open menus within the parent
        ul = parent.find('ul:visible').slideUp('normal')
        #Remove the menu-open class from the parent
        ul.removeClass 'menu-open'
        #Get the parent li
        parent_li = $this.parent('li')
        #Open the target menu and add the menu-open class
        checkElement.slideDown 'normal', ->
#Add the class active to the parent li
          checkElement.addClass 'menu-open'
          parent.find('li.active').removeClass 'active'
          parent_li.addClass 'active'
          #Fix the layout in case the sidebar stretches over the height of the window
          _this.layout.fix()
          return
      #if this isn't a link, prevent the page from being redirected
      if checkElement.is('.treeview-menu')
        e.preventDefault()
      return
    return

  ### ControlSidebar
  # ==============
  # Adds functionality to the right sidebar
  #
  # @type Object
  # @usage $.StoreCamp.controlSidebar.activate(options)
  ###

  $.StoreCamp.controlSidebar =
    activate: ->
#Get the object
      _this = this
      #Update options
      o = $.StoreCamp.options.controlSidebarOptions
      #Get the sidebar
      sidebar = $(o.selector)
      #The toggle button
      btn = $(o.toggleBtnSelector)
      #Listen to the click event
      btn.on 'click', (e) ->
        e.preventDefault()
        #If the sidebar is not open
        if !sidebar.hasClass('control-sidebar-open') and !$('body').hasClass('control-sidebar-open')
#Open the sidebar
          _this.open sidebar, o.slide
        else
          _this.close sidebar, o.slide
        return
      #If the body has a boxed layout, fix the sidebar bg position
      bg = $('.control-sidebar-bg')
      _this._fix bg
      #If the body has a fixed layout, make the control sidebar fixed
      if $('body').hasClass('fixed')
        _this._fixForFixed sidebar
      else
#If the content height is less than the sidebar's height, force max height
        if $('.content-wrapper, .right-side').height() < sidebar.height()
          _this._fixForContent sidebar
      return
    open: (sidebar, slide) ->
      _this = this
      #Slide over content
      if slide
        sidebar.addClass 'control-sidebar-open'
      else
#Push the content by adding the open class to the body instead
#of the sidebar itself
        $('body').addClass 'control-sidebar-open'
      return
    close: (sidebar, slide) ->
      if slide
        sidebar.removeClass 'control-sidebar-open'
      else
        $('body').removeClass 'control-sidebar-open'
      return
    _fix: (sidebar) ->
      _this = this
      if $('body').hasClass('layout-boxed')
        sidebar.css 'position', 'absolute'
        sidebar.height $('.wrapper').height()
        $(window).resize ->
          _this._fix sidebar
          return
      else
        sidebar.css
          'position': 'fixed'
          'height': 'auto'
      return
    _fixForFixed: (sidebar) ->
      sidebar.css
        'position': 'fixed'
        'max-height': '100%'
        'overflow': 'auto'
        'padding-bottom': '50px'
      return
    _fixForContent: (sidebar) ->
      $('.content-wrapper, .right-side').css 'min-height', sidebar.height()
      return

  ### BoxWidget
  # =========
  # BoxWidget is a plugin to handle collapsing and
  # removing boxes from the screen.
  #
  # @type Object
  # @usage $.StoreCamp.boxWidget.activate()
  #        Set all your options in the main $.StoreCamp.options object
  ###

  $.StoreCamp.boxWidget =
    selectors: $.StoreCamp.options.boxWidgetOptions.boxWidgetSelectors
    icons: $.StoreCamp.options.boxWidgetOptions.boxWidgetIcons
    activate: ->
      _this = this
      #Listen for collapse event triggers
      $(_this.selectors.collapse).on 'click', (e) ->
        e.preventDefault()
        _this.collapse $(this)
        return
      #Listen for remove event triggers
      $(_this.selectors.remove).on 'click', (e) ->
        e.preventDefault()
        _this.remove $(this)
        return
      return
    collapse: (element) ->
      _this = this
      #Find the box parent
      box = element.parents('.box').first()
      #Find the body and the footer
      box_content = box.find('> .box-body, > .box-footer')
      if !box.hasClass('collapsed-box')
#Convert minus into plus
        element.children(':first').removeClass(_this.icons.collapse).addClass _this.icons.open
        #Hide the content
        box_content.slideUp 300, ->
          box.addClass 'collapsed-box'
          return
      else
#Convert plus into minus
        element.children(':first').removeClass(_this.icons.open).addClass _this.icons.collapse
        #Show the content
        box_content.slideDown 300, ->
          box.removeClass 'collapsed-box'
          return
      return
    remove: (element) ->
#Find the box parent
      box = element.parents('.box').first()
      box.slideUp()
      return
  return

'use strict'
#Make sure jQuery has been loaded before app.js
if typeof jQuery == 'undefined'
  throw new Error('StoreCamp requires jQuery')

### StoreCamp
#
# @type Object
# @description $.StoreCamp is the main object for the template's app.
#              It's used for implementing functions and options related
#              to the template. Keeping everything wrapped in an object
#              prevents conflict with other plugins and is a better
#              way to organize our code.
###

$.StoreCamp = {}

### --------------------
# - StoreCamp Options -
# --------------------
# Modify these options to suit your implementation
###

$.StoreCamp.options =
  navbarMenuSlimscroll: true
  navbarMenuSlimscrollWidth: '3px'
  navbarMenuHeight: '200px'
  sidebarToggleSelector: '[data-toggle=\'offcanvas\']'
  sidebarPushMenu: true
  sidebarSlimScroll: true
  sidebarExpandOnHover: false
  enableBoxRefresh: true
  enableBSToppltip: true
  BSTooltipSelector: '[data-toggle=\'tooltip\']'
  enableFastclick: true
  enableControlSidebar: true
  controlSidebarOptions:
    toggleBtnSelector: '[data-toggle=\'control-sidebar\']'
    selector: '.control-sidebar'
    slide: true
  enableBoxWidget: true
  boxWidgetOptions:
    boxWidgetIcons:
      collapse: 'fa-minus'
      open: 'fa-plus'
      remove: 'fa-times'
    boxWidgetSelectors:
      remove: '[data-widget="remove"]'
      collapse: '[data-widget="collapse"]'
  directChat:
    enable: true
    contactToggleSelector: '[data-widget="chat-pane-toggle"]'
  colors:
    lightBlue: '#3c8dbc'
    red: '#f56954'
    green: '#00a65a'
    aqua: '#00c0ef'
    yellow: '#f39c12'
    blue: '#0073b7'
    navy: '#001F3F'
    teal: '#39CCCC'
    olive: '#3D9970'
    lime: '#01FF70'
    orange: '#FF851B'
    fuchsia: '#F012BE'
    purple: '#8E24AA'
    maroon: '#D81B60'
    black: '#222222'
    gray: '#d2d6de'
  screenSizes:
    xs: 480
    sm: 768
    md: 992
    lg: 1200

### ------------------
# - Implementation -
# ------------------
# The next block of code implements StoreCamp's
# functions and plugins as specified by the
# options above.
###

$ ->
#Extend options if external options exist
  if typeof StoreCampOptions != 'undefined'
    $.extend true, $.StoreCamp.options, StoreCampOptions
  #Easy access to options
  o = $.StoreCamp.options
  #Set up the object
  _init()
  #Activate the layout maker
  $.StoreCamp.layout.activate()
  #Enable sidebar tree view controls
  $.StoreCamp.tree '.sidebar'
  $.StoreCamp.tree '.category'
  #Enable control sidebar
  if o.enableControlSidebar
    $.StoreCamp.controlSidebar.activate()
  #Add slimscroll to navbar dropdown
  if o.navbarMenuSlimscroll and typeof $.fn.slimscroll != 'undefined'
    $('.navbar .menu').slimscroll(
      height: o.navbarMenuHeight
      alwaysVisible: false
      size: o.navbarMenuSlimscrollWidth).css 'width', '100%'
  #Activate sidebar push menu
  if o.sidebarPushMenu
    $.StoreCamp.pushMenu.activate o.sidebarToggleSelector
  #Activate Bootstrap tooltip
  if o.enableBSToppltip
    $('body').tooltip selector: o.BSTooltipSelector
  #Activate box widget
  if o.enableBoxWidget
    $.StoreCamp.boxWidget.activate()
  #Activate fast click
  if o.enableFastclick and typeof FastClick != 'undefined'
    FastClick.attach document.body
  #Activate direct chat widget
  $.StoreCamp.imageLoad.activate()
  if o.directChat.enable
    $(o.directChat.contactToggleSelector).on 'click', ->
      box = $(this).parents('.direct-chat').first()
      box.toggleClass 'direct-chat-contacts-open'
      return

  ###
  # INITIALIZE BUTTON TOGGLE
  # ------------------------
  ###

  $('.btn-group[data-toggle="btn-toggle"]').each ->
    group = $(this)
    $(this).find('.btn').on 'click', (e) ->
      group.find('.btn.active').removeClass 'active'
      $(this).addClass 'active'
      e.preventDefault()
      return
    return
  return
# generate images live rendering
$.StoreCamp.imageLoad =
  files: {}

  activate: ->
    _this = this
    _this.initiateInstanceImage()
    _this.initiateProfileImage()
    _this.triggerRemoveFile()
    return

  renderInstanceImage: (file, fileinput, settings, index) ->
# generate a new FileReader object
    _this = this
    reader = new FileReader
    image = new Image

    reader.onload = (_file) ->
      image.src = _file.target.result
      # url.createObjectURL(file);

      image.onload = ->
        w = @width
        h = @height
        t = file.type
        n = file.name
        s = ~ ~(file.size / 1024) / 1024
        scaleWidth = settings.thumbnail_size
        console.log(index)
        $('.p').append '<div class=\'col-sm-6 col-md-4\'><div class=\'thumbnail\'
        style=\'background: #ffffff\'>
        <img class="img-responsive" src=\'' + image.src + '\' />
        <div class=\'caption\'>
        <span  style=\'font-weight: bold;margin-bottom: 10px;position: relative;width: 100%;display: block;\'>' + s.toFixed(2) + ' Mb </h4>
        <a role="button" class="btn btn-danger remove-image pull-right" data-index=\'' + index + '\' class="remove">remove</a></div> </div> '
        _this.renderLabelFileName n, 'success'
        _this.triggerRemoveFile()
        return
      image.onerror = ->
        alert 'Invalid file type: ' + file.type
        _this.renderLabelFileName file.name, "error"
        fileinput.val null
        return

      return
    reader.readAsDataURL file
    return
  renderProfileImage: (file, fileinput, settings) ->
# generate a new FileReader object
    _this = this
    reader = new FileReader
    image = new Image

    reader.onload = (_file) ->
      image.src = _file.target.result
      # url.createObjectURL(file);

      image.onload = ->
        w = @width
        h = @height
        t = file.type
        n = file.name
        s = ~ ~(file.size / 1024) / 1024
        scaleWidth = settings.thumbnail_size
        $('.profile-img').attr("src", image.src).css(position: 'relative')
        _this.renderLabelFileProfile(n, "success")
        _this.downButton("success")
        return

      image.onerror = ->
        alert 'Invalid file type: ' + file.type
        _this.renderLabelFileProfile file.name, file.type
        _this.downButton("error")
        fileinput.val null
        return

      return

    reader.readAsDataURL file
    return
  downButton: (message) ->
    _this = this
    button =  $('#upload-button')
    button.removeClass "text-info"
    button.removeClass "text-danger"
    if message == "success"
      button.removeClass "hidden"
      button.addClass "block"
      button.val('to download press').addClass("text-info")
    else
      button.addClass "hidden"
      button.removeClass "block"
      button.addClass("text-danger")
      button.val('wrong file format')
      button.bind "click", ( event ) ->
        event.preventDefault()
        $(this).unbind( event )

  renderLabelFileName: (filename, message)->
    _this = this
    fileLabel = $('.filelabel')
    if fileLabel.find("span.text-info").length > 0 || fileLabel.find("span.text-danger").length > 0
      fileLabel.find("span.text-info").remove()
      fileLabel.find("span.text-danger").remove()

    if message == "success"
      $('.filelabel').append $('<span>').addClass('text-info').css({
        'font-size': '100%'
        'display': 'inline-block'
        'font-weight': 'normal'
        'margin-left': '1em'
        'font-style': 'normal'})
    else
      $('.filelabel').append $('<span>').addClass('text-danger').text(" format is not valid").css({
        'font-size': '100%'
        'display': 'inline-block'
        'font-weight': 'normal'
        'margin-left': '1em'
        'font-style': 'normal'})

  renderLabelFileProfile: (filename, message)->
    _this = this
    fileLabel = $('.label')
    ImgBlock = $('.profile-img')

    if ImgBlock.next("span.text-info").length > 0 || ImgBlock.next("span.text-danger").length > 0
      console.log(ImgBlock.next())
      ImgBlock.next("span.text-info").remove()
      ImgBlock.next("span.text-danger").remove()

    if message == "success"

      ImgBlock.after $('<span>').addClass('text-info').css({
        'font-size': '100%'
        'display': 'inline-block'
        'font-weight': 'normal'
        'margin-left': '1em'
        'font-style': 'normal'})
    else
      ImgBlock.after $('<span>').addClass('text-danger').html("<br/><b>format is not valid </b>").css({
        'font-size': '100%'
        'display': 'inline-block'
        'font-weight': 'normal'
        'margin-left': '1em'
        'font-style': 'normal'})

  initiateInstanceImage: ->
    _this = this
    fileinput = $('#fileupload').attr('accept', 'image/jpeg,image/png,image/gif')
    settings =
      thumbnail_size: 460
      thumbnail_bg_color: '#ddd'
      thumbnail_border: '1px solid #fff'
      thumbnail_shadow: '0 0 0px rgba(0, 0, 0, 0.5)'
      label_text: ''
      warning_message: 'Not an image file.'
      warning_text_color: '#f00'
      input_class: 'custom-file-input button button-primary button-block'
    # when the file is read it triggers the onload event above.
    # handle input changes
    fileinput.change (e) ->
      $('.p').html ''
      if @disabled
        return alert('File upload not supported!')
      F = @files
      if F and F[0]
        i = 0
        while i < F.length
          if F[i].type.match('image.*')
            _this.renderInstanceImage F[i], fileinput, settings, i

          else _this.renderLabelFileName F[i].name, "error"
          i++
      return
    return

  initiateProfileImage: ->
    _this = this
    fileElement = $('#file').attr('accept', 'image/jpeg,image/png,image/gif')
    settings =
      thumbnail_size: 100
      thumbnail_bg_color: '#ddd'
      thumbnail_border: '3px solid white'
      thumbnail_border_radius: '3px'
      label_text: ''
      warning_message: 'Not an image file.'
      warning_text_color: '#f00'
      input_class: 'custom-file-input button button-primary button-block'
    # when the file is read it triggers the onload event above.
    # handle input changes
    fileElement.change (e) ->
      $('.profile-img-block').html ''
      if @disabled
        return alert('File upload not supported!')
      F = @files
      if F and F[0]
        i = 0
        while i < F.length
          if F[i].type.match('image.*')
            _this.renderProfileImage F[i], fileElement, settings
            _this.renderLabelFileProfile F[i].name, "success"

          else
            _this.renderLabelFileProfile F[i].name, 'error'
            _this.downButton("error")
            fileElement.val(null)

          i++
      return _this.files = @files
    return
  triggerRemoveFile: ()  ->
    _this = this
    $(".remove-image").on 'click', (event) ->
      index = $(this).data('index')
      console.log(index)
      _this.removeFile(index)
      return
  removeFile: (index) ->
    _this = this
    files = document.getElementById('fileupload').files
    newList = []
    console.log(files)
    fl=files.length
    i=0

    for i in [0...files.length]
      if i != index
        newList.push(files.item(i))
    console.log(newList)
    document.getElementById('fileupload').val = newList
    console.log(document.getElementById('fileupload').val)
    return

### ------------------
# - Custom Plugins -
# ------------------
# All custom plugins are defined below.
###

###
# BOX REFRESH BUTTON
# ------------------
# This is a custom plugin to use with the component BOX. It allows you to add
# a refresh button to the box. It converts the box's state to a loading state.
#
# @type plugin
# @usage $("#box-widget").boxRefresh( options );
###

(($) ->

  $.fn.boxRefresh = (options) ->
# Render options
    settings = $.extend({
      trigger: '.refresh-btn'
      source: ''
      onLoadStart: (box) ->
      onLoadDone: (box) ->

    }, options)
    #The overlay
    overlay = $('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>')

    start = (box) ->
#Add overlay and loading img
      box.append overlay
      settings.onLoadStart.call box
      return

    done = (box) ->
#Remove overlay and loading img
      box.find(overlay).remove()
      settings.onLoadDone.call box
      return

    @each ->
#if a source is specified
      if settings.source == ''
        if console
          console.log 'Please specify a source first - boxRefresh()'
        return
      #the box
      box = $(this)
      #the button
      rBtn = box.find(settings.trigger).first()
      #On trigger click
      rBtn.on 'click', (e) ->
        e.preventDefault()
        #Add loading overlay
        start box
        #Perform ajax call
        box.find('.box-body').load settings.source, ->
          done box
          return
        return
      return

  return
) jQuery


###
# TODO LIST CUSTOM PLUGIN
# -----------------------
# This plugin depends on iCheck plugin for checkbox and radio inputs
#
# @type plugin
# @usage $("#todo-widget").todolist( options );
###

(($) ->

  $.fn.todolist = (options) ->
# Render options
    settings = $.extend({
      onCheck: (ele) ->
      onUncheck: (ele) ->

    }, options)
    @each ->
      if typeof $.fn.iCheck != 'undefined'
        $('input', this).on 'ifChecked', (event) ->
          ele = $(this).parents('li').first()
          ele.toggleClass 'done'
          settings.onCheck.call ele
          return
        $('input', this).on 'ifUnchecked', (event) ->
          ele = $(this).parents('li').first()
          ele.toggleClass 'done'
          settings.onUncheck.call ele
          return
      else
        $('input', this).on 'change', (event) ->
          ele = $(this).parents('li').first()
          ele.toggleClass 'done'
          settings.onCheck.call ele
          return
      return

  return
) jQuery

# ---