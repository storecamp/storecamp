$.StoreCamp.likeBTN =
  o:
    formID: $(".like")
    buttonID: $(".like .like-btn")
    base_url: $(".like .like-btn").attr("data-base-url")
    class_name: $(".like .like-btn").attr("data_class_name")
    object_id: $(".like .like-btn").attr("data_object_id")
    label: $(".like .label")
    redirectIfLogin: APP_URL + "/auth/login"
  activate: () ->
    _this = this
    if _this.o.formID.length != 0
      _this.o.buttonID.on "click", (e) ->
        button = _this.o.buttonID
        buttonI = button.find('i')
        e.preventDefault()
        $.ajax {
          type: 'GET'
          url: _this.o.base_url
          data:
            'class_name': _this.o.class_name
            'object_id': _this.o.object_id
          success: (data) ->
            if data == 'login'
              window.location.href = _this.o.redirectIfLogin
            if data[0] == 'liked'
              buttonI.addClass 'text-danger'
              buttonI.removeClass 'fa-heart-o'
              buttonI.addClass 'fa-heart'
              button.html(buttonI)
              _this.o.label.html data[1]
              _this.o.formID.find(".label").after $('<span/>',
                'text': data[2]
                'class': 'like-message')
              $('span .like-message').animate {
                opacity: 0.25
                left: '+=50'
                height: 'toggle'
              }, 200
            else
              buttonI.removeClass 'text-danger'
              buttonI.addClass 'fa-heart-o'
              buttonI.removeClass 'fa-heart'
              button.html(buttonI)
              _this.o.label.html data[1]
              _this.o.formID.find('.like-message').remove()
            return
          error: (data) ->
            console.log 'error' + '   ' + data
            return
        }, 'html'
        return
    return
$.StoreCamp.likeBTN.activate()