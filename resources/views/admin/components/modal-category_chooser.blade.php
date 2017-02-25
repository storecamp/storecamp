<?php $parentId = isset($parent) ? $parent->id : null; ?>
<div class="form-group">
    {{ Form::label('parent_id', 'Parent Category', ['class' => 'control-label']) }}
    <a data-toggle="modal" href="#category-chooser-modal"
       class="form-control choose-opener col-sm-12">
        {{ isset($parent) ? $parent->name : "choose parent category" }}
    </a>
    <div class="clearfix"></div>
    {{ Form::input('text','parent_id', $parentId, ['class' => 'chosen-category hidden']) }}
</div>
<div class="modal" id="category-chooser-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Choose Parent Category</h4>
            </div>
            <div class="modal-body" style="word-wrap: break-word;">
                @include('admin.categories.category_chooser', [$chosenCategory = $category, $parent])
            </div>
            <div class="modal-footer">
                <h4 href="#" class="pull-left chosen-parent text-success"><b class="text-muted">Category </b>
                    <span class="chosen-status">
                        @if($parent)
                            {{ $parent->name }} - <i class="fa fa-thumbs-o-up"></i>
                        @endif
                    </span>
                </h4>
                <a role="button" class="btn btn-warning remove-chooser">remove category</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@push('scripts-add_on')
<script>
    $(function () {
        var chosen = $('.choose-parent'),
            chosenField = $(".chosen-category"),
            chooseOpener = $(".choose-opener"),
            chooserModal = $("#category-chooser-modal"),
            chooserModalFooter = chooserModal.find('.modal-footer');

        chosen.on("click", function(event) {
            var btn = $(event.target),
                chosenId = btn.data('choose-id'),
                chooseName = btn.data('choose-name');
            chosenField.val(chosenId);
            chooserModalFooter.find(".chosen-status").html(chooseName+ " - <i class='fa fa-thumbs-o-up'></i>");
            chooseOpener.text(chooseName);
            chosen.removeClass('active');
            btn.addClass('active');
        });
        var removeChooser = $(".remove-chooser");
        removeChooser.on("click", function(event) {
            chosenField.val(null);
            chooseOpener.text(null);
            chosen.removeClass('active');
            chooserModalFooter.find(".chosen-status").html(null);
        });
    });
</script>
<style>
    .category .btn.active {
        border: 2px dashed #3c8dbc;
    }
</style>
@endpush