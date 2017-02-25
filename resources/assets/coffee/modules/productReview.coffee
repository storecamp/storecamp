$.StoreCamp.productReview =
  options: {
    confirmMessageClass: "confirmMessage"
    confirmMessageBody: "confirmMessageBody"
    confirmMessageBtn: "confirmMessageBtn"
    editMessageClass:  "editMessage"
    deleteMessageClass:  "deleteMessage"
    commentBlock: "box-comment"
    commentsBlock: "box-comments"
    confirmEditBtn: "confirm-edit"
  }
  activate: () ->
    this.postMessage()
    this.editMessage()
    this.deleteMessage()

  postMessage: () ->
    _this = this
    $("."+ this.options.confirmMessageBtn).on "click", (e) ->
      messageBlock = $(".#{_this.options.confirmMessageBody}")
      commentsBlock = $(".#{_this.options.commentsBlock}")
      message = messageBlock.val()
      href = $(e.target).attr("data-href")
      e.preventDefault()
      _token = $('meta[name="csrf-token"]').attr('content');
      dataObject = {
        reply_message: message
        _token: _token
      }
      $.ajax
        url: href
        type: 'put'
        _method: "put"
        headers: {
          'X-CSRF-TOKEN': _token
        },
        data: dataObject
        success: (data) ->
          toastr.success('success', "Message Created <br> Everything Ok")
          commentsBlock.append data.message
          _this.scrollToBottom()
          messageBlock.val(null)
          return
        error: (xhr, textStatus, errorThrown) ->
          toastr.error('Sorry error appeared', " #{xhr.statusText} ")
          console.error xhr
          return
        false
  editMessage: () ->
    _this = this
    $("."+ this.options.editMessageClass).on "click", (e) ->
      messsageBlockAttr = $(e.target).attr("data-message-block")
      messageBlock = $(".#{_this.options.commentsBlock} ##{messsageBlockAttr}")
      message = messageBlock.text()
      href = $(e.target).attr("data-href")
      textArea = "<textarea id='body-#{messsageBlockAttr}' name='message' class='form-control' rows='6' style='height: auto;margin-bottom: 10px'>#{message}</textarea>"
      $.StoreCamp.templates.withAdditionalBtn("Edit Message", null,
        "btn btn-primary pull-left #{_this.options.confirmEditBtn}")
        .modal("review-"+messsageBlockAttr, textArea, "Edit Message")
      $(".#{_this.options.confirmEditBtn}").on "click", (e) ->
        e.preventDefault()
        console.log(e)
        dataObject = {
          reply_message: $("#body-#{messsageBlockAttr}").val()
        }
        $.ajax
          url: href
          type: 'POST'
          data: dataObject
          _method: "post"
          success: (data) ->
            toastr.success('success', "Message Saved <br> Everything Ok")
            genericModal = $("#review-"+messsageBlockAttr)
            genericModal.modal 'hide'
            messageBlock.html(data.body)
            return
          error: (xhr, textStatus, errorThrown) ->
            toastr.error('Sorry error appeared', " #{xhr.statusText} ")
            console.error xhr
            return
          false

  deleteMessage: () ->
    _this = this
    $("."+ this.options.deleteMessageClass).on "click", (e) ->
      messsageBlockAttr = $(e.target).attr("data-message-block")
      messageBlock = $(".#{_this.options.commentBlock}[data-message-block='#{messsageBlockAttr}'")
      message = messageBlock.text()
      href = $(e.target).attr("data-href")
      e.preventDefault()
      console.log(e)
      $.ajax
        url: href
        type: 'POST'
        _method: "post"
        success: (data) ->
          toastr.success('success', "Message Deleted <br> #{data.message}")
          messageBlock.remove()
          return
        error: (xhr, textStatus, errorThrown) ->
          toastr.error('Sorry error appeared', " #{xhr.statusText} ")
          console.error xhr
          return
        false
  scrollToBottom: () ->
    _this = this
    $messageList = $(".#{_this.options.commentsBlock}")
    if $messageList.length
      $messageList.animate { scrollTop: $messageList[0].scrollHeight }, 500
    return

$.StoreCamp.productReview.activate()
