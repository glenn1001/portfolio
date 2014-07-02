<?php

class Project extends \Eloquent {
	protected $fillable = [
		'image',
		'title',
		'body',
		'meta',
		'canonical',
		'pos',
		'active',
		'menu'
	];
}