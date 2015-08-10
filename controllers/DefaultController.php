<?php

class DefaultController extends CController
{

    public function actionIndex()
    {
        if (strpos(strtolower(Yii::app()->db->connectionString), 'mysql') !== false)
        {
            $_GET['username'] = Yii::app()->db->username;
            $_GET['password'] = Yii::app()->db->password;
            preg_match('/dbname=([a-zA-Z0-9_]{1,})/', Yii::app()->db->connectionString, $dbname);
            if (isset($dbname[1]))
            {
                $_GET['db'] = $dbname[1];
            }
        }
        
        include Yii::app()->params['adminerPath']."/include/bootstrap.inc.php";
        include Yii::app()->params['adminerPath']."/include/tmpfile.inc.php";

        $enum_length = "'(?:''|[^'\\\\]|\\\\.)*'";
        $inout = "IN|OUT|INOUT";

        if (isset($_GET["select"]) && ($_POST["edit"] || $_POST["clone"]) && !$_POST["save"]) {
            $_GET["edit"] = $_GET["select"];
        }
        if (isset($_GET["callf"])) {
            $_GET["call"] = $_GET["callf"];
        }
        if (isset($_GET["function"])) {
            $_GET["procedure"] = $_GET["function"];
        }

        if (isset($_GET["download"])) {
            include Yii::app()->params['adminerPath']."/download.inc.php";
        } elseif (isset($_GET["table"])) {
            include Yii::app()->params['adminerPath']."/table.inc.php";
        } elseif (isset($_GET["schema"])) {
            include Yii::app()->params['adminerPath']."/schema.inc.php";
        } elseif (isset($_GET["dump"])) {
            include Yii::app()->params['adminerPath']."/dump.inc.php";
        } elseif (isset($_GET["privileges"])) {
            include Yii::app()->params['adminerPath']."/privileges.inc.php";
        } elseif (isset($_GET["sql"])) {
            include Yii::app()->params['adminerPath']."/sql.inc.php";
        } elseif (isset($_GET["edit"])) {
            include Yii::app()->params['adminerPath']."/edit.inc.php";
        } elseif (isset($_GET["create"])) {
            include Yii::app()->params['adminerPath']."/create.inc.php";
        } elseif (isset($_GET["indexes"])) {
            include Yii::app()->params['adminerPath']."/indexes.inc.php";
        } elseif (isset($_GET["database"])) {
            include Yii::app()->params['adminerPath']."/database.inc.php";
        } elseif (isset($_GET["scheme"])) {
            include Yii::app()->params['adminerPath']."/scheme.inc.php";
        } elseif (isset($_GET["call"])) {
            include Yii::app()->params['adminerPath']."/call.inc.php";
        } elseif (isset($_GET["foreign"])) {
            include Yii::app()->params['adminerPath']."/foreign.inc.php";
        } elseif (isset($_GET["view"])) {
            include Yii::app()->params['adminerPath']."/view.inc.php";
        } elseif (isset($_GET["event"])) {
            include Yii::app()->params['adminerPath']."/event.inc.php";
        } elseif (isset($_GET["procedure"])) {
            include Yii::app()->params['adminerPath']."/procedure.inc.php";
        } elseif (isset($_GET["sequence"])) {
            include Yii::app()->params['adminerPath']."/sequence.inc.php";
        } elseif (isset($_GET["type"])) {
            include Yii::app()->params['adminerPath']."/type.inc.php";
        } elseif (isset($_GET["trigger"])) {
            include Yii::app()->params['adminerPath']."/trigger.inc.php";
        } elseif (isset($_GET["user"])) {
            include Yii::app()->params['adminerPath']."/user.inc.php";
        } elseif (isset($_GET["processlist"])) {
            include Yii::app()->params['adminerPath']."/processlist.inc.php";
        } elseif (isset($_GET["select"])) {
            include Yii::app()->params['adminerPath']."/select.inc.php";
        } elseif (isset($_GET["variables"])) {
            include Yii::app()->params['adminerPath']."/variables.inc.php";
        } elseif (isset($_GET["script"])) {
            include Yii::app()->params['adminerPath']."/script.inc.php";
        } else {
            include Yii::app()->params['adminerPath']."/db.inc.php";
        }

        // each page calls its own page_header(), if the footer should not be called then the page exits
        page_footer();

    }

}
