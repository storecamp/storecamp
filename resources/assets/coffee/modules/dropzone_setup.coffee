$.StoreCamp.dropzone =
  paramName: 'file'
  maxFilesize: 1024
  acceptedFiles: '.mp4,.mkv,.avi, image/*,application/pdf,.psd,.docx,.doc,.aac,.ogg,.oga,.mp3,.wav, .zip'
  accept: (file, done) ->
    done()
    return
  init: ->
    @on 'success', (file, messageOrDataFromServer, myEvent) ->
      folderBody = $('#folder-body')
      folderBodyUrl = folderBody.data('folder-url')
      $.ajax
        url: folderBodyUrl
        type: 'GET'
        success: (data) ->
          folderBody.html data
          players = plyr.setup()
          $.StoreCamp.media.reindex $('.media-plyr-item'), players
          return
        error: (xhr, textStatus, errorThrown) ->
          $.StoreCamp.templates.alert('danger', xhr.statusText, 'Sorry error appeared')
          console.error xhr
          return
        false
    return
Dropzone.options.myAwesomeDropzone =
  $.StoreCamp.dropzone
Dropzone.options.myAwesomeDropzoneBody =
  $.StoreCamp.dropzone

# ---
# generated by js2coffee 2.2.0