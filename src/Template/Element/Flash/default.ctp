<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-info <?= h($class) ?>" onclick="this.classList.add('hidden');"><?= $message ?>
	<a href="#" class="close" onclick="$(this).parent().fadeOut();return false;">&times;</a>	
</div>
