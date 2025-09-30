<h2><?php echo CONTACT_FORM; ?></h2>
<form method="post" action="">
    <label><?php echo USERNAME; ?>:</label>
    <input type="text" name="username" /><br />

    <label><?php echo BIRTHDAY; ?>:</label>
    <input type="text" name="birthday" /><br />

    <label><?php echo ADDRESS; ?>:</label>
    <input type="text" name="address" /><br />

    <label><?php echo MAIL; ?>:</label>
    <input type="text" name="mail" /><br />

    <label><?php echo PHONE; ?>:</label>
    <input type="text" name="phone" /><br />

    <label><?php echo COMMENT; ?>:</label>
    <textarea name="comment"></textarea><br />

    <input type="reset" value="<?php echo RESET; ?>" />
    <input type="submit" value="<?php echo SUBMIT; ?>" />
</form>
