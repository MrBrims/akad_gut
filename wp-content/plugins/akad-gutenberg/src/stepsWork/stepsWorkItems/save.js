import { RichText } from "@wordpress/block-editor";

export default function Save({ attributes }) {
	const { title, text, button, image_url, image_alt, image_id } = attributes;
	return (
		<div className="steps__item swiper-slide">
			<div className="steps__item-inner">
				{image_url && (
					<img
						className="steps__icon"
						src={image_url}
						alt={image_alt}
						id={image_id}
					/>
				)}
				<div className="steps__content">
					<div className="steps__head">
						<div className="steps__num">
							<span></span>
						</div>
						<RichText.Content
							tagName="h3"
							className="steps__item-title"
							value={title}
						/>
					</div>
					<RichText.Content
						tagName="p"
						className="steps__item-text"
						value={text}
					/>
				</div>
				{button && (
					<RichText.Content
						tagName="a"
						className="steps__btn btn popup-link"
						value={button}
						href="#popup-form"
					/>
				)}
			</div>
		</div>
	);
}
