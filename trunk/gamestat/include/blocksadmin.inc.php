<?php
/**
 * Block admin for imLinks
 *  
 * @package imGlossary
 * @author Kazumi Ono (AKA onokazu) <http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/>
 * @author skenow <skenow@impresscms.org>
 * @author McDonald
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
if ( !is_object( $xoopsUser ) || !is_object( $xoopsModule ) || !$xoopsUser -> isAdmin( $xoopsModule -> mid() ) ) {
	exit( 'Access Denied' );
}
include_once ICMS_ROOT_PATH . '/class/xoopsblock.php';
include ICMS_ROOT_PATH . '/modules/system/admin/blocksadmin/blocksadmin.php';

$op = 'list';
$adv_pages = @file_exists( ICMS_ROOT_PATH . '/kernel/page.php'); // test to see if ImpressCMS 1.1+
if ( isset( $_POST ) ) {
	foreach ( $_POST as $k => $v ) {
		$$k = $v;
  	}
}

if ( isset( $_GET['op'] ) ) {
	if ( $_GET['op'] == 'edit' || $_GET['op'] == 'delete' || $_GET['op'] == 'delete_ok' || $_GET['op'] == 'clone' || $_GET['op'] == 'previewpopup' ) {
		$op = $_GET['op'];
		$bid = isset( $_GET['bid'] ) ? intval( $_GET['bid'] ) : 0;
	}
}

if ( isset( $previewblock ) ) {
	icms_cp_header();
	include_once ICMS_ROOT_PATH . '/class/template.php';
	$xoopsTpl = new XoopsTpl();
	$xoopsTpl -> xoops_setCaching(0);
	if ( isset( $bid ) ) {
		$block['bid'] = $bid;
		$block['form_title'] = _AM_EDITBLOCK;
		$myblock = new XoopsBlock( $bid );
		$block['name'] = $myblock -> getVar( 'name' );
	} else {
		if ( $op == 'save' ) {
			$block['form_title'] = _AM_ADDBLOCK;
		} else {
			$block['form_title'] = _AM_CLONEBLOCK;
		}
		$myblock = new XoopsBlock();
		$myblock -> setVar( 'block_type', 'C' );
	}
	$myts =& MyTextSanitizer::getInstance();
	$myblock -> setVar( 'title', $myts -> stripSlashesGPC( $btitle ) );
	$myblock -> setVar( 'content', $myts -> stripSlashesGPC( $bcontent ) );
	$dummyhtml = '<html><head><meta http-equiv="content-type" content="text/html; charset=' . _CHARSET . '" /><meta http-equiv="content-language" content="' . _LANGCODE . '" /><title>' . $xoopsConfig['sitename'] . '</title><link rel="stylesheet" type="text/css" media="all" href="' . getcss( $xoopsConfig['theme_set'] ) . '" /></head><body><table><tr><th>' . $myblock -> getVar( 'title' ) . '</th></tr><tr><td>' . $myblock -> getContent( 'S', $bctype ) . '</td></tr></table></body></html>';

	$dummyfile = '_dummyfile_' . time() . '.html';
	$fp = fopen( XOOPS_CACHE_PATH . '/' . $dummyfile, 'w' );
	fwrite( $fp, $dummyhtml );
	fclose( $fp );
	$block['edit_form'] = false;
	$block['template'] = '';
	$block['op'] = $op;
	$block['side'] = $bside;
	$block['weight'] = $bweight;
	$block['visible'] = $bvisible;
	$block['title'] = $myblock -> getVar( 'title', 'E' );
	$block['content'] = $myblock -> getVar( 'content', 'E' );
	$block['modules'] =& $bmodule;
	$block['ctype'] = isset( $bctype ) ? $bctype : $myblock -> getVar( 'c_type' );
	$block['is_custom'] = true;
	$block['cachetime'] = intval( $bcachetime );
	echo '<a href="admin.php?fct=blocksadmin">' . _AM_BADMIN . '</a>&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;' . $block['form_title'] . '<br /><br />';
	include ICMS_ROOT_PATH . '/modules/system/admin/blocksadmin/blockform.php';
	$form -> display();
	icms_cp_footer();
	echo '<script type="text/javascript">
	<!--//
	preview_window = openWithSelfMain("' . ICMS_URL . '/modules/system/admin.php?fct=blocksadmin&op=previewpopup&file=' . $dummyfile . '", "popup", 250, 200);
	//-->
	</script>';
	exit();
}

if ( $op == 'previewpopup' ) {
	$file = str_replace( '..', '', XOOPS_CACHE_PATH . '/' . trim( $_GET['file'] ) );
	if ( file_exists( $file ) ) {
		include $file;
		@unlink( $file );
	}
	exit();
}

if ( $op == 'list' ) {
	icms_cp_header();
	list_blocks();
	icms_cp_footer();
	exit();
}

if ( $op == 'order' ) {
	foreach ( array_keys( $bid ) as $i ) {
		if ( $side[$i] < 0 ) {
			$visible[$i] = 0;
			$side[$i] = -1;
		} else {
		//	$visible[$i] = 1 ; // -- removed this because of changes in myblocksadmin (skenow)
		}

		$bmodule[$i] = ( isset( $bmodule[$i] ) && is_array( $bmodule[$i] ) ) ? $bmodule[$i] : array(-1);

     if ( !$adv_pages ) { // -- XOOPS 2.0.x, 2.3.x and ImpressCMS 1.0.x
		myblocksadmin_update_block( $i, $side[$i], $weight[$i], $visible[$i], $title[$i], '', '', $bcachetime[$i], $bmodule[$i], array() );
     } else { // -- ImpressCMS 1.1+
		icms_update_block( $i, $side[$i], $weight[$i], $visible[$i], $title[$i], '', '', $bcachetime[$i], $bmodule[$i], array() );
     }
//		if ( $oldweight[$i] != $weight[$i] || $oldvisible[$i] != $visible[$i] || $oldside[$i] != $side[$i] )
//		order_block($bid[$i], $weight[$i], $visible[$i], $side[$i]); GIJ
	}
//	redirect_header("admin.php?fct=blocksadmin",1,_AM_DBUPDATED); GIJ
	redirect_header( 'myblocksadmin.php', 1, _AM_DBUPDATED );
	exit();
}

if ( $op == 'save' ) {
	save_block( $bside, $bweight, $bvisible, $btitle, $bcontent, $bctype, $bmodule, $bcachetime );
	exit();
}

if ( $op == 'update' ) {
	$bcachetime = isset( $bcachetime ) ? intval( $bcachetime ) : 0;
	$options = isset( $options ) ? $options : array();
	$bcontent = isset( $bcontent ) ? $bcontent : '';
	$bctype = isset( $bctype ) ? $bctype : '';
	$bmodule = ( isset( $bmodule ) && is_array( $bmodule ) ) ? $bmodule : array( -1 ); // GIJ +
     if ( !$adv_pages ) {// -- XOOPS 2.0.x, 2.3.x and ImpressCMS 1.0.x
	$msg = myblocksadmin_update_block( $bid, $bside, $bweight, $bvisible, $btitle, $bcontent, $bctype, $bcachetime, $bmodule, $options ); // GIJ c
     } else { // -- ImpressCMS 1.1+
          $msg = icms_update_block( $bid, $bside, $bweight, $bvisible, $btitle, $bcontent, $bctype, $bcachetime, $bmodule, $options );
	}
	redirect_header( 'myblocksadmin.php', 1, _AM_DBUPDATED ); // GIJ +
}


if ( $op == 'delete_ok' ) {
    delete_block_ok( $bid );
	exit();
}

if ( $op == 'delete' ) {
    icms_cp_header();
	delete_block($bid);
    icms_cp_footer();
	exit();
}

if ( $op == 'edit' ) {
    icms_cp_header();
	edit_block($bid);
    icms_cp_footer();
	exit();
}
/*
if ($op == 'clone') {
	clone_block($bid);
}

if ($op == 'clone_ok') {
	clone_block_ok($bid, $bside, $bweight, $bvisible, $bcachetime, $bmodule, $options);
}
*/

	// import from modules/system/admin/blocksadmin/blocksadmin.php
	function myblocksadmin_update_block( $bid, $bside, $bweight, $bvisible, $btitle, $bcontent, $bctype, $bcachetime, $bmodule, $options = array() ) {
		global $xoopsConfig;
		if ( empty( $bmodule ) ) {
			icms_cp_header();
			xoops_error( sprintf( _AM_NOTSELNG, _AM_VISIBLEIN ) );
			icms_cp_footer();
			exit();
		}
		$myblock = new XoopsBlock( $bid );
		// $myblock->setVar('side', $bside); GIJ -
		if ( $bside >= 0 ) $myblock -> setVar( 'side', $bside ); // GIJ +
		$myblock -> setVar( 'weight', $bweight );
		$myblock -> setVar( 'visible', $bvisible );
		$myblock -> setVar( 'title', $btitle );
		$myblock -> setVar( 'content', $bcontent );
		$myblock -> setVar( 'bcachetime', $bcachetime );
		if ( isset( $options ) && ( count( $options ) > 0 ) ) {
			$options = implode( '|', $options );
			$myblock -> setVar( 'options', $options );
		}
		if ( $myblock -> getVar( 'block_type' ) == 'C' ) {
			switch ( $bctype ) {
			case 'H':
				$name = _AM_CUSTOMHTML;
				break;
			case 'P':
				$name = _AM_CUSTOMPHP;
				break;
			case 'S':
				$name = _AM_CUSTOMSMILE;
				break;
			default:
				$name = _AM_CUSTOMNOSMILE;
				break;
			}
			$myblock -> setVar( 'name', $name );
			$myblock -> setVar( 'c_type', $bctype );
		} else {
			$myblock -> setVar( 'c_type', 'H' );
		}
		$msg = _AM_DBUPDATED;
		if ( $myblock -> store() != false ) {
			$db =& Database::getInstance();
			$sql = sprintf( 'DELETE FROM %s WHERE block_id = %u', $db -> prefix( 'block_module_link' ), $bid );
			$db -> query( $sql );
			foreach ( $bmodule as $bmid ) {
				$sql = sprintf( 'INSERT INTO %s (block_id, module_id) VALUES (%u, %d)', $db -> prefix( 'block_module_link' ), $bid, intval( $bmid ) );
				$db -> query( $sql );
			}
			include_once ICMS_ROOT_PATH . '/class/template.php';
			$xoopsTpl = new XoopsTpl();
			$xoopsTpl -> xoops_setCaching(2);
			if ( $myblock -> getVar( 'template' ) != '' ) {
				if ( $xoopsTpl -> is_cached( 'db:' . $myblock -> getVar( 'template' ) ) ) {
					if ( !$xoopsTpl -> clear_cache( 'db:' . $myblock -> getVar( 'template' ) ) ) {
						$msg = 'Unable to clear cache for block ID' . $bid;
					}
				}
			} else {
				if ( $xoopsTpl -> is_cached( 'db:system_dummy.html', 'block' . $bid ) ) {
					if ( !$xoopsTpl -> clear_cache( 'db:system_dummy.html', 'block' . $bid ) ) {
						$msg = 'Unable to clear cache for block ID' . $bid;
					}
				}
			}
		} else {
			$msg = 'Failed update of block. ID:' . $bid;
		}
		// redirect_header('admin.php?fct=blocksadmin&amp;t='.time(),1,$msg);
		// exit(); GIJ -
		return $msg; // GIJ +
	}
