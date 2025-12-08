import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import PropTypes from 'prop-types';
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @param {Object}   props               Properties passed to the function.
 * @param {Object}   props.attributes    Available block attributes.
 * @param {Function} props.setAttributes Function that updates individual attributes.
 *
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { title, content, showIcon } = attributes;
	const blockProps = useBlockProps( {
		className: 'dev-experiments-block',
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Block Settings', 'dev-experiments' ) }>
					<ToggleControl
						label={ __( 'Show Icon', 'dev-experiments' ) }
						checked={ showIcon }
						onChange={ ( value ) => setAttributes( { showIcon: value } ) }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				{ showIcon && (
					<div className="dev-experiments-block__icon" aria-hidden="true">
						<span className="dashicons dashicons-lightbulb"></span>
					</div>
				) }

				<RichText
					tagName="h3"
					className="dev-experiments-block__title"
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					placeholder={ __( 'Enter title…', 'dev-experiments' ) }
					aria-label={ __( 'Block title', 'dev-experiments' ) }
				/>

				<RichText
					tagName="p"
					className="dev-experiments-block__content"
					value={ content }
					onChange={ ( value ) => setAttributes( { content: value } ) }
					placeholder={ __( 'Enter content…', 'dev-experiments' ) }
					aria-label={ __( 'Block content', 'dev-experiments' ) }
				/>

				<div className="dev-experiments-block__footer">
					<p className="dev-experiments-block__badge">
						{ __( '🤖 Powered by AI & GitHub Automation', 'dev-experiments' ) }
					</p>
				</div>
			</div>
		</>
	);
}

Edit.propTypes = {
	attributes: PropTypes.shape( {
		title: PropTypes.string,
		content: PropTypes.string,
		showIcon: PropTypes.bool,
	} ).isRequired,
	setAttributes: PropTypes.func.isRequired,
};
