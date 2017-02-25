$.StoreCamp.fileLinker =
  emitter: $.StoreCamp.eventEmitter()
  options: {
    typesAvailable: ['']
    fileLinker: $('.file-linker')
    fileLinkerSelectedBlock: $('.selected-block')
    selectedItemsClassPath: ".selected-block .selected-item"
    requestUrl: $('.file-linker').attr('data-requestUrl') ? APP_URL + "/admin/media/file_linker/local"
    fileTypes: $('.file-linker').attr('data-file-types') ? "image, document, audio, video, archive"
    fileMultiple: $('.file-linker').attr('data-multiple') ? "false"
    disk: $('.file-linker').attr('data-disk') ? 'local'
    fileAttachOutputPath: $('.file-linker').attr('data-attach-output-path') ? "form .tab-content"
    fileLinkerModal: $('#fileLinker-modal')
    submitBtn: $('#fileLinker-modal').find('button[type=submit]')
    modalTitle:$('#fileLinker-modal').find('.modal-title')
    modalBody: $('#fileLinker-modal').find('.modal-body')
    preferredTag: $('.file-linker').attr('data-preferred-tag') ? "thumbnail"
    inputTemplateClass: "selected-files_input"
    fileBlockTemplate: (selectorId, content, fileName, href) ->
      "<div data-id='#{selectorId}' data-href='#{href}' class='col-xs-4 col-md-3 col-lg-2 selected-item'>#{content}<strong class='text-muted'>#{fileName}</strong></div>"
    inputTemplate: () ->
      """<input type="text" name="selected_files" class='hidden #{this.inputTemplateClass}'/>"""
  }
  activate: () ->
    _this = this
    _this.fileSystemEvents()
  fileSystemEvents: ->
    _this = this
    _this.options.fileLinkerModal.on 'shown.bs.modal', (event) ->
      fileLinker = $(event.relatedTarget)
      $(this).modal('show')
      if ($('#fileLinker-modal .modal-body').is(':empty'))
        _this.showFiles(_this.options.requestUrl)
      return
    return

  showFiles: (requestUrl) ->
    _this = this
    _token = $('meta[name="csrf-token"]').attr('content');
    dataObject = {
      multiple: _this.options.fileMultiple
      dataTypes: _this.options.fileTypes
      _token: _token
    }
    $.ajax
      url: requestUrl
      type: 'POST'
      data: dataObject
      _method: "post"
      headers: {
        'X-CSRF-TOKEN': _token
      },
      success: (data) ->
        _this.options.modalBody.html(data)
        _this.fileEvents()
        _this.folderEvents([$(".directory-item .select-folder"), $(".navigation-links a")])
        _this.reindexSelectedFiles()
        return
      error: (xhr, textStatus, errorThrown) ->
        $.StoreCamp.templates.alert('danger', xhr.statusText, 'Sorry error appeared')
        console.error xhr
        return
      false
  fileEvents: () ->
    _this = this
    $(".files .file-item").on "click", (event) ->
      event.preventDefault()
      btn = $(this)
      selectId = btn.attr('data-file-id')
      fileItemCheckBox = btn.find('input:checkbox')
      selectUrl = btn.attr('data-href')
      selectFileName = btn.attr('data-file-name')
      folderBody = $('#folder-body')
      _this.selectFile(btn, selectId, fileItemCheckBox, selectFileName, selectUrl)
      _this.selectedMakeOutput()
  folderEvents: (selectors) ->
    _this = this
    selectors.forEach (item, i, arr) ->
      item.on "click", (event) ->
        event.preventDefault()
        btn = $(this)
        folderUrl = btn.attr('data-folder-url')
        folderId = btn.attr('data-folder-id')
        folderDisk = btn.attr('data-disk')
        fileItem = btn.closest('.directory-item')
        _this.selectFolder(folderUrl)
        return
  selectFile: (btn, selectId, fileItemCheckBox, selectFileName, selectUrl) ->
    _this = this
    $('.file-item').find('input:checkbox').iCheck('disable')
    if (_this.options.fileMultiple == "false")
      if btn.hasClass 'checked'
        btn.removeClass 'checked'
        fileItemCheckBox.iCheck('uncheck')
        fileItemCheckBox.iCheck('disable')
        $('.file-item').find('input:checkbox').iCheck('uncheck')
        $('.file-item').removeClass 'checked'
        _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'remove')
      else
        $('.file-item').find('input:checkbox').iCheck('uncheck')
        $('.file-item').removeClass 'checked'
        btn.addClass 'checked'
        fileItemCheckBox.iCheck('enable')
        fileItemCheckBox.iCheck('check')
        _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'add')
        fileItemCheckBox.iCheck('disable')
    else
      if btn.hasClass 'checked'
        btn.removeClass 'checked'
        fileItemCheckBox.iCheck('uncheck')
        fileItemCheckBox.iCheck('disable')
        _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'remove')
      else
        btn.addClass 'checked'
        fileItemCheckBox.iCheck('enable')
        fileItemCheckBox.iCheck('check')
        _this.manageToFileBlock(btn, selectFileName, selectId, selectUrl, 'add')
        fileItemCheckBox.iCheck('disable')
    _this.emitter.emit "selectedChanged"
    return
  manageToFileBlock: (btn, selectFileName, selectId, selectUrl, methodType) ->
    _this = this
    switch methodType
      when "add" then _this.fileBlockAddTemplate(btn)
      when "remove" then _this.fileBlockRemoveTemplate(btn)
      else return
  fileBlockAddTemplate: (btn) ->
    _this = this
    selectorId = btn.attr('data-file-id')
    href = btn.attr('data-href')
    content = btn.find(".mailbox-attachment-icon").html()
    fileName = btn.find(".mailbox-attachment-name").html()
    htmlContent = _this.options.fileBlockTemplate(selectorId, content, fileName, href)
    if(_this.options.fileMultiple == "false")
      $("#{_this.options.selectedItemsClassPath}").remove()
      _this.options.fileLinkerSelectedBlock.append(htmlContent)
    else
      _this.options.fileLinkerSelectedBlock.append(htmlContent)

  reindexSelectedFiles: () ->
    selectedItems = $("#{@.options.selectedItemsClassPath}")
    @_setFileBlockSelectedState selectedItems
  fileBlockRemoveTemplate: (btn) ->
    blockItem = $(".selected-block [data-id='#{btn.attr('data-file-id')}']");
    blockItem.remove()
  _setFileBlockSelectedState: (btn) ->
    btn.each (index) ->
      blockItem = $(".file-item[data-file-id='#{$(this).attr('data-id')}']")
      blockItem.addClass('checked')
      blockItem.find('input:checkbox').iCheck('disable')
      blockItem.find('input:checkbox').iCheck('check')
  _getFileBlockSelectedIds: (selector) ->
    items = []
    selector.each (index) ->
      items[index] = $(this).attr('data-id')
    return $.unique(items)
  selectFolder: (folderUrl) ->
    _this = this
    _this.showFiles(folderUrl)
  selectedMakeOutput: () ->
    _this = this
    outputBlock = $("#{@.options.fileAttachOutputPath}")
    if(outputBlock.length != 0 )
      generatedBlock = outputBlock.find("."+_this.options.inputTemplateClass)
      if(generatedBlock.length > 0)
        generatedBlock.val(@._getFileBlockSelectedIds $("#{@.options.selectedItemsClassPath}"))
      else
        outputBlock.append(@.options.inputTemplate())
        generatedBlock = outputBlock.find("."+_this.options.inputTemplateClass)
        generatedBlock.val(@._getFileBlockSelectedIds $("#{@.options.selectedItemsClassPath}"))

$.StoreCamp.fileLinker.activate()