<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="<?php echo e(route('send.message')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".<?php echo e(implode(', .',config('chatify.attachments.allowed_images'))); ?>, .<?php echo e(implode(', .',config('chatify.attachments.allowed_files'))); ?>" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <div class="chat-input">
    <!-- Other chat input elements -->
    <!--<button id="record-button">
        <i class="fas fa-microphone"></i>
    </button>-->
 

       <a href="your-video-call-service-link" target="_blank">
    <button>
        <i class="fas fa-video"></i> 
    </button>
</a>

</div>

        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span>
    </button>
      


    </form>
</div>
<?php /**PATH C:\wamp64\www\TwansaMessenger\resources\views/vendor/Chatify/layouts/sendForm.blade.php ENDPATH**/ ?>