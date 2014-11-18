<?php



require_once('../../config.php');
require_once("lib.php");

// Message ID.
$m_id = required_param('m_id', PARAM_INT);
global $DB;
$result = $DB->get_record_sql('SELECT template  FROM {block_sms_template} where id=?', array($m_id));
echo $result->template;
