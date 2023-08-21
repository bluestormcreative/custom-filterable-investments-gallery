import { useBlockProps } from '@wordpress/block-editor';

export default function save({attributes}) {
	const {logoId} = attributes;
	
	return (
		<p { ...useBlockProps.save() }>
			{logoId}
		</p>
	);
}
