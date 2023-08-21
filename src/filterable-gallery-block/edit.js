import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { Button } from "@wordpress/components";
import './editor.scss';

export default function Edit() {
	const blockProps = useBlockProps({ className: "filterable-gallery-wrapper" });

	return (
		<div {...blockProps}>
			<h1>{__("Filterable Investment Gallery Block", "cfig")}</h1>
			<Button
				variant="link"
				href={`/wp-admin/edit.php?post_type=investment`}
				target="_blank"
			>
				{__("Edit or View Investments", "cfig")}
			</Button>
		</div>
	);
}
