<?php
/**
 * Taxonomy Views
 *
 * Usage:
 * Calls a function based on the taxonomy of a page, in the style of `[tax]_view`
 * Hyphens are converted into underscores automatically,
 * e.g. case-studies -> case_studies_view
 *
 * Global context changes should be made either after Initial Set Up in
 * this file, or in the `functions.php` file.
 *
 * Page specific context goes in the its `_view` function below.
 *
 * You have access to the $context and the $post ($context['post']).
 *
 */

function generic_view ($context) {
	Timber::render('tax/generic.twig', $context);
}



// DO NOT DO ANYTHING AFTER THIS!
$view = str_replace('-', '_',strtolower(get_query_var( 'taxonomy' )).'_view');
if (function_exists ($view)) {
	call_user_func($view, $context);
}
else {
	call_user_func('generic_view', $context);
}