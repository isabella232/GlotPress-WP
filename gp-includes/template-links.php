<?php

function gp_link_get( $url, $text, $attrs = array() ) {
	$attributes = gp_html_attributes( $attrs );
	return sprintf('<a href="%1$s" %2$s>%3$s</a>', clean_url( $url ), $attributes, $text );
}

function gp_link() {
	$args = func_get_args();
	echo call_user_func_array('gp_link_get', $args);
}

function gp_project_link_get( &$project_or_slug, $text, $attrs = array() ) {
	return gp_link_get( gp_project_url( $project_or_slug ), $text, $attrs );
}

function gp_project_link() {
	$args = func_get_args();
	echo call_user_func_array('gp_project_link_get', $args);
}

function gp_html_attributes( $attrs ) {
	$attrs = wp_parse_args( $attrs );
	$strings = array();
	foreach( $attrs as $key => $value ) {
		$strings[] = $key.'="'.attribute_escape( $value ).'"';
	}
	return implode( ' ', $strings );
}