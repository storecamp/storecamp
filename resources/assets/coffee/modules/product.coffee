$.StoreCamp.product =
  activate: () ->
    _this = this
    _this.categoryChooser()
  categoryChooser: () ->
    _this = this
    chosen = $('.choose-category')
    chosenField = $('.chosen-category')
    chooseOpener = $('.choose-opener')
    chooserModal = $('#category-chooser-modal')
    chooserModalFooter = chooserModal.find('.modal-footer')
    chosen.on 'click', (event) ->
      btn = $(event.target)
      chosenId = btn.data('choose-id')
      chosenPath = btn.data('choose-path')
      chooseName = btn.data('choose-name')
      chosenField.val chosenId
      chooserModalFooter.find('.chosen-status').html chosenPath + ' - <i class=\'fa fa-thumbs-o-up\'></i>'
      chooseOpener.text chosenPath
      chosen.closest('a').removeClass 'active'
      btn.closest('a').addClass 'active'
      return
    removeChooser = $('.remove-chooser')
    removeChooser.on 'click', (event) ->
      chosenField.val null
      chooseOpener.text null
      chosen.closest('a').removeClass 'active'
      chooserModalFooter.find('.chosen-status').html null
      return
    return
$.StoreCamp.product.activate()