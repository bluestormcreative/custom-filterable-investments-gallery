import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaPlaceholder } from '@wordpress/block-editor';
import { useSelect } from "@wordpress/data";
import { TextControl, Button } from "@wordpress/components";
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps({ className: "investment-block" });
	const {logoId, business, sector, years, type } = attributes;

	const logo = useSelect(
		(select) => {
			const image = logoId && select("core").getMedia(logoId);
			return {
				imageUrl:
					image?.media_details?.sizes?.investment_logo?.source_url ||
					image?.media_details?.sizes?.thumbnail?.source_url,
				imageId: logoId ? select("core").getMedia(logoId) : null,
			};
		},
		[logoId]
	);

	const handleRemoveImage = () => {
		setAttributes({ logoId: null });
	}

	const renderLogoPreview = (logo) => (
		<div className="block-editor-logo-preview">
			<span>Logo</span>
			<div className="logo-content">
				<img src={logo.imageUrl} />
				<Button variant="secondary" onClick={handleRemoveImage}>
					Remove
				</Button>
			</div>
		</div>
	);

	return (
		<div {...blockProps}>
			{logo && logo.imageUrl ? (
				renderLogoPreview(logo)
			) : (
				<MediaPlaceholder
					labels={{
						title: __("Logo", "cfig"),
						instructions: __(
							"Upload a logo or select one from the media library.",
							"cfig"
						),
					}}
					onSelect={(image) => setAttributes({ logoId: image.id })}
					accept="image/*"
					allowedTypes={["image"]}
					multiple={false}
					value={{
						id: attributes.logoId,
					}}
				/>
			)}
			<TextControl
				className="investment-details"
				label={__("Business", "cfig")}
				value={business}
				onChange={(business) => setAttributes({ business })}
				placeholder={__("Enter the business description", "cfig")}
			/>
			<TextControl
				className="investment-details"
				label={__("Sector", "cfig")}
				value={sector}
				onChange={(sector) => setAttributes({ sector })}
				placeholder={__("Enter the sector.", "cfig")}
			/>
			<TextControl
				className="investment-details"
				label={__("Years", "cfig")}
				value={years}
				onChange={(years) => setAttributes({ years })}
				placeholder={__("Enter the years of investment.", "cfig")}
			/>
			<TextControl
				className="investment-details"
				label={__("Type", "cfig")}
				value={type}
				onChange={(type) => setAttributes({ type })}
				placeholder={__("Enter the type of investment.", "cfig")}
			/>
		</div>
	);
}
