# generate images live rendering
$.StoreCamp.imageLoad =
  activate: ->
    _this = this
    _this.initiateInstanceImage()
    _this.initiateProfileImage()
    return
  renderInstanceImage: (file, fileinput, settings) ->
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
        $('.p').append '<div class=\'s-12 m-12 l-12 xs-12\'><div class=\'thumbnail\' style=\'background: #ffffff\'><img class="img-responsive" src=\'' + image.src + '\' /><div class=\'caption\' style=\'position: absolute;right: 10px;top:10px;\'> <h4  style=\'background: black;padding: 4px; color: white\'>' + s.toFixed(2) + ' Mb </h4></div></div> </div> '
        _this.renderLabelFileName n, 'success'
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
            _this.renderInstanceImage F[i], fileinput, settings
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
      return
    return
$.StoreCamp.imageLoad.activate()