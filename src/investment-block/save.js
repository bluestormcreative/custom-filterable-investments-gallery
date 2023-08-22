import { useBlockProps } from '@wordpress/block-editor';

/**
 * Investment block save function.
 *
 * @param {Object} attributes pass native attributes.
 */
export default function save({attributes}) {
	const { logoUrl, logoAlt, business, sector, years, type } =
		attributes;

	return (
		<div {...useBlockProps.save()}>
			<div className="investment-block-card">
				<div className="investment-logo">
					<img
						src={logoUrl}
						alt={logoAlt}
						width={200}
					/>
				</div>
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
