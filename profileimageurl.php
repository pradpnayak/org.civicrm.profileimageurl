<?php

require_once 'profileimageurl.civix.php';
use CRM_Profileimageurl_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function profileimageurl_civicrm_config(&$config) {
  _profileimageurl_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function profileimageurl_civicrm_xmlMenu(&$files) {
  _profileimageurl_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function profileimageurl_civicrm_install() {
  _profileimageurl_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function profileimageurl_civicrm_postInstall() {
  _profileimageurl_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function profileimageurl_civicrm_uninstall() {
  _profileimageurl_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function profileimageurl_civicrm_enable() {
  _profileimageurl_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function profileimageurl_civicrm_disable() {
  _profileimageurl_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function profileimageurl_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _profileimageurl_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function profileimageurl_civicrm_managed(&$entities) {
  _profileimageurl_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function profileimageurl_civicrm_caseTypes(&$caseTypes) {
  _profileimageurl_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function profileimageurl_civicrm_angularModules(&$angularModules) {
  _profileimageurl_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function profileimageurl_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _profileimageurl_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function profileimageurl_civicrm_entityTypes(&$entityTypes) {
  _profileimageurl_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function profileimageurl_civicrm_themes(&$themes) {
  _profileimageurl_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_searchColumns().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_searchColumns
 */
function profileimageurl_civicrm_searchColumns($objectName, &$headers, &$rows, &$selector) {
  if ($objectName == 'profile') {
    $imageUrlKey = NULL;
    foreach ($headers as $key => $header) {
      if (CRM_Utils_Array::value('field_name', $header) == 'image_URL') {
        $imageUrlKey = $key;
        break;
      }
    }

    if (is_null($imageUrlKey)) {
      return;
    }

    foreach ($rows as &$row) {
      if (!empty($row[$imageUrlKey])) {
        $row[$imageUrlKey] = "<img src='{$row[$imageUrlKey]}' height='42' width='42'>";
      }
    }
  }
}
