$.StoreCamp.dropzone =
  paramName: 'file'
  maxFilesize: 2048
  acceptedFiles: '.mp4, .webm, image/*,application/pdf,.psd,.docx,.doc,.aac,.ogg,.oga,.mp3,.wav, .zip, .rar, .gz'
  addRemoveLinks: true
  removedfile: (file) ->
    _ref = file.previewElement
    if _ref != null
      _ref.parentNode.removeChild file.previewElement
      toastr.info('File by name: ' + result.filename, 'Removed')
    else return
    response = JSON.parse(file.xhr.responseText)
    result = JSON.parse(response.media).result
    $.ajax({
      type: 'GET',
      url: APP_URL + "/admin/media/delete/" + result.id,
      dataType: 'json'
    });
  accept: (file, done) ->
    done()
    return
  init: ->
    _this = this
    @on 'success', (file, messageOrDataFromServer, myEvent) ->
      folderBody = $('#folder-body')
      folderBodyUrl = folderBody.data('folder-url')
      response = JSON.parse(file.xhr.responseText)
      result = JSON.parse(response.media).result
      $.ajax
        url: folderBodyUrl
        type: 'GET'
        success: (data) ->
          folderBody.html data
          $.StoreCamp.media.fileSystemEvents()
          toastr.info('File uploaded by name: ' + result.filename, 'Success')
          return
        error: (xhr, textStatus, errorThrown) ->
          toastr.error('Sorry error appeared', 'Error updating file list')
          console.error xhr
          return
        false
      return
    @on 'sending', (file, xhr, formData) ->
#  Will send the filesize along with the file as POST data.
      formData.append("filesize", file.size)
      return
    @on 'error', (error, errorMessage, xhr) ->
      toastr.error("File by name: " + error.name + " not loaded", "Error")
      return
    @on 'addedfile', (file) ->
      file.previewElement.addEventListener "click", () =>
        _this.removeFile(file)
      return

Dropzone.options.myAwesomeDropzone =
  $.StoreCamp.dropzone
Dropzone.options.myAwesomeDropzoneBody =
  $.StoreCamp.dropzone