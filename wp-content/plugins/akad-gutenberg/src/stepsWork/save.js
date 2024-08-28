import { InnerBlocks } from "@wordpress/block-editor";

export default function Save() {
	return (
		<div className="steps">
			<div className="steps__body swiper">
				<div className="steps__items swiper-wrapper">
					<InnerBlocks.Content />
				</div>
			</div>
			<div className="steps__navigate">
				<div className="steps__prev">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24"
						fill="rgba(50,93,156,1)"
					>
						<path d="M4.83578 12L11.0429 18.2071L12.4571 16.7929L7.66421 12L12.4571 7.20712L11.0429 5.79291L4.83578 12ZM10.4857 12L16.6928 18.2071L18.107 16.7929L13.3141 12L18.107 7.20712L16.6928 5.79291L10.4857 12Z"></path>
					</svg>
				</div>
				<div className="steps__pagination"></div>
				<div className="steps__next">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24"
						fill="rgba(50,93,156,1)"
					>
						<path d="M19.1642 12L12.9571 5.79291L11.5429 7.20712L16.3358 12L11.5429 16.7929L12.9571 18.2071L19.1642 12ZM13.5143 12L7.30722 5.79291L5.89301 7.20712L10.6859 12L5.89301 16.7929L7.30722 18.2071L13.5143 12Z"></path>
					</svg>
				</div>
			</div>
		</div>
	);
}
