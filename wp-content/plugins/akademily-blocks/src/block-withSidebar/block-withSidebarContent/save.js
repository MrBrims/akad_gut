import { InnerBlocks } from "@wordpress/block-editor";

export default function save() {
	return (
		<div className="content">
			<InnerBlocks.Content />
		</div>
	);
}
