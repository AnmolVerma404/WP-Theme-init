<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Theme</title>
    <!-- This allows wordpress to add hooks and stantard wordpress scripts
        e.g. we install a plugin from dashboard, that plugin when activated will target our Theme
        element using this type of wp_head() tag's only.
        The same is for body_class for CSS.
    -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>