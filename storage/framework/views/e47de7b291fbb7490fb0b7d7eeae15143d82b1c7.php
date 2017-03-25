<div class="box-comment" data-message-block="<?php echo e($message->id); ?>">
    <div class="media-left">
        
        
        
        
    </div>
    <div class="comment-text">
                         <span class="username">
                             <a href="<?php echo e(route("admin::users::show", $message->user->id)); ?>">
                            <?php echo e($message->user->name); ?>

                             </a>
                        <a style="margin: auto 10px;" data-href="<?php echo e(route('admin::reviews::deleteMessage', [$message->id])); ?>" data-message-block="<?php echo e($message->id); ?>" class="btn btn-danger btn-xs deleteMessage pull-right">Delete</a>
                        <a style="margin: auto 10px;" data-href="<?php echo e(route('admin::reviews::editMessage', [$message->id])); ?>" data-message-block="<?php echo e($message->id); ?>" class="btn btn-link btn-xs editMessage pull-right">Edit</a>
                        <span class="text-muted pull-right">Posted <?php echo e($message->created_at->diffForHumans()); ?></span>
                      </span>
        <hr>
        <p class="comment-text" id="<?php echo e($message->id); ?>"><?php echo e($message->body); ?></p>
        <div class="text-muted">
            <small>Posted <?php echo e($message->created_at->diffForHumans()); ?></small>
            <small> | Regards, <b><?php echo e($message->user->name); ?></b></small>
        </div>
    </div>
</div>