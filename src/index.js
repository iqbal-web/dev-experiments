import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import './style.scss';
import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Register the AI Demo Block
 */
registerBlockType( metadata.name, {
	edit: Edit,
	save,
} );
