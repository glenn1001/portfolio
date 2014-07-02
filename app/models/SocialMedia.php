<?php

class SocialMedia extends \Eloquent {
	protected $table = 'social_media';

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