<template>
  <div :id="modalId+'-modal'" :class="'modal fade ' + className">
        <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{title}}</h4>
                    </div>
                    <div class="modal-body">
                        {{content}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-info confirm-btn" data-loading-text="Loading&hellip;">{{confirm}}</button>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery';  // getting jQuery
    export default {
        props: {    
            title: {default: ""},
            content:{default: ""}, 
            modalId: {default: ""}, 
            className: {default: ""}, 
            confirm: {default: "Confirm"},
            confirmData: {default: {}}, 
            triggerConfirm: {default: null}
        },
        mounted: function() {
                let modal = $('#'+this.modalId+'-modal'),
                    form  = $('#'+this.modalId+'-form'),
                    _this = this,
                    triggerModal = $("[data-href*='"+this.modalId+"']"),
                    submitBtn = form.find('button[type=submit]');
                $("[data-href='"+this.modalId+"']").on('click', function(event) {
                    event.preventDefault();
                    modal.modal('show');
                });
                modal.find('.confirm-btn').on('click', function(event) {
                    event.preventDefault();
                    submitBtn.button('loading');
                    console.log('Confirm btn triggered!');
                    _this.triggerConfirm(event, _this.confirmData);
                    modal.modal('hide');
                    return false;
                });
                modal.on('hidden.bs.modal', function() {
                });
        }
    }
</script>
