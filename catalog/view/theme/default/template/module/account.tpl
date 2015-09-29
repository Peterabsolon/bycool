<div class="list-group">
    <?php if (!$logged) { ?>
    <a href="<?php echo $login; ?>" class="list-group-item">
        <?php echo $text_login; ?>
    </a>
    <a href="<?php echo $register; ?>" class="list-group-item">
        <?php echo $text_register; ?>
    </a
    <?php } ?>
    <a href="<?php echo $account; ?>" class="list-group-item">
        <?php echo $text_account; ?>
    </a>
    <?php if ($logged) { ?>
    <a href="<?php echo $address; ?>" class="list-group-item">
        <?php echo $text_address; ?>
    </a>
    <a href="<?php echo $edit; ?>" class="list-group-item">
        <?php echo $text_edit; ?>
    </a>
    <a href="<?php echo $password; ?>" class="list-group-item">
        <?php echo $text_password; ?>
    </a>
    <a href="<?php echo $return; ?>" class="list-group-item">
        <?php echo $text_return; ?>
    </a>
    <a href="<?php echo $warranty; ?>" class="list-group-item">
        <?php echo $text_warranty; ?>
    </a>
    <a href="<?php echo $logout; ?>" class="list-group-item">
        <?php echo $text_logout; ?>
    </a>
    <?php } ?>
</div>