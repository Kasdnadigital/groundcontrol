<?PHP get_header(); ?>

<style>
	.breadcrumbs-container{
		display: none;
	}
	.content{
		padding: 40px 0;
	}
</style>

<div class="template-inner section">
    <div class="container">
        <div class="content">
            <h1>Page can't be found!</h1>
			<p>Sorry, it looks like this page doesn't exist. to get back on track, follow one of the links below:</p>
			<div class="nav-menu">
			<?php wp_nav_menu(array('menu'=>'error404')); ?>
			</div>
		</div>
    </div>
</div>

<?PHP get_footer(); ?>