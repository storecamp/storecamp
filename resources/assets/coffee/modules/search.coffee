timer = undefined
$.StoreCamp.search =
  selectors: $.StoreCamp.options.search
  activate: ->
    _this = this
    searchBTN = @selectors.searchBTN
    searchResult = @selectors.searchResult
    searchBTN.click (e) ->
      e.preventDefault()
      _this.search()
      return
    $('a.search-button').on 'click', (event) ->
      event.preventDefault()
      $('#search input[type="search"]').focus()
      $('#search').addClass('active')
      $('body').css 'overflow': 'hidden'
      return
    $('#search, #search button.close').on 'click keyup', (event) ->
      if event.target == this or event.target.className == 'close' or event.target.className == 'icon-close' or event.keyCode == 27
        $(this).removeClass 'active'
        searchResult.html ''
        $('#search .search-input').val('')
        $('body').css 'overflow': 'auto'
        _this.stopSearch()
      return
    #Do not include! This prevents the form from submitting for DEMO purposes only!
    $('#search form').submit (event) ->
      event.preventDefault()
      false
    $('#search > form > input[type="search"]').keyup (e) ->
      if (e.keyCode == 13 and $('#search .search-input').val().length > 0) or $('#search .search-input').val().length > 0
        _this.search()
      else
        _this.stopSearch()
      return
    return
  search: ->
    _this = this
    searchResult = @selectors.searchResult
    timer = setTimeout((->
      $.ajax
        url: APP_URL+'/searchQuery?search=' + $('[name="search"]').val()
        method: 'get'
        success: (markup) ->
          searchResult.html markup
          return
        error: (err) ->
          searchResult.html '<h3 class="text-danger"> try once more... </h3>'
          console.log err.type
          _this.stopSearch()
          return
      return
    ), 500)
    return
  stopSearch: ->
    clearTimeout timer
    return

do $.StoreCamp.search.activate