import { InnerBlocks } from "@wordpress/block-editor";

export default function save() {
	return (
		<section className="section">
			<InnerBlocks.Content />
		</section>
	);
}
