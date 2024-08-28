import { RichText } from "@wordpress/block-editor";

export default function Save({ attributes }) {
	const { title, text, image_url, image_alt, image_id } = attributes;
	return (
		<div className="new-guarant__item swiper-slide">
			<div className="new-guarant__item-inner">
				{image_url && (
					<img
						className="new-guarant__icon"
						src={image_url}
						alt={image_alt}
						id={image_id}
					/>
				)}
				<RichText.Content
					tagName="p"
					className="new-guarant__item-title"
					value={title}
				/>
				<RichText.Content
					tagName="p"
					className="new-guarant__item-text"
					value={text}
				/>
			</div>
		</div>
	);
}
