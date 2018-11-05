<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="uk-alert-warning" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p class="uk-text-center"><?= $message ?></p>
</div>
