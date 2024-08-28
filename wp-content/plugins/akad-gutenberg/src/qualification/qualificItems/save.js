import { RichText } from "@wordpress/block-editor";

export default function Save({ attributes }) {
	const { title, tippy, image_url, image_alt, image_id } = attributes;
	return (
		<div className="qual__item">
			{image_url && (
				<div className="qual__img-box">
					<img src={image_url} alt={image_alt} id={image_id} />
				</div>
			)}
			<RichText.Content tagName="p" className="qual__item-text" value={title} />
			<span className="qual__tippy" data-tippy-content={tippy}>
				i
			</span>
		</div>
	);
}
