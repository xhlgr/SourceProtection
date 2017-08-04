<?php
/**
 * sourceProtection
 *
 *
 * @license https://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 *
 */



class SourceProtection {


public static function hideSource ( SkinTemplate &$sktemplate, array &$links ) {
		// always remove viewsource tab
	$removeUs = array ('viewsource');
    foreach ( $removeUs as $view ) {
			if ( isset( $links['views'][$view] )) {
        unset( $links['views'][$view] );
			}
    }
		// grab user persmissions
    if ( method_exists ( $sktemplate, 'getTitle' ) ) {
        $title = $sktemplate->getTitle();
    } else {
        $title = $sktemplate->mTitle;
    }
    $user_can_edit = $title->userCan( 'edit' );
		//remove form_edit and history when edit is disabled
    if ( $user_can_edit === false) {
        $rem = array ('form_edit','history');
        foreach ( $rem as $v ) {
            if ( isset( $links['views'][$v] )) {
                unset( $links['views'][$v] );
            }
        }
    }

	 return true;

}
 // prevent ShowReadOnly form to be shown
	public static function doNotShowReadOnlyForm (EditPage $editPage, OutputPage $output) {

        if ( method_exists ( $editPage, 'getTitle' ) ) {
            $title = $editPage->getTitle();
        } else {
            $title = $editPage->mTitle;
        }
        $user_can_edit = $title->userCan( 'edit' );
        if(!$user_can_edit) {
            $output->redirect($editPage->getContextTitle());
        }
		return $output;
	}

}
