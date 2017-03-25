<?php if(isset($product)): ?>
    <?php echo e(Form::model($product, ['method' => 'PUT', 'files' => false, 'route' => ['admin::products::update', $product->unique_id]])); ?>

<?php else: ?>
    <?php echo e(Form::open(['files' => false, 'route' => 'admin::products::store'])); ?>

<?php endif; ?>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#general" data-toggle="tab">General</a></li>
        <li><a href="#attributes" data-toggle="tab">Attributes</a></li>
        <li><a href="#extra" data-toggle="tab">Extra</a></li>
        <li><a href="#image" data-toggle="tab">Image</a></li>
        <li><a href="#activity" data-toggle="tab">Db Activity</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="general">
            <input type="text" name="selected_files" value="" class="hidden">
            <div class="form-group">
                <?php echo e(Form::label('title', 'Title:')); ?>

                <?php echo e(Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title'])); ?>

                <?php echo $errors->first('title', '<div class="text-danger">:message</div>'); ?>

            </div>
            <div class="form-group">
                <label class="control-label" for="input-price">Price</label>
                <?php echo e(Form::text('price', old('price'), ["id" => "input-price", "placeholder" => "Price", "class" => "form-control"])); ?>

                <?php echo $errors->first('price', '<div class="text-danger">:message</div>'); ?>


            </div>
            <div class="clearfix"></div>
            <?php echo $__env->make('admin.products.category_chooser_modal', [$categories, $chosenCategory], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.components.description-form', [$property_name='body'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="form-group">
                <label class="control-label" for="input-date-available">Date Available</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <?php echo e(Form::text('date_available', isset($product) ? old('date_available') : date('Y-m-d'), ["id" => "input-date_available", "placeholder" => "Date Available", "data-date-format" => "yyyy-mm-dd", "class" => "form-control simple_date"])); ?>

                    <?php echo $errors->first('date_available', '<div class="text-danger">:message</div>'); ?>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="input-status">Availability</label>
                <?php echo e(Form::select('availability', [1 => "Enabled", 0 => "Disabled"], old('availability'), ["id" => "input-availability", 'class' => 'form-control'])); ?>

                <?php echo $errors->first('availability', '<div class="text-danger">:message</div>'); ?>

            </div>
        </div>
        <div class="tab-pane" id="attributes">
            <div class="table-responsive">
                <table id="attribute" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-left">Attribute</td>
                        <td class="text-left">Text</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($product)): ?>
                        <?php $key = -1; ?>
                        <?php $__currentLoopData = $product->attributeGroupDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $key++; ?>
                            <tr id="attribute-row<?php echo e($key); ?>">
                                <td class="text-left" style="width: 20%;">
                                    <?php echo e(buildSelect(route('admin::attributes::get::json'), 'product_attribute['.$key.'][attr_description_id]', false , $attributesList, [$attribute->pivot->attr_description_id => $attribute->name], "selector")); ?>

                                    <?php echo $errors->first('availability', '<div class="text-danger">:message</div>'); ?>

                                </td>
                                <td class="text-left">
                                    <div class="input-group"><span class="input-group-addon"><i
                                                    class="fa fa-link"></i></span>
                                        <textarea
                                                name="product_attribute[<?php echo e($key); ?>][value]" rows="2" placeholder="Text"
                                                class="form-control"><?php echo e($attribute->pivot->value); ?></textarea></div>
                                </td>
                                <td class="text-left">
                                    <button type="button" onclick="$('#attribute-row<?php echo e($key); ?>').remove();"
                                            data-toggle="tooltip"
                                            title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td class="text-left">
                            <a role="button" onclick="addAttribute();" data-toggle="tooltip" title="Add Attribute"
                               class="btn btn-primary" data-original-title="Add Attribute"><i
                                        class="fa fa-plus-circle"></i></a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="tab-pane" id="extra">
            <div class="form-group required">
                <label class="control-label" for="input-model">Model</label>
                <?php echo e(Form::text('model', old('model'), ["id" => "input-model", "placeholder" => "Model", "class" => "form-control"])); ?>

                <?php echo $errors->first('model', '<div class="text-danger">:message</div>'); ?>


            </div>
            <div class="form-group">
                <label class="control-label" for="input-sku"><span data-toggle="tooltip" title=""
                                                                   data-original-title="Stock Keeping Unit">SKU</span></label>
                <?php echo e(Form::text('sku', old('sku'), ["id" => "input-sku", "placeholder" => "SKU", "class" => "form-control"])); ?>

                <?php echo $errors->first('sku', '<div class="text-danger">:message</div>'); ?>


            </div>
            <div class="form-group">
                <label class="control-label" for="input-upc">
                    <span data-toggle="tooltip" title=""
                          data-original-title="Universal Product Code">UPC</span>
                </label>
                <?php echo e(Form::text('upc', old('upc'), ["id" => "input-upc", "placeholder" => "UPC", "class" => "form-control"])); ?>

                <?php echo $errors->first('upc', '<div class="text-danger">:message</div>'); ?>


            </div>
            <div class="form-group">
                <label class="control-label" for="input-ean"><span data-toggle="tooltip" title=""
                                                                   data-original-title="European Article Number">EAN</span></label>
                <?php echo e(Form::text('ean', old('ean'), ["id" => "input-ean", "placeholder" => "EAN", "class" => "form-control"])); ?>

                <?php echo $errors->first('ean', '<div class="text-danger">:message</div>'); ?>


            </div>
            <div class="form-group">
                <label class="control-label" for="input-jan"><span data-toggle="tooltip" title=""
                                                                   data-original-title="Japanese Article Number">JAN</span></label>
                <?php echo e(Form::text('jan', old('jan'), ["id" => "input-jan", "placeholder" => "JAN", "class" => "form-control"])); ?>

                <?php echo $errors->first('jan', '<div class="text-danger">:message</div>'); ?>


            </div>
            <div class="form-group">
                <label class="control-label" for="input-isbn"><span data-toggle="tooltip" title=""
                                                                    data-original-title="International Standard Book Number">ISBN</span></label>
                <?php echo e(Form::text('isbn', old('isbn'), ["id" => "input-isbn", "placeholder" => "ISBN", "class" => "form-control"])); ?>

                <?php echo $errors->first('isbn', '<div class="text-danger">:message</div>'); ?>


            </div>
            <div class="form-group">
                <label class="control-label" for="input-mpn"><span data-toggle="tooltip" title=""
                                                                   data-original-title="Manufacturer Part Number">MPN</span></label>
                <?php echo e(Form::text('mpn', old('mpn'), ["id" => "input-mpn", "placeholder" => "MPN", "class" => "form-control"])); ?>

                <?php echo $errors->first('mpn', '<div class="text-danger">:message</div>'); ?>


            </div>

            <div class="form-group">
                <label class="control-label" for="input-quantity">Quantity</label>
                <?php echo e(Form::text('quantity', isset($product) ? $product->quantity ? $product->quantity : old('quantity') : null, ["id" => "input-quantity", "placeholder" => "Quantity", "class" => "form-control"])); ?>

                <?php echo $errors->first('quantity', '<div class="text-danger">:message</div>'); ?>


            </div>

            <div class="form-group">
                <label class="control-label" for="input-stock-status">
                    <span data-toggle="tooltip" title=""
                          data-original-title="Status shown when a product is out of stock">Out Of Stock Status</span></label>
                <?php echo e(Form::select('stock_status', config('constants.stock-statuses'), old('stock_status'), ["id" => "input-stock-status", "class" => "form-control"])); ?>

                <?php echo $errors->first('quantity', '<div class="text-danger">:message</div>'); ?>

            </div>
            <div class="form-group">
                <label class="control-label" for="input-length">Dimensions (L x W x H) <b>cm</b></label>
                <div class="row">
                    <div class="col-sm-4">
                        <?php echo e(Form::text('length', old('length'), ["id" => "input-length", "placeholder" => "Length", "class" => "form-control"])); ?>

                        <?php echo $errors->first('length', '<div class="text-danger">:message</div>'); ?>

                    </div>
                    <div class="col-sm-4">
                        <?php echo e(Form::text('width', old('width'), ["id" => "input-width", "placeholder" => "Width", "class" => "form-control"])); ?>

                        <?php echo $errors->first('width', '<div class="text-danger">:message</div>'); ?>

                    </div>
                    <div class="col-sm-4">
                        <?php echo e(Form::text('height', old('height'), ["id" => "input-height", "placeholder" => "Height", "class" => "form-control"])); ?>

                        <?php echo $errors->first('height', '<div class="text-danger">:message</div>'); ?>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="input-weight">Weight <b>(Kg)</b></label>
                <?php echo e(Form::text('weight', old('weight'), ["id" => "input-weight", "placeholder" => "Weight", "class" => "form-control"])); ?>

                <?php echo $errors->first('weight', '<div class="text-danger">:message</div>'); ?>

            </div>
            <div class="form-group">
                <label class="control-label" for="input-sort-order">Sort Order</label>
                <?php echo e(Form::text('sort_order', old('sort_order'), ["id" => "input-sort_order", "placeholder" => "Sort Order", "class" => "form-control"])); ?>

                <?php echo $errors->first('sort_order', '<div class="text-danger">:message</div>'); ?>

            </div>
        </div>
        <!-- /.tab-content -->
        <div class="tab-pane" id="image">
            <div class="form-group">
                <?php echo e(Form::label('selected_files', 'Product Images', ['class' => 'control-label'])); ?>

                <div class="files selected-block">
                    <?php echo $__env->make('admin.fileLinker.file-linker_selected_list', [$model = isset($product) ? $product : null, $preferredTag], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="clearfix"></div>
                <?php echo $__env->make('admin.fileLinker.fileLinkerModal', [$model = isset($product) ? $product : null, $preferredTag, $btnMsg = 'attach images to product', $fileTypes = 'image', $multiple = true, $outputElementPath = "#general", $disk = "local"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <div class="tab-pane" id="activity">
        </div>
        <div class="form-group">
            <?php echo e(Form::submit(isset($product) ? 'Edit' : 'Save', ['class' => 'btn btn-primary'])); ?>

        </div>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php $__env->startSection('scripts-add'); ?>
    <script>
        var attribute_row = <?php echo isset($key) ? $key+1 : 0; ?>;

        function addAttribute() {
            html = '<tr id="attribute-row' + attribute_row + '">';
            html += '  <td class="text-left" style="width: 20%;"><select type="text" name="product_attribute[' + attribute_row + '][attr_description_id]" value="" placeholder="Attribute" class="form-control selector"></select></td>';
            html += '  <td class="text-left">';
            html += '<div class="input-group"><span class="input-group-addon"><i class="fa fa-link"></i></span><textarea name="product_attribute[' + attribute_row + '][value]" rows="2" placeholder="Text" class="form-control"></textarea></div>';
            html += '  </td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
            html += '</tr>';

            $('#attribute tbody').append(html);

            attributeautocomplete(attribute_row);

            attribute_row++;
        }

        function attributeautocomplete(attribute_row) {
            $('.selector').select2({
                ajax: {
                    url: APP_URL + '/admin/attributes/attrs/json ',
                    delay: 250,
                    data: function (params) {
                        var query = {
                            search: params.term, // search term
                            page: params.page
                        };
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    }
                }
            });
        }

        $('#attribute tbody tr').each(function (index, element) {
            attributeautocomplete(index);
        });
        <?php if(isset($product)): ?>
        var activtyTabContent = $('#activity');
        $.ajax({
            url: "<?php echo e(route('admin::audits::show', ["product", $product->id])); ?>",
            type: 'GET',
            success: function (data) {
                activtyTabContent.html(data);
            },
            error: function (xhr, textStatus, errorThrown) {
                activtyTabContent.html("<b class='text-warning'>"+xhr.responseJSON+"</b>"+ "<br><code class='text-warning'>" +'code - '+ xhr.status + ' statusText - '+xhr.statusText + "</code>");
            }
        });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>