<?php

require_once 'issuecollector.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function issuecollector_civicrm_config(&$config) {
  _issuecollector_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function issuecollector_civicrm_xmlMenu(&$files) {
  _issuecollector_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function issuecollector_civicrm_install() {
  _issuecollector_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function issuecollector_civicrm_uninstall() {
  _issuecollector_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function issuecollector_civicrm_enable() {
  _issuecollector_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function issuecollector_civicrm_disable() {
  _issuecollector_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function issuecollector_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _issuecollector_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function issuecollector_civicrm_managed(&$entities) {
  _issuecollector_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function issuecollector_civicrm_caseTypes(&$caseTypes) {
  _issuecollector_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function issuecollector_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _issuecollector_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implementation of hook_civicrm_alterContent
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterContent
 */
function issuecollector_civicrm_alterContent(&$content, $context, $tplName, &$object) {
  $show = FALSE;
  $issueCollector = '<script type="text/javascript" src="https://jmaltd.atlassian.net/s/d41d8cd98f00b204e9800998ecf8427e-T/atn9bf/b/c/7ebd7d8b8f8cafb14c7b0966803e5701/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?locale=en-US&collectorId=ca5fb152"></script>';
  if ($config->userSystem->is_wordpress) {
    $user = wp_get_current_user();
    $allowedRoles = array('administrator', 'site-admins');
    if(array_intersect($allowedRoles, $user->roles )) {
      $show = TRUE;
    }
  }
  if ($show) {
    $content .= $issueCollector;
  }
}
