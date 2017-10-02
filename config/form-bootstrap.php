<?php

$config = [

	'formGroup' => '<div class="form-group">{{label}}<div class="col-sm-10">{{input}}</div></div>',

    //'inputContainer' => '<div class="form-group">{{content}}</div>',
    //'inputContainerError' => '<div class="form-group has-error has-feedback {{type}}{{required}}">{{content}}{{error}}</div>',

	'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
	
	// nestingLabel used for checkbox
    'nestingLabel' => '{{hidden}}<div class="col-sm-offset-2 col-sm-10"><label {{attrs}}>{{input}}{{text}}</label></div>',

	'input' => '<input class="form-control {{extraclass}}" type="{{type}}" name="{{name}}"{{attrs}}/>',
	//'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',

    'error' => '<div class="alert alert-danger" >{{content}}</div>',

];

?>