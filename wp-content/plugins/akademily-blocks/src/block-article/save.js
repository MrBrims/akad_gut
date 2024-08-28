import { InnerBlocks } from "@wordpress/block-editor";

export default function save() {
	return (
		<article className="article">
			<InnerBlocks.Content />
		</article>
	);
}
