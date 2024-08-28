import { isBlobURL } from "@wordpress/blob";
import {
	BlockControls,
	InspectorControls,
	MediaPlaceholder,
	MediaReplaceFlow,
	RichText,
	useBlockProps,
} from "@wordpress/block-editor";
import {
	PanelBody,
	Spinner,
	TextControl,
	ToolbarButton,
} from "@wordpress/components";
import { __ } from "@wordpress/i18n";

export default function Edit({ attributes, setAttributes }) {
	const { title, tippy, image_url, image_alt, image_id } = attributes;

	const onSelectURL = (val) => {
		setAttributes({
			image_url: val,
			image_alt: "",
			image_id: undefined,
		});
	};

	const onSelect = (val) => {
		setAttributes({
			image_url: val.url,
			image_alt: val.alt,
			image_id: val.id,
		});
	};

	return (
		<>
			{image_url && !isBlobURL(image_url) && (
				<InspectorControls>
					<PanelBody title={__("Настройки картинки", "akad-gutenberg")}>
						<TextControl
							label={__("Заменить alt", "akad-gutenberg")}
							value={image_alt}
							help={__("Заменить alt у изображения", "akad-gutenberg")}
							onChange={(val) => setAttributes({ image_alt: val })}
						/>
					</PanelBody>
				</InspectorControls>
			)}
			{image_url && (
				<BlockControls>
					<MediaReplaceFlow
						name={__("Заменить картинку", "akad-gutenberg")}
						accept="image/*"
						allowedTypes={["image"]}
						onSelect={onSelect}
						onSelectURL={onSelectURL}
						mediaId={image_id}
						mediaURL={image_url}
					/>
					<ToolbarButton
						onClick={() =>
							setAttributes({
								image_id: undefined,
								image_alt: "",
								image_url: undefined,
							})
						}
					>
						{__("Удалить картинку", "akad-gutenberg")}
					</ToolbarButton>
				</BlockControls>
			)}
			<div {...useBlockProps({ className: "qual-admin-item" })}>
				{image_url && (
					<div
						className={`admin-image-box ${
							isBlobURL(image_url) ? "loading" : "loaded"
						}`}
					>
						<img src={image_url} alt={image_alt} id={image_id} />
						{isBlobURL(image_url) && <Spinner />}
					</div>
				)}
				<MediaPlaceholder
					accept="image/*"
					allowedTypes={["image"]}
					onSelect={onSelect}
					onSelectURL={onSelectURL}
					disableMediaButtons={image_url}
				/>
				<RichText
					tagName="p"
					value={title}
					placeholder={__("Card Text", "akad-gutenberg")}
					onChange={(val) => setAttributes({ title: val })}
				/>
				<RichText
					tagName="span"
					value={tippy}
					placeholder={__("Tippy Text", "akad-gutenberg")}
					onChange={(val) => setAttributes({ tippy: val })}
				/>
			</div>
		</>
	);
}
