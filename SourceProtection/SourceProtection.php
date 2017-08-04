<?php
/**
 * The sourceProtection extension to MediaWiki allows to restrict the edit
 * access to user pages.
 *
 * @version 1.0.0 2017-08-03
 *
 * @author Sen-Sai
 *
 * @copyright Copyright (C) 2017, Sen-Sai
 *
 * @license https://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

// Ensure that the script cannot be executed outside of MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is an extension to MediaWiki and cannot be run standalone.' );
}

// Register extension with MediaWiki
$wgExtensionCredits['other'][] = [
	'path' => __FILE__,
	'name' => 'SourceProtection',
	'author' => [
		'Sen-Sai'
	],
	'version' => '1.0.0',
	'url' => 'https://www.wikibase.nl',
	'descriptionmsg' => 'sourceprotection-desc',
	'license-name' => 'GPL-2.0+'
];

// Load extension's class
$wgAutoloadClasses['SourceProtection'] = __DIR__ . '/SourceProtection.class.php';

// Register extension messages
$wgMessagesDirs['SourceProtection'] = __DIR__ . '/i18n';


// Register hook
//$wgHooks['EditPage::showReadOnlyForm:initial'][] = 'SourceProtection::doNotShowReadOnlyForm';  //onEditPage_showEditForm_initial
$wgHooks['onEditPage_showEditForm_initial'][] = 'SourceProtection::doNotShowReadOnlyForm';
$wgHooks['SkinTemplateNavigation'][] = 'SourceProtection::hideSource';
