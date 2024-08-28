import { InnerBlocks } from "@wordpress/block-editor";

export default function Save() {
	return (
		<div className="qual">
			<InnerBlocks.Content />
		</div>
	);
}
