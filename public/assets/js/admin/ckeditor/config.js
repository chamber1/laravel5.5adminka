/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.protectedSource.push(/<\?[\s\S]*?\?>/g);
	config.filebrowserUploadUrl = '/admin/article/upload_editor';
	config.extraPlugins = 'iframe';
	
};
