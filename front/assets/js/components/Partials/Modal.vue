<template>
    <div :id="modalId+'-modal'" :class="'modal fade ' + className">
        <div class="modal-dialog">
            <div class="modal-content">
                <form :id="modalId+'-form'">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{title}}</h4>
                    </div>
                    <div v-html="content" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Cancel
                        </button>
                        <button v-if="withConfirm" type="submit" class="btn btn-sm btn-info confirm-btn"
                                data-loading-text="Loading&hellip;">{{confirm}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery';  // getting jQuery
    export default {
        props: {
            title: {default: ""},
            content: {default: ""},
            modalId: {default: ""},
            className: {default: ""},
            confirm: {default: "Confirm"},
            confirmData: {default: {}},
            withConfirm: {default: true},
            triggerConfirm: {default: null}
        },
        mounted: function () {
            let modal = $('#' + this.modalId + '-modal'),
                form = $('#' + this.modalId + '-form'),
                _this = this,
                triggerModal = $("[data-href*='" + this.modalId + "']"),
                submitBtn = form.find('button[type=submit]');
            $("[data-href='" + this.modalId + "']").on('click', function (event) {
                event.preventDefault();
                modal.modal('show');
                _this.eventHub.$emit('modal-opened', $(this));
            });
            modal.find('.confirm-btn').on('click', function (event) {
                event.preventDefault();
                submitBtn.button('loading');
                console.log('Confirm btn triggered!');
                _this.triggerConfirm(event, _this.confirmData, form);
                setTimeout(function () {
                    submitBtn.button('reset');
                    modal.modal('hide');
                }, 1000);
                return false;
            });
            modal.on('hidden.bs.modal', function () {
                _this.eventHub.$emit('modal-closed', $(this));
            });
        }
    }
</script>
