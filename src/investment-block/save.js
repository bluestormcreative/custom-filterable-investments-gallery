import { useBlockProps } from '@wordpress/block-editor';

export default function save({attributes}) {
	const { logoUrl, logoAlt, business, sector, years, type } =
		attributes;

	return (
		<div {...useBlockProps.save()}>
			<div className="investment-block-wrapper">
				<img
					className="investment-logo"
					src={logoUrl}
					alt={logoAlt}
					width={200}
				/>
				<div className="investment-details">
					<ul>
						<li>
							<div className="investment-detail">
								<strong>Business: </strong>
								<span>{business}</span>
							</div>
						</li>
						<li>
							<div className="investment-detail">
								<strong>Sector: </strong>
								<span>{sector}</span>
							</div>
						</li>
						<li>
							<div className="investment-detail">
								<strong>Years: </strong>
								<span>{years}</span>
							</div>
						</li>
						<li>
							<div className="investment-detail">
								<strong>Type: </strong>
								<span>{type}</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	);
}
