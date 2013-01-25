<?php

Yii::import('application.models._base.BaseAlumnos');

class Alumnos extends BaseAlumnos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}