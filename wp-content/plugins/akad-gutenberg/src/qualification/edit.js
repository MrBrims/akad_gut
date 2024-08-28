import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<InnerBlocks
				allowedBlocks={["create-block/qualification-item"]}
				template={[
					["create-block/qualification-item"],
					["create-block/qualification-item"],
				]}
			/>
		</div>
	);
}
