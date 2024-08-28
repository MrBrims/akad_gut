import { InnerBlocks } from "@wordpress/block-editor";

export default function save() {
	return (
		<aside className="sidebar">
			<InnerBlocks.Content />
		</aside>
	);
}
