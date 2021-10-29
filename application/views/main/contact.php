
<div class = 'well'>
    
    <?php $attributes = array("class" => "form-horizontal", "name" => "contactform"); ?>
    <?php echo form_open("/contact", $attributes); ?>
    
    <fieldset>

        <legend> <h2> Contacts </h2> </legend>
        <p id = 'cont'> Send your opinion about KinoMonster!</p>
        
        <div class = 'form-group'>
            <input class = 'form-control' name = 'name' placeholden = 'Your name' type = 'text' value = "<?php echo set_value('name'); ?>" />
            <span class = 'text-danger'> <?php echo form_error('name'); ?> </span>
        </div>

        <div class = 'form-group'>
            <input class = 'form-control' name = 'email' placeholden = 'Your email' type = 'text' value = "<?php echo set_value('email'); ?>" />
            <span class = 'text-danger'> <?php echo form_error('email'); ?> </span>
        </div>

        <div class = 'form-group'>
            <input class = 'form-control' name = 'subject' placeholden = 'Subject' type = 'text' value = "<?php echo set_value('subject'); ?>" />
            <span class = 'text-danger'> <?php echo form_error('subject'); ?> </span>
        </div>

        <div class = 'form-group'>
            <textarea class = 'form-control' name = 'message' placeholden = 'Message' type = 'text' value = "<?php echo set_value('message'); ?>" ></textarea>
            <span class = 'text-danger'> <?php echo form_error('message'); ?> </span>
        </div>

        <div class = 'form-group'>
            <input name = 'sumbit' type = 'submit' class = 'btn btn-lg btn-warning pull-right' value = 'Send' />
        </div>

    </fieldset>
    <?php echo form_close(); ?>
    <?php echo $this -> session -> flashdata('msg'); ?>

</div>