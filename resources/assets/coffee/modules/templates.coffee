$.StoreCamp.templates =
  additionalModalButtonRenderState: ""
  options:
    alertTemplate: (type, title, message) ->
      """<div class="alert alert-#{type} alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4>#{title}</h4>
          #{message}
          </div>"""
    additionalBtnTemplate: (text, id, className) ->
      """
    <button type="button" data-dismiss="modal" class="btn #{className}"  style='margin: auto 10px' id="#{id}">#{text}</button>
      """
    modalTemplate: (modalId, Message, Header, AriaLabel, Ok, Cancel) ->
        """<div class="modal fade" id="#{modalId}" tabindex="-1" role="dialog" aria-labelledby="#{AriaLabel}" aria-hidden="true">
        <div class="modal-dialog"><div class="modal-content"><div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>#{Header}</h3></div>
        <div class="modal-body"><p>#{Message}</p></div>
        <div class='clearfix'></div> <div class="modal-footer">
        #{$.StoreCamp.templates.additionalModalButtonRenderState}
        <button class="btn btn-default" data-dismiss="modal">#{Cancel}</button></div>
        </div></div></div>"""
  alert: (type, title, message) ->
    _this = this
    $('#alerts').append(_this.options.alertTemplate(type, title, message))
  modal: (modalId, Message, Header, btntrigger, AriaLabel, Ok, Cancel) ->
    _this = this
    title = Header ? 'Please confirm...'
    message = Message ? 'Are you sure?'
    okText = Ok ? 'Ok'
    cancelText = Cancel ? 'Cancel'
    modalId = modalId ? ''
    aria = AriaLabel ? modalId
    autoLaunch = true
    triggerLink = btntrigger ? $('.modal-auto-Trigger')
    # standard bootstrap modal html
    html = _this.options.modalTemplate(modalId, message, title, aria, okText, cancelText)
    defaultCallback = (target) ->
      window.location.hash = target.hash;
      return
    # generate a modal id unless one is specified
    if modalId == ''
      modalId = 'genericModal' + parseInt(Date.now() )
    # set-up the html for the modal
    html = _this.options.modalTemplate(modalId, message, title, AriaLabel, okText, cancelText)
    $('body').append html
    # set-up event handling
    genericModal = $('#' + modalId)
    confirmLink = triggerLink
    if autoLaunch
      genericModal.modal 'show'
      defaultCallback genericModal
    confirmLink.on 'click', (e) ->
      e.preventDefault()
      if autoLaunch
        genericModal.modal 'show'
      return
    $('button[data-dismiss="ok"]', genericModal).on 'click', ->
      genericModal.modal 'hide'
      defaultCallback confirmLink
      return
    return
  withAdditionalBtn: (text, id, className) ->
    _this = this
    _this.additionalModalButtonRenderState = _this.options.additionalBtnTemplate(text, id, className)
    return _this