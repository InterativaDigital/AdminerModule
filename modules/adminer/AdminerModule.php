<?php

class AdminerModule extends CWebModule
{
    public $users = array(); // array('admin');
    public $roles = array(); // array('Administrator');
    public $ips = array(); // array of allowed IPs

    public $debug = false;

    public function init()
    {
        Yii::app()->params['adminerPath'] = Yii::getPathOfAlias('adminer.adminer');
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action))
        {
            $disable = in_array(Yii::app()->user->name, $this->users);

            foreach ($this->roles as $role)
            {
                $disable = $disable || Yii::app()->user->checkAccess($role);
            }

            $disable = $disable || in_array($this->getIp(), $this->ips);

            if (!$disable)
            {
                throw new CHttpException(404, 'The requested page does not exist.');
            }

            return true;
        }
        else
        {
            return false;
        }
    }

    public function getIp()
    {
        $strRemoteIP = $_SERVER['REMOTE_ADDR'];
        if (!$strRemoteIP)
        {
            $strRemoteIP = urldecode(getenv('HTTP_CLIENTIP'));
        }
        if (getenv('HTTP_X_FORWARDED_FOR'))
        {
            $strIP = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_X_FORWARDED'))
        {
            $strIP = getenv('HTTP_X_FORWARDED');
        }
        elseif (getenv('HTTP_FORWARDED_FOR'))
        {
            $strIP = getenv('HTTP_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_FORWARDED'))
        {
            $strIP = getenv('HTTP_FORWARDED');
        }
        else
        {
            $strIP = $_SERVER['REMOTE_ADDR'];
        }

        if ($strRemoteIP != $strIP)
        {
            $strIP = $strRemoteIP . ", " . $strIP;
        }

        return $strIP;
    }
}