/**
 * ImpressCMS 1.1 update blocks function handles pages
 */ 
    function icms_update_block( $bid, $bside, $bweight, $bvisible, $btitle, $bcontent, $bctype, $bcachetime, $bmodule, $options=array() ) {
        global $xoopsConfig;
        if ( empty( $bmodule ) ) {
            icms_cp_header();
            xoops_error( sprintf( _AM_NOTSELNG, _AM_VISIBLEIN ) );
            icms_cp_footer();
            exit();
        }
        $myblock = new XoopsBlock( $bid );
        $myblock -> setVar( 'side', $bside );
        $myblock -> setVar( 'weight', $bweight );
        $myblock -> setVar( 'visible', $bvisible );
        $myblock -> setVar( 'title', $btitle );
        $myblock -> setVar( 'content', $bcontent );
        $myblock -> setVar( 'bcachetime', $bcachetime );
        if ( isset( $options ) ) {
            $options_count = count( $options );
            if ( $options_count > 0 ) {
                //Convert array values to comma-separated
                for ( $i = 0; $i < $options_count; $i++ ) {
                    if ( is_array( $options[$i] ) ) {
                        $options[$i] = implode( ',', $options[$i] );
                    }
                }
                $options = implode( '|', $options );
                $myblock -> setVar( 'options', $options );
            }
        }
        if ( $myblock -> getVar( 'block_type' ) == 'C' ) {
            switch ( $bctype ) {
            case 'H':
                $name = _AM_CUSTOMHTML;
                break;
            case 'P':
                $name = _AM_CUSTOMPHP;
                break;
            case 'S':
                $name = _AM_CUSTOMSMILE;
                break;
            default:
                $name = _AM_CUSTOMNOSMILE;
                break;
            }
            $myblock -> setVar( 'name', $name );
            $myblock -> setVar( 'c_type', $bctype );
        } else {
            $myblock -> setVar( 'c_type', 'H' );
        }
        $msg = _AM_DBUPDATED;
        if ( $myblock -> store() != false ) {
            $db =& Database::getInstance();
            $sql = sprintf( "DELETE FROM %s WHERE block_id = '%u'", $db -> prefix( 'block_module_link' ), intval( $bid ) );
            $db -> query( $sql );
            foreach ( $bmodule as $bmid ) {
            	$page = explode( '-', $bmid );
            	$mid = $page[0];
            	$pageid = $page[1];
            	$sql = "INSERT INTO " . $db -> prefix( 'block_module_link' ) . " (block_id, module_id, page_id) VALUES ('" . intval( $bid ) . "', '" . intval( $mid ) . "', '" . intval( $pageid ) . "' )";
            	$db -> query( $sql );
            }
            include_once ICMS_ROOT_PATH . '/class/template.php';
            $xoopsTpl = new XoopsTpl();
            $xoopsTpl -> xoops_setCaching(2);
            if ( $myblock -> getVar( 'template' ) != '' ) {
                if ( $xoopsTpl -> is_cached( 'db:' . $myblock -> getVar( 'template' ), 'blk_' . $myblock -> getVar( 'bid' ) ) ) {
                    if ( !$xoopsTpl -> clear_cache( 'db:' . $myblock -> getVar( 'template' ), 'blk_' . $myblock -> getVar( 'bid' ) ) ) {
                        $msg = 'Unable to clear cache for block ID ' . $bid;
                    }
                }
            } else {
                if ( $xoopsTpl -> is_cached( 'db:system_dummy.html', 'blk_' . $bid ) ) {
                    if ( !$xoopsTpl -> clear_cache( 'db:system_dummy.html', 'blk_' . $bid ) ) {
                        $msg = 'Unable to clear cache for block ID ' . $bid;
                    }
                }
            }
        } else {
            $msg = 'Failed update of block. ID:' . $bid;
        }
        //redirect_header('admin.php?fct=blocksadmin&amp;t='.time(),1,$msg);
    }
?>