export default function save({ attributes }) {
	const { image_id, image_url, image_alt } = attributes;
	return (
		<div className="post-page__image">
			<a href={image_url} data-fancybox={"gallery"}>
				<img
					src={image_url}
					alt={image_alt}
					id={image_id}
					className="page-content__img"
				/>
			</a>
		</div>
	);
}
