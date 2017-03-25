<?php echo e(Form::open(['route' => ['admin::reviews::reply', $reviews->id], 'method' => 'PUT', "role" => "form", "class" => "confirmMessage" ])); ?>

<h2>Make a review</h2>
<!-- Message Form Input -->
<div class="form-group">
    <?php echo e(Form::textarea('reply_message', null, [
    'class' => 'form-control autogrow confirmMessageBody', "rows" => "3","placeholder"=>"Reply form here.."])); ?>

</div>
<div class="form-group text-right">
    <button class="btn btn-primary confirmMessageBtn" data-href="<?php echo e(route('admin::reviews::reply', $reviews->id)); ?>">Reply</button>
</div>
<?php echo e(Form::close()); ?>