<?php

class Project extends \Eloquent {
	protected $fillable = [
		'icon',
		'title',
		'url',
		'pos',
		'active'
	];
}