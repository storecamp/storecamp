$.StoreCamp.media =
  options:
    players: plyr.setup(document.querySelectorAll('.js-player'), [])
    playerStatus: $('.play-status')
    mediaItems: $('.media[data-status="playable"]')
    directoryItem: $(".directories .directory-item")
    fileItem: $(".media")
    infoData:
      itemUrl: 'data-href'
      itemType: 'data-file-type'
      itemDisk: 'data-disk'
      itemModified: 'data-modified'
      itemName: 'data-filename'
      itemSize: 'data-size'
      itemId: 'data-file-id'

    infoTemplate: (filename, type, modified, size) ->
      """<div class='text-muted'>
                    <span class="container">
                      <small class="label pull-left bg-gray">name: </small>
                      <p class='pull-right'>#{filename}</p>
                     </span>
                    <span class="container">
                      <small class="label pull-left bg-gray">type: </small>
                      <p class='pull-right'>#{type}</p>
                    </span>
                    <span class="container">
                      <small class="label pull-left bg-gray">modified: </small>
                      <p class='pull-right'>#{modified}</p>
                    </span>
                    <span class="container">
                      <small class="label pull-left bg-gray">size: </small>
                      <p class='pull-right'>#{size}</p>
                    </span>
                    </div>
                    <div class='clearfix'></div>
    """
    videoTemplate: (mediaUrl, mediaId, filename, type, modified, size) ->
      """<div id='#{mediaId}' data-id='#{mediaId}' class="col-xs-12 col-md-12 col-lg-12 file-item media-plyr-item" style="margin-bottom: 10px">
                    <span class="mailbox-attachment-icon has-img">
                        <video class='js-player' controls>
                             <source src="#{mediaUrl}"
                                       type="video/mp4">
                              <source src="#{mediaUrl}"
                                        type="video/webm">
                         </video>
                    </span>
          #{this.infoTemplate(filename, type, modified, size)}
          </div>"""
    audioTemplate: (mediaUrl, mediaId, filename, type, modified, size) ->
        """ <div id='#{mediaId}' data-id='#{mediaId}' class="col-xs-12 col-md-12 col-lg-12 file-item media-plyr-item" style="margin-bottom: 10px">
                     <audio class='js-player' controls title="#{mediaUrl}">
                            <source src="#{mediaUrl}"
                                    type="audio/mp3">
                            <source src="#{mediaUrl}"
                                    type="audio/ogg">
                      </audio>
          #{this.infoTemplate(filename, type, modified, size)}
            </div>
        """
    documentTemplate: (mediaUrl, mediaId, filename, type, modified, size) ->
        """
          <div id='#{mediaId}' data-id='#{mediaId}' class="col-xs-12 col-md-12 col-lg-12 file-item" style="margin-bottom: 10px">
          <div class="text-center">
              <i class="item-icon fa fa-file-word-o fa-2x"></i>
          </div>
          <div class='clearfix'></div>
          #{this.infoTemplate(filename, type, modified, size)}
            </div>"""
    imageTemplate: (mediaUrl, mediaId, filename, type, modified, size) ->
        """
            <div id='#{mediaId}' data-id='#{mediaId}' class="col-xs-12 col-md-12 col-lg-12 file-item" style="margin-bottom: 10px">
            <div class="pull-left text-muted">
              <img src="#{mediaUrl}" class="item-image" alt="#{filename}">
            </div>
            <div class='clearfix'></div>
            #{this.infoTemplate(filename, type, modified, size)}
             </div>"""
    pdfTemplate: (mediaUrl, mediaId, filename, type, modified, size) ->
        """
           <div id='#{mediaId}' data-id='#{mediaId}' class="col-xs-12 col-md-12 col-lg-12 file-item" style="margin-bottom: 10px">
            <div class="text-center">
              <i class="item-icon fa fa-file-pdf-o fa-2x"></i>
           </div>
            <button class='btn btn-block' data-toggle="collapse" data-target="#pdf-file">Preview #{filename}</button>
            <div id="pdf-file" class="collapse">
                  <a class="pdf-file" href="#{mediaUrl}">#{filename}</a>
            </div>
            <div class='clearfix'></div>
            #{this.infoTemplate(filename, type, modified, size)}
             </div>"""

    archiveTemplate: (mediaUrl, mediaId, filename, type, modified, size) ->
        """
           <div id='#{mediaId}' data-id='#{mediaId}' class="col-xs-12 col-md-12 col-lg-12 file-item" style="margin-bottom: 10px">
            <div class="text-center">
              <i class="item-icon fa fa-archive fa-2x"></i>
           </div>
            <div class='clearfix'></div>
            #{this.infoTemplate(filename, type, modified, size)}
             </div>"""
  activate: ->
    _this = this
    _this.fileSystemEvents()
    if(_this.options.mediaItems.length > 0)
      _this.reindex(_this.options.mediaItems, _this.options.players)
    return

  fileSystemEvents: ->
    _this = this
    $(".media .info-btn").on "click", (event) ->
      event.preventDefault()
      btn = $(this)
      _this.infoFile(btn)
      return
    $(".media .delete-btn").on "click", (event) ->
      event.preventDefault()
      btn = $(this)
      deleteUrl = btn.attr('href')
      fileItem = btn.closest('.file-item')
      _this.deleteFile(deleteUrl, fileItem)
      return
    _this.options.directoryItem.find(".delete-file").on "click", (event) ->
      event.preventDefault()
      btn = $(this)
      deleteUrl = btn.attr('href')
      fileItem = btn.closest('.directory-item')
      _this.deleteFile(deleteUrl, fileItem)
      return
    return
  reindex: (mediaItems, players) ->
    _this = this
    [].forEach.call mediaItems, (item, i, arr) ->
      $(item).attr 'data-media-number', i
      return
  deleteFile: (deleteUrl, fileItem) ->
    _this = this
    $.ajax
      url: deleteUrl
      type: 'GET'
      success: (data) ->
        fileItem.remove()
        $.StoreCamp.templates.alert('success', data.title , data.message)
        return
      error: (xhr, textStatus, errorThrown) ->
        $.StoreCamp.templates.alert('danger', xhr.statusText, xhr.responseText)
        console.error xhr
        return
      false
  infoFile: (btn) ->
    _this = this
    fileItem = btn.closest('.media')
    itemUrl = fileItem.attr("#{_this.options.infoData.itemUrl}")
    itemType = fileItem.attr("#{_this.options.infoData.itemType}")
    itemDisk = fileItem.attr("#{_this.options.infoData.itemDisk}")
    itemModified = fileItem.attr("#{_this.options.infoData.itemModified}")
    itemName = fileItem.attr("#{_this.options.infoData.itemName}")
    itemSize = fileItem.attr("#{_this.options.infoData.itemSize}")
    itemId = fileItem.attr("#{_this.options.infoData.itemId}")
    console.log(itemType)
    if(itemType == "video")
      $.StoreCamp.templates.modal(itemId, _this.options.videoTemplate(itemUrl, itemId, itemName, itemType,itemModified, itemSize), itemName)
    if(itemType == "audio")
      $.StoreCamp.templates.modal(itemId, _this.options.audioTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName)
    if(itemType == "document")
      $.StoreCamp.templates.modal(itemId, _this.options.documentTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName)
    if(itemType == "image")
      $.StoreCamp.templates.modal(itemId, _this.options.imageTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName)
    if(itemType == "pdf")
      $.StoreCamp.templates.modal(itemId, _this.options.pdfTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName)
      $('.pdf-file').media({width:100+"%", height:400})
    if(itemType == "archive")
      $.StoreCamp.templates.modal(itemId, _this.options.archiveTemplate(itemUrl, itemId, itemName, itemType, itemModified, itemSize), itemName)

    item = $("#"+itemId)
    if item.length == 1
      players = plyr.setup item, []
    $('#'+itemId).on 'hidden.bs.modal', () ->
      if(itemType == "video")
        _this.pausePlayers(players)
      if(itemType == "audio")
        _this.pausePlayers(players)
      $(this).remove()
  pausePlayers: (players) ->
    _this = this
    players.forEach (player, i, arr) ->
      players[i].pause()
      $('.media-plyr-item').removeClass('playing')
      return

$.StoreCamp.media.activate()