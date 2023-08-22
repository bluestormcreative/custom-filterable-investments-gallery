import { useEffect } from 'react';
import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaPlaceholder } from '@wordpress/block-editor';
import { useSelect } from "@wordpress/data";
import { useEntityProp } from "@wordpress/core-data";
import { TextControl, Button } from "@wordpress/components";
import { get } from 'lodash';
import './editor.scss';

export default function Edit({ attributes, setAttributes, context }) {
	const blockProps = useBlockProps({ className: "investment-block-card" });
	const { logoId, logoUrl, logoAlt, business, sector, years, type } =
		attributes;
	const { postType, postId } = context;

	const [ meta, updateMeta ] = useEntityProp(
		"postType",
		postType,
		"meta",
		postId
	);

	const logo = useSelect(
		(select) => {
			const image = logoId && select("core").getMedia(logoId);
			const url =
				get(image, ["sizes", "investment_logo", "url"]) ||
				get(image, ["media_details", "sizes", "full", "source_url"]);
			return {
				imageUrl: url,
				imageId: image?.id,
				imageAlt: image?.alt_text || __("investment logo", "cfig"),
			};
		},
		[logoId]
	);

	useEffect(() => {
		updateMeta({ ...meta, logoUrl: logo.imageUrl, logoAlt: logo.imageAlt });
		setAttributes({ logoUrl: logo.imageUrl, logoAlt: logo.imageAlt });
	}, [logo]);

	const handleRemoveImage = () => {
		setAttributes({
			logoId: undefined,
			logoUrl: undefined,
			logoAlt: undefined,
		});
		updateMeta({
			...meta,
			logoId: undefined,
			logoUrl: undefined,
			logoAlt: undefined,
		});
	};

	const renderLogoPreview = (logo) => (
		<div className="block-editor-logo-preview">
			<span>{__("Logo", "cfig")}</span>
			<div className="logo-content">
				<img src={logo.imageUrl} alt={logo.imageAlt} width={200} />
				<Button variant="secondary" onClick={handleRemoveImage}>
					{__("Remove", "cfig")}
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
					onSelect={(image) => {
						setAttributes( { logoId: image.id } );
						updateMeta( { ...meta, logoId: image.id } );
					}}
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
				onChange={(business) => {
					setAttributes({ business });
					updateMeta( { ...meta, business: business } );
				}}
				placeholder={__("Enter the business description", "cfig")}
			/>
			<TextControl
				className="investment-details"
				label={__("Sector", "cfig")}
				value={sector}
				onChange={(sector) => {
					setAttributes({ sector });
					updateMeta({ ...meta, sector: sector });
				}}
				placeholder={__("Enter sector.", "cfig")}
			/>
			<TextControl
				className="investment-details"
				label={__("Years", "cfig")}
				value={years}
				onChange={(years) => {
					setAttributes({ years });
					updateMeta({ ...meta, years: years });
				}}
				placeholder={__("Enter the years of investment.", "cfig")}
			/>
			<TextControl
				className="investment-details"
				label={__("Type", "cfig")}
				value={type}
				onChange={(type) => {
					setAttributes({ type });
					updateMeta({ ...meta, type: type });
				}}
				placeholder={__("Enter the type of investment.", "cfig")}
			/>
		</div>
	);
}
