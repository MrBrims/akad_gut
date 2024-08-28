import { isBlobURL } from "@wordpress/blob";
import {
	BlockControls,
	MediaPlaceholder,
	MediaReplaceFlow,
	useBlockProps,
	RichText,
} from "@wordpress/block-editor";
import { Spinner, ToolbarButton } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { image_id, image_url, image_alt, text } = attributes;
	const onSelectURL = (val) => {
		setAttributes({
			image_id: undefined,
			image_url: val,
			image_alt: "",
		});
	};
	const onSelect = (val) => {
		setAttributes({
			image_id: val.id,
			image_url: val.url,
			image_alt: val.alt,
		});
	};
	return (
		<div {...useBlockProps()}>
			<BlockControls>
				{image_url && (
					<>
						<MediaReplaceFlow
							name="Заменить картинку"
							onSelect={onSelect}
							onSelectURL={onSelectURL}
							accept="image/*"
							allowedTypes={["image"]}
							mediaId={image_id}
							mediaURL={image_url}
						/>
						<ToolbarButton
							onClick={() =>
								setAttributes({
									image_id: undefined,
									image_url: undefined,
									image_alt: "",
								})
							}
						>
							Удалить картинку
						</ToolbarButton>
					</>
				)}
			</BlockControls>
			{image_url && (
				<div
					className={`block-image-spinner-wrapper ${
						isBlobURL(image_url) ? "is-loaded" : "loaded"
					}`}
				>
					<img src={image_url} alt={image_alt} id={image_id} />
					{isBlobURL(image_url) && <Spinner />}
				</div>
			)}
			<RichText
				tagName="p"
				placeholder={"Ссылка на видео"}
				value={text}
				onChange={(value) => setAttributes({ text: value })}
			/>
			<MediaPlaceholder
				onSelect={onSelect}
				onSelectURL={onSelectURL}
				accept="image/*"
				allowedTypes={["image"]}
				disableMediaButtons={image_url}
			/>
		</div>
	);
}
