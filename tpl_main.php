<?php
/*
Template Name: ГЛАВНАЯ страница
*/
?>

<?php get_header(); ?>

<?php get_template_part('blocks/main/welcome', 's2s'); ?>
<?php get_template_part('blocks/main/about', 's2s'); ?>
<?php get_template_part('blocks/main/counter', 's2s'); ?>
<?php get_template_part('blocks/main/team', 's2s'); ?>
<?php get_template_part('blocks/main/works', 's2s'); ?>
<?php get_template_part('blocks/main/video', 's2s'); ?>

<?php get_footer(); ?>