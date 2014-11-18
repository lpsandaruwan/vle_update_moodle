<?php

defined('MOODLE_INTERNAL') || die;
if($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext(get_string('block_sms_apikey', 'block_sms'),
                                                        get_string('sms_api_key', 'block_sms'),
                                                        get_string('sms_api_key', 'block_sms'),
                                                        '', PARAM_TEXT));
    $settings->add(new admin_setting_configtext(get_string('block_sms_api_username', 'block_sms'),
                                                        get_string('sms_api_username', 'block_sms'),
                                                        get_string('sms_api_username', 'block_sms'),
                                                        '', PARAM_TEXT));
    $settings->add(new admin_setting_configtext(get_string('block_sms_api_password', 'block_sms'),
                                                        get_string('sms_api_password', 'block_sms'),
                                                        get_string('sms_api_password', 'block_sms'),
                                                        '', PARAM_TEXT));

    $settings->add(new admin_setting_configselect('block_sms_api','SMS API Name', 'Select Api which you are using', 'Sendsms.pk', array('Clickatell','Sendsms.pk')));
}