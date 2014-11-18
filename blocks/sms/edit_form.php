<?php

class block_sms_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        // Section header title according to language file.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
        // A sample string variable with a default value.
        $mform->addElement('textarea', 'config_text', 'Embeded Code');
        $mform->setDefault('config_text', 'default value');
        $mform->setType('config_text', PARAM_MULTILANG);
        $mform->addElement('text', 'config_title', get_string('blocktitle', 'block_sms'));
        $mform->setDefault('config_title', 'default value');
        $mform->setType('config_title', PARAM_MULTILANG);

    }
}