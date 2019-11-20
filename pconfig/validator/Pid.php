<?php

namespace pconfig\validator;

/**
 * Description of Pid
 *
 * @author saisai
 */
class Pid extends \Phalcon\Validation\Validator
{
    protected $_options=[
	'message'=>'Pid'
    ];

    public function validate(\Phalcon\Validation $validation, $attribute)
    {
	$pids	 = $validation->getValue($attribute);
	$cname	 = $validation->getValue('cname');
	$cid	 = $validation->getValue('cid');
	if (!$cid && !$cname)
	{
	    return FALSE;
	}
	if ($cid)
	{
	    $c = \pconfig\Consumers::info($cid);
	}

	if ($cname)
	{
	    $c = \pconfig\Consumers::get4name($cname);
	}
	if (!$c)
	{
	    return FALSE;
	}
	# 读取关系
	$plist = \pconfig\Relation::idlist($c->id, 'cp');
	
	foreach ($pids as $pid)
	{
	    $pidlist = \pconfig\Project::pidlist($pid);
	   
	    if (!array_intersect($plist, $pidlist))
	    {
		$message = $this->getOption('message');
		$validation->appendMessage(
		new \Phalcon\Validation\Message($message, $attribute, 'Ip')
		);
		return FALSE;
	    }
	}
	return TRUE;
    }

}
