<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
	
	if (!empty($_REQUEST['object']['title'])){
		$object = wp_insert_post( array(
			'post_type'    => 'objects',
			'post_title'   => $_REQUEST['object']['title'],
			'post_status'  => 'publish',
			'post_content' => ''
		) );
		if ($object){
			foreach ($_REQUEST['object'] as $key=>$val){
				add_post_meta($object, $key, $val);
			}
			echo "Добавлен новый объект";
		}
		else{
			echo "Возникла ошибка при добавлении объекта";
		}
	}
	else{
		echo "Ошибка! Пустой запрос.";
	}
?>