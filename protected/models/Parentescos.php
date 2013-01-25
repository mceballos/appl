<?php

Yii::import('application.models._base.BaseParentescos');

class Parentescos extends BaseParentescos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}