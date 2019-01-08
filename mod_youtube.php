<?php

defined('_JEXEC') or die;

$videoid = $params->get('videoid');
$playlist = $params->get('playlist');

$label = preg_replace('/[^a-zA-Z0-9]/', '', $params->get('label') );
$label = strtolower($label);

if( empty($label) ) $label = $videoid;

JFactory::getDocument()->addScriptDeclaration('var tag=document.createElement(\'script\');'
	.'tag.src="https://www.youtube.com/iframe_api";'
	.'var firstScriptTag=document.getElementsByTagName(\'script\')[0];'
	.'firstScriptTag.parentNode.insertBefore(tag,firstScriptTag);'
	);

$pretext	= $params->get('pretext');
$posttext	= $params->get('posttext');

require JModuleHelper::getLayoutPath('mod_youtube',$params->get('layout', 'default'));
