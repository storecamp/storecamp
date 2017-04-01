###*
# StoreCamp Demo Menu
# ------------------
# You should not use this file in production.
# This file is for demo purposes only.
###
$(document).ready ->
  $('.product-popup-gallery').magnificPopup
    delegate: 'a'
    type: 'image'
    tLoading: 'Loading image #%curr%...'
    mainClass: 'mfp-img-mobile'
    gallery:
      enabled: true
      navigateByImgClick: true
      preload: [
        0
        1
      ]
    image:
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
      titleSrc: (item) ->
        item.el.attr('title') + '<small>StoreCamp - online platform</small>'
    callbacks: beforeOpen: ->
      @st.mainClass = @st.el.attr('data-effect')
      return
    midClick: true

# ---
do ($) ->
  items = [$('.sidebar-menu'), $('.media_tags'), $('.site_sidebar'), $('.default-menu')]
  items.forEach (item, i , arr) ->
    nav = item
    makeAnchorActive = (navigtation) ->
      anchor = navigtation.find('a')
      current = window.location.href
      i = 0
      while i < anchor.length
        definedLinks = anchor[i].href
        if definedLinks == current
          activeParents = nav.attr('data-active-parents')
          if(activeParents)
            $(anchor[i]).parent().parent().closest('li').addClass('active')
            $(anchor[i]).parent().addClass('active')
          else
          $(anchor[i]).parent().addClass('active')
        i++
    makeAnchorActive(nav)
  return

