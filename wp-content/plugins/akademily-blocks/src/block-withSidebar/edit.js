import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<InnerBlocks
				allowedBlocks={[
					"create-block/block-wich-sidebar-content",
					"create-block/block-wich-sidebar-aside",
				]}
			/>
		</div>
	);
}
