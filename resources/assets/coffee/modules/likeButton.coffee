$.StoreCamp.likeBTN =
  o:
    formID: ".like"
    buttonID: ".like .like-btn"
    base_url: $(".like .like-btn").attr("data-base-url")
    class_name: $(".like .like-btn").attr("data_class_name")
    object_id: $(".like .like-btn").attr("data_object_id")
    label: $(".like .label")
    redirectIfLogin: APP_URL + "/auth/login"
  activate: () ->
    _this = this
    checkForm = $("#{_this.o.formID}")
    if checkForm.length != 0
      $("#{_this.o.buttonID}").on "click", (e) ->
        e.preventDefault()
        formLike = $("#{_this.o.formID}")
        button = $("#{_this.o.buttonID}")
        buttonI = button.find('i')
        counter = formLike.find(".label").text()
        likeClone = formLike.clone()
        actionPerformed = false
        if (formLike.hasClass('liked'))
          data = {
            type: 'disliked'
            counter: counter
            }
          actionPerformed = true
          _this._disliked(formLike, button, buttonI, data)
        if(formLike.hasClass('disliked') && !actionPerformed)
          data = {
            type: 'liked'
            counter: counter
          }
          _this._liked(formLike, button, buttonI, data)
        $.ajax {
          type: 'GET'
          url: _this.o.base_url
          data:
            'class_name': _this.o.class_name
            'object_id': _this.o.object_id
          success: (data) ->
            if data == 'login'
              window.location.href = _this.o.redirectIfLogin
            if data.type == 'liked'
              _this._liked(formLike, button, buttonI, data)
              toastr.success('liked' , data.message)
            if data.type == 'disliked'
              _this._disliked(formLike, button, buttonI, data)
              toastr.success('disliked' , data.message)
            return
          error: (xhr, textStatus, errorThrown) ->
            formLike.replaceWith(likeClone)
            console.log 'error' + '   ' + xhr
            toastr.error(xhr.statusText, xhr.responseText)
            return
        }, 'html'
        return
    return

  _liked: (formLike, button, buttonI, message) ->
      _this = this
      console.log(message)
      buttonI.addClass 'text-danger'
      buttonI.removeClass 'fa-heart-o'
      buttonI.addClass 'fa-heart'
      button.html(buttonI)
      formLike.removeClass('disliked')
      formLike.addClass('liked')
      _this.o.label.html message.counter++
      return
  _disliked: (formLike, button, buttonI, message) ->
      _this = this
      console.log(message)
      if (message.type != "liked")
        buttonI.removeClass 'text-danger'
        buttonI.addClass 'fa-heart-o'
        buttonI.removeClass 'fa-heart'
        button.html(buttonI)
        formLike.removeClass('liked')
        formLike.addClass('disliked')
        _this.o.label.html message.counter--
        formLike.find('.like-message').remove()
      return
$.StoreCamp.likeBTN.activate()