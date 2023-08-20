import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from "@wordpress/components";
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps({ className: "investment-block editor" });
	const { business, sector, years, type } = attributes;

	return (
		<div {...blockProps}>
			<TextControl
				label={__("Business", "cfig")}
				value={business}
				onChange={(business) => setAttributes({ business })}
				placeholder={__("Enter the business description", "cfig")}
			/>
			<TextControl
				label={__("Sector", "cfig")}
				value={sector}
				onChange={(sector) => setAttributes({ sector })}
				placeholder={__("Enter the sector.", "cfig")}
			/>
			<TextControl
				label={__("Years", "cfig")}
				value={years}
				onChange={(years) => setAttributes({ years })}
				placeholder={__("Enter the years of investment.", "cfig")}
			/>
			<TextControl
				label={__("Type", "cfig")}
				value={type}
				onChange={(type) => setAttributes({ type })}
				placeholder={__("Enter the type of investment.", "cfig")}
			/>
		</div>
	);
}
