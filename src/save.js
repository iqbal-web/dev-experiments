import { useBlockProps, RichText } from '@wordpress/block-editor';
import PropTypes from 'prop-types';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @param {Object} props            Properties passed to the function.
 * @param {Object} props.attributes Available block attributes.
 * @return {Element} Element to render.
 */
export default function save( { attributes } ) {
	const { title, content, showIcon } = attributes;
	const blockProps = useBlockProps.save( {
		className: 'dev-experiments-block',
	} );

	return (
		<div { ...blockProps }>
			{ showIcon && (
				<div className="dev-experiments-block__icon" aria-hidden="true">
					<span className="dashicons dashicons-lightbulb"></span>
				</div>
			) }

			<RichText.Content
				tagName="h3"
				className="dev-experiments-block__title"
				value={ title }
			/>

			<RichText.Content
				tagName="p"
				className="dev-experiments-block__content"
				value={ content }
			/>

			<div className="dev-experiments-block__footer" role="contentinfo">
				<p className="dev-experiments-block__badge">
					🤖 Powered by AI & GitHub Automation
				</p>
			</div>
		</div>
	);
}

save.propTypes = {
	attributes: PropTypes.shape( {
		title: PropTypes.string,
		content: PropTypes.string,
		showIcon: PropTypes.bool,
	} ).isRequired,
};
