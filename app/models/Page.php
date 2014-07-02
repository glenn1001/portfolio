<?php

class Page extends \Eloquent {
	protected $fillable = [
		'parent_id',
		'title',
		'body',
		'meta',
		'canonical',
		'pos',
		'active',
		'menu'
	];
}