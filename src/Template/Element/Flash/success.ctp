<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success message success" onclick="this.classList.add('hidden')"><?= $message ?>
	<a href="#" class="close" onclick="$(this).parent().fadeOut();return false;">&times;</a>
</div>
